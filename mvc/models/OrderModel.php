<?php
class OrderModel extends DB
{
    public function getAllOrder(){
        return mysqli_query($this->con, "SELECT  donhang.madh, donhang.giatridh, donhang.ngayxuatdh, donhang.diachinhanhang, donhang.sdt, taikhoan.ho, taikhoan.ten, donhang.trangthaidh FROM donhang, taikhoan WHERE donhang.makh = taikhoan.matk");
    }

    public function deleteOrder($id){
        mysqli_query($this->con, "DELETE FROM `dathang` WHERE madh =  $id");
        mysqli_query($this->con, "DELETE FROM `donhang` WHERE madh =  $id");
    }
}
