<?php
class CartModel extends DB {
    // Lấy thông tin sản phẩm theo ID
    public function getProductById($product_id) {
        $sql = "SELECT * FROM products WHERE id = :product_id"; // Đảm bảo tên bảng và cột chính xác
        $stm = $this->Connect()->prepare($sql);
        $stm->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC); // Trả về thông tin sản phẩm dưới dạng mảng liên kết
    }

    // Lấy danh sách sản phẩm trong giỏ hàng (từ session hoặc cơ sở dữ liệu)
    public function getCartProducts($cart) {
        $products = [];
        foreach ($cart as $product_id => $item) {
            $product = $this->getProductById($product_id);
            if ($product) {
                $product['quantity'] = $item['quantity']; // Thêm số lượng từ session
                $products[] = $product;
            }
        }
        return $products; // Trả về danh sách sản phẩm với thông tin chi tiết
    }

    // Thêm sản phẩm vào giỏ hàng
    public function addProductToCart($product_id, $quantity) {
        $product = $this->getProductById($product_id);
        if ($product) {
            if (!isset($_SESSION["cart"])) {
                $_SESSION["cart"] = [];
            }

            if (isset($_SESSION["cart"][$product_id])) {
                $_SESSION["cart"][$product_id]["quantity"] += $quantity;
            } else {
                $_SESSION["cart"][$product_id] = [
                    "id" => $product["id"],
                    "name" => $product["name"],
                    "price" => $product["price"],
                    "quantity" => $quantity,
                ];
            }
            return true;
        }
        return false;
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function removeProductFromCart($product_id) {
        if (isset($_SESSION["cart"][$product_id])) {
            unset($_SESSION["cart"][$product_id]);
            return true;
        }
        return false;
    }

    // Cập nhật số lượng sản phẩm trong giỏ hàng
    public function updateProductQuantity($product_id, $quantity) {
        if (isset($_SESSION["cart"][$product_id])) {
            $_SESSION["cart"][$product_id]["quantity"] = $quantity;
            return true;
        }
        return false;
    }

    // Tính tổng giá trị của giỏ hàng
    public function calculateTotal() {
        $total = 0;
        if (isset($_SESSION["cart"])) {
            foreach ($_SESSION["cart"] as $item) {
                $total += $item["price"] * $item["quantity"];
            }
        }
        return $total; // Trả về tổng giá trị của giỏ hàng
    }

    // Xóa toàn bộ giỏ hàng
    public function clearCart() {
        unset($_SESSION["cart"]);
        return true;
    }
}
?>
