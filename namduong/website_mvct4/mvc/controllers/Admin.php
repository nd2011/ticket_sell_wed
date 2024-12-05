<?php
class Admin extends Controller {
    public function getShow() {
        $this->view("AdminView", ["page" => "Admin"]);
    }
}
