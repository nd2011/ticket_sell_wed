<?php
class OrderModel extends DB {
    // Lấy danh sách đơn hàng
    public function getAllOrders() {
        $sql = "SELECT o.id, c.name AS customer_name, p.name AS product_name, o.quantity, o.order_date
                FROM orders o
                JOIN customers c ON o.customer_id = c.id
                JOIN products p ON o.product_id = p.id"; // Kết hợp với bảng customers và products
        $stm = $this->Connect()->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC); // Trả về danh sách đơn hàng với đầy đủ thông tin
    }

    // Thêm đơn hàng
    public function addOrder($customer_id, $product_id, $quantity, $order_date) {
        $sql = "INSERT INTO orders (customer_id, product_id, quantity, order_date) 
                VALUES (:customer_id, :product_id, :quantity, :order_date)";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':customer_id', $customer_id);
        $stm->bindParam(':product_id', $product_id);
        $stm->bindParam(':quantity', $quantity);
        $stm->bindParam(':order_date', $order_date);
        return $stm->execute(); // Trả về true nếu thêm thành công
    }

    // Xóa đơn hàng
    public function deleteOrder($order_id) {
        $sql = "DELETE FROM orders WHERE id = :order_id"; // Cột id cần chính xác
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':order_id', $order_id);
        return $stm->execute(); // Trả về true nếu xóa thành công
    }

    // Lấy đơn hàng theo ID
    public function getOrderById($order_id) {
        $sql = "SELECT * FROM orders WHERE id = :order_id";
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':order_id', $order_id);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC); // Trả về thông tin đơn hàng dưới dạng mảng liên kết
    }

    // Cập nhật đơn hàng
    public function updateOrder($order_id, $customer_id, $product_id, $quantity, $order_date) {
        $sql = "UPDATE orders 
                SET customer_id = :customer_id, product_id = :product_id, quantity = :quantity, order_date = :order_date 
                WHERE id = :order_id";

        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':order_id', $order_id);
        $stm->bindParam(':customer_id', $customer_id);
        $stm->bindParam(':product_id', $product_id);
        $stm->bindParam(':quantity', $quantity);
        $stm->bindParam(':order_date', $order_date);
        return $stm->execute(); // Trả về true nếu cập nhật thành công
    }
}
