<?php
class CartModel extends DB
{

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
                $result[2], // gia san pham
                "1", //so luong = 1
                $result[2] // thanh tien
            ];

            if (isset($_SESSION['cart'][$data])){
                $productInfo = [
                    $result[0], //masp
                    $result[4], //hinh anh san pham
                    $result[1], // ten san pham
                    $result[2], // gia san pham
                    $_SESSION['cart'][$data][0][4] + 1, //so luong + 1
                    $result[2]*$_SESSION['cart'][$data][0][4] // thanh tien
                ];

                echo "<pre>";
                print_r($result[2]*$_SESSION['cart'][$data][0][4]);
                $_SESSION['cart'][$data] = [$productInfo];

            } else {
                $_SESSION['cart'][$data] = [$productInfo];
            }
            // die();
        }
    }


}
?>