<?php
class AdProductTypeModel extends DB {
    // Hiển thị dữ liệu
    public function getAdProductType() {
        // Đặt tên bảng chính xác
        $sql = "SELECT * FROM product_types";
        $stm = $this->Connect()->prepare($sql);
        $stm->execute();
        
        // Sử dụng PDO::FETCH_ASSOC để đảm bảo dữ liệu được trả về dưới dạng mảng liên kết
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function delAdProductType($ma_loaisp) {
        $sql = "DELETE FROM product_types WHERE ma_loaisp = :ma_loaisp";
        
        try {
            $stm = $this->Connect()->prepare($sql);
            $stm->bindParam(':ma_loaisp', $ma_loaisp);
            return $stm->execute(); // Trả về true hoặc false
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }
    
    public function insertAdProductType($ma_loaisp, $ten_loaisp, $mota_loaisp) {
        $sql = "INSERT INTO product_types (ma_loaisp, ten_loaisp, mota_loaisp) VALUES (:ma_loaisp, :ten_loaisp, :mota_loaisp)";
        
        try {
            $stm = $this->Connect()->prepare($sql);
            $stm->bindParam(':ma_loaisp', $ma_loaisp);
            $stm->bindParam(':ten_loaisp', $ten_loaisp);
            $stm->bindParam(':mota_loaisp', $mota_loaisp);
            $stm->execute();
            echo "Bạn đã lưu thành công";
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
