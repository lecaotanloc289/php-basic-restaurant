<?php
require_once ("connect.php");

class control_form extends connect {
    function get_monan () {
        $sql = 'SELECT * FROM monan';
        $result = $this->link->query($sql);
        return $result;
    }

    // Lấy danh mục loại của menu
    function get_danhmucloai () {
        $sql = 'SELECT * FROM danhmucloai';
        $result = $this->link->query($sql);
        return $result;
    }

    function get_tendanhmucloai (int $madanhmuc) {
        $sql = "SELECT * FROM danhmucloai WHERE MaDanhMuc = $madanhmuc";
        $result = $this->link->query($sql);
        return $result;
    }

    function get_loaimon (string $loaimon) {
        $sql = "SELECT * FROM monan WHERE LoaiMonAn = '$loaimon'";
        $result = $this->link->query($sql);
        return $result;
    }

    function get_chitietmonan (string $mamon) {
        $sql = "SELECT * FROM monan WHERE MaMonAn = '$mamon'";
        $result = $this->link->query($sql);
        return $result;
    }

    function get_ban_trong (string $people) {
        if(strcmp($people, "All")) {
            $sql = "SELECT * FROM phong WHERE SucChua ='$people' AND TrangThai='Trống'";
        }
        else {
            $sql = "SELECT * FROM phong WHERE TrangThai='Trống'";
        }
        $result = $this->link->query($sql);
        return $result;
    }

    function get_chitietban (int $id) {
        $sql = "SELECT * FROM phong WHERE MaPhong='$id'";
        $result = $this->link->query($sql);
        return $result;
    }
    
}

?>