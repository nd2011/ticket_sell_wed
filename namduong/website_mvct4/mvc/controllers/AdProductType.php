<?php
class AdProductType extends Controller {
    public function getShow() {
        $obj = $this->model("AdProductTypeModel");
        $data = $obj->getAdProductType();
        $this->view("AdminView", ["page" => "AdProductTypeView", "data" => $data]);
    }

    public function insert() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn_submit'])) {
            $ma_loaisp = $_POST['ma_loaisp'];
            $ten_loaisp = $_POST['ten_loaisp'];
            $mota_loaisp = $_POST['mota_loaisp'];


            $this->model("AdProductTypeModel")->insertAdProductType($ma_loaisp, $ten_loaisp, $mota_loaisp);
            header("Location: /namduong/website_mvct4/AdProductType");
            exit();
        }
    }

    public function delete($ma_loaisp) {
        $obj = $this->model("AdProductTypeModel");
        $obj->delAdProductType($ma_loaisp);
        header("Location: /namduong/website_mvct4/AdProductType"); 
        exit();
    }
}
?>