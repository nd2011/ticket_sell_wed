<?php
class CustomerModel extends DB {
    // Lấy danh sách tất cả khách hàng
    public function getAllCustomers() {
        $sql = "SELECT * FROM customers";
        $stm = $this->Connect()->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    // Thêm khách hàng mới
    public function addCustomer($name, $email, $address, $username, $password) {
        $sql = "INSERT INTO customers (name, email, address, username, password)
                VALUES (:name, :email, :address, :username, :password)";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':name', $name);
        $stm->bindParam(':email', $email);
        $stm->bindParam(':address', $address);
        $stm->bindParam(':username', $username);

        // Mã hóa mật khẩu trước khi lưu
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stm->bindParam(':password', $hashedPassword);

        return $stm->execute();
    }

    // Xóa khách hàng theo ID
    public function deleteCustomer($id) {
        $sql = "DELETE FROM customers WHERE id = :id";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':id', $id);
        return $stm->execute();
    }

    // Lấy thông tin khách hàng theo ID
    public function getCustomerById($id) {
        $sql = "SELECT * FROM customers WHERE id = :id";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':id', $id);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    // Cập nhật thông tin khách hàng
    public function updateCustomer($id, $name, $email, $address, $username, $password) {
        $sql = "UPDATE customers 
                SET name = :name, email = :email, address = :address, username = :username, password = :password 
                WHERE id = :id";

        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':id', $id);
        $stm->bindParam(':name', $name);
        $stm->bindParam(':email', $email);
        $stm->bindParam(':address', $address);
        $stm->bindParam(':username', $username);

        // Mã hóa mật khẩu trước khi cập nhật
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stm->bindParam(':password', $hashedPassword);

        return $stm->execute();
    }

    // Kiểm tra xem email đã tồn tại chưa
    public function isEmailExist($email) {
        $sql = "SELECT COUNT(*) FROM customers WHERE email = :email";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':email', $email);
        $stm->execute();
        return $stm->fetchColumn() > 0; // Trả về true nếu email đã tồn tại
    }

    // Kiểm tra xem tên đăng nhập đã tồn tại chưa
    public function isUsernameExist($username) {
        $sql = "SELECT COUNT(*) FROM customers WHERE username = :username";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':username', $username);
        $stm->execute();
        return $stm->fetchColumn() > 0; // Trả về true nếu username đã tồn tại
    }
}
?>
