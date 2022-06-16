<!DOCTYPE html>
<html lang="en">

<head>
<base href="http://localhost/FOODOGANICSHOP/">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- plugins:css -->
  <link rel="stylesheet" href="./mvc/public/admin/vendors/feather/feather.css">
  <link rel="stylesheet" href="./mvc/public/admin/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="./mvc/public/admin/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="./mvc/public/admin/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="./mvc/public/admin/image/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center text-center error-page bg-primary">
        <div class="row flex-grow">
          <div class="col-lg-7 mx-auto text-white">
            <div class="row align-items-center d-flex flex-row">
              <div class="col-lg-6 text-lg-right pr-lg-4">
                <h2 class="display-1 mb-0">Yeah</h2>
              </div>
              <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                <h2>Cập nhật thành công!</h2>
                <h3 class="font-weight-light"><?php if(isset($data['alert'])){ echo $data['alert'];} else{echo "Bạn đã thực hiện thành công thao tác.";}?></h3>
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-12 text-center mt-xl-2">
                <a class="text-white font-weight-medium" href="shop/page/1"> Click tiếp tục mua sắm</a>
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-12 mt-xl-2">
                <p class="text-white font-weight-medium text-center">OcopMart &copy; <?php if(isset($data['alert'])){ echo $data['alert'];} else{echo"Kính Chào quý khách";}?></p>
              </div>
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
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
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
