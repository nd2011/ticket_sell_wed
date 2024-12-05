<?php
class DB {
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $dbname = 'website_mvc';
    private $pdo = null;

    // Phương thức kết nối tới cơ sở dữ liệu
    public function connect() {
        // Nếu đã kết nối rồi, trả về đối tượng PDO hiện tại để tránh kết nối lại nhiều lần
        if ($this->pdo === null) {
            try {
                $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=utf8';
                $this->pdo = new PDO($dsn, $this->user, $this->pass);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Bật chế độ báo lỗi ngoại lệ
                $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Thiết lập chế độ lấy dữ liệu mặc định
            } catch (PDOException $e) {
                echo "Kết nối cơ sở dữ liệu thất bại: " . $e->getMessage();
                exit(); // Dừng chương trình nếu kết nối thất bại
            }
        }
        return $this->pdo;
    }
}
?>
