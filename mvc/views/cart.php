<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Giỏ hàng</title>
  <!-- Nạp các tệp CSS của Bootstrap 5 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
</head>

<style>
  img {
    width: 75px;
  }
</style>

<body>
  <a href="/thuongmaidientu" class="btn btn-danger">Trở lại</a>

  <div class="container">
    <!-- Thanh tiêu đề -->
    <nav class="navbar navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Giỏ hàng</a>
      </div>
    </nav>
    <!-- Danh sách sản phẩm -->
    <div class="row mt-3">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Sản phẩm trong giỏ hàng</h5>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col" style="width: 40px;">Hình ảnh</th>
                  <th scope="col">Tên sản phẩm</th>
                  <th scope="col">Giá tiền</th>
                  <th scope="col">Số lượng</th>
                  <th scope="col">Thành tiền</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (isset($_SESSION['cart']) && !isset($_SESSION['user'])) {
                  $total = 0;
                  foreach ($_SESSION['cart'] as $item) {
                ?>
                    <tr>
                      <th scope="row"><img src="../public/product_imgs/<?php echo $item[0][1] ?>" alt=""></th>
                      <td>
                        <?php echo $item[0][2] ?>
                      </td>
                      <td>

                        <?php echo $item[0][3] ?>đ<input type="hidden" name="dongia" value="<?php echo $item[0][3] ?>">
                      </td>

                      <td>
                        <div class="d-flex">
                          <a href="../cart/update_cart_item_quantity/increase/<?php echo $item[0][4] ?>/<?php echo $item[0][0] ?>" class="btn btn-primary">+</a>
                          <div class="btn bg-0"><?php echo $item[0][4] ?></div>
                          <a href="../cart/update_cart_item_quantity/decrease/<?php echo $item[0][4] ?>/<?php echo $item[0][0] ?>" class="btn btn-primary">-</a>
                        </div>
                      </td>
                      <td>
                        <?php echo $item[0][4] * $item[0][3] ?> đ
                      </td>
                      <td><a href="../cart/deleteCartItem/<?php echo $item[0][0] ?>" class="btn btn-sm btn-danger">Xóa</a>
                      </td>
                      <td>
                         <form method="post" action="../vnpay_php/vnpay_create_payment.php">
                          <input type="hidden" name="idP" id="" value="<?php echo $item[0][0] ?>">
                          <input type="hidden" name="total" id="" value="<?php echo $item[0][4] * $item[0][3] ?>">
                          <button type="submit" class="btn btn-sm btn-primary">Đặt hàng</button>
                        </form>
                      </td>
                    </tr>
                  <?php
                    $total += $item[0][4] * $item[0][3];
                  }
                } else if (isset($_SESSION['user'])) {
                  $total = 0;
                  while ($result = mysqli_fetch_array($data)) {
                  ?>
                    <tr>
                      <th class="w-25" scope="row"><img class="w-25" src="../public/product_imgs/<?php echo $result[2] ?>" alt=""></th>
                      <td>
                        <?php echo $result[3] ?>
                      </td>
                      <td>
                        <?php echo $result[4] ?> đ
                      </td>
                      <td>
                        <div class="d-flex">
                          <a href="../cart/update_cart_item_quantity/increase/<?php echo $result[5] ?>/<?php echo $result[1] ?>" class="btn btn-primary">+</a>
                          <div class="btn bg-0"><?php echo $result[5] ?></div>
                          <a href="../cart/update_cart_item_quantity/decrease/<?php echo $result[5] ?>/<?php echo $result[1] ?>" class="btn btn-primary">-</a>
                        </div>
                      </td>
                      <td>
                        <?php echo $result[4] * $result[5] ?> đ
                      </td>
                      <td><a href="../cart/deleteCartItem/<?php echo $result[1] ?>" class="btn btn-sm btn-danger">Xóa</a>
                      </td>
                      <td>
                        <form method="post" action="../vnpay_php/vnpay_create_payment.php">
                          <input type="hidden" name="idP" id="" value="<?php echo $result ?>">
                          <input type="hidden" name="total" id="" value="<?php echo $result[4] * $result[5] ?>">
                          <button type="submit" class="btn btn-sm btn-primary">Đặt hàng</button>
                        </form>
                      </td>
                    </tr>
                <?php
                    $total += $result[4] * $result[5];
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- Thành tiền -->
    <div class="row mt-3">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Tổng tiền</h5>
            <p class="card-text">Tổng tiền:
              <?php
              echo $total . " đ";
              ?>
            <form method="post" action="../vnpay_php/vnpay_create_payment.php">
              <input type="hidden" name="payAll">
              <input type="hidden" name="total" id="" value="<?php echo $total ?>">
              <button class="btn btn-primary">Thanh toán</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Nạp các tệp JavaScript của Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>