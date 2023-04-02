<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Đăng nhập</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0-beta3/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0-beta3/js/bootstrap.min.js"></script>
</head>
<style>
  .sign_up_link {
    text-decoration: none;
  }
</style>

<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-sm-6">
        <h1 class="mb-4">Đăng nhập</h1>
        <form>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" id="password">
          </div>
          <button type="submit" class="btn btn-primary">Đăng nhập</button>
        </form>
        <span>Chưa có tài khoản? <a class="sign_up_link" href="../auth/sign_up">Đăng ký</a></span>
      </div>
    </div>
  </div>
</body>
</html>     