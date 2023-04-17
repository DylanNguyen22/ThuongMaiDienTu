
<div class="page_content">
            <div class="products d-flex">
                <?php
                while ($productData = mysqli_fetch_all($data[0])) {
                    // echo "<pre>";
                    // print_r($data[0]);
                    // die();
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