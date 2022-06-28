<link rel="stylesheet" href="./mvc/public/user/css/cssshop/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="./mvc/public/user/css/cssshop/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="./mvc/public/user/css/cssshop/elegant-icons.css" type="text/css">
<link rel="stylesheet" href="./mvc/public/user/css/cssshop/nice-select.css" type="text/css">
<link rel="stylesheet" href="./mvc/public/user/css/cssshop/jquery-ui.min.css" type="text/css">
<link rel="stylesheet" href="./mvc/public/user/css/cssshop/owl.carousel.min.css" type="text/css">
<link rel="stylesheet" href="./mvc/public/user/css/cssshop/slicknav.min.css" type="text/css">
<link rel="stylesheet" href="./mvc/public/user/css/cssshop/style.css" type="text/css">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


 <!-- phần chi tiết sản phẩm -->
 <style>
    .header {
        position: absolute;
    }
</style>
<script>
    $(document).ready(function () {
        $(".btn-add-card").click(function(){
            var id_prod = $(this).attr('data-id-prod');
            var val_count_prod = $("#val-sum-prod").val();
            $.ajax({
                url: 'detailProd/AddToCard',
                type: "POST",
                data: { id_prod: id_prod, val_count_prod:val_count_prod },
                success: function (data) {
                    if(data==false){
                      Swal.fire('Bạn phải đăng nhập đã !!!');
                      setTimeout(function () { window.location.href = 'login'; }, 1200);
                    }else{
                        if(data==1){
                            Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Thêm giỏ hàng thành công !',
                            showConfirmButton: false,
                            timer: 1500
                         })
                        }else{
                            alert(data);
                        }
                    }
                }
            })
        })
    })
</script>
    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                            <?php
                            if(isset($data['set_detail_product'])){
                                $set_detail_product  = $data['set_detail_product'];
                                foreach($set_detail_product as $key => $value){
                                    foreach($value as $k => $vl){
                                        echo '  src="./mvc/public/ImgProduct/'.$set_detail_product[$key]['imgProd1'].'" alt="">
                                        </div>
                                        <div class="product__details__pic__slider owl-carousel">
                                            
                                            <img data-imgbigurl="./mvc/public/ImgProduct/'.$set_detail_product[$key]['imgProd1'].'"
                                                src="./mvc/public/ImgProduct/'.$set_detail_product[$key]['imgProd1'].'" alt="">
                                            <img data-imgbigurl="./mvc/public/ImgProduct/'.$set_detail_product[$key]['imgProd2'].'"
                                                src="./mvc/public/ImgProduct/'.$set_detail_product[$key]['imgProd2'].'" alt="">
                                            <img data-imgbigurl="./mvc/public/ImgProduct/'.$set_detail_product[$key]['imgProd3'].'"
                                                src="./mvc/public/ImgProduct/'.$set_detail_product[$key]['imgProd3'].'" alt="">
                                            <img data-imgbigurl="./mvc/public/ImgProduct/'.$set_detail_product[$key]['imgProd4'].'"
                                                src="./mvc/public/ImgProduct/'.$set_detail_product[$key]['imgProd4'].'" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="product__details__text">
                                        <h3>'.$set_detail_product[$key]['nameProduct'].'</h3>
                                        <div class="product__details__rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <span>(18 reviews)</span>
                                        </div>
                                        <div class="product__details__price">'.number_format($set_detail_product[$key]['priceProduct']).' đồng</div>
                                        <p>'.$set_detail_product[$key]['reviewCate'].'</p>
                                        <div class="product__details__quantity">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" id="val-sum-prod" value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <a href="javascript:value(0)" class="primary-btn btn-add-card" data-id-prod='.$set_detail_product[$key]['idProduct'].'>Thêm vào giỏ</a>
                                        <ul>
                                            <li><b>Thuộc danh mục: </b> <span>'.$set_detail_product[$key]['nameCategory'].'</span></li>
                                            <li><b>Nguồn góc: </b> <span>'.$set_detail_product[$key]['brand'].'</samp></span></li>
                                            <li><b>Trạng thái: </b> <span>'; if($set_detail_product[$key]['status'] == 1){
                                                echo "Còn hàng";
                                            }else{
                                                echo "Hết hàng";
                                            } echo'</span></li>
                                           
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="product__details__tab">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                                    aria-selected="true">Chi tiết sản phẩm</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                                <div class="product__details__tab__desc">
                                                    <h6>Thông tin về sản phẩm của chúng tôi</h6>
                                                    <p>'.$set_detail_product[$key]['descriptProduct'].'</p>
                                                </div>
                                            </div>';
                                        break;
                                    }}
                            }
                            ?>
                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- phần sản phẩm liên quan -->
    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Các sản phẩm liên quan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- các sản phẩm liên quan nằm ở đây -->
                <?php
                if(isset($data['set_relative_product'])){
                    if($data['set_relative_product'] != ""){
                        $set_relative_product= $data['set_relative_product'];
                        foreach($set_relative_product as $key => $value){
                            foreach($value as $k => $vl){
                                echo ' <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="./mvc/public/ImgProduct/'.$set_relative_product[$key]['imgProd1'].'">
                                        <ul class="product__item__pic__hover">
                                            <li><a href="detailProd/sanpham/'.$set_relative_product[$key]['slug'].'/'.$set_relative_product[$key]['idProduct'].'"><i class="fa fa-shopping-cart"></i></a></li>
                                           
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="detailProd/sanpham/'.$set_relative_product[$key]['slug'].'/'.$set_relative_product[$key]['idProduct'].' ">'.$set_relative_product[$key]['nameProduct'].'</a></h6>
                                        <h5>'.number_format($set_relative_product[$key]['priceProduct']).' đồng</h5>
                                    </div>
                                </div>
                            </div>';
                                break;
                            }}
                    }
                }
                ?>
             
            </div>
        </div>
    </section>
<script src="./mvc/public/user/js/jsshop/jquery-3.3.1.min.js"></script>
<script src="./mvc/public/user/js/jsshop/bootstrap.min.js"></script>
<script src="./mvc/public/user/js/jsshop/jquery.nice-select.min.js"></script>
<script src="./mvc/public/user/js/jsshop/jquery-ui.min.js"></script>
<script src="./mvc/public/user/js/jsshop/jquery.slicknav.js"></script>
<script src="./mvc/public/user/js/jsshop/mixitup.min.js"></script>
<script src="./mvc/public/user/js/jsshop/owl.carousel.min.js"></script>
<script src="./mvc/public/user/js/jsshop/main.js"></script>