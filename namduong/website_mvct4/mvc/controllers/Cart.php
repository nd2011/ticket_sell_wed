<?php
class Cart extends Controller {
    // Hiển thị giỏ hàng
    public function getShow() {
        $cartModel = $this->model("CartModel");
        $cart = isset($_SESSION["cart"]) ? $_SESSION["cart"] : [];
        $data = $cartModel->getCartProducts($cart);
    
        $this->view("AdminView", [
            "page" => "CartView",
            "data" => $data
        ]);
    }

    // Thêm sản phẩm vào giỏ hàng
    public function insert() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn_submit'])) {
            $product_id = $_POST['product_id']; // ID sản phẩm
            $quantity = $_POST['quantity'];     // Số lượng sản phẩm

            // Lấy thông tin sản phẩm từ model
            $product = $this->model("CartModel")->getProductById($product_id);

            if ($product) {
                // Kiểm tra và thêm sản phẩm vào session giỏ hàng
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
            }

            // Sau khi thêm xong, chuyển hướng về trang giỏ hàng
            header("Location: /namduong/website_mvct4/Cart/getShow");
            exit();
        } else {
            // Hiển thị form thêm sản phẩm (nếu có yêu cầu giao diện)
            $this->view("AdminView", ["page" => "AddCartView"]);
        }
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function delete($id) {
        // Xóa sản phẩm dựa trên ID trong session
        if (isset($_SESSION["cart"][$id])) {
            unset($_SESSION["cart"][$id]);
        }

        // Chuyển hướng về trang giỏ hàng
        header("Location: /namduong/website_mvct4/Cart/getShow");
        exit();
    }

    // Xóa toàn bộ giỏ hàng
    public function clear() {
        // Xóa toàn bộ giỏ hàng trong session
        unset($_SESSION["cart"]);

        // Chuyển hướng về trang giỏ hàng
        header("Location: /namduong/website_mvct4/Cart/getShow");
        exit();
    }

    // Cập nhật số lượng sản phẩm trong giỏ hàng
    public function edit($id) {
        // Kiểm tra nếu sản phẩm tồn tại trong giỏ hàng
        if (isset($_SESSION["cart"][$id])) {
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn_submit'])) {
                $quantity = $_POST['quantity']; // Số lượng mới

                // Cập nhật số lượng trong session
                $_SESSION["cart"][$id]["quantity"] = $quantity;

                // Chuyển hướng về trang giỏ hàng sau khi cập nhật
                header("Location: /namduong/website_mvct4/Cart/getShow");
                exit();
            } else {
                // Hiển thị form cập nhật số lượng
                $product = $_SESSION["cart"][$id];
                $this->view("AdminView", ["page" => "EditCartView", "data" => $product]);
            }
        } else {
            // Nếu không tìm thấy sản phẩm, hiển thị thông báo lỗi
            echo "Sản phẩm không tồn tại trong giỏ hàng!";
        }
    }
    public function checkout() {
        // Xử lý thanh toán ở đây (ví dụ lưu thông tin giỏ hàng vào cơ sở dữ liệu, hoặc xử lý giỏ hàng)
        
        // Thông báo thanh toán thành công
        $message = "Thanh toán thành công!";

        // Chuyển lại về trang giỏ hàng và truyền thông báo vào view
        $this->view("CartView", ["message" => $message]);
    }
}
?>
