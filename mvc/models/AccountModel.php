<?php
class AccountModel extends DB
{
    public function getAllAccount(){
        $result = mysqli_query($this->con, "SELECT * FROM taikhoan");
        return $result;
    }

    public function searchAccount(){
        $keyword = $_POST['accountName'];
        $keyword = explode(" ", $keyword);
        count($keyword);
        $ten = $keyword[count($keyword)-1];
        array_pop($keyword);
        $ho = implode(" ", $keyword);
        $keyword = $_POST['accountName'];
        return mysqli_query($this->con, "SELECT * FROM taikhoan WHERE ho = '$ho' AND ten = '$ten' UNION SELECT * FROM taikhoan WHERE tentk = '$keyword'");
    }

    public function deleteAccount($accountId){
        echo $accountId;
        mysqli_query($this->con, "DELETE FROM `taikhoan` WHERE matk = $accountId");
    }

    public function addAccount(){
        echo "<pre>";
        print_r($_POST);
        $tentk = $_POST['tentk'];
        $matkhau = $_POST['matkhau'];
        $ho = $_POST['ho'];
        $ten = $_POST['ten'];
        $sdt = $_POST['sdt'];
        $gioitinh = $_POST['gioitinh'];
        $loaitk = $_POST['loaitk'];
        $diachi = $_POST['diachi'];
        mysqli_query($this->con, "INSERT INTO `taikhoan`(`tentk`, `matkhau`, `ho`, `ten`, `sodt`, `gioitinh`, `diachi`, `loaitaikhoan`) VALUES ('$tentk','$matkhau','$ho','$ten','$sdt','$gioitinh','$diachi',$loaitk)");
    }
}