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
}
?>