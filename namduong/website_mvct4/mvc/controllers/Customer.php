<?php
class Customer extends Controller {
    // Hiển thị danh sách khách hàng
    public function getShow() {
        // Lấy danh sách khách hàng từ model
        $obj = $this->model("CustomerModel");
        $data = $obj->getAllCustomers();
        // Gửi dữ liệu đến view
        $this->view("AdminView", ["page" => "CustomerView", "data" => $data]);
    }

    // Thêm khách hàng
    public function insert() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn_submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Mã hóa mật khẩu
            $address = $_POST['address'];

            // Gọi model để thêm khách hàng
            $this->model("CustomerModel")->addCustomer($name, $email, $username, $password, $address);
            header("Location: /namduong/website_mvct4/Customer");
            exit();
        } else {
            // Hiển thị form thêm khách hàng
            $this->view("AdminView", ["page" => "AddCustomerView"]);
        }
    }

    // Xóa khách hàng
    public function delete($id) {
        // Gọi model để xóa khách hàng
        $this->model("CustomerModel")->deleteCustomer($id);
        // Chuyển hướng về trang quản lý khách hàng
        header("Location: /namduong/website_mvct4/Customer");
        exit();
    }

    // Sửa thông tin khách hàng
    public function edit($id) {
        // Lấy thông tin khách hàng theo ID
        $customer = $this->model("CustomerModel")->getCustomerById($id);

        // Kiểm tra nếu có dữ liệu trả về
        if ($customer) {
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn_submit'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $username = $_POST['username'];
                $password = $_POST['password'] ? password_hash($_POST['password'], PASSWORD_BCRYPT) : $customer['password'];
                $address = $_POST['address'];

                // Gọi model để cập nhật thông tin khách hàng
                $this->model("CustomerModel")->updateCustomer($id, $name, $email, $username, $password, $address);

                // Chuyển hướng về trang quản lý khách hàng sau khi cập nhật thành công
                header("Location: /namduong/website_mvct4/Customer");
                exit();
            } else {
                // Truyền dữ liệu vào view để hiển thị form sửa
                $this->view("AdminView", ["page" => "EditCustomerView", "data" => $customer]);
            }
        } else {
            // Nếu không tìm thấy khách hàng, hiển thị thông báo lỗi
            echo "Khách hàng không tồn tại!";
        }
    }
}
