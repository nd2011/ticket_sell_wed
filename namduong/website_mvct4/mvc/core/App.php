<?php
class App {
    protected $controller = "Home";
    protected $action = "getShow";
    protected $param = [];

    public function __construct() {
        // Kiểm tra xem có URL được truyền vào hay không
        $url = $this->urlProcess();
        if (!empty($url)) {
            // Kiểm tra nếu controller tồn tại
            if (file_exists("./mvc/controllers/" . $url[0] . ".php")) {
                $this->controller = $url[0];
                unset($url[0]);
            } else {
                // Nếu không tìm thấy controller, báo lỗi
                die("Controller không tồn tại: " . htmlspecialchars($url[0]));
            }
        }

        // Nạp file controller
        require_once "./mvc/controllers/" . $this->controller . ".php";

        // Tạo đối tượng controller
        $this->controller = new $this->controller;

        // Kiểm tra action (phương thức) trong controller
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->action = $url[1];
                unset($url[1]);
            } else {
                // Báo lỗi nếu phương thức không tồn tại
                die("Action không tồn tại: " . htmlspecialchars($url[1]));
            }
        }

        // Gán các tham số còn lại
        $this->param = $url ? array_values($url) : [];

        // Gọi controller, action, và truyền tham số
        call_user_func_array([$this->controller, $this->action], $this->param);
    }

    // Phương thức chuyển URL thành array
    private function urlProcess() {
        if (isset($_GET["url"])) {
            return explode(
                '/',
                filter_var(trim($_GET["url"], '/'), FILTER_SANITIZE_URL)
            );
        }
        return [];
    }
}
