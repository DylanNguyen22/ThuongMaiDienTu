<?php

// http://localhost/live/Home/Show/1/2

class Home extends Controller{

    // Must have SayHi()
    function ShowAllProduct(){
        $allProduct = $this->model("ProductModel");
        $product = $allProduct->getAllProduct();
        $typeOfProduct = $allProduct->getAllTypeOfProduct();

        $data = [
            $product,
            $typeOfProduct
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