<!doctype html>
<html lang="en">
  <head>
    <base href="http://localhost/FOODOGANICSHOP/">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./mvc/public/user/css/cssupdateaccount/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="./mvc/public/user/css/cssupdateaccount/style.css">

    <title>Contact Form #6</title>
  </head>
  <body>
  

  <div class="content">
    
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10">
          

          <div class="row justify-content-center">
            <div class="col-md-6">
              
              <h3 class="heading mb-4">Hãy cập nhật thông tin, qua các bước nhanh chóng. </h3>
              <p>Giúp chúng tôi hỗ trợ bạn mua hàng một cách dễ dàng hơn</p>
              <p style="color: red"><?php if(isset($data['alert'])){echo $data['alert'];}?></p>
              <p><img src="./mvc/public/ImgInterfaceDefault/imglogo/undraw-contact.svg" alt="Image" class="img-fluid"></p>


            </div>
            <div class="col-md-6">
              <form class="mb-5" method="post" id="contactForm"  enctype="multipart/form-data" name="contactForm" action ="updateAccount/cap-nhap-san-pham">
                <div class="row">
                  <div class="col-md-6 form-group">
                    <!-- bỏ ảnh củ vào đây -->
                    <input type="hidden" name="old-avata" value="<?php if(isset($data['set_account'])){ echo $data['set_account'][0]['avata'] ; }?>" >

                    <img id="show-avata"  src="<?php if(isset($data['set_account'])){if($data['set_account'][0]['avata'] != ""){echo './mvc/public/ImgInterfaceDefault/imgAvataUser/'.$data['set_account'][0]['avata'].' ';} else{echo './mvc/public/ImgInterfaceDefault/imglogo/profile.png';} }?>  "  style="width: 150px; height: 150px; background:#c96363; border-radius: 50%" alt="">
                    <div style="color: #c96363; position: relative">Thêm ảnh
                     <input type="file" name="avata" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0"
                     onchange="document.getElementById('show-avata').src = window.URL.createObjectURL(this.files[0])"
                     >
                  </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 form-group">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Tên của bạn " value="<?php if(isset($data['set_account'])){ echo $data['set_account'][0]['name'] ; }?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 form-group">
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php if(isset($data['set_account'])){ echo $data['set_account'][0]['email'] ; }?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 form-group">
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Số điện thoại" value="0<?php if(isset($data['set_account'])){ echo $data['set_account'][0]['sdt'] ; }?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 form-group">
                    <input type="text" class="form-control" name="address" id="address" placeholder="Địa chỉ" value="<?php if(isset($data['set_account'])){ echo $data['set_account'][0]['address'] ; }?>">
                  </div>
                </div>

                <div class="row">
                  <div class="col-12">
                    <input type="submit" value="Lưu thông tin" class="btn btn-primary rounded-0 py-2 px-4">
                  <span class="submitting"></span>
                  </div>
                </div>
              </form>

              <div id="form-message-warning mt-4"></div> 
              <
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/main.js"></script>

  </body>
</html>