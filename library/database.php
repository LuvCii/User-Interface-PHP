<?php
    include "./config/config.php";
?>
<?php 
    class database{
        public $host = DB_HOST;
        public $user = DB_USER;
        public $pass = DB_PASS;
        public $name = DB_NAME;

        public $link; // trả về kết quả đối tượng nếu như kết nối thành công
        public $error; // trả về kết quả đối tượng nếu như kết nối không thành công
        public function __construct()
        {
            $this->connnectDB();
        }
        // Phương thức kết nối csdl
        public function connnectDB()
        {
            $this->link = new mysqli($this->host, $this->user, $this->pass, $this->name);
            mysqli_set_charset($this->link,'UTF8');
            if (!$this->link) {
                $this->error = "Lỗi kết nối" . $this->link->connection_error;
                return false;
            }
        }
        // Phương thức dùng để select
        public function select($query)
        {
            $result = $this->link->query($query);
            if ($result->num_rows > 0) 
            return $result;
            else return false;
        }
        // Phương thức dùng để insert, update, delete dữ liệu
        public function exec($query)
        {
            $result = $this->link->query($query);
            if ($result) return $result;
            else false;
        }
    }
?>