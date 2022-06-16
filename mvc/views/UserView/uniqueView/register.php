<!DOCTYPE html>
<html lang="en">
<head>
<base href="http://localhost/FOODOGANICSHOP/">

  <!-- Nếu như đăng nhập thành công mới có thể sử dụng các chức năng của admin -->
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- plugins:css -->
  <link rel="stylesheet" href="./mvc/public/admin/vendors//feather/feather.css">
  <link rel="stylesheet" href="./mvc/public/admin/vendors//ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="./mvc/public/admin/vendors//css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="./mvc/public/admin/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="./mvc/public/admin/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
              <img src="./mvc/public/ImgInterfaceDefault/imglogo/logo.png" alt="logo">
              </div>
              <h4>Đăng ký tài khoản</h4>
              <h6 class="font-weight-light">Đăng kí tài khoản với các bước nhanh chóng !</h6>
              <p style="color: red"><?php if(isset($data['alert'])){echo $data['alert'];}?></p>
              <p style="color: green"<?php if(isset($data['alert_s'])){echo $data['alert_s'];}?>></p>
              <form action="register/dang-ky-tai-khoan" method="post">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Tên đăng nhập" name="username">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Mật khẩu" name="password">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleRepasswordPassword" placeholder="Nhập lại mật khẩu" name="repassword">
                </div>
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted" >
                      <input type="checkbox" class="form-check-input" name="checked-inf">
                      Tôi đồng ý các thông tin điều khoản
                    </label>
                  </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-success">Đăng ký</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                 Tôi đã có tài khoản <a href="login.html" class="text-primary">Đăng nhập</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="./mvc/public/admin/vendors//js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="./mvc/public/admin/js/off-canvas.js"></script>
  <script src="./mvc/public/admin/js/hoverable-collapse.js"></script>
  <script src="./mvc/public/admin/js/template.js"></script>
  <script src="./mvc/public/admin/js/settings.js"></script>
  <script src="./mvc/public/admin/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
