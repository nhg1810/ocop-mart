<head>
  <!-- thư viện hỗ trợ ajax và jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- sweet alert -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- chart js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<!-- css phần form-crud-prod -->
<style>
  .layout_opacity {
    position: absolute;
    width: 100%;
    height: 100%;
    background-color: black;
    z-index: 100;
    position: fixed;
    opacity: 0.5;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .contain-form-crud {
    position: absolute;
    z-index: 101;
    width: 90%;
    height: 80%;
    background-color: white;
    opacity: 1;
    top: 55%;
    position: fixed;
    /* position the top  edge of the element at the middle of the parent */
    left: 50%;
    /* position the left edge of the element at the middle of the parent */
    transform: translate(-50%, -50%);
    border-radius: 20px;
    display: flex;
    flex-wrap: wrap;
  }

  /* css phần thêm ảnh sản phẩm */
  .contain-img-prod-crud {
    width: 100%;
    height: 120px;
    display: flex;
    justify-content: space-evenly;
    align-items: center;
  }

  .contain-img-prod-crud>div {
    width: 23%;
    height: 100px;
    border-radius: 10px;
    border-style: dotted;
    position: relative;
  }

  .contain-img-prod-crud>div>.file_img {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    bottom: 0;
    left: 0;
    opacity: 0;
    z-index: 2;
  }

  .contain-img-prod-crud>div>img {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    bottom: 0;
    left: 0;
    border-radius: 10px;
  }

  .contain-img-prod-crud>div>button {
    position: absolute;
    top: -30px;
    left: -10px;
  }
</style>
<!-- css phần form- crud category -->
<style>
  .contain-add-the-face-prod {
    position: absolute;
    z-index: 101;
    width: 50%;
    height: 80%;
    background-color: white;
    opacity: 1;
    top: 55%;
    position: fixed;
    /* position the top  edge of the element at the middle of the parent */
    left: 50%;
    /* position the left edge of the element at the middle of the parent */
    transform: translate(-50%, -50%);
    border-radius: 20px;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
  }

  .contain-add-special-prod {
    position: absolute;
    z-index: 101;
    width: 50%;
    height: 80%;
    background-color: white;
    opacity: 1;
    top: 55%;
    position: fixed;
    /* position the top  edge of the element at the middle of the parent */
    left: 50%;
    /* position the left edge of the element at the middle of the parent */
    transform: translate(-50%, -50%);
    border-radius: 20px;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
  }

  .contain-form-crud-category {
    position: absolute;
    z-index: 101;
    width: 70%;
    height: 80%;
    background-color: white;
    opacity: 1;
    top: 55%;
    position: fixed;
    /* position the top  edge of the element at the middle of the parent */
    left: 50%;
    /* position the left edge of the element at the middle of the parent */
    transform: translate(-50%, -50%);
    border-radius: 20px;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
  }

  .contain-button-img {
    width: 50%;
    height: auto;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
  }

  .contain-button-img>.contain-button {
    width: 60%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 50px;
  }

  .contain-button-img>img {
    width: 300px;
    height: 200px;
    border-radius: 10px;
    border-style: dotted;
    background-color: bisque;
  }
</style>
<!-- jquery ẩn hiện thằng crud sản phẩm -->
<!-- jquery xử lý thằng add sản phẩm -->
<script>
  $(document).ready(function () {
    $(".layout_opacity").hide();
    $(".contain-form-crud").hide();
    $(".add-currenly-product").click(function () {
      $("#card-title").html("Thêm sản phẩm");
      $(".layout_opacity").show();
      $(".contain-form-crud").show();
      $(".name-prod").val("");
      $(".price-prod").val("");
      $(".brand-prod").val("");
      $(".sale-prod").val("");
      $("#descript-prod").val("");
      $("#img-prod-crud-1").attr('src', "")
      $("#img-prod-crud-2").attr('src', "")
      $("#img-prod-crud-3").attr('src', "")
      $("#img-prod-crud-4").attr('src', "")
      $(".save-insert-crud").show();
      $(".save-form-crud").hide();
      //xử lý thêm sản phẩm ở đây
      var dtna_idCategoryCurrent = 0;
      $(".drop_down_cate_gory").click(function () {
        dtna_idCategoryCurrent = $(this).attr('data_id_category');
        value_category = $("#value_cate_gory_" + dtna_idCategoryCurrent + "").val();
        $(".show_value_category").val(value_category);
      })
      //check các giá trị trước khi add
      $(".save-insert-crud").click(function () {
        const regex = new RegExp(/[^0-9]/, 'g');
        var dtna_name_prod = $(".name-prod").val();
        var dtna_price_prod = $(".price-prod").val();
        var dtna_brand_prod = $(".brand-prod").val();
        var dtna_sale_prod = $(".sale-prod").val();
        var dtna_descript = $("#descript-prod").val();
        var dtna_status_prod = $("input[name='status-prod']:checked").val();;
        //xử lý 4 ảnh ở đây*(data new to add)
        var dtna_img_prod_1 = $('#file_img_1')[0].files;
        var dtna_img_prod_2 = $('#file_img_2')[0].files;
        var dtna_img_prod_3 = $('#file_img_3')[0].files;
        var dtna_img_prod_4 = $('#file_img_4')[0].files;


        if (dtna_name_prod == "" || dtna_price_prod == "" || dtna_brand_prod == "" || dtna_sale_prod == ""
          || dtna_descript == "" || dtna_status_prod == "" || dtna_idCategoryCurrent == 0) {
          Swal.fire({
            icon: 'error',
            title: 'Lỗi ',
            text: 'Chưa điền đủ thông tin !',
          })
        } else if (dtna_sale_prod >= 100) {
          Swal.fire({
            icon: 'error',
            title: 'Lỗi ',
            text: 'Mục giảm giá không thể lớn hơn bằng 100!',
          })
        } else if (dtna_sale_prod * 0 != 0 || dtna_price_prod * 0 != 0) {
          Swal.fire({
            icon: 'error',
            title: 'Lỗi ',
            text: 'Lỗi định dạng, vui lòng kiểm tra lại kiểu dữ liệu!',
          })
        } else {
          var fda = new FormData();
          fda.append('dtna_name_prod', dtna_name_prod);
          fda.append('dtna_price_prod', dtna_price_prod);
          fda.append('dtna_brand_prod', dtna_brand_prod);
          fda.append('dtna_sale_prod', dtna_sale_prod);
          fda.append('dtna_descript', dtna_descript);
          fda.append('dtna_idCategoryCurrent', dtna_idCategoryCurrent);
          fda.append('dtna_status_prod', dtna_status_prod);
          fda.append('dtna_img_prod_1', dtna_img_prod_1[0]);
          fda.append('dtna_img_prod_2', dtna_img_prod_2[0]);
          fda.append('dtna_img_prod_3', dtna_img_prod_3[0]);
          fda.append('dtna_img_prod_4', dtna_img_prod_4[0]);
          //gọi ajax add vô csdl
          $.ajax({
            url: 'admin/product/AddProduct',
            data: fda,
            cache: false,
            processData: false,
            contentType: false,
            type: "POST",
            success: function (data) {
              // location.reload();
              if (data == 1) {
                Swal.fire({
                  position: 'top-end',
                  icon: 'success',
                  title: 'Thêm thành công !',
                  showConfirmButton: false,
                  timer: 1500
                })
                setTimeout(function () { window.location.reload(1); }, 1500);
                $(".layout_opacity").hide();
                $(".contain-form-crud").hide();
              } else {
                alert(data);
              }
            }
          });
        }
      })

    })
    $(".cancel-form-crud").click(function () {
      $(".layout_opacity").hide();
      $(".contain-form-crud").hide();
    })
  })
</script>
<!-- jquery thằng xử lý phần update -->
<script>
  $(document).ready(function () {
    $(".bt_update_prod").click(function () {
      $(".save-insert-crud").hide();
      $(".save-form-crud").show();

      $(".layout_opacity").show();
      $(".contain-form-crud").show();
      $("#card-title").html("Cập nhật sản phẩm");
      //lấy các data cũ ra để chuẩn bị show
      var id_product = $(this).attr('dt_bt_update_prod');
      var nameprod = $("#nameprod_" + id_product + "").val();
      var imageprod_1 = $("#imageprod_1_" + id_product + "").val();
      var imageprod_2 = $("#imageprod_2_" + id_product + "").val();
      var imageprod_3 = $("#imageprod_3_" + id_product + "").val();
      var imageprod_4 = $("#imageprod_4_" + id_product + "").val();
      var priceprod = $("#priceprod_" + id_product + "").val();
      var brand = $("#brand_" + id_product + "").val();
      var idcategory = $("#idcategory_" + id_product + "").val();
      var status = $("#status_" + id_product + "").val();
      var descript_product = $("#descript_product_" + id_product + "").val();
      var sale = $("#sale_" + id_product + "").val();
      var dtl_
      // đổ dữ liệu cũ ra form
      //lấy idcate để get input hiden để get giá trị id cate đó
      $(".show_value_category").val($("#value_cate_gory_" + idcategory + "").val());
      $(".name-prod").val(nameprod);
      $(".price-prod").val(priceprod);
      $(".brand-prod").val(brand);
      $(".sale-prod").val(sale);
      if (status == 0) {
        $("#hethang").prop("checked", true);
      } else {
        $("#conhang").prop("checked", true);
      }
      $("#img-prod-crud-1").attr('src', './mvc/public/ImgProduct/' + imageprod_1 + '');
      $("#img-prod-crud-2").attr('src', './mvc/public/ImgProduct/' + imageprod_2 + '');
      $("#img-prod-crud-3").attr('src', './mvc/public/ImgProduct/' + imageprod_3 + '');
      $("#img-prod-crud-4").attr('src', './mvc/public/ImgProduct/' + imageprod_4 + '');
      $("#descript-prod").val(descript_product);

      var dtn_idCategoryCurrent = idcategory;
      $(".drop_down_cate_gory").click(function () {
        dtn_idCategoryCurrent = $(this).attr('data_id_category');
        value_category = $("#value_cate_gory_" + dtn_idCategoryCurrent + "").val();
        $(".show_value_category").val(value_category);
      })
      //gọi ajax để update
      $(".save-form-crud").click(function () {
        //lây data mới để chuẩn bị cập nhật cơ sở dữ liệu
        var dtn_name_prod = $(".name-prod").val();
        var dtn_price_prod = $(".price-prod").val();
        var dtn_brand_prod = $(".brand-prod").val();
        var dtn_sale_prod = $(".sale-prod").val();
        var dtn_descript = $("#descript-prod").val();
        var dtn_status_prod = $("input[name='status-prod']:checked").val();;
        //xử lý 4 ảnh ở đây
        var dtn_img_prod_1 = $('#file_img_1')[0].files;
        var dtn_img_prod_2 = $('#file_img_2')[0].files;
        var dtn_img_prod_3 = $('#file_img_3')[0].files;
        var dtn_img_prod_4 = $('#file_img_4')[0].files;
        var dtn_id_product = id_product;




        //kiểm tra dữ liệu trước khi lưu vào database
        if (dtn_id_product == "" || dtn_name_prod == ""
          || dtn_price_prod == "" || dtn_price_prod == ""
          || dtn_brand_prod == "" || dtn_sale_prod == ""
          || dtn_descript == "" || dtn_idCategoryCurrent == ""
        ) {
          Swal.fire({
            icon: 'error',
            title: 'Chưa nhập đủ thông tin',
            text: 'Vui lòng kiểm tra lại!',
          })
          //check sale lớn hơn 100
        } else if (dtn_sale_prod >= 100) {
          Swal.fire({
            icon: 'error',
            title: 'Mục sale không được lớn hơn 100',
            text: 'Vui lòng kiểm tra lại!',
          })
        } else {
          var fd = new FormData();
          fd.append('dtn_id_product', dtn_id_product);
          fd.append('dtn_name_prod', dtn_name_prod);
          fd.append('dtn_price_prod', dtn_price_prod);
          fd.append('dtn_brand_prod', dtn_brand_prod);
          fd.append('dtn_sale_prod', dtn_sale_prod);
          fd.append('dtn_descript', dtn_descript);
          fd.append('dtn_idCategoryCurrent', dtn_idCategoryCurrent);
          fd.append('dtn_status_prod', dtn_status_prod);
          fd.append('dtn_img_prod_1', dtn_img_prod_1[0]);
          //DTO(DATA OLD)
          fd.append('dto_img_prod_1', imageprod_1);

          fd.append('dtn_img_prod_2', dtn_img_prod_2[0]);
          fd.append('dto_img_prod_2', imageprod_2);

          fd.append('dtn_img_prod_3', dtn_img_prod_3[0]);
          fd.append('dto_img_prod_3', imageprod_3);

          fd.append('dtn_img_prod_4', dtn_img_prod_4[0]);
          fd.append('dto_img_prod_4', imageprod_4);

          console.log(dtn_img_prod_3[0]);
          $.ajax({
            url: 'http://localhost/FOODOGANICSHOP/admin/product/UpdateProductById',
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
            type: "POST",
            success: function (data) {
              // location.reload();
              if (data == 1) {
                Swal.fire({
                  position: 'top-end',
                  icon: 'success',
                  title: 'Cập nhật thành công !',
                  showConfirmButton: false,
                  timer: 1500
                })
                $(".layout_opacity").hide();
                $(".contain-form-crud").hide();
                location.reload();
              }
            }
          });
        }
      })
    })
  })

</script>
<!-- jquery xử lý thằng xoá sản phẩm -->
<script>
  $(document).ready(function () {
    $(".bt_del_prod").click(function () {
      var dtnIdProduct = $(this).attr("dt_bt_del_prod");
      Swal.fire({
        title: 'Bạn có chắc chắn muốn xoá chứ?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Xoá',
        denyButtonText: `Không xoá`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          Swal.fire('Xoá thành công!', '', 'success')
          $.ajax({
            url: 'admin/product/DeleteProductById',
            data: { dtnIdProduct: dtnIdProduct },
            type: "POST",
            success: function (data) {
              // location.reload();
              if (data == 1) {

                Swal.fire({
                  position: 'top-end',
                  icon: 'success',
                  title: 'Xoá thành công !',
                  showConfirmButton: false,
                  timer: 1500
                })

                $(".layout_opacity").hide();
                $(".contain-form-crud").hide();
                location.reload();
              }
            }
          });
        } else if (result.isDenied) {
          Swal.fire('Chưa thực hiện!', '', 'info')
        }
      })
    })
  })
