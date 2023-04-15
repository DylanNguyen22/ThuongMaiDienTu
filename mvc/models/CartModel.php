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
            echo "da dang nhap"; // kiểm tra xem người dùng có lưu sản phẩm nào trong giỏ hàng (session) chưa, nếu có lưu lại vào csdl trước r mới lưu sản phẩm cần thêm hiện tại vào csdl sau
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