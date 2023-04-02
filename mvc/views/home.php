<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/homepage.css">
    <?php require("./public/header_link.php") ?>
    <title>Document</title>
</head>
<body>
    <div class="header">
        <div class="header_ads w-100 overflow-hidden">
            <img src="./public/website_imgs/header_ads.png" alt="">
        </div>
        <div class="py-2 d-flex justify-content-center bg-primary">
            <?php
                while($typeOfProduct = mysqli_fetch_array($data[1])){
                    ?>
                        <a href="" class="typeOfProduct"><?php echo $typeOfProduct['Tenloai'] ?></a>
                    <?php
                }
            ?>
        </div>
        <div class="header_functions p-3">
            <div class="d-flex mx-4 align-items-center justify-content-around">
                <div class="logo">
                    <img src="./public/website_imgs/logo.png" alt="">
                </div>
                <div class="search_block w-50 d-flex input-group">
                    <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-primary" type="button" id="button-addon2"><ion-icon name="search-outline"></ion-icon></button>
                </div>
                <div class="user d-flex">
                    <a class="sign_in" href="">Đăng nhập</a>
                    <span>/</span>
                    <a class="sign_up" href="">Đăng ký</a>
                </div>
                <div class="cart">
                    <a class="cart_link" href=""><ion-icon name="cart-outline"></ion-icon> Giỏ hàng của bạn</a>
                </div> 
            </div>
        </div>
        <div class="page_content">
            <div class="products d-flex">
                <?php
                    while($productData = mysqli_fetch_array($data[0])){
                    ?>

                    <a href="/thuongmaidientu/home/productdetail/<?php echo $productData['masp'] ?>" class="product_link m-2">
                        <div class="product p-2">
                            <div class="product_img">
                                <img class="w-100 h-auto" src="./public/product_imgs/<?php echo $productData["hinhanh"] ?>" alt="">
                            </div>
                            <div class="product_brand">
                                <span><?php echo $productData["TenTH"] ?></span>
                            </div>
                            <div class="product_name">
                                <span><?php echo $productData["tensp"] ?></span>
                            </div>
                            <div class="product_price">
                                <span><?php echo $productData["giaban"] ?></span>
                            </div>
                        </div>
                    </a>
                    <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="footer bg-dark py-2 d-flex justify-content-center">
        <span style="color: #fff">Copyright © THUONG MAI DIEN TU</span>
    </div>
</body>
</html>

<!-- $data -->