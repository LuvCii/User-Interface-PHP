<?php
include_once './library/database.php';
?>
<?php
class dm_class
{
    public $db;
    public function __construct()
    {
        $this->db = new database();
    }
    // Phương thức login
    public function login($name, $pass)
    {
        $query = "Select * from user where name='$name' and pass='$pass' limit 1 ";
        $result = $this->db->select($query);
        if ($result) {
            $row = $result->fetch_assoc(); //truy cập đến dữ liệu thì chỉ cần $row['name']
            // fetch_array();   truy cập đến dữ liệu thì chỉ cần $row['2']
            // Thiết lập session tại đây
            $_SESSION['isLogin'] = true;
            $_SESSION['name'] = $row['name'];
            header("Location:home.php");
        } else return "Sai Email hoặc mật khẩu";
    }


      // Tìm kiếm
      public function search_sp($name)
      {
          $query = "Select * from sanpham where tenSP like '%$name%' ";
          return $this->db->select($query);
      }

     // Phương thức hiển thị bảng user
     public function show_user()
     {
         $query = "Select * from user order by id asc";
         return $this->db->select($query);
     }

    // Phương thức check user
    // 'public function checkUser($name,$pass) {
    //     $query = "Select * from user where name='.$name.' and pass='.$pass.' ";
    //     $result = $this->db->query_one($query);
    // }'
    // Phương thức hiển thị bảng danh mục
    public function show_dm()
    {
        $query = "Select * from danhmuc order by id desc";
        return $this->db->select($query);
    }
    // Phương thức xóa danh mục
    public function del_dm($id)
    {
        $query = "Delete from danhmuc where id = '$id' ";
        $result = $this->db->exec($query);
        if ($result) return "Xóa danh mục thành công";
        else return "Xóa danh mục không thành công";
    }
    // Phương thức sửa danh mục
    public function update_dm($tenDM, $id)
    {
        $query = "Update danhmuc set tenDM='$tenDM' where id='$id' ";
        $result = $this->db->exec($query);
        if ($result) return "Sửa danh mục thành công.... Chuyển hướng về trang Quản lý hàng hóa trong 5s";
        else return "Sửa danh mục không thành công";
    }
    // Phương thức thêm mới danh mục
    public function insert_dm($tenDM)
    {
        $query = "INSERT INTO danhmuc(tenDM) values('$tenDM')";
        $result = $this->db->exec($query);
        if ($result) return "Thêm danh mục thành công.... Chuyển hướng về trang Quản lý hàng hóa trong 5s";
        else return "Thêm danh mục không thành công";
    }






    // Phương thức hiển thị bảng sản phẩm
    public function show_sp()
    {
        $query = "Select * from sanpham inner join danhmuc on danhmuc.id = sanpham.id ";
        return $this->db->select($query);
    }
    // Phương thức thêm mới sản phẩm
    public function insert_sp($maSP, $tenSP, $price, $img, $id, $mota, $ngayUp)
    {
        $query = "INSERT INTO `sanpham`(`maSP`, `tenSP`, `price`, `img`, `id`, `mota`, `ngayUp`) VALUES ('$maSP','$tenSP','$price','$img','$id','$mota','$ngayUp')";
        $result = $this->db->exec($query);
        if ($result) return "Thêm sản phẩm thành công.... Chuyển hướng về trang Quản lý loại hàng trong 5s";
        else return "Thêm sản phẩm không thành công";
    }
    // Phương thức sửa sản phẩm
    public function update_sp($maSP, $tenSP, $price, $img, $id, $mota, $id_sp)
    {
        $query = "Update sanpham set maSP = '$maSP', tenSP = '$tenSP', price = '$price', img = '$img', mota = '$mota' where id_sp = '$id_sp' ";
        $result = $this->db->exec($query);
        if ($result) return "Sửa sản phẩm thành công.... Chuyển hướng về trang Quản lý loại hàng trong 5s";
        else return "Sửa sản phẩm không thành công";
    }
    // Phương thức xóa sản phẩm
    public function del_sp($id_sp)
    {
        $query = "Delete from sanpham where id_sp = '$id_sp' ";
        $result = $this->db->exec($query);
        if ($result) return "Xóa sản phẩm thành công";
        else return "Xóa sản phẩm không thành công";
    }

    // Phương thức thêm người dùng
    public function insert_user($name, $phone, $email, $pass)
    {
        $query = "INSERT INTO user(name, phone, email, pass) values('$name','$phone', '$email','$pass')";
        $result = $this->db->exec($query);
        if ($result) return "Đăng ký tài khoản thành công.... Chuyển hướng về trang đăng nhập trong 5s";
        else return "Đăng ký tài khoản không thành công";
    }
}
?>