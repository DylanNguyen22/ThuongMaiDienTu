<?php
class ProductModel extends DB{

    // public function Tong($n, $m){
    //     return $n + $m;
    // }

    public function getAllProduct(){
        $qr = "SELECT * FROM sanpham, danhmucsanpham, thuonghieu WHERE danhmucsanpham.maloai = sanpham.maloai AND thuonghieu.MaTH = sanpham.math";
        return mysqli_query($this->con, $qr);
    }

    public function getAllTypeOfProduct(){
        $qr = "SELECT * FROM danhmucsanpham";
        return mysqli_query($this->con, $qr);
        
    }

    
}
?>