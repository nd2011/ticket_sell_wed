<?php
class AdProduct extends Controller {
    public function getShow() {
        // Lấy danh sách sản phẩm từ model
        $obj = $this->model("AdProductModel");
        $data = $obj->getAllProducts();
        // Gửi dữ liệu đến view
        $pageView = isset($id) ? "EditProductView" : "AdProductView";
        $this->view("AdminView", ["page" => $pageView, "data" => $data]);
    }

    public function insert() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn_submit'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $description = $_POST['description'];

            // Gọi model để thêm sản phẩm
            $this->model("AdProductModel")->addProduct($name, $price, $description);
            header("Location: /namduong/website_mvct4/AdProduct");
            exit();
        } else {
            // Hiển thị form thêm sản phẩm
            $this->view("AdminView", ["page" => "AddProductView"]);
        }
    }

    public function delete($id) {
        // Xóa sản phẩm dựa trên ID
        $obj = $this->model("AdProductModel");
        $obj->delAdProduct($id);
        header("Location: /namduong/website_mvct4/AdProduct");
        exit();
    }
    public function edit($id) {
        // Lấy sản phẩm theo ID từ model
        $product = $this->model("AdProductModel")->getProductById($id);
    
        // Kiểm tra nếu có dữ liệu trả về
        if ($product) {
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn_submit'])) {
                $name = $_POST['name'];
                $price = $_POST['price'];
                $description = $_POST['description'];
    
                // Cập nhật sản phẩm trong database
                $this->model("AdProductModel")->updateAdProduct($id, $name, $price, $description);
    
                // Chuyển hướng đến trang quản lý sản phẩm sau khi cập nhật thành công
                header("Location: /namduong/website_mvct4/AdProduct");
                exit();
            } else {
                // Truyền dữ liệu vào view
                $this->view("AdminView", data: ["page" => "EditProductView", "data" => $product]);
            }
        } else {
            // Nếu không tìm thấy sản phẩm, hiển thị thông báo lỗi
            echo "Sản phẩm không tồn tại!";
        }
    }
}
?>
