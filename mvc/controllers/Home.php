<?php

// http://localhost/live/Home/Show/1/2

class Home extends Controller{

    // Must have SayHi()
    function ShowAllProduct(){
        $home = $this->model("ProductModel");
        $product = $home->getAllProduct();
        $typeOfProduct = $home->getAllTypeOfProduct();
        $auth = $this->model("AuthModel");
        $userInfo = $auth->getUserInfo();

        $data = [
            $product,
            $typeOfProduct,
            $userInfo
        ];

        $this->view("home", $data);
    }

    function productDetail() {
        $arrUrl = explode('/', $_GET['url']);
        $arrLen = count($arrUrl);
        $productId = $arrUrl[$arrLen-1];

        $productDetail = $this->model("ProductModel");
        $productInfo = $productDetail->getProductDetail($productId);

        // $this->view("product_detail", $data);
        $this->view("product_detail", $productInfo);
    }

    function SearchProduct() {
        $arrUrl = explode('/', $_GET['url']);
        $arrLen = count($arrUrl);
        $keyWord = $arrUrl[$arrLen-1];

        $productModel = $this->model("ProductModel");
        $product = $productModel->getAllProduct();
        $data = [
            $product
        ];
        if(isset($_POST["sbm"])){

            $keyWord = $_POST['keyWord'];
            $kq = $productModel->searchProduct($keyWord);


            // echo "<pre>";
            // print_r($kq);
        }
        $this->view("search", $kq);
            echo "<pre>";
            print_r($kq);
            die();
    }


    
}
?>