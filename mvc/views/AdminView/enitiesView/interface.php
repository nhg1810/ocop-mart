<head>
  <!-- thư viện hỗ trợ ajax và jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- sweet alert -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<style>
  .file-img-banner {
    margin: 0;
    padding: 2rem 1.5rem;
    font: 1rem/1.5 "PT Sans", Arial, sans-serif;
    color: #5a5a5a;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
  }

  #img-banner-prod {
    width: 80%;
    height: 200px;
    border-radius: 10px;
    background: red;
  }

  .contain-img-banner-prod {
    position: relative;
    width: 100%;
    height: auto;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
  }

  .contain-input-type-file {
    width: 100%;
    height: 50px;
    display: flex;
    margin-top: 10px;
  }
</style>
<!-- jquery xử lý lưu các thay đổi -->
<script>
  $(document).ready(function () {
    $(".btn-save-change-interface").click(function () {
      // ảnh banner chính
      var dtn_img_banner = $("#file-img-banner")[0].files;
      //  các thông tin thằng slide banner
      var dtn_title_slide_banner_1 = $(".title-sl-banner-1").val();
      var dtn_title_slide_banner_2 = $(".title-sl-banner-2").val();
      var dtn_title_slide_banner_3 = $(".title-sl-banner-3").val();

      var dtn_des_slide_banner_1 = $(".des-sl-banner-1").val();
      var dtn_des_slide_banner_2 = $(".des-sl-banner-2").val();
      var dtn_des_slide_banner_3 = $(".des-sl-banner-3").val();

      var dtn_img_sl_banner_1 = $("#file-img-sub-banner-1")[0].files;
      var dtn_img_sl_banner_2 = $("#file-img-sub-banner-2")[0].files;
      var dtn_img_sl_banner_3 = $("#file-img-sub-banner-3")[0].files;

      var dtn_banner_prod_1 = $("#ip-upload-img-banner-prod-1")[0].files;
      var dtn_banner_prod_2 = $("#ip-upload-img-banner-prod-2")[0].files;

      // ảnh cũ slide trong banner lớn
      var dto_img_sl_banner_1 = $(".value-img-slide-banner-1").val();
      var dto_img_sl_banner_2 = $(".value-img-slide-banner-2").val();
      var dto_img_sl_banner_3 = $(".value-img-slide-banner-3").val();
      // ảnh cũ của banner chính
      var dto_img_banner = $(".value-img-banner").val();
      //ảnh cũ của 2 banner phụ
      var dto_img_sub_banner_1 = $("#value-sub-banner-1").val();
      var dto_img_sub_banner_2 = $("#value-sub-banner-2").val();


      if (dtn_title_slide_banner_1 == "" || dtn_title_slide_banner_2 == ""
        || dtn_title_slide_banner_3 == "" || dtn_des_slide_banner_1 == "" || dtn_des_slide_banner_2 == ""
        || dtn_des_slide_banner_3 == "") {
        Swal.fire({
          icon: 'error',
          title: 'Chưa nhập đủ thông tin',
          text: 'Vui lòng kiểm tra lại!'
        })
      } else {
        var fd_ud_interface = new FormData();
        // banner lớn
        fd_ud_interface.append('dtn_img_banner', dtn_img_banner[0]);
        // slide trong banner lớn
        fd_ud_interface.append('dtn_title_slide_banner_1', dtn_title_slide_banner_1);
        fd_ud_interface.append('dtn_title_slide_banner_2', dtn_title_slide_banner_2);
        fd_ud_interface.append('dtn_title_slide_banner_3', dtn_title_slide_banner_3);

        fd_ud_interface.append('dtn_des_slide_banner_1', dtn_des_slide_banner_1);
        fd_ud_interface.append('dtn_des_slide_banner_2', dtn_des_slide_banner_2);
        fd_ud_interface.append('dtn_des_slide_banner_3', dtn_des_slide_banner_3);

        fd_ud_interface.append('dtn_img_sl_banner_1', dtn_img_sl_banner_1[0]);
        fd_ud_interface.append('dtn_img_sl_banner_2', dtn_img_sl_banner_2[0]);
        fd_ud_interface.append('dtn_img_sl_banner_3', dtn_img_sl_banner_3[0]);
        // ảnh cũ trước khi update 3 slide trong banner lớn
        fd_ud_interface.append('dto_img_sl_banner_1', dto_img_sl_banner_1);
        fd_ud_interface.append('dto_img_sl_banner_2', dto_img_sl_banner_2);
        fd_ud_interface.append('dto_img_sl_banner_3', dto_img_sl_banner_3);
        //ảnh cũ của banner chính
        fd_ud_interface.append('dto_img_banner', dto_img_banner);
        //ảnh cũ của 2 banner phụ
        fd_ud_interface.append('dto_img_sub_banner_1', dto_img_sub_banner_1);
        fd_ud_interface.append('dto_img_sub_banner_2', dto_img_sub_banner_2);
        //2 banner nhỏ
        fd_ud_interface.append('dtn_banner_prod_1', dtn_banner_prod_1[0]);
        fd_ud_interface.append('dtn_banner_prod_2', dtn_banner_prod_2[0]);
        $.ajax({
          url: 'admin/editInterface/updateInterface',
          data: fd_ud_interface,
          type: "POST",
          cache: false,
          processData: false,
          contentType: false,
          success: function (data) {
            // location.reload();
            if (data == 1) {
              Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Cập nhật thành công !',
                showConfirmButton: false,
                timer: 1200
              })
              setTimeout(function () { window.location.reload(1); }, 1200);
            }
            else {
              alert(data)
            }
          }
        });
      }
    })
  })
