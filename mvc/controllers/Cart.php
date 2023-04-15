<?php
class Cart extends Controller
{
    function showCart()
    {
        $total = 0;

        if (isset($_SESSION['cart']) && !isset($_SESSION['user'])) {
            foreach ($_SESSION['cart'] as $item) {
                $total += $item[0][5] * $item[0][4];
            }
            $this->view("cart", $total);
        }
        if (isset($_SESSION['user'])) {
            if (isset($_SESSION['cart']) && $_SESSION['cart'] != null) {
                $cart = $this->model("CartModel");
                $result = $cart->showCart();
                // unset($_SESSION['cart']);
 
            }
        }
        $cart = $this->model("CartModel");
        $result = $cart->getCart();
        $this->view("cart", $result);
    }

    function addToCart()
    {
        $arrUrl = explode('/', $_GET['url']);
        $arrLen = count($arrUrl);
        $productId = $arrUrl[$arrLen - 1];

        $cart = $this->model("CartModel");

        $cart->addToCart($productId);
        ?>
        <script>
            alert("Thêm vào giỏ hàng thành công")
            history.back()
        </script>
        <?php

    }

    public function deleteCartItem()
    {
        $arrUrl = explode('/', $_GET['url']);
        $arrLen = count($arrUrl);
        $productId = $arrUrl[$arrLen - 1];

        unset($_SESSION['cart'][$productId]);
        ?>
        <script>history.back()</script>
        <?php
    }

    public function dropAllItemPaid()
    {
        unset($_SESSION['cart']);
        ?>
        <script>alert("Thanh toán thành công")
            window.location.href = "../cart/showcart";
        </script>
        <?php
    }

    public function dropItemPaid()
    {
        unset($_SESSION['cart'][$_SESSION['idP']]);
        ?>
        <script>alert("Thanh toán thành công")
            window.location.href = "../cart/showcart";
        </script>
        <?php
    }
}
?>