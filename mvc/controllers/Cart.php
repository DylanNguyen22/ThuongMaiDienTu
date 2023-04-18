<?php
class Cart extends Controller
{
    function showCart()
    {
        $total = 0;

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (isset($_SESSION['cart']) && !isset($_SESSION['user'])) {
            foreach ($_SESSION['cart'] as $item) {
                $total += $item[0][3] * $item[0][4];
            }
            $this->view("cart", $total);
        }
        if (isset($_SESSION['user'])) {
            if (isset($_SESSION['cart']) && ($_SESSION['cart']) != null) {
                $cart = $this->model("CartModel");
                $result = $cart->showCart();
                // unset($_SESSION['cart']);
            }
            $cart = $this->model("CartModel");
            $result = $cart->getCart();
            $this->view("cart", $result);
        } elseif (isset($_SESSION['cart']) && !isset($_SESSION['user'])) {
            foreach ($_SESSION['cart'] as $item) {
                $total += $item[0][5] * $item[0][4];
            }
            $this->view("cart", $total);
        }
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
        $cart = $this->model("CartModel");
        $cart->deleteCartItem($productId);
        ?>
        <script>
            history.back()
        </script>
    <?php
    }

    public function dropAllItemPaid()
    {
        $cart = $this->model("CartModel");
        $cart->dropAllItemPaid();
    ?>
        <script>
            alert("Thanh toán thành công")
            window.location.href = "../cart/showcart";
        </script>
    <?php
    }

    public function dropItemPaid()
    {  
        $cart = $this->model("CartModel");
        $cart->dropItemPaid();
    ?>
        <script>
            alert("Thanh toán thành công")
            window.location.href = "../cart/showcart";
        </script>
<?php

    }

    public function update_cart_item_quantity()
    {
        $arrUrl = explode('/', $_GET['url']);
        $arrLen = count($arrUrl);
        $data = [
            $productId = $arrUrl[$arrLen - 1],
            $quantity = $arrUrl[$arrLen - 2],
            $function = $arrUrl[$arrLen - 3],
        ];
        $cart = $this->model("CartModel");
        $cart->update_cart_item_quantity($data);
        ?>
            <script>
                history.back();
            </script>
        <?php
    }

}
?>