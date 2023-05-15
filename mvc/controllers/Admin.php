<?php
class Admin extends Controller
{
    public function mainPage()
    {
        $productModel = $this->model("ProductModel");
        $product = $productModel->getEveryProduct();
        $type = $productModel->getAllTypeOfProduct();
        $brand = $productModel->getAllBrand();

        $AccountModel = $this->model("AccountModel");
        $account = $AccountModel->getAllAccount();

        $type1 = $productModel->getAllTypeOfProduct();
        $brand1 = $productModel->getAllBrand();

        $OrderModel = $this->model("OrderModel");
        $order = $OrderModel->getAllOrder();
        $data = [
            $product,
            $type,
            $brand,
            $account,
            $type1,
            $brand1,
            $order
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

        $productModel = $this->model("ProductModel");
        $product = $productModel->searchProduct();
        $type = $productModel->getAllTypeOfProduct();
        $brand = $productModel->getAllBrand();

        $AccountModel = $this->model("AccountModel");
        $account = $AccountModel->getAllAccount();

        $type1 = $productModel->getAllTypeOfProduct();
        $brand1 = $productModel->getAllBrand();

        $OrderModel = $this->model("OrderModel");
        $order = $OrderModel->getAllOrder();
        $data = [
            $product,
            $type,
            $brand,
            $account,
            $type1,
            $brand1,
            $order
        ];
        $this->view('admin', $data);
    }

    public function searchAccount(){
        $productModel = $this->model("ProductModel");
        $product = $productModel->getEveryProduct();
        $type = $productModel->getAllTypeOfProduct();
        $brand = $productModel->getAllBrand();

        $AccountModel = $this->model("AccountModel");
        $account = $AccountModel->searchAccount();

        $type1 = $productModel->getAllTypeOfProduct();
        $brand1 = $productModel->getAllBrand();

        $OrderModel = $this->model("OrderModel");
        $order = $OrderModel->getAllOrder();
        $data = [
            $product,
            $type,
            $brand,
            $account,
            $type1,
            $brand1,
            $order
        ];
        $this->view('admin', $data);
        
    }

    public function deleteAccount(){
        $AccountModel = $this->model("AccountModel");

        $arrUrl = explode('/', $_GET['url']);
        $arrLen = count($arrUrl);
        $accountId = $arrUrl[$arrLen - 1];
        $AccountModel->deleteAccount($accountId);
        header('location: ../../Admin/mainPage');
    }

    public function addAccount(){
        $AccountModel = $this->model("AccountModel");
        $AccountModel->addAccount();
        header('location: ../Admin/mainPage');
    }

    public function editProductType(){
        $productModel = $this->model("ProductModel");
        $productModel->editProductType();

        header('location: ../Admin/mainPage');
    }

    public function searchProductType(){
        $productModel = $this->model("ProductModel");
        $product = $productModel->getEveryProduct();
        $type = $productModel->getAllTypeOfProduct();
        $brand = $productModel->getAllBrand();

        $AccountModel = $this->model("AccountModel");
        $account = $AccountModel->getAllAccount();

        $type1 = $productModel->searchProductType();
        $brand1 = $productModel->getAllBrand();

        $OrderModel = $this->model("OrderModel");
        $order = $OrderModel->getAllOrder();
        $data = [
            $product,
            $type,
            $brand,
            $account,
            $type1,
            $brand1,
            $order
        ];
        $this->view('admin', $data);
    }

    public function addProductType(){
        $productModel = $this->model("ProductModel");
        $productModel->addProductType();

        header('location: ../Admin/mainPage');
    }

    public function deleteProductType(){
        $arrUrl = explode('/', $_GET['url']);
        $arrLen = count($arrUrl);
        $id = $arrUrl[$arrLen - 1];
        $productModel = $this->model("ProductModel");
        $productModel->deleteProductType($id);

        header('location: ../../Admin/mainPage');
    }

    public function editBrand(){
        $productModel = $this->model("ProductModel");
        $productModel->editBrand();

        header('location: ../Admin/mainPage');
    }

    public function addBrand(){
        $productModel = $this->model("ProductModel");
        $productModel->addBrand();

        header('location: ../Admin/mainPage');
    }

    public function deleteBrand(){
        $arrUrl = explode('/', $_GET['url']);
        $arrLen = count($arrUrl);
        $id = $arrUrl[$arrLen - 1];
        $productModel = $this->model("ProductModel");
        $productModel->deleteBrand($id);

        header('location: ../../Admin/mainPage');
    }

    public function searchBrand(){
        $productModel = $this->model("ProductModel");
        $product = $productModel->getEveryProduct();
        $type = $productModel->getAllTypeOfProduct();
        $brand = $productModel->getAllBrand();

        $AccountModel = $this->model("AccountModel");
        $account = $AccountModel->getAllAccount();

        $type1 = $productModel->getAllTypeOfProduct();
        $brand1 = $productModel->searchBrand();

        $OrderModel = $this->model("OrderModel");
        $order = $OrderModel->getAllOrder();
        $data = [
            $product,
            $type,
            $brand,
            $account,
            $type1,
            $brand1,
            $order
        ];
        $this->view('admin', $data);
    }

    public function deleteOrder(){
        $arrUrl = explode('/', $_GET['url']);
        $arrLen = count($arrUrl);
        $id = $arrUrl[$arrLen - 1];

        $OrderModel = $this->model("OrderModel");
        $order = $OrderModel->deleteOrder($id);

        header('location: ../../Admin/mainPage');
    }
}
?>