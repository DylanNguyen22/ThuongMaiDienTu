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
<body>
  <button onclick="window.history.back()" class="btn btn-danger">Trở lại</button>

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
                  <th scope="col">Hình ảnh</th>
                  <th scope="col">Tên sản phẩm</th>
                  <th scope="col">Giá tiền</th>
                  <th scope="col">Số lượng</th>
                  <th scope="col">Thành tiền</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">"Hình ảnh của sản phẩm</th>
                  <td>Áo phông nam</td>
                  <td>200.000 đ</td>
                  <td><input style="width: 45px" value="2" type="number"></td>
                  <td>400.000 đ</td>
                  <td><a href="#" class="btn btn-sm btn-danger">Xóa</a></td>
                </tr>
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
            <p class="card-text">Tổng tiền: 400.000 đ</p>
            <a href="#" class="btn btn-primary">Thanh toán</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Nạp các tệp JavaScript của Bootstrap 5 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>