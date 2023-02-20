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
        $allProduct = $this->model("ProductModel");
        $product = $allProduct->getAllProduct();
        $typeOfProduct = $allProduct->getAllTypeOfProduct();

        $data = [
            $product,
            $typeOfProduct
        ];
        $this->view("product_detail", $data);
    }
}
?>