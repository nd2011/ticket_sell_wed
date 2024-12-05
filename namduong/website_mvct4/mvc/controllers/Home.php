<?php
class Home extends Controller {
    public function getShow() {
        // Lấy danh sách sản phẩm từ model
        $obj = $this->model("AdProductModel");
        $data = $obj->getAllProducts();
        
        // Gửi dữ liệu đến view
        $this->view("Back_end/HomePageView", ["page" => "HomePageView", "data" => $data]);
    }

    public function delete($id) {
        // Thông báo xóa một sản phẩm hoặc đối tượng nào đó (dùng cho mục đích demo)
        echo "Bạn đã xóa $id";
    }
}
?>
