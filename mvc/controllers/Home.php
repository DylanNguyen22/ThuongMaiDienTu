<?php


class Home extends Controller
{

    function ShowAllProduct()
    {
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

    function productDetail()
    {
        $arrUrl = explode('/', $_GET['url']);
        $arrLen = count($arrUrl);
        $productId = $arrUrl[$arrLen - 1];

        $productDetail = $this->model("ProductModel");
        $productInfo = $productDetail->getProductDetail($productId);

        // $this->view("product_detail", $data);
        $this->view("product_detail", $productInfo);
    }

    public function searchProduct()
    {

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


    public function search()
    {
        $home_product = $this->model("ProductModel");
        $typeOfProduct = $home_product->getAllTypeOfProduct();
        $auth = $this->model("AuthModel");
        $userInfo = $auth->getUserInfo();
        $result = $home_product->searchProduct();

        $data = [
            $result,
            $typeOfProduct,
            $userInfo,
            
        ];
        $this->view('home_search', $data);
    }
    
    public function show_product_by_type(){
        $arrUrl = explode('/', $_GET['url']);
        $arrLen = count($arrUrl);
        $typeID = $arrUrl[$arrLen - 1];

        $typeName = $this->model("ProductModel"); 
        $productbytype = $typeName->getByTypeProduct($typeID);
        $typeOfProduct = $typeName->getAllTypeOfProduct();
        $auth = $this->model("AuthModel");
        $userInfo = $auth->getUserInfo();

        $data = [
            $productbytype,
            $typeOfProduct,
            $userInfo,
            
        ];
        $this->view("product_by_type", $data);
    }
}
