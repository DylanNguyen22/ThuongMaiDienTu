<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/homepage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
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
            while ($typeOfProduct = mysqli_fetch_array($data[1])) {
                ?>
                <a href="" class="typeOfProduct">
                    <?php echo $typeOfProduct['Tenloai'] ?>
                </a>
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
                    <form action="../search.php">
                    <input type="text" class="form-control" name="keyword" placeholder="Recipient's username"
                    aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button name="sbm" class="btn btn-primary" type="submit" id="button-addon2"><ion-icon
                    name=""></ion-icon></button>
                </form>

                <!-- <form action="home/search" method="post" class="form-inline my-2 my-lg-0">
                <input name="keyWord" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button name="sbm" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form> -->
                </div>
                <div class="cart">
                    <a class="cart_link" href="cart/showcart"><ion-icon name="cart-outline"></ion-icon> Giỏ hàng của bạn</a>
                </div>
                <?php
                if (isset($_SESSION['user'])) {
                    ?>
                    <div class="dropdown dropstart text-end">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                            Xin chào
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Xin chào:
                                    <?php echo $data[2][3] . " " . $data[2][4] ?>
                                </a></li>
                            <li><a class="dropdown-item" href="#">Quản lí đơn hàng</a></li>
                            <li><a class="dropdown-item text-danger" href="./auth/sign_out">Đăng xuất</a></li>
                        </ul>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="user d-flex">
                        <a class="sign_in" href="./auth/sign_in">Đăng nhập</a>
                        <span>/</span>
                        <a class="sign_up" href="./auth/sign_up">Đăng ký</a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="page_content">
            <div class="products d-flex">
                <?php
                while ($productData = mysqli_fetch_array($data[0])) {
                    ?>

                    <a href="/thuongmaidientu/home/productdetail/<?php echo $productData['masp'] ?>"
                        class="product_link m-2">
                        <div class="product p-2">
                            <div class="product_img">
                                <img class="w-100 h-auto" src="./public/product_imgs/<?php echo $productData["hinhanh"] ?>"
                                    alt="">
                            </div>
                            <div class="product_brand">
                                <span>
                                    <?php echo $productData["TenTH"] ?>
                                </span>
                            </div>
                            <div class="product_name">
                                <span>
                                    <?php echo $productData["tensp"] ?>
                                </span>
                            </div>
                            <div class="product_price">
                                <span>
                                    <?php echo $productData["giaban"] ?>
                                </span>
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