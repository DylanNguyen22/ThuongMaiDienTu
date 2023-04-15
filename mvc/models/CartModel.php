<?php
class CartModel extends DB
{

    public function showCart()
    {
        foreach ($_SESSION['cart'] as $item) {
            $masp = $item[0][0];
            $hinhanh = $item[0][1];
            $tensp = $item[0][2];
            $dongia = $item[0][3];
            $soluong = $item[0][4];
            $thanhtien = $item[0][5];
            $matk = $_SESSION['user'];
            mysqli_query($this->con, "INSERT INTO `giohang`(`MaSP`, `hinhanh`, `TenSP`, `DonGia`, `SoLuong`, `thanhTien`, `MaTK`) VALUES ($masp,'$hinhanh','$tensp',$dongia,$soluong,$thanhtien,$matk)");
        }
        unset($_SESSION['cart']);
    }

    public function getCart()
    {
        if (isset($_SESSION['user'])) {
            $matk = $_SESSION['user'];
            $result = mysqli_query($this->con, "SELECT * FROM giohang WHERE MaTK = 60");
            return $result;
        }
    }

    public function addToCart($data)
    {
        if (isset($_SESSION["user"])) {
            echo "da dang nhap";
            $result = mysqli_fetch_array(mysqli_query($this->con, "SELECT * FROM sanpham WHERE masp = $data"));
            $masp = $result[0];
            $hinhanh = $result[4];
            $tensp = $result[1];
            $dongia = $result[2];
            $soluong = "1";
            $thanhtien = $dongia;
            $matk = $_SESSION['user'];

            $check = mysqli_fetch_array(mysqli_query($this->con, "SELECT * FROM giohang WHERE masp = $data AND MaTK = $matk"));
            $soluongmoi = $check[5]+1;
            if($check){
                mysqli_query($this->con, "UPDATE `giohang` SET `SoLuong`='$soluongmoi' WHERE masp = $data AND MaTK = $matk");
            }
            else{
                mysqli_query($this->con, "INSERT INTO `giohang`(`MaSP`, `hinhanh`, `TenSP`, `DonGia`, `SoLuong`, `thanhTien`, `MaTK`) VALUES ($masp,'$hinhanh','$tensp',$dongia,$soluong,$thanhtien,$matk)");
            }
        } else {
            $result = mysqli_fetch_array(mysqli_query($this->con, "SELECT * FROM sanpham WHERE masp = '$data'"));
            // echo "<pre>";
            // print_r($_SESSION['cart']);
            $productInfo = [
                $result[0], //masp
                $result[4], //hinh anh san pham
                $result[1], // ten san pham
                $result[2],
                // gia san pham
                "1", //so luong = 1
                $result[2] // thanh tien
            ];

            if (isset($_SESSION['cart'][$data])) {
                $productInfo = [
                    $result[0], //masp
                    $result[4], //hinh anh san pham
                    $result[1], // ten san pham
                    $result[2], // gia san pham
                    $_SESSION['cart'][$data][0][4] + 1, //so luong + 1
                    $result[2] * $_SESSION['cart'][$data][0][4] // thanh tien
                ];

                echo "<pre>";
                print_r($result[2] * $_SESSION['cart'][$data][0][4]);
                $_SESSION['cart'][$data] = [$productInfo];

            } else {
                $_SESSION['cart'][$data] = [$productInfo];
            }
            // die();
        }
    }


}
?>