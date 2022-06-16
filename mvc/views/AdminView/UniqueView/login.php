<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Nếu như đăng nhập thành công mới có thể sử dụng các chức năng của admin -->
<base href="http://localhost/FOODOGANICSHOP/">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
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
                <img src="./mvc/public/admin/images/logo.svg" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <?php if(isset($data["alertcheck"])){
      echo "<br/> <p style='color:red'>".$data["alertcheck"]."</p>";
    } ?>
              <form class="pt-3" action="admin/home/quanly" method="POST">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" name="ADusername">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="ADpassword">
                </div>
                <div class="mt-3">
                  <input type="submit" name ="btnsigninamdin" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="">
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                </div>
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
