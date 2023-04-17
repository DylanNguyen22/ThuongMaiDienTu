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

    function getProductById($data)
    {
        $qr = "SELECT *FROM sanpham WHERE masp = $data";
        return mysqli_fetch_all(mysqli_query($this->con, $qr));
    }


    public function getProductDetail($productId) {
        $qr = "SELECT * FROM sanpham, danhmucsanpham, thuonghieu WHERE masp = $productId and sanpham.maloai = danhmucsanpham.Maloai and sanpham.math = thuonghieu.MaTH";
        // return mysqli_query($this->con, $qr);
        return (mysqli_fetch_array(mysqli_query($this->con, $qr)));
    }

    function searchProduct($keyWord){
        $qr ="SELECT * FROM sanpham where MATCH (tensp) AGAINST ('$keyWord')";
        return mysqli_query($this->con, $qr);
    } 
}
?>