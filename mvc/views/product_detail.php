<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.min.js"></script>
    <style>
        .product-image {
            max-width: 500px;
            display: block;
            margin: auto;
        }

        img{
            width: 90%;
        }

        .product-details {
            margin-top: 50px;
        }

        .product-details h2,
        .product-details .price {
            text-align: center;
        }

        .product-details .price {
            font-size: 24px;
            font-weight: bold;
            color: #dc3545;
            margin-top: 15px;
            margin-bottom: 25px;
        }

        .product-details .description p {
            text-align: justify;
        }

        .product-details .description ul {
            list-style: circle;
            padding-left: 20px;
        }

        .product-details .description ul li {
            margin-bottom: 10px;
        }

        .product-details .btn-buy {
            display: block;
            margin: auto;
            margin-top: 30px;
            width: 200px;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            color: #fff;
            background-color: #dc3545;
            border: none;
        }

        .product-details .btn-buy:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <div class="back">
        <button class="btn btn-danger m-0" onclick="window.history.back()">Trở về</button>
    </div>

    <div class="container">
        <div class="row">
            <!-- Product image -->
            <div class="col-md-6 d-flex align-items-center">
                <img src="../../public/product_imgs/<?php echo $data["hinhanh"] ?>" alt="">
            </div>
            <!-- Product details -->
            <div class="col-md-6 mb-5">
                <div class="product-details">
                    <h2>
                        <?php echo $data["tensp"] ?>
                    </h2>
                    <div class="price">
                        <?php echo $data["giaban"] ?> đ
                    </div>
                    <div class="description">
                        <p>
                            <?php echo $data["chitiet"] ?>
                        </p>
                        <ul>
                            <li> Thương hiệu:
                                <?php echo $data["TenTH"] ?>
                            </li>
                            <li> Số lượng:
                                <?php echo $data["soluong"] ?>
                            </li>
                            <li> Tình trạng:
                                <?php if ($data["trangthaisp"] == 1) {
                                    echo "Mới";
                                } else {
                                    echo "Cũ";
                                } ?>
                            </li>
                        </ul>
                    </div>
                    <div class="d-flex align-items-center justify-content-between w-50">
                        <a href="" class="btn btn-danger">Mua ngay</a>
                        <a href="../../cart/addtocart/<?php echo $data['masp'] ?>" class="btn btn-success">Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>