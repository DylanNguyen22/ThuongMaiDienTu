<?php
if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
    $typeList = [];
    $brandList = [];

    // $brand = mysqli_fetch_array($data[2]);
    while ($type = mysqli_fetch_array($data[1])) {
        // echo "<option value='$item1[2]'>$item1->Tenloai</option>";
        array_push($typeList, $type[1]);
    }

    while ($brand = mysqli_fetch_array($data[2])) {
        // echo "<option value='$item1[2]'>$item1->Tenloai</option>";
        array_push($brandList, $brand[1]);
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <title>Document</title>
    </head>

    <style>
        .container1,
        .container2,
        .container4 {
            display: none;
        }

        .edit_button {
            cursor: pointer;
        }

        .menu {
            box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
        }
    </style>

    <body>
        <div class="header">
            <div class="bg-dark text-light">
                <span class="ms-2">Xin chào: admin</span>
            </div>
        </div>
        <div class="menu mb-2 mt-2 py-2 d-flex justify-content-between">
            <div class="ms-3">
                <button onclick="open_container1()" class="rounded-pill btn-danger mx-2 ">Quản lý tài khoản</button>
                <button onclick="open_container2()" class="rounded-pill btn-success mx-2 ">Quản lý đơn hàng</button>
                <button onclick="open_container3()" class="rounded-pill btn-primary mx-2 ">Quản lý sản phẩm</button>
                <button onclick="open_container4()" class="rounded-pill btn-warning mx-2 ">Quản lý danh mục</button>
                <button onclick="open_container5()" class="rounded-pill btn-secondary mx-2 ">Quản lý thương hiệu</button>
            </div>
            <a href="../Admin/mainPage" class="btn btn-primary"><ion-icon name="refresh"></ion-icon></a>
            <a class="me-3 text-danger btn bg-0 border-0 fw-bolder" href="../auth/sign_out">Đăng xuất</a>
        </div>
        <div id="container1" class="container1">
            <div class="mb-3 mx-2" style="height: 160px;">
                <form action="../Admin/addAccount" method="post" enctype="multipart/form-data">
                    <div class="d-flex">
                        <div class="d-flex flex-column w-50">
                            <input name="tentk" type="text" placeholder="Tên tài khoản" required>
                            <input name="matkhau" type="number" placeholder="Mật khẩu" required>
                        </div>
                        <div class="">
                            <input name="ho" type="text" placeholder="Họ" required>
                            <input type="text" name="ten" id="" placeholder="Tên">
                            <input type="text" name="sdt" placeholder="Số điện thoại"><br>
                            <input class="w-50" type="text" name="diachi">
                            <select name="gioitinh" id="">
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                            </select>
                            <select name="loaitk" id="">
                                <option value="1">admin</option>
                                <option value="2">khách hàng</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Lưu</button>
                </form>
            </div>

            <div class="contain_title">
                <span class="fs-4">Quản lý tài khoản</span>
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="mx-3 mt-2">
                                <form action="../Admin/searchAccount" method="post">
                                    <input name="accountName" type="text">
                                    <button type="submit">Tìm</button>
                                </form>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tên tài khoản</th>
                                            <th scope="col">Họ</th>
                                            <th scope="col">Tên</th>
                                            <th scope="col">Số điện thoại</th>
                                            <th scope="col">Giới tính</th>
                                            <th scope="col">Địa chỉ</th>
                                            <th scope="col">Loại tài khoản</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($item = mysqli_fetch_array($data[3])) {
                                            ?>
                                            <tr>
                                                <th>
                                                    <?php echo $item[1] ?>
                                                </th>
                                                <th>
                                                    <?php echo $item[3] ?>
                                                </th>
                                                <th>
                                                    <?php echo $item[4] ?>
                                                </th>
                                                <th>
                                                    <?php echo $item[5] ?>
                                                </th>
                                                <th>
                                                    <?php echo $item[6] ?>
                                                </th>
                                                <th>
                                                    <?php echo $item[7] ?>
                                                </th>
                                                <?php
                                                if ($item[8] == 1) {
                                                    echo "<th class='text-success'>Admin</th>";
                                                } else {
                                                    echo "<th class='text-primary'>Khách</th>";
                                                }
                                                ?>
                                                <th class="fs-4"><a href="../Admin/deleteAccount/<?php echo $item[0] ?>"
                                                        class="text-danger"><ion-icon name="close-circle"></ion-icon></a></th>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="container2" class="container2">
            <div class="contain_title">
                <span class="fs-4">Quản lý đơn hàng</span>
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="mx-3 mt-2">
                                <form action="" method="post">
                                    <input name="accountName" type="text">
                                    <button type="submit">Tìm</button>
                                </form>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Mã đơn hàng</th>
                                            <th scope="col">Họ tên người nhận</th>
                                            <th scope="col">Số điện thoại</th>
                                            <th scope="col">Ngày xuất đơn hàng</th>
                                            <th scope="col">Địa chỉ nhận hàng</th>
                                            <th scope="col">Tổng tiền</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($item = mysqli_fetch_array($data[6])) {
                                            ?>
                                            <tr>
                                                <th>
                                                    <?php echo $item[0] ?>
                                                </th>
                                                <th>
                                                    <?php echo $item[5] . " " . $item[6] ?>
                                                </th>
                                                <th>
                                                    <?php echo $item[4] ?>
                                                </th>
                                                <th>
                                                    <?php echo $item[2] ?>
                                                </th>
                                                <th>
                                                    <?php echo $item[3] ?>
                                                </th>
                                                <th>
                                                    <?php echo $item[1] ?>
                                                </th>
                                                <th>
                                                    <select name="trangthai" id="">
                                                        <?php
                                                        if ($item[7] == 1) {
                                                            ?>
                                                            <option value="1">Chưa xác nhận</option>
                                                            <option value="2">Đã xác nhận</option>
                                                            <option value="3">Đã gửi đi</option>
                                                            <option value="4">Đã hoàn thành</option>
                                                            <option value="5">Đã hủy</option>
                                                            <?php
                                                        }
                                                        if ($item[7] == 2) {
                                                            ?>
                                                            <option value="2">Đã xác nhận</option>
                                                            <option value="1">Chưa xác nhận</option>
                                                            <option value="3">Đã gửi đi</option>
                                                            <option value="4">Đã hoàn thành</option>
                                                            <option value="5">Đã hủy</option>
                                                            <?php
                                                        }
                                                        if ($item[7] == 3) {
                                                            ?>
                                                            <option value="3">Đã gửi đi</option>
                                                            <option value="1">Chưa xác nhận</option>
                                                            <option value="2">Đã xác nhận</option>
                                                            <option value="4">Đã hoàn thành</option>
                                                            <option value="5">Đã hủy</option>
                                                            <?php
                                                        }
                                                        if ($item[7] == 4) {
                                                            ?>
                                                            <option value="4">Đã hoàn thành</option>
                                                            <option value="1">Chưa xác nhận</option>
                                                            <option value="2">Đã xác nhận</option>
                                                            <option value="3">Đã gửi đi</option>
                                                            <option value="5">Đã hủy</option>
                                                            <?php
                                                        }
                                                        if ($item[7] == 5) {
                                                            ?>
                                                            <option value="5">Đã hủy</option>
                                                            <option value="1">Chưa xác nhận</option>
                                                            <option value="2">Đã xác nhận</option>
                                                            <option value="3">Đã gửi đi</option>
                                                            <option value="4">Đã hoàn thành</option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <a href="../Admin/deleteOrder/<?php echo $item[0] ?>" class="btn btn-danger"><ion-icon class="fs-5" name="close-circle"></ion-icon></a>
                                                </th>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="container3" class="container3">
            <div class="mb-3 mx-2" style="height: 160px;">
                <form action="../admin/addproduct" method="post" enctype="multipart/form-data">
                    <div class="d-flex">
                        <div class="d-flex flex-column w-50">
                            <input type="file" name="anhsp" required>
                            <input name="tensp" type="text" placeholder="Tên sản phẩm" required>
                            <input name="giaban" type="number" placeholder="Giá bán" required>
                            <input name="soluong" type="text" placeholder="Số lượng" required>
                            <select name="loaisp" id="">
                                <?php
                                foreach ($typeList as $type) {
                                    echo "<option value='$type'>$type</option>";
                                }
                                ?>
                            </select>
                            <select name="thuonghieu" id="">
                                <?php
                                foreach ($brandList as $brand) {
                                    echo "<option value='$brand'>$brand</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="d-flex flex-column align-items-end" style="margin-top: 29px;">
                            <textarea style="height: 135px;" name="chitiet" id="" cols="90" rows="6"
                                placeholder="Chi tiết sản phẩm" required></textarea>
                            <button type="submit" class="btn btn-success w-25">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="contain_title">
                <span class="fs-4">Quản lý sản phẩm</span>
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="mx-3 mt-2">
                                <form action="../admin/searchproduct" method="post">
                                    <input name="key_word" type="text">
                                    <button type="submit">Tìm</button>
                                </form>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Hình ảnh</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Giá bán</th>
                                            <th scope="col">Chi tiết</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Loại</th>
                                            <th scope="col">Thương hiệu</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($product = mysqli_fetch_array($data[0])) {
                                            ?>
                                            <form action="../admin/editproductinfo" method="post">
                                                <tr id="<?php echo 'tr_edit' . $product[0] ?>" class="tr_edit">
                                                    <th scope="row"><img style="width: 100px;"
                                                            src="../public/product_imgs/<?php echo $product[4] ?>" alt="">
                                                    </th>
                                                    <td>
                                                        <textarea name="tensp" id="" cols="30"
                                                            rows="5"><?php echo $product[1] ?></textarea>
                                                    </td>
                                                    <td><input name="giaban" type="text" style="width: 90px;"
                                                            value="<?php echo $product[2] ?>"></td>
                                                    <td><textarea name="chitiet" id="" cols="50"
                                                            rows="10"><?php echo $product[3] ?></textarea></td>
                                                    <td><input name="soluong" style="width: 40px;" type="text"
                                                            value="<?php echo $product[5] ?>"></td>
                                                    <td>
                                                        <select name="loai" id="">
                                                            <option value="<?php echo $product[11] ?>"><?php echo $product[11] ?></option>
                                                            <?php
                                                            foreach ($typeList as $item1) {
                                                                if ($item1 != $product[11]) {
                                                                    echo "<option value='$item1'>$item1</option>";
                                                                }

                                                            }
                                                            ?>
                                                        </select>
                                                    </td>
                                                    <td><select name="thuonghieu" id="">
                                                            <option value="<?php echo $product[14] ?>"><?php echo $product[14] ?></option>
                                                            <?php
                                                            foreach ($brandList as $item2) {
                                                                if ($item2 != $product[14]) {
                                                                    echo "<option value='$item2'>$item2</option>";
                                                                }
                                                            }
                                                            ?>
                                                        </select></td>
                                                    <td class="">
                                                        <input name="masp" type="hidden" value="<?php echo $product[0] ?>">
                                                        <button type="submit" class="btn btn-primary my-2">Lưu</button>
                                                        <?php
                                                        if ($product[8] == 1) {
                                                            echo "<a href='../admin/hideProduct/$product[0]'><ion-icon class='fs-3 text-success' name='eye'></ion-icon></a>";
                                                        } else {
                                                            echo "<a href='../admin/showproduct/$product[0]'><ion-icon class='fs-3 text-danger' name='eye-off'></ion-icon></a>";
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>

                                            </form>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="container4" class="container4">
            <div class="mb-3 mx-2" style="height: 160px;">
                <form action="../Admin/addProductType" method="post" enctype="multipart/form-data">
                    <div class="d-flex">
                        <input type="text" name="tendm" placeholder="Tên danh mục">
                        <select name="noibat" id="">
                            <option value="0">Không nổi bật</option>
                            <option value="1">Nổi bật</option>
                        </select>
                        <button type="submit" class="btn btn-success">Lưu</button>
                    </div>
                </form>
            </div>

            <div class="contain_title">
                <span class="fs-4">Quản lý danh mục</span>
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="mx-3 mt-2">
                                <form action="../Admin/searchProductType" method="post">
                                    <input name="keyword" type="text">
                                    <button type="submit">Tìm</button>
                                </form>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Mã danh mục</th>
                                            <th scope="col">Tên danh mục</th>
                                            <th scope="col">Danh mục nổi bật</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($item = mysqli_fetch_array($data[4])) {
                                            ?>
                                            <tr>
                                                <form action="../Admin/editProductType" method="post">
                                                    <th>
                                                        <?php echo $item[0] ?>
                                                    </th>
                                                    <th> <input type="text" name="tendm" value="<?php echo $item[1] ?>"> </th>
                                                    <th>
                                                        <select name="noibat" id="">
                                                            <?php
                                                            if ($item[2] == 1) {
                                                                ?>
                                                                <option class="text-success" value="1">Nổi bật</option>
                                                                <option class="text-danger" value="0">Không nổi bật</option>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <option class="text-danger" value="0">Không nổi bật</option>
                                                                <option class="text-success" value="1">Nổi bật</option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </th>
                                                    <th>
                                                        <input type="hidden" name="madm" value="<?php echo $item[0] ?>">
                                                        <button class="btn btn-success"><ion-icon class="fs-5"
                                                                name="save"></ion-icon></button>
                                                </form>
                                                <a href="../Admin/deleteProductType/<?php echo $item[0] ?>"
                                                    class="btn btn-danger"><ion-icon class="fs-5"
                                                        name="close-circle"></ion-icon></a>
                                                </th>
                                            </tr>
                                            <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="container5" class="container2">
            <div class="mb-3 mx-2" style="height: 160px;">
                <form action="../Admin/addBrand" method="post" enctype="multipart/form-data">
                    <div class="d-flex">
                        <input type="text" name="tenth" placeholder="Tên thương hiệu">
                        <button type="submit" class="btn btn-success">Lưu</button>
                    </div>
                </form>
            </div>

            <div class="contain_title">
                <span class="fs-4">Quản lý danh mục</span>
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="mx-3 mt-2">
                                <form action="../Admin/searchBrand" method="post">
                                    <input name="keyword" type="text">
                                    <button type="submit">Tìm</button>
                                </form>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Mã thương hiệu</th>
                                            <th scope="col">Tên thương hiệu</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($item = mysqli_fetch_array($data[5])) {
                                            ?>
                                            <tr>
                                                <form action="../Admin/editBrand" method="post">
                                                    <th>
                                                        <?php echo $item[0] ?>
                                                    </th>
                                                    <th> <input type="text" name="tenth" value="<?php echo $item[1] ?>"> </th>
                                                    <th>
                                                        <input type="hidden" name="math" value="<?php echo $item[0] ?>">
                                                        <button class="btn btn-success"><ion-icon class="fs-5"
                                                                name="save"></ion-icon></button>
                                                </form>
                                                <a href="../Admin/deleteBrand/<?php echo $item[0] ?>"
                                                    class="btn btn-danger"><ion-icon class="fs-5"
                                                        name="close-circle"></ion-icon></a>
                                                </th>
                                            </tr>
                                            <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>


    <script>
        if (sessionStorage.getItem('number')) {
            function open_container1() {
                sessionStorage.setItem("number", 1);
                location.reload();
            }

            function open_container2() {
                sessionStorage.setItem("number", 2);
                location.reload();
            }
            function open_container3() {
                sessionStorage.setItem("number", 3);
                location.reload();
            }

            function open_container4() {
                sessionStorage.setItem("number", 4);
                location.reload();
            }

            function open_container5() {
                sessionStorage.setItem("number", 5);
                location.reload();
            }

            var a = sessionStorage.getItem("number");
            Number(a)
            if (a == 1) {
                document.getElementById("container1").style.display = "block";
                document.getElementById("container2").style.display = "none";
                document.getElementById("container3").style.display = "none";
                document.getElementById("container4").style.display = "none";
                document.getElementById("container5").style.display = "none";
            }
            if (a == 2) {
                document.getElementById("container1").style.display = "none";
                document.getElementById("container2").style.display = "block";
                document.getElementById("container3").style.display = "none";
                document.getElementById("container4").style.display = "none";
                document.getElementById("container5").style.display = "none";
            } if (a == 3) {
                document.getElementById("container1").style.display = "none";
                document.getElementById("container2").style.display = "none";
                document.getElementById("container3").style.display = "block";
                document.getElementById("container4").style.display = "none";
                document.getElementById("container5").style.display = "none";
            } if (a == 4) {
                document.getElementById("container1").style.display = "none";
                document.getElementById("container2").style.display = "none";
                document.getElementById("container3").style.display = "none";
                document.getElementById("container4").style.display = "block";
                document.getElementById("container5").style.display = "none";
            }

            if (a == 5) {
                document.getElementById("container1").style.display = "none";
                document.getElementById("container2").style.display = "none";
                document.getElementById("container3").style.display = "none";
                document.getElementById("container4").style.display = "none";
                document.getElementById("container5").style.display = "block";
            }
        } else {
            sessionStorage.setItem("number", 3);
        }

    </script>

    </html>
    <?php
} else {
    header('location: /thuongmaidientu');
}