<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Đăng ký</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0-beta3/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0-beta3/js/bootstrap.min.js"></script>
</head>
<style>
  a {
    text-decoration: none;
  }
</style>

<body>
  <button class="btn btn-danger" onclick="window.history.back()">Trở lại</button>


  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-sm-6">
        <h1 class="mb-4">Đăng ký tài khoản</h1>
        <form method="post" action="../auth/sign_up_handle">
          <div class="mb-3">
            <label for="fullname" class="form-label">Họ và tên</label>
            <input type="text" class="form-control" id="fullname" name="fullname" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input class="form-control" id="email" name="email" required <?php
            if (isset($data['email'])) {
              ?>
                placeholder="<?php echo $data['email'] ?>" <?php
            }
            ?>>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" id="password" name="pass" required <?php
            if (isset($data['pass'])) {
              ?> placeholder="<?php echo $data['pass'] ?>" <?php
            }
            ?>>
          </div>
          <div class="mb-3">
            <label for="confirm-password" class="form-label">Xác nhận mật khẩu</label>
            <input type="password" class="form-control" id="confirm-password" name="repass" required <?php
            if (isset($data['repass'])) {
              ?> placeholder="<?php echo $data['repass'] ?>" <?php
            }
            ?>>
          </div>
          <button type="submit" class="btn btn-primary">Đăng ký</button>
        </form>
        <span>Đã có tài khoản? <a clas="sign_in_link" href="../auth/sign_in">Đăng nhập</a></span>
      </div>
    </div>
  </div>
</body>

</html>