<?php
class AuthModel extends DB {
    // Hàm đăng ký người dùng
    public function registerUser($username, $password, $email) {
        try {
            // Kiểm tra xem tên đăng nhập hoặc email đã tồn tại chưa
            $checkSql = "SELECT COUNT(*) FROM users WHERE username = :username OR email = :email";
            $checkStmt = $this->connect()->prepare($checkSql);
            $checkStmt->bindParam(':username', $username);
            $checkStmt->bindParam(':email', $email);
            $checkStmt->execute();

            if ($checkStmt->fetchColumn() > 0) {
                return "Tên đăng nhập hoặc email đã tồn tại!";
            }

            // Mã hóa mật khẩu
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Thêm người dùng vào cơ sở dữ liệu
            $sql = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':email', $email);
            
            if ($stmt->execute()) {
                return true;
            } else {
                return "Lỗi trong quá trình thêm dữ liệu.";
            }
        } catch (PDOException $e) {
            return "Lỗi: " . $e->getMessage(); // Hiển thị lỗi cụ thể
        }
    }
    public function checkLogin($username, $password) {
        try {
            $sql = "SELECT password FROM users WHERE username = :username";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
    
            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if (password_verify($password, $user['password'])) {
                    return true;
                }
            }
            return false;
        } catch (PDOException $e) {
            return false;
        }
    }
}