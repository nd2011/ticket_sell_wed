<?php
class Order extends Controller {
    // Hiển thị danh sách đơn hàng
    public function getShow() {
        // Lấy danh sách đơn hàng từ model
        $obj = $this->model("OrderModel");
        $data = $obj->getAllOrders();
        
        // Lấy danh sách khách hàng và sản phẩm
        $customerModel = $this->model("CustomerModel"); // Lấy model khách hàng
        $productModel = $this->model("AdProductModel");   // Lấy model sản phẩm
        
        $customers = $customerModel->getAllCustomers();
        $products = $productModel->getAllProducts();
        
        // Gửi dữ liệu đến view
        $this->view("AdminView", [
            "page" => "OrderView",
            "data" => $data, 
            "customers" => $customers,
            "products" => $products
        ]);
    }


    // Thêm đơn hàng
    public function insert() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn_submit'])) {
            $customer_id = $_POST['customer_id'];   // ID khách hàng
            $product_id = $_POST['product_id'];     // ID sản phẩm
            $quantity = $_POST['quantity'];         // Số lượng sản phẩm
            $order_date = date("Y-m-d");            // Lấy ngày hiện tại theo định dạng yyyy-mm-dd
    
            // Gọi model để thêm đơn hàng
            $this->model("OrderModel")->addOrder($customer_id, $product_id, $quantity, $order_date);
            
            // Sau khi thêm xong, chuyển hướng về trang danh sách đơn hàng
            header("Location: /namduong/website_mvct4/Order");
            exit();
        } else {
            // Hiển thị form thêm đơn hàng
            $this->view("AdminView", ["page" => "AddOrderView"]);
        }
    }

    // Xóa đơn hàng
    public function delete($id) {
        // Xóa đơn hàng dựa trên ID
        $obj = $this->model("OrderModel");
        $obj->deleteOrder($id);
        
        // Sau khi xóa xong, chuyển hướng về trang danh sách đơn hàng
        header("Location: /namduong/website_mvct4/Order");
        exit();
    }

    // Chỉnh sửa đơn hàng
    public function edit($id) {
        // Lấy đơn hàng theo ID từ model
        $order = $this->model("OrderModel")->getOrderById($id);
        
        // Kiểm tra nếu có dữ liệu trả về
        if ($order) {
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn_submit'])) {
                $customer_id = $_POST['customer_id'];   // ID khách hàng
                $product_id = $_POST['product_id'];     // ID sản phẩm
                $quantity = $_POST['quantity'];         // Số lượng sản phẩm

                // Cập nhật đơn hàng trong database
                $this->model("OrderModel")->updateOrder($id, $customer_id, $product_id, $quantity);

                // Sau khi cập nhật thành công, chuyển hướng về trang danh sách đơn hàng
                header("Location: /namduong/website_mvct4/Order");
                exit();
            } else {
                // Truyền dữ liệu vào view để hiển thị form chỉnh sửa
                $this->view("AdminView", ["page" => "EditOrderView", "data" => $order]);
            }
        } else {
            // Nếu không tìm thấy đơn hàng, hiển thị thông báo lỗi
            echo "Đơn hàng không tồn tại!";
        }
    }
    public function checkout() {
        $message = "Đặt vé thành công!";
        
        // Chuyển lại về trang giỏ hàng và truyền thông báo vào view
        $this->view("CartView", ["message" => $message]);
    }
}
?>
