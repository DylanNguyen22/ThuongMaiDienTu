<?php
 if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
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
    .container2 {
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
        <span class="ms-2">Xin chào: admin</span>
        <div class="menu mb-2 mt-2 py-2 d-flex justify-content-between">
            <div class="ms-3">
            <button onclick="open_container1()" class="rounded-pill btn-danger mx-2 ">Quản lý tài khoản</button>
            <button onclick="open_container2()" class="rounded-pill btn-success mx-2 ">Quản lý đơn hàng</button>
            <button onclick="open_container3()" class="rounded-pill btn-primary mx-2 ">Quản lý sản phẩm</button>
            </div>
            <a class="me-3 text-danger btn bg-0 border-0 fw-bolder" href="../auth/sign_out">Đăng xuất</a> 
        </div>
        <div id="container1" class="container1">

        </div>
        <div id="container2" class="container2">
            quan ly don hang
        </div>

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
        <div id="container3" class="container3">
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
    </div>
</body>

<script>
    function open_container1() {
        document.getElementById("container1").style.display = "block";
        document.getElementById("container2").style.display = "none";
        document.getElementById("container3").style.display = "none";
    }

    function open_container2() {
        document.getElementById("container1").style.display = "none";
        document.getElementById("container2").style.display = "block";
        document.getElementById("container3").style.display = "none";
    }

    function open_container3() {
        document.getElementById("container1").style.display = "none";
        document.getElementById("container2").style.display = "none";
        document.getElementById("container3").style.display = "block";
    }

</script>

</html>
<?php
 }else{
    header('location: /thuongmaidientu');
 }