</script>
<!-- jquery xử lý phần update category -->
<script>
  $(document).ready(function () {
    $(".contain-form-crud-category").hide();
    $(".btn-update-category").click(function () {
      $(".layout_opacity").show();
      $(".contain-form-crud-category").show();
      //lấy ra dữ liệu cũ
      var idCategory = $(this).attr('data-id-category');
      var name_category = $("#nameCategory_" + idCategory + "").val();
      $(".show-name-category").val(name_category);

      var descriptCategor = $('#desCategory_' + idCategory + '').val();
      $(".show-des-category").val(descriptCategor);
      var imgCategory = $("#imgCategory_" + idCategory + "").val();
      $("#img-cate-crud").attr('src', './mvc/public/ImgProduct/' + imgCategory + '');

      //lấy ra dữ liệu mới
      $(".btn-save-update-cate").click(function () {
        var dtn_name_category = $(".show-name-category").val();
        var dtn_descriptCategor = $(".show-des-category").val();
        var dtn_imgCategory = $("#file_img_cate")[0].files;
        var dto_dtn_imgCategory = imgCategory;
        //gọi ajax để update category
        var fd_cate = new FormData();
        fd_cate.append('dtn_imgCategory', dtn_imgCategory[0]);
        fd_cate.append('dtn_name_category', dtn_name_category);
        fd_cate.append('dtn_descriptCategor', dtn_descriptCategor);
        fd_cate.append('dto_imgCategory', dto_dtn_imgCategory);
        fd_cate.append('idCategory', idCategory);
        if (dtn_name_category == "" || dtn_descriptCategor == "") {
          Swal.fire({
            icon: 'error',
            title: 'Chưa điền đủ thông tin',
            text: 'Vui lòng kiểm tra lại!',
          })
        } else {
          $.ajax({
            url: 'admin/product/UpdateCategoryById',
            data: fd_cate,
            cache: false,
            processData: false,
            contentType: false,
            type: "POST",
            success: function (data) {
              if (data == 1) {
                Swal.fire({
                  position: 'top-end',
                  icon: 'success',
                  title: 'Cập nhật thành công !',
                  showConfirmButton: false,
                  timer: 1500
                })
                $(".layout_opacity").hide();
                $(".contain-form-crud-category").hide();
                setTimeout(function () { window.location.reload(1); }, 1200);
              } else {
                alert(data);
              }
            }
          });
        }
      })

    })
    $(".btn-cancel-update-cate").click(function () {
      $(".layout_opacity").hide();
      $(".contain-form-crud-category").hide();
    })
  })