</script>
<!-- jquery xử lý thay đổi tên các tab ở menu -->
<script>
    $(document).ready(function () {
      // $(".btn-save-name-tab").click(function(){
      //   var idTabName =$(this).attr("data-id-tab");
      //   var nameTab = $(".value-name-tab-"+idTabName+"").val();
      //   alert(nameTab);

      // })
    })
</script>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <!-- chỉnh sửa giao diện banner chính -->
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Giao diện trang chủ</h4>
            <p class="card-description">Chỉnh sửa giao diện <code>Trang chủ</code></p>
            <div class="template-demo">
              <button type="button" class="btn btn-primary btn-lg btn-block btn-save-change-interface">
                <i class="ti-user"></i>
                Lưu thay đổi
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card-body">
          <h4 class="card-title">Các ảnh của banner</h4>
          <p class="card-description">Thêm ảnh <code>để sửa ảnh banner</code></p>
          <div class="template-demo">
            <input type="hidden" class="value-img-banner" value="<?php echo $data['background_banner'] ?>" />
            <img src="./mvc/public/ImgInterfaceDefault/imgbanner/<?php
           if(isset($data['background_banner'])){
             $background_banner = $data['background_banner'];
             echo $background_banner;
           }
            ?>" id="img-banner" width="80%" height="240px" style="border-radius: 10px;" alt="">
          </div>
        </div>
        <label class="file-img-banner">
          <?php
          echo '  <input type="file" id="file-img-banner" aria-label="File browser example"
          onchange="document.getElementById(`img-banner`).src = window.URL.createObjectURL(this.files[0])">' ;
          ?>


          <span class="file-custom"></span>
        </label>
      </div>
      <?php
      if(isset($data['set_slider_banner_home'])){
        $set_slider_banner_home  = $data['set_slider_banner_home'];
        foreach($set_slider_banner_home as $key => $value){
          foreach($value as $k => $vl){
              echo '<div class="col-md-4">
              <div class="card-body">
                <h4 class="card-title">Các ảnh slider của banner</h4>
                <p class="card-description">Thêm ảnh <code>để sửa ảnh slide '.$set_slider_banner_home[$key]['idBanner'].'</code></p>
                <form class="form-inline">
                  <label class="sr-only" for="inlineFormInputGroupUsername2">Tên tab</label>
                  <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Tiêu đề</div>
                    </div>
                    <input type="text" class="form-control title-sl-banner-'.$set_slider_banner_home[$key]['idBanner'].'" value="'.$set_slider_banner_home[$key]['titleBanner'].'" id="inlineFormInputGroupUsername2"  placeholder="Tiêu đề">
                  </div>
                </form>

                <form class="form-inline">
                  <label class="sr-only" for="inlineFormInputGroupUsername2">Giới thiệu</label>
                  <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Giới thiệu</div>
                    </div>
                    <input type="text" class="form-control des-sl-banner-'.$set_slider_banner_home[$key]['idBanner'].'" id="inlineFormInputGroupUsername2 " value="'.$set_slider_banner_home[$key]['descriptBanner'].'"
                      placeholder="Giới thiệu">
      
                  </div>
                </form>

                <div class="template-demo">
                   <input type ="hidden" class="value-img-slide-banner-'.$set_slider_banner_home[$key]['idBanner'].'" value ="'.$set_slider_banner_home[$key]['imgBanner'].'">
                  <img src="./mvc/public/ImgInterfaceDefault/ImgSliderBanner/'.$set_slider_banner_home[$key]['imgBanner'].'" id="img-slider-'.$set_slider_banner_home[$key]['idBanner'].'" width="80%" height="240px" style="border-radius: 10px;" alt="">
                </div>
              </div>
              <label class="file-img-sub-banner">
                <input type="file" id="file-img-sub-banner-'.$set_slider_banner_home[$key]['idBanner'].'" aria-label="File browser example"
                  onchange="document.getElementById(`img-slider-'.$set_slider_banner_home[$key]['idBanner'].'`).src = window.URL.createObjectURL(this.files[0])">
                <span class="file-custom"></span>
              </label>
            </div>';
          break;
          }
      }
      }
      ?>
    </div>

    <div class="row">
      <!-- chỉnh sửa header -->
      <div class="col-md-6">
        <div class="card-body">
          <h4 class="card-title">Chỉnh sửa tên các Tab header</h4>
          <p class="card-description">Tên các tab <code>̣(phai phù hợp với nội dung)</code> sửa ở đây</p>
          <div class="template-demo">

            <!-- đổ ra các tab menu -->
            <!-- <form class="form-inline">
              <label class="sr-only" for="inlineFormInputGroupUsername2">Tên tab</label>
              <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">Trang chủ</div>
                </div>
                <input type="text" class="form-control value-name-tab-1" id="inlineFormInputGroupUsername2 "
                  value="<?php echo $data['nameTabHome']?>" placeholder="Tên tab">
              </div>
              <button type="button" class="btn btn-primary mb-2 btn-save-name-tab" data-id-tab = 1>Lưu</button>
            </form>

            <form class="form-inline">
              <label class="sr-only" for="inlineFormInputGroupUsername2">Tên tab</label>
              <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">tab shop</div>
                </div>
                <input type="text" class="form-control value-name-tab-2" id="inlineFormInputGroupUsername2 "
                  value="<?php echo $data['nameTabShop']?>" placeholder="Tên tab">
              </div>
              <button type="button" class="btn btn-primary mb-2 btn-save-name-tab" data-id-tab = 2>Lưu</button>
            </form>

            <form class="form-inline">
              <label class="sr-only" for="inlineFormInputGroupUsername2">Tên tab</label>
              <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">tab giới thiệu</div>
                </div>
                <input type="text" class="form-control value-name-tab-3" id="inlineFormInputGroupUsername2 "
                  value="<?php echo $data['nameTabIntro']?>" placeholder="Tên tab">
              </div>
              <button type="button" class="btn btn-primary mb-2 btn-save-name-tab" data-id-tab = 3>Lưu</button>
            </form>

            <form class="form-inline">
              <label class="sr-only" for="inlineFormInputGroupUsername2">Tên tab</label>
              <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">tab bài viết</div>
                </div>
                <input type="text" class="form-control value-name-tab-4" id="inlineFormInputGroupUsername2"
                  value="<?php echo $data['nameTabBlog']?>" placeholder="Tên tab">
              </div>
              <button type="button" class="btn btn-primary mb-2 btn-save-name-tab" data-id-tab = 4>Lưu</button>
            </form>

            <form class="form-inline">
              <label class="sr-only" for="inlineFormInputGroupUsername2">Tên tab</label>
              <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">tab liên hệ</div>
                </div>
                <input type="text" class="form-control value-name-tab-5" id="inlineFormInputGroupUsername2"
                  value="<?php echo $data['nameTabContact']?>" placeholder="Tên tab">
              </div>
              <button type="button" class="btn btn-primary mb-2 btn-save-name-tab" data-id-tab = 5>Lưu</button>
            </form> -->

          </div>
        </div>
      </div>
      <!-- chỉnh sửa banner gần footer -->
      <div class="col-md-6">
        <div class="card-body">
          <h4 class="card-title">Chỉnh sửa thông tin ảnh banner giới thiệu sản phẩm</h4>
          <p class="card-description">Click vao đây <code>̣ Để chỉnh sửa ảnh</code></p>
          <div class="template-demo">
            <div class="contain-img-banner-prod">
              <input type="hidden" id="value-sub-banner-1" value="<?php echo $data['subBannerProduct1'] ?>">
              <img src="./mvc/public/ImgInterfaceDefault/imgsubbanner/<?php echo $data['subBannerProduct1']?>"
                id="img-banner-prod-1" width="80%" height="250px" style="border-radius: 10px" alt="">

              <input type="hidden" id="value-sub-banner-2" value="<?php echo $data['subBannerProduct2'] ?>">
              <img src="./mvc/public/ImgInterfaceDefault/imgsubbanner/<?php echo $data['subBannerProduct2']?>"
                id="img-banner-prod-2" width="80%" height="250px" style="border-radius: 10px" alt="">
            </div>
            <div class="contain-input-type-file">
              <input type="file" id="ip-upload-img-banner-prod-1"
                onchange="document.getElementById('img-banner-prod-1').src = window.URL.createObjectURL(this.files[0])" />
              <input type="file" id="ip-upload-img-banner-prod-2"
                onchange="document.getElementById('img-banner-prod-2').src = window.URL.createObjectURL(this.files[0])" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>