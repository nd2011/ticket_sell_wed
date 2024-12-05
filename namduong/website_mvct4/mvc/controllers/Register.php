<?php
class Register extends Controller {
    // Hiển thị form đăng ký
    public function getShow() {
        $this->view("Back_end/RegisterView", ["page" => "RegisterView"]);
    }

    // Xử lý đăng ký
    public function doRegister() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            $email = trim($_POST['email']);

            if (empty($username) || empty($password) || empty($email)) {
                $message = "Vui lòng nhập đầy đủ thông tin.";
            } else {
                // Gọi model để thêm người dùng
                $model = $this->model("AuthModel");
                $result = $model->registerUser($username, $password, $email);

                if ($result === true) {
                    header("Location: http://localhost/namduong/website_mvct4/AuthController");
                    exit();
                } else {
                    $message = $result; // Hiển thị thông báo lỗi từ model
                }
            }

            // Hiển thị thông báo
            $this->view("Back_end/RegisterView", ["page" => "RegisterView", "message" => $message]);
        }
    }
}