</script>
<!-- jquery xử lý phần add category -->
<script>
  $(document).ready(function () {
    $(".btn-add-category").click(function () {
      var dtna_name_category = $(".name-category").val();
      var dtna_des_category = $(".des-category").val();
      var dtna_img_category = $("#img-category-a")[0].files;
      // console.log(dtna_img_category);
      if (dtna_name_category == "" || dtna_des_category == "") {
        Swal.fire({
          icon: 'error',
          title: 'Chưa đầy đủ thông tin',
          text: 'Vui lòng kiểm tra lại!'
        })
      } else {
        var fd_is_cate = new FormData();
        fd_is_cate.append('dtna_name_category', dtna_name_category);
        fd_is_cate.append('dtna_des_category', dtna_des_category);
        fd_is_cate.append('dtna_img_category', dtna_img_category[0]);
        $.ajax({
          url: 'admin/product/InsertCategoryProduct',
          data: fd_is_cate,
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
                title: 'Thêm thành công !',
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
<!-- jquert xử lý phần xoá category -->
<script>
  $(document).ready(function () {
    $(".btn-del-category").click(function () {
      var dtd_category = $(this).attr('data-id-category');
      if (dtd_category == 8) {
        Swal.fire({
          icon: 'error',
          title: 'Không thể xoá mục này',
          text: 'Mục này là mục mặc định, hệ thống. Không được phép xoá!'
        })
      } else {
        Swal.fire({
          title: 'Bạn có chắc muốn xoá sản phẩm này chứ?',
          showDenyButton: true,
          showCancelButton: true,
          confirmButtonText: 'Xoá',
          denyButtonText: `Huỷ tác vụ`,
        }).then((result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            $.ajax({
              url: 'admin/product/DeleteCategoryById',
              data: { dtd_category: dtd_category },
              type: "POST",
              success: function (data) {
                // location.reload();
                if (data == 1) {
                  Swal.fire('Xoá thành công!', '', 'success')
                  setTimeout(function () { window.location.reload(1); }, 1200);
                }
                else {
                  alert(data)
                }
              }
            });
          } else if (result.isDenied) {
            Swal.fire('Thao tác chưa thực hiện', '', 'info')
          }
        })
      }
    })
  })
</script>
<!-- jquery xử lý tìm kiếm sản phẩm theo danh mục -->
<script>
  $(document).ready(function () {
    $(".find_prod_by_cate").click(function () {
      var fidCategory = $(this).attr('data_id_category');
      if (fidCategory == 0) {
      } else {
        $.ajax({
          url: 'admin/product/FindProductByIdcategory',
          data: { fidCategory: fidCategory },
          type: "POST",
          success: function (data) {
            if (data != "") {
              //apend html cho table;
              $htm_data_prod_by_id_cate = data;
              $("#prod_by_id_category").html($htm_data_prod_by_id_cate);
            }
          }
        });
      }
    })
  })
</script>
<!-- jquery xử lý thêm sản phẩm nổi bật nhất -->
<script>
  $(document).ready(function () {
    $(".cancel-live-search").click(function () {
      $(".contain-add-special-prod").hide();
      $(".layout_opacity").hide();

    })
    $(".contain-add-special-prod").hide();
    $(".btn-add-special-prod").click(function () {
      $(".layout_opacity").show();
      $(".contain-add-special-prod").show();
      $("#live-search-prod").keypress(function () {
        var input = $(this).val();
        if (input == "") {
          $("#tbd-live-search").html("");
        } else {
          $.ajax({
            url: 'admin/product/LiveSearch',
            type: 'POST',
            data: { input: input },
            success: function (data) {
              $("#tbd-live-search").html(data);
              $(".btn-chosse-special-prod").click(function () {
                data_id_prod = $(this).attr('data-id-prod');
                alert(data_id_prod);
                //sửa cột speicl cho nó
                Swal.fire({
                  title: 'Bạn có muốn đưa sản phẩm này thành sản phẩm nổi bật?',
                  showDenyButton: true,
                  showCancelButton: true,
                  confirmButtonText: 'Lưu',
                  denyButtonText: `Huỷ bỏ`,
                }).then((result) => {
                  /* Read more about isConfirmed, isDenied below */
                  if (result.isConfirmed) {
                    $.ajax({
                      url: 'admin/product/AddSpecialProd',
                      type: 'POST',
                      data: { data_id_prod: data_id_prod },
                      success: function (data) {
                        if (data == 1) {
                          Swal.fire('Thành công!', '', 'success');
                          setTimeout(function () { window.location.reload(1); }, 1200);
                        } else {
                          alert(data);
                        }
                      }
                    })
                  } else if (result.isDenied) {
                    Swal.fire('Thao tác đã được huỷ', '', 'info')
                  }
                })
              })
            }
          })
        }

      })
    })
  })
</script>
<!-- jquery xử lý xoá khỏi danh sách đặc biệt -->
<script>
  $(document).ready(function () {
    $(".btn-del-special-prod").click(function () {
      data_id_prod = $(this).attr('data-id-prod');
      Swal.fire({
        title: 'Bạn có chắc muốn xoá sản phẩm khỏi dánh sách sản phẩm đặc biệt chú?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Đồng ý',
        denyButtonText: `Huỷ bỏ`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          $.ajax({
            url: 'admin/product/DelSpecialProduct',
            type: 'POST',
            data: { data_id_prod: data_id_prod },
            success: function (data) {
              if (data == 1) {
                Swal.fire('Xoá thành công!', '', 'success')
                setTimeout(function () { window.location.reload(1); }, 1000);
              }
            }
          })
        } else if (result.isDenied) {
          Swal.fire('Thao tác chưa thực hiện', '', 'info')
        }
      })
    })
  })
</script>
<!-- jquert xử lý add sản phẩm gương mặt của cửa hàng -->
<script>
  $(document).ready(function () {
    $(".cancel-live-search-the-face").click(function () {
      $(".contain-add-the-face-prod").hide();
      $(".layout_opacity").hide();
    })
    $(".contain-add-the-face-prod").hide();
    $(".btn-the-face-shop").click(function () {
      $(".contain-add-the-face-prod").show();
      $(".layout_opacity").show();

      $("#live-search-prod-the-face").keypress(function () {
        var input = $(this).val();
        if (input == "") {
          $("#tbd-live-search-the-face").html("");
        } else {
          $.ajax({
            url: 'admin/product/LiveSearch',
            type: 'POST',
            data: { input: input },
            success: function (data) {
              $("#tbd-live-search-the-face").html(data);
              $(".btn-chosse-special-prod").click(function () {
                data_id_prod = $(this).attr('data-id-prod');
                alert(data_id_prod);
                //sửa cột speicl cho nó
                Swal.fire({
                  title: 'Bạn có muốn đưa sản phẩm này thành sản phẩm tiêu biểu của shop?',
                  showDenyButton: true,
                  showCancelButton: true,
                  confirmButtonText: 'Lưu',
                  denyButtonText: `Huỷ bỏ`,
                }).then((result) => {
                  /* Read more about isConfirmed, isDenied below */
                  if (result.isConfirmed) {
                    $.ajax({
                      url: 'admin/product/AddTheFaceProd',
                      type: 'POST',
                      data: { data_id_prod: data_id_prod },
                      success: function (data) {
                        if (data == 1) {
                          Swal.fire('Thành công!', '', 'success');
                          setTimeout(function () { window.location.reload(1); }, 1200);
                        } else {
                          alert(data);
                        }
                      }
                    })
                  } else if (result.isDenied) {
                    Swal.fire('Thao tác đã được huỷ', '', 'info')
                  }
                })
              })
            }
          })
        }

      })
    })
  })
</script>
<!-- jquery xử lý xoá khỏi danh sách sản phẩm tiêu biểu của shop -->
<script>
  $(document).ready(function () {
    $(".btn-del-the-face-prod").click(function () {
      data_id_prod = $(this).attr('data-id-prod');
      alert(data_id_prod);
      Swal.fire({
        title: 'Bạn có chắc muốn xoá sản phẩm khỏi dánh sách sản phẩm đặc biệt chú?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Đồng ý',
        denyButtonText: `Huỷ bỏ`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          $.ajax({
            url: 'admin/product/DelSpecialProduct',
            type: 'POST',
            data: { data_id_prod: data_id_prod },
            success: function (data) {
              if (data == 1) {
                Swal.fire('Xoá thành công!', '', 'success')
                setTimeout(function () { window.location.reload(1); }, 1000);
              }
            }
          })
        } else if (result.isDenied) {
          Swal.fire('Thao tác chưa thực hiện', '', 'info')
        }
      })
    })
  })

</script>


<!-- nơi đây để thêm sản phẩm nổi bật nhất(live-search) -->
<div class="contain-add-special-prod">
  <button type="button" class="btn btn-inverse-danger btn-fw cancel-live-search">Huỷ bỏ</button>
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Thêm sản phẩm nổi bật</h4>
        <p class="card-description">Tìm kiếm <code>Và lựa chọn sản phẩm mà bạn mong muốn</code></p>
        <div class="template-demo">
          <div class="form-group">
            <div class="input-group">
              <input type="text" class="form-control" id="live-search-prod" placeholder="Nhập tên sản phẩm"
                aria-label="Recipient's username">
              <div class="input-group-append">
                <button class="btn btn-sm btn-primary" type="button">Tìm kiếm</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-12 grid-margin stretch-card" style="margin-top: -120px">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh sản phẩm</th>
                <th>Chọn</th>
              </tr>
            </thead>
            <tbody id="tbd-live-search">


            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- nơi đây để thêm sản phẩm tiêu biểu của shop(live-search) -->
<div class="contain-add-the-face-prod">
  <button type="button" class="btn btn-inverse-danger btn-fw cancel-live-search-the-face">Huỷ bỏ</button>
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Thêm sản phẩm tiêu biểu của shop</h4>
        <p class="card-description">Tìm kiếm <code>Và lựa chọn sản phẩm mà bạn mong muốn</code></p>
        <div class="template-demo">
          <div class="form-group">
            <div class="input-group">
              <input type="text" class="form-control" id="live-search-prod-the-face" placeholder="Nhập tên sản phẩm"
                aria-label="Recipient's username">
              <div class="input-group-append">
                <button class="btn btn-sm btn-primary" type="button">Tìm kiếm</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-12 grid-margin stretch-card" style="margin-top: -120px">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh sản phẩm</th>
                <th>Chọn</th>
              </tr>
            </thead>
            <tbody id="tbd-live-search-the-face">


            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="layout_opacity"></div>
<form id="form_crud_category" method="post" action="" enctype="multipart/form-data">
  <div class="contain-form-crud-category">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Cập nhật danh mục sản phẩm</h4>
          <p class="card-description">
            Lưu ý điền đủ thông tin <code>, tránh trường hợp xảy ra lỗi</code> và <code>Thiếu thông tin</code>.
          </p>
          <div class="form-group">
            <label>Tên danh mục: </label>
            <input type="text" class="form-control form-control-lg show-name-category" placeholder="Tên danh mục"
              aria-label="Username">
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">Giới thiệu danh mục</label>
            <textarea class="form-control show-des-category" id="exampleTextarea1" rows="4"></textarea>
          </div>
          <div class="form-group">
            <label>Ảnh giới thiệu danh mục</label>
            <input type="file" name="img[]" class="file-upload-default">
            <div class="input-group col-xs-12">
              <input type="file" class="file_img_cate" id="file_img_cate" name="file_img_cate"
                onchange="document.getElementById('img-cate-crud').src = window.URL.createObjectURL(this.files[0])">
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="contain-button-img">
      <img src="" alt="" id="img-cate-crud">
      <div class="contain-button">
        <button type="button" class="btn btn-success btn-save-update-cate">Lưu thay đổi</button>
        <button type="button" class="btn btn-danger btn-cancel-update-cate">Huỷ</button>
      </div>
    </div>

  </div>
</form>
<!-- form thêm, update sản phẩm nằm ở đây -->
<form id="form_crud_prod" method="post" action="" enctype="multipart/form-data">
  <div class="contain-form-crud">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title" id="card-title">Thêm sản phẩm</h4>
          <p class="card-description">
            Vui lòng nhập đầy đủ các thông tin sản phẩm
          </p>
          <!-- tên sản phẩm -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text bg-primary text-white">Tên sản phẩm: </span>
              </div>
              <input type="text" class="form-control name-prod" name="name-prod">
              <div class="input-group-append">
                <span class="input-group-text">(abc)</span>
              </div>
            </div>
          </div>
          <!-- giá sản phẩm -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text bg-primary text-white">Giá sản phẩm: </span>
              </div>
              <input type="text" class="form-control price-prod" name="price-prod">
              <div class="input-group-append">
                <span class="input-group-text">VNĐ</span>
              </div>
            </div>
          </div>
          <!-- nguồn góc sản phẩm -->
          <div class="form-group">
            <div class="input-group">
              <input type="text" class="form-control brand-prod" name="brand-prod"
                placeholder="nhập nguồn góc sản phẩm">
              <div class="input-group-append">
                <button class="btn btn-sm btn-primary" type="button">Nguồn góc</button>
              </div>
            </div>
          </div>
          <!-- danh mục sản phẩm -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">Danh mục sản phẩm</button>
                <div class="dropdown-menu">
                  <!-- đổ danh mục sản phẩm ra ở đây -->
                  <?php
                      if(isset($data['set_cate_product_admin'])){
                        $sumCate = 1;
                        $set_cate_product_admin = $data["set_cate_product_admin"];
                        foreach($set_cate_product_admin as $key => $value){
                          $sumCate++;
                          foreach($value as $k => $vl){
                              echo '<input type="hidden" id="value_cate_gory_'.$set_cate_product_admin[$key]['idCategory'].'" name="" value="'.$set_cate_product_admin[$key]['nameCategory'].'"/>
                              <a class="dropdown-item drop_down_cate_gory" id="drop_down_cate_gory" data_id_category='.$set_cate_product_admin[$key]['idCategory'].' href="javascript:value(0)">'. $set_cate_product_admin[$key]['nameCategory'].'</a>';
                          break;
                          }
                      }
                      echo '<h3 class="dropdown-header">Tổng danh mục: '.$sumCate.'</h3>';
                      }
                      ?>
                </div>
              </div>
              <input type="text" class="form-control show_value_category">
            </div>
          </div>
          <!-- sale -->
          <div class="form-group">
            <div class="input-group">
              <input type="text" class="form-control sale-prod" placeholder="Nhập phần trăm sale">
              <div class="input-group-append">
                <button class="btn btn-sm btn-facebook" type="button">
                  <i class="mdi mdi-shopping"> Sale(Giảm giá) theo phần trăm</i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <!-- tinh trang sản phẩm -->
          <button type="button" class="btn btn-primary">Tình trạng sản phẩm</button>
          <div class="col-md-6">
            <div class="form-group">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="status-prod" id="conhang" value="1">
                  Còn hàng
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="status-prod" id="hethang" value="0" checked>
                  Hết hàng
                </label>
              </div>
            </div>
          </div>
          <!-- giới thiệu sản phẩm -->
          <div class="form-group">
            <label for="exampleTextarea1">Giới thiệu sản phẩm</label>
            <textarea class="form-control" id="descript-prod" rows="4"></textarea>
          </div>
          <!-- các ảnh của sản phẩm -->
          <div class="contain-img-prod-crud">
            <div class="contain-img-prod-1">
              <input type="file" class="file_img file_img_1" id="file_img_1" name="file_img_1"
                onchange="document.getElementById('img-prod-crud-1').src = window.URL.createObjectURL(this.files[0])">
              <img id="img-prod-crud-1" id="img-prod-crud-1" src="" alt="">
            </div>
            <div class="contain-img-prod-2">
              <input type="file" class="file_img file_img_2" id="file_img_2" name="file_img_2"
                onchange="document.getElementById('img-prod-crud-2').src = window.URL.createObjectURL(this.files[0])">
              <img id="img-prod-crud-2" id="img-prod-crud-2" src="" alt="">
            </div>
            <div class="contain-img-prod-3">
              <input type="file" class="file_img file_img_3" id="file_img_3" name="file_img_3"
                onchange="document.getElementById('img-prod-crud-3').src = window.URL.createObjectURL(this.files[0])">
              <img id="img-prod-crud-3" id="img-prod-crud-3" src="" alt="">
            </div>
            <div class="contain-img-prod-4">
              <input type="file" class="file_img file_img_4" id="file_img_4" name="file_img_4"
                onchange="document.getElementById('img-prod-crud-4').src = window.URL.createObjectURL(this.files[0])">
              <img id="img-prod-crud-4" id="img-prod-crud-4" src="" alt="">
            </div>
          </div>
          <!-- nút lưu và huỷ -->
          <button type="button" class="btn btn-primary save-form-crud">Lưu cập nhật</button>
          <button type="button" class="btn btn-primary save-insert-crud">Thêm sản phẩm</button>
          <button type="button" class="btn btn-danger cancel-form-crud">Huỷ bỏ</button>
        </div>
      </div>
    </div>
</form>

</div>

<div class="main-panel container_main">
  <div class="content-wrapper">
    <!-- quant lý các loại doanh mục -->
    <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Danh mục sản phẩm</h4>
            <p class="card-description">
              tất cả các danh mục sản phẩm của bạn
            </p>
            <div class="row">
              <div class="col-12">
                <div class="template-demo d-flex justify-content-between flex-wrap">
                  <div class="dropdown">
                    <button type="button" class="btn btn-dark dropdown-toggle" id="dropdownMenuIconButton7"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Danh mục
                      <i class="mdi mdi-checkbox-multiple-blank-outline"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton7">
                      <!-- lấy danh mục từ database ra ở đây -->
                      <?php
                      if(isset($data['set_cate_product_admin'])){
                        $sumCate = 0;
                        $set_cate_product_admin = $data["set_cate_product_admin"];
                        foreach($set_cate_product_admin as $key => $value){
                          $sumCate++;
                          foreach($value as $k => $vl){
                              echo '<a class="dropdown-item" href="#">'. $set_cate_product_admin[$key]['nameCategory'].'</a>';
                          break;
                          }
                      }
                      echo '<h3 class="dropdown-header">Tổng danh mục: '.$sumCate.'</h3>';
                      }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Thêm danh mục</h4>
            <p class="card-description">
              Thêm danh mục <code> lưu ý</code> phải điền đủ các thông tin ở trong form, tránh trường
              hợp thiếu thông tin, có thể xảy ra lôi
            </p>

            <form class="form-inline">
              <label class="sr-only" for="inlineFormInputName2">Name</label>
              <input type="text" class="form-control mb-2 mr-sm-2 name-category" id="inlineFormInputName2"
                placeholder="Tên danh mục">

              <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
              <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend">
                  <div class="input-group-text bg-primary text-white">...</div>
                </div>
                <input type="text" class="form-control des-category" id="inlineFormInputGroupUsername2"
                  placeholder="Giới thiệu danh mục">
              </div>
              <div class="form-group">
                <input type="file" name="img[]" class="file-upload-default img-category-a" id="img-category-a">
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" disabled placeholder="Tìm trong thư mục">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-primary" type="button">Thêm ảnh giới thiệu danh
                      mục</button>
                  </span>
                </div>
              </div>
              <button type="button" style="margin-top: 20px" class="btn btn-primary mb-2 btn-add-category">Hoàn
                thành</button>
            </form>
          </div>
        </div>
      </div>

      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Bảng thống kê số lượng các mặt hàng</h4>
            <canvas id="myChart"></canvas>
          </div>
        </div>
      </div>

    </div>

    <!-- bang quan ly toan bo san pham -->
    <div class="row all_prod">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Thống kê toàn bộ sản phẩm</h4>
            <p class="card-description">
              Toàn bộ sản phẩm trong shop <code>Tìm kiếm theo danh mục</code>
            </p>
            <div class="btn-group">
              <button type="button" class="btn btn-success">Tìm kiếm theo danh mục</button>
              <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split"
                id="dropdownMenuSplitButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuSplitButton3">
                <!-- lấy danh mục từ database ra ở đây -->
                <?php
                      if(isset($data['set_cate_product_admin'])){
                        $sumCate = 1;
                        $set_cate_product_admin = $data["set_cate_product_admin"];
                        echo '<a class="dropdown-item find_prod_by_cate" data_id_category =0 href="javascript:value(0)">Tất cả</a>';
                        foreach($set_cate_product_admin as $key => $value){
                          $sumCate++;
                          foreach($value as $k => $vl){
                              echo '<a class="dropdown-item find_prod_by_cate" href="javascript:value(0)" data_id_category='. $set_cate_product_admin[$key]['idCategory'].'>'. $set_cate_product_admin[$key]['nameCategory'].'</a>';
                          break;
                          }
                      }
                      echo '<h3 class="dropdown-header">Tổng danh mục: '.$sumCate.'</h3>';
                      }
                ?>
              </div>
            </div>
            <button type="button" class="btn btn-inverse-primary btn-fw add-currenly-product">Thêm Sản Phẩm</button>
            <div class="table-responsive" id="tbl_all_prod">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>
                      Id:
                    </th>
                    <th>
                      Cập nhật
                    </th>
                    <th>
                      Ẩn đi
                    </th>
                    <th>
                      Xoá
                    </th>
                    <th>
                      Tên sản phẩm:
                    </th>
                    <th>
                      Ảnh thứ 1
                    </th>
                    <th>
                      Ảnh thứ 2
                    </th>
                    <th>
                      Ảnh thứ 3
                    </th>
                    <th>
                      Ảnh thứ 4
                    </th>

                    <th>
                      Giá:
                    </th>
                    <th>
                      Nguồn gốc
                    </th>
                    <th>
                      Danh mục:
                    </th>
                    <th>
                      Trạng thái:
                    </th>
                    <th>
                      Giới thiệu:
                    </th>
                    <th>
                      Sale:
                    </th>

                  </tr>
                </thead>
                <tbody id="prod_by_id_category">
                  <!-- thêm các prod vào bảng ở đây -->
                  <?php
                 if(isset($data['set_product_admin'])){
                   $set_product_admin = $data['set_product_admin'];
                   foreach($set_product_admin as $key => $value){
                    $sumCate++;
                    foreach($value as $k => $vl){
                        echo '<tr>
                        <td>
                        '.$set_product_admin[$key]['idProduct'].'
                        </td>
                        <td>
                        <button type="button"  dt_bt_update_prod ='.$set_product_admin[$key]['idProduct'].' class="btn btn-primary btn-rounded btn-icon bt_update_prod">
                        <i class="mdi mdi-auto-fix"></i>
                         </button>
                        </td>
                        <td>
                        <button type="button" class="btn btn-success btn-rounded btn-icon ">
                        <i class="mdi mdi-cart-off"></i>
                      </button
                        </td>
                        <td>
                        <button type="button" class="btn btn-danger btn-rounded btn-icon bt_del_prod" dt_bt_del_prod='.$set_product_admin[$key]['idProduct'].'>
                        <i class="mdi mdi-close-circle"></i>
                      </button>
                        </td>
                        <td>
                        <input type="hidden" id="nameprod_'.$set_product_admin[$key]['idProduct'].'" value= "'.$set_product_admin[$key]['nameProduct'].'">
                        '.$set_product_admin[$key]['nameProduct'].'
                        </td>
                        <td class="py-1">
                        <input type="hidden" id="imageprod_1_'.$set_product_admin[$key]['idProduct'].'" value= "'.$set_product_admin[$key]['imgProd1'].'">
                          <img src="./mvc/public/ImgProduct/'.$set_product_admin[$key]['imgProd1'].'" alt="image" />
                        </td>
                        <td class="py-1">
                        <input type="hidden" id="imageprod_2_'.$set_product_admin[$key]['idProduct'].'" value= "'.$set_product_admin[$key]['imgProd2'].'">
                        <img src="./mvc/public/ImgProduct/'.$set_product_admin[$key]['imgProd2'].'" alt="image" />
                      </td>
                      <td class="py-1">
                      <input type="hidden" id="imageprod_3_'.$set_product_admin[$key]['idProduct'].'" value= "'.$set_product_admin[$key]['imgProd3'].'">
                      <img src="./mvc/public/ImgProduct/'.$set_product_admin[$key]['imgProd3'].'" alt="image" />
                    </td>
                    <td class="py-1">
                    <input type="hidden" id="imageprod_4_'.$set_product_admin[$key]['idProduct'].'" value= "'.$set_product_admin[$key]['imgProd4'].'">
                    <img src="./mvc/public/ImgProduct/'.$set_product_admin[$key]['imgProd4'].'" alt="image" />
                  </td>
                        <td>
                        <input type="hidden" id="priceprod_'.$set_product_admin[$key]['idProduct'].'" value= "'.$set_product_admin[$key]['priceProduct'].'">
                        '.$set_product_admin[$key]['priceProduct'].'
                        </td>
                        <td>
                        <input type="hidden" id="brand_'.$set_product_admin[$key]['idProduct'].'" value= "'.$set_product_admin[$key]['brand'].'">
                        '.$set_product_admin[$key]['brand'].'
                        </td>
                        <td>
                        <input type="hidden" id="idcategory_'.$set_product_admin[$key]['idProduct'].'" value= "'.$set_product_admin[$key]['idCategory'].'">
                        '.$set_product_admin[$key]['nameCategory'].'
                        </td>

                        <td>
                        <input type="hidden" id="status_'.$set_product_admin[$key]['idProduct'].'" value= "'.$set_product_admin[$key]['status'].'">
                        '; if($set_product_admin[$key]['status'] == 0){echo "<p style='color:red'>Hết hàng</p>";} else{echo "<p style='color:green'>Còn hàng</p>";} echo'
                        </td>

                        <td>
                        <input type="hidden" id="descript_product_'.$set_product_admin[$key]['idProduct'].'" value= "'.$set_product_admin[$key]['descriptProduct'].'">
                        '.$set_product_admin[$key]['descriptProduct'].'
                        </td>
                        <td>
                        <input type="hidden" id="sale_'.$set_product_admin[$key]['idProduct'].'" value= "'.$set_product_admin[$key]['sale'].'">
                        '.$set_product_admin[$key]['sale'].'
                        </td>
                      </tr>';
                    break;
                    }
                 }
                 }
                 ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- bảng thống kê danh mục sản phẩm -->
    <div class="row">
      <div class="col-lg-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Thống kê tất cả các danh mục trong shop</h4>
            <p class="card-description">
              Lưu ý các phương thức sửa đổi <code>PHẢI ĐẦY ĐỦ THÔNG TIN</code>
            </p>
            <div class="table-responsive pt-3">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>
                      #Id
                    </th>
                    <th>
                      Cập nhật
                    </th>
                    <th>
                      Ẩn
                    </th>
                    <th>
                      Xoá
                    </th>
                    <th>
                      Tên danh mục
                    </th>
                    <th>
                      Giới thiệu danh mục
                    </th>
                    <th>
                      Ảnh giới thiệu
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <!-- các dữ liệu của doanh mục thêm ở đây -->
                  <?php
                  if(isset($data['set_cate_product_admin'])){
                    $set_cate_product_admin = $data['set_cate_product_admin'];
                    foreach($set_cate_product_admin as $key => $value){
                      $sumCate++;
                      foreach($value as $k => $vl){
                          echo ' <tr class="table-info">
                          <td>
                            '.$set_cate_product_admin[$key]['idCategory'].'
                          </td>
                          <td>
                          <button type="button" class="btn btn-primary btn-rounded btn-icon btn-update-category" data-id-category='.$set_cate_product_admin[$key]['idCategory'].'>
                          <i class="mdi mdi-auto-fix"></i>
                           </button>
                          </td>
                          <td>
                          <button type="button" class="btn btn-success btn-rounded btn-icon "    >
                          <i class="mdi mdi-cart-off"></i>
                        </button
                          </td>
                          <td>
                          <button type="button" class="btn btn-danger btn-rounded btn-icon btn-del-category" data-id-category='.$set_cate_product_admin[$key]['idCategory'].'>
                          <i class="mdi mdi-close-circle"></i>
                        </button>
                          </td>
                          <td>
                          <input type = "hidden" id="nameCategory_'.$set_cate_product_admin[$key]['idCategory'].'" value="'.$set_cate_product_admin[$key]['nameCategory'].'"/>
                          '.$set_cate_product_admin[$key]['nameCategory'].'
                          </td>
                          <td>
                          <input type = "hidden" id="desCategory_'.$set_cate_product_admin[$key]['idCategory'].'" value="'.$set_cate_product_admin[$key]['reviewCate'].'"/>
                          '.$set_cate_product_admin[$key]['reviewCate'].'
                          </td>
                          <td>
                          <input type = "hidden" id="imgCategory_'.$set_cate_product_admin[$key]['idCategory'].'" value="'.$set_cate_product_admin[$key]['imgCategory'].'"/>
                          <img src="./mvc/public/ImgProduct/'.$set_cate_product_admin[$key]['imgCategory'].'" alt="image" />
                          </td>
                        </tr>';
                      break;
                      }
                  }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- phân loại mặt hàng tốt nhất -->
    <div class="row">
      <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Mặt hàng xuất hiện ưu tiên</h4>

            <p class="card-description">
              Các mặt hàng này khi được thiết lập sẽ được xuất hiện đầu, để <code>người mua thấy đầu tiên</code>
            </p>
            <button type="button" class="btn btn-primary btn-rounded btn-fw btn-add-special-prod">Thêm vào trường
              này</button>

            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Tên mặt hàng</th>
                    <th>Ảnh</th>
                    <th>Xoá</th>
                  </tr>
                </thead>

                <tbody>
                  <!-- các mặt hàng được thêm vào nhóm mặt hàng nổi bật nằm ở đây -->
                  <?php
                  if(isset($data['set_special_product_admin'])){
                    $set_special_product_admin = $data['set_special_product_admin'];
                    foreach($set_special_product_admin as $key => $value){      
                      foreach($value as $k => $vl){
                             echo '<tr>
                              <td>'.$set_special_product_admin[$key]['idProduct'].'</td>
                              <td>'.$set_special_product_admin[$key]['nameProduct'].'</td>
                              <td><img src="./mvc/public/ImgProduct/'.$set_special_product_admin[$key]['imgProd1'].'" width="40px" height="40px"/> </td>
                              <td><button type="button" class="btn btn-inverse-danger btn-sm btn-del-special-prod" data-id-prod='.$set_special_product_admin[$key]['idProduct'].'>Huỷ bỏ</button></td>
                            </tr>';
                            break;

                      }
                    }
                  }
                  ?>
                </tbody>

              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Các mặt hàng mua nhiều nhất, là mặt hàng tượng trưng cho shop.</h4>
            <p class="card-description">
              Mặt hàng này cũng sẽ xuất hiện nhiều <code>, chú ý chọn mặt hàng phù hợp</code>
            </p>
            <button type="button" class="btn btn-info btn-the-face-shop">Thêm vào trường này</button>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Tên mặt hàng</th>
                    <th>Ảnh</th>
                    <th>Xoá</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if(isset($data['set_the_face_product_admin'])){
                    $set_the_face_product_admin = $data['set_the_face_product_admin'];
                    foreach($set_the_face_product_admin as $key => $value){      
                      foreach($value as $k => $vl){
                             echo '<tr>
                              <td>'.$set_the_face_product_admin[$key]['idProduct'].'</td>
                              <td>'.$set_the_face_product_admin[$key]['nameProduct'].'</td>
                              <td><img src="./mvc/public/ImgProduct/'.$set_the_face_product_admin[$key]['imgProd1'].'" width="40px" height="40px"/> </td>
                              <td><button type="button" class="btn btn-inverse-danger btn-sm btn-del-the-face-prod" data-id-prod='.$set_the_face_product_admin[$key]['idProduct'].'>Huỷ bỏ</button></td>
                            </tr>';
                            break;

                      }
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- phân loại mặt hàng mới nhất -->
    <!-- mặt hàng nổi bậts -->
  </div>
</div>

<!-- thống kê sản phẩm bar chart -->
<script>
  $(document).ready(function () {
    labels_category = [];
    data_sum_prod_cate = [];
    $.ajax({
      url: 'admin/product/AllCategory',
      type: "GET",
      dataType: 'json',
      data: { get_param: 'value' },
      success: function (data) {
        for (i = 0; i < Object.keys(data).length; i++) {
          labels_category.push(data[i].nameCategory);

          let Idcategory = data[i].idCategory;
          $.ajax({
            url: 'admin/product/SumProdCate',
            data: { Idcategory: Idcategory },
            type: "POST",
            dataType: 'json',
            success: function (data) {
              for (i = 0; i < Object.keys(data).length; i++) {
                data_sum_prod_cate.push(data[i].sumprodcate);
              }
            }
          });

        }
        console.log(data_sum_prod_cate);

        console.log(labels_category);
      }
    });
    const data = {
      labels: labels_category,
      datasets: [{
        label: '#click vào để xem thống kê các loại mặt hàng',
        data: data_sum_prod_cate,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1,
        fill: false
      }]
    };


    const config = {
      type: 'bar',
      data: data,
      options: {}
    };
    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    );
  })
</script>
<!-- thống kế sản phẩm circle char -->