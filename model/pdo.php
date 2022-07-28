<?php
/* 
    Hàm kết nối đến csdl
    return kết nối ($conn)
*/
function pdo_get_connection(){
    try {
        $conn = new PDO("mysql:host=localhost; dbname=ass_duan; charset=utf8", "root", "");
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Kết nối thành công";
    } catch(PDOException $e) {
        echo "Kết nối thất bại: " . $e->getMessage();
    }
    return $conn;
}

/**
 * Hàm thực thi các câu lệnh truy vấn (INSERT, UPDATE, DELETE)
 * tham số: $sql câu lệnh truy vấn
 * tham số: $args mảng các tham số đầu vào
 * PDOException $e bắt lỗi
 */
function pdo_execute($sql) {
    $args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);//$sql = INSERT INTO loai(ten_loai) values(?)
        $stmt->execute($args);
    } catch (PDOException $e) {
        echo "Có lỗi xảy ra: " . $e->getMessage();
    } finally {
        unset($conn);
    }
}

/**
 * Hàm thực thi câu lệnh truy vấn SELECT
 * tham số: $sql câu lệnh truy vấn select
 * tham số: $args mảng các tham số đầu vàu
 * return danh sách bản ghi
 */
function pdo_query($sql) {
    $args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($args);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch(PDOException $e) {
        echo "Có lỗi xảy ra: " . $e->getMessage();
    } finally {
        unset($conn);
    }
}

/**
 * hàm thực thi câu lênh SQL lấy 1 bản ghi (sửa, xem chi tiết)
 * tham số: $sql câu lệnh truy vấn select
 * tham số: $args các tham số đầu vào
 * return 1 bản ghi
 */
function pdo_query_one($sql) {
    $args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($args);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    } catch(PDOException $e) {
        echo "Có lỗi xảy ra: " . $e->getMessage();
    } finally {
        unset($conn);
    }
}

/**
 * Hàm thực thi câu lệnh SQL và trả về 1 giá trị
 * tham số: $sql câu lệnh truy vấn
 * tham số: $args các tham số đầu vào
 * return giá trị
 */
function pdo_query_value($sql) {
    $args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($args);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($result)[0];
    } catch(PDOException $e) {
        echo "Có lỗi xảy ra: " . $e->getMessage();
    } finally {
        unset($conn);
    }
}
?>