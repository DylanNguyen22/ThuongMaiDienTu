<?php
class Admin extends Controller
{
    public function mainPage()
    {
        $admin = $this->model("ProductModel");
        $product = $admin->getEveryProduct();
        $type = $admin->getAllTypeOfProduct();
        $brand = $admin->getAllBrand();

        $data = [
            $product,
            $type,
            $brand
        ];
        $this->view('admin', $data);
    }

    public function hideProduct()
    {
        $arrUrl = explode('/', $_GET['url']);
        $arrLen = count($arrUrl);
        $productId = $arrUrl[$arrLen - 1];

        $admin = $this->model("ProductModel");
        $product = $admin->hideProduct($productId);

        ?>
        <script>
            history.back()
        </script>
        <?php
    }

    public function showProduct()
    {
        $arrUrl = explode('/', $_GET['url']);
        $arrLen = count($arrUrl);
        $productId = $arrUrl[$arrLen - 1];

        $admin = $this->model("ProductModel");
        $product = $admin->showProduct($productId);

        ?>
        <script>
            history.back()
        </script>
        <?php
    }

    public function editproductinfo() {
        $admin = $this->model("ProductModel");
        $product = $admin->editproductinfo();
        ?>
        <script>
            alert("Thay đổi thành công!")
            history.back()
        </script>
        <?php
    }

    public function addProduct() {
        $admin = $this->model("ProductModel");
        $product = $admin->addProduct();
        
    }

    public function searchProduct() {

        $admin = $this->model("ProductModel");
        $result = $admin->searchProduct();
        $type = $admin->getAllTypeOfProduct();
        $brand = $admin->getAllBrand();

        $data = [
            $result,
            $type,
            $brand
        ];

        $this->view('admin_product_search', $data);
    }
}
?>