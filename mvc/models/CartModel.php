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
            // echo "<pre>";
            // print_r($_SESSION['cart']);
            // die();
        }
        unset($_SESSION['cart']);
    }

    public function getCart()
    {
        if (isset($_SESSION['user'])) {
            $matk = $_SESSION['user'];
            $result = mysqli_query($this->con, "SELECT * FROM giohang WHERE MaTK = $matk");
            return $result;
        }
    }

    public function addToCart($data)
    {
        if (isset($_SESSION["user"])) {
            $matk = $_SESSION['user'];

            $productInfo = mysqli_fetch_array(mysqli_query($this->con, "SELECT * FROM sanpham WHERE masp = $data"));

            $hinhanh = $productInfo[4];
            $tensp = $productInfo[1];
            $dongia = $productInfo[2];
            $soluong = "1";
            $thanhtien = $dongia;

            $check = mysqli_fetch_array(mysqli_query($this->con, "SELECT * FROM giohang WHERE masp = $data AND MaTK = $matk"));
            $soluongmoi = $check[5] + 1;
            if ($check) {
                mysqli_query($this->con, "UPDATE `giohang` SET `SoLuong`='$soluongmoi'WHERE masp = $data AND MaTK=$matk");
            } else {
                mysqli_query($this->con, "INSERT INTO `giohang`(`MaSP`, `hinhanh`, `TenSP`, `DonGia`, `SoLuong`, `thanhTien`, `MaTK`) VALUES (
                    $data,'$hinhanh','$tensp',$dongia,$soluong,$thanhtien,$matk)");
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
            // echo "<pre>";
            // print_r($data);
            // die();
        }
    }

    public function deleteCartItem($data)
    {
        if (isset($_SESSION['user'])) {
            $matk = $_SESSION['user'];
            mysqli_query($this->con, "DELETE FROM `giohang` WHERE masp = $data AND MaTK = $matk");
        } else {
            unset($_SESSION['cart'][$data]);
        }
    }

    public function update_cart_item_quantity($data)
    {
        $masp = $data[0];
        $matk = $_SESSION['user'];
        if (isset($_SESSION['user'])) {
            if ($data[2] === "increase") {
                $result = mysqli_fetch_array(mysqli_query($this->con, "SELECT * FROM giohang WHERE MaSP = $masp AND MaTK = $matk"));
                $soluong = $result[5] + 1;
                mysqli_query($this->con, "UPDATE `giohang` SET `SoLuong`=$soluong WHERE MaSP = $masp AND MaTK = $matk");
            } elseif ($data[2] === "decrease") {
                $result = mysqli_fetch_array(mysqli_query($this->con, "SELECT * FROM giohang WHERE MaSP = $masp AND MaTK = $matk"));
                if ($result[5] <= 1) {
                } else {
                    $result = mysqli_fetch_array(mysqli_query($this->con, "SELECT * FROM giohang WHERE MaSP = $masp AND MaTK = $matk"));
                    $soluong = $result[5] - 1;
                    mysqli_query($this->con, "UPDATE `giohang` SET `SoLuong`=$soluong WHERE MaSP = $masp AND MaTK = $matk");
                }
            }
        } else {
            if ($data[2] === "increase") {
                $cart_update = [
                    $_SESSION['cart'][$data[0]][0][0],
                    $_SESSION['cart'][$data[0]][0][1],
                    $_SESSION['cart'][$data[0]][0][2],
                    $_SESSION['cart'][$data[0]][0][3],
                    $_SESSION['cart'][$data[0]][0][4] + 1,
                    $_SESSION['cart'][$data[0]][0][5] = $_SESSION['cart'][$data[0]][0][3] * $_SESSION['cart'][$data[0]][0][4]
                ];
                $_SESSION['cart'][$data[0]][0] = $cart_update;
            } elseif ($data[2] === "decrease") {
                if ($_SESSION['cart'][$data[0]][0][4] <= 1) {
                } else {
                    $cart_update = [
                        $_SESSION['cart'][$data[0]][0][0],
                        $_SESSION['cart'][$data[0]][0][1],
                        $_SESSION['cart'][$data[0]][0][2],
                        $_SESSION['cart'][$data[0]][0][3],
                        $_SESSION['cart'][$data[0]][0][4] - 1,
                        $_SESSION['cart'][$data[0]][0][5] = $_SESSION['cart'][$data[0]][0][3] * $_SESSION['cart'][$data[0]][0][4]
                    ];
                    $_SESSION['cart'][$data[0]][0] = $cart_update;
                }
            }
        }
    }

    public function dropAllItemPaid()
    {
        if (isset($_SESSION['user'])) {
            $matk = $_SESSION['user'];
            mysqli_query($this->con, "DELETE FROM `giohang` WHERE MaTK = $matk");
        }else{
            unset($_SESSION['cart']);
        }
    }

    public function dropItemPaid() {
        $masp = $_SESSION['paidId'];

        if (isset($_SESSION['user'])) {
            $matk = $_SESSION['user'];
            mysqli_query($this->con, "DELETE FROM `giohang` WHERE MaTK = $matk AND MaSP = $masp");
        }else{
            unset($_SESSION['cart'][$masp]);
        }
    }
}
