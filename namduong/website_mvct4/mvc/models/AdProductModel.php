<?php
class AdProductModel extends DB {
    // Lấy danh sách sản phẩm
    public function getAllProducts() {
        $sql = "SELECT * FROM products";
        $stm = $this->Connect()->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    // Thêm sản phẩm
    public function addProduct($name, $price, $description) {
        $sql = "INSERT INTO products (name, price, description) VALUES (:name, :price, :description)";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':name', $name);
        $stm->bindParam(':price', $price);
        $stm->bindParam(':description', $description);
        return $stm->execute();
    }

    // Xóa sản phẩm
    public function deleteProduct($id) {
        $sql = "DELETE FROM products WHERE id = :id";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':id', $id);
        return $stm->execute();
    }
    // Lấy sản phẩm theo ID
public function getProductById($id) {
    $sql = "SELECT * FROM products WHERE id = :id";
    $stm = $this->Connect()->prepare($sql);
    $stm->bindParam(':id', $id);
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC);
}

// Cập nhật sản phẩm
public function updateAdProduct($id, $name, $price, $description) {
    // Cập nhật sản phẩm trong bảng 'products'
    $sql = "UPDATE products SET name = :name, price = :price, description = :description WHERE id = :id";
    
    // Chuẩn bị câu lệnh
    $stm = $this->Connect()->prepare($sql);
    
    // Liên kết các tham số
    $stm->bindParam(':id', $id);
    $stm->bindParam(':name', $name);
    $stm->bindParam(':price', $price);
    $stm->bindParam(':description', $description);
    
    // Thực thi câu lệnh
    $stm->execute();
}

}
?>
