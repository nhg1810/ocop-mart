<!-- <base href="http://localhost/FOODOGANICSHOP/"> -->

<section class="home"
    style="background: url(./mvc/public/ImgInterfaceDefault/imgbanner/<?php echo $data['background_banner']?>);  background-repeat: no-repeat; background-size: full; ">
    <div class="slides-container">
        <!-- các dữ liệu banner được đổ vào đây -->
        <?php
        if(isset($data["set_banner_home"])){
            $set_banner_home = $data['set_banner_home'];
            foreach($set_banner_home as $key => $value){
                foreach($value as $k => $vl){
                    echo ' <div class="slide '; if($key== 0){echo 'active';} echo ' "> ' ;echo' 
                    <div class="content">
                        <span>'.$set_banner_home[$key]["titleBanner"].'</span>
                        <h3>'.$set_banner_home[$key]["descriptBanner"].'</h3>
                        <a href="#" class="btna">Xem ngay</a>
                    </div>
                    <div class="image">
                        <img src="./mvc/public/ImgInterfaceDefault/ImgSliderBanner/'.$set_banner_home[$key]["imgBanner"].'" width= "250px" height="400px" alt="">
                    </div>
                </div>';
                break;
                }
            }
        }
        ?>
        <!-- <div class="slide">
            <div class="content">
                <span>Thịt cá</span>
                <h3>Giảm 50% </h3>
                <a href="#" class="btna">Xem ngay</a>
            </div>
            <div class="image">
            <img src="./mvc/public/admin/ImgBanner/BioMINHHONG.jpg" width= "250px" height="400px" alt="">
            </div>
        </div>

        <div class="slide">
            <div class="content">
                <span>Tổ yến</span>
                <h3>Giảm 50% </h3>
                <a href="#" class="btna">Xem ngay</a>
            </div>
            <div class="image">
            <img src="./mvc/public/admin/ImgBanner/CertificateShop.jpg" width= "250px" height="400px" alt="">
            </div>
        </div> -->

    </div>

    <div id="next-slide" class="fas fa-angle-right" onclick="next()"></div>
    <div id="prev-slide" class="fas fa-angle-left" onclick="next()"></div>

</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- jss xử lý xem chi tiết sản phẩm tại trang chủ -->
<script>
    $(document).ready(function () {
        $(".layout_opacity").hide();
        $(".container-detail-home-prod ").hide();
        $(".layout_opacity").click(function () {
            $(this).hide();
            $(".container-detail-home-prod ").hide(200);
        })
        $(".click-show-detail").click(function () {
            var data_id_prod = $(this).attr('data-id-prod');
            $(".layout_opacity").show();
            $(".container-detail-home-prod ").show();
            $.ajax({
                url: 'home/GetProdById',
                type: "POST",
                data: { data_id_prod: data_id_prod },
                success: function (data) {
                    $(".container-detail-home-prod").html(data);
                    $("#cancel-panel-detail-prod").click(function(){
                        $(".layout_opacity").hide();
                        $(".container-detail-home-prod ").slideUp(200); 
                    })
                }
            })
           
         
        })
       
    })
</script>
<style>
    .text-section{
        overflow: hidden;
    text-overflow: ellipsis;
    line-height: 25px;
    -webkit-line-clamp: 3;
    height: 75px;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    margin-bottom: 20px;
    }
    .arefixed-ifor-shop {
        position: absolute;
        min-width: 80px;
        min-height: 80px;
        padding-right: 15px;
        z-index: 10000;
        top: 80px;
        left: 5px;
        position: fixed;
        display: flex;
        flex-direction: column;
    }

    .arefixed-ifor-shop>img {
        width: 50px;
        height: 50px;
    }

    .arefixed-ifor-shop>span {
        margin-top: 5px;
        background: #03ba00;
        opacity: 0.8;
        padding: 3px;
        font-size: 14px;
        color: white;
        width: 80%;

    }

    .arefixed-ifor-shop>div {
        display: flex;
        align-items: center;
    }

    .arefixed-ifor-shop>div>span {
        font-size: 20px;
        color: white;
        padding: 10px;
        background: rgb(203, 215, 26);
        border-radius: 10%;
        width: 50px;
        height: 50px;
        text-align: center;
    }

    .arefixed-ifor-shop>div>p {
        padding: 5px;
        width: 200px;
        background-color: #998629;
        color: #ffffff;
        opacity: 0.9;
        margin-top: 5px;
    }

    .layout_opacity {
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        position: absolute;
        width: 100%;
        height: 100%;
        background-color: black;
        z-index: 10000;
        position: fixed;
        opacity: 0.5;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .container-detail-home-prod {
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        position: absolute;
        position: fixed;
        z-index: 10000;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        width: 900px;
        height: 500px;
        background: #fff;
        margin: 20px;
    }

    .container-detail-home-prod .imgBx {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 50%;
        height: 100%;
        background: #70eb7b;
        transition: .3s linear;
    }
    .cancel-panel-detail-prod{
        position: absolute;
        width: 80px;
        height: 30px;
        line-height: 30px;
        text-align: center;
        color: white;
        background: #b94d4d;
        z-index: 10000;
        left: -10px;
        top: 0px;
        font-size: 14px;
    }

    .container-detail-home-prod .imgBx:before {
        content: 'Nike';
        position: absolute;
        top: 0px;
        left: 24px;
        color: #000;
        opacity: 0.2;
        font-size: 8em;
        font-weight: 800;
    }

    .container-detail-home-prod .imgBx img {
        position: relative;
        width: 700px;
        height: 550px;
        left: -50px;
        transition: .9s linear;
    }

    .container-detail-home-prod .details {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 50%;
        height: 100%;
        box-sizing: border-box;
    }

    .container-detail-home-prod .details h2 {
        margin: 0;
        padding: 0;
        font-size: 2.4em;
        line-height: 1em;
        color: white;
        background-color: rgb(16, 153, 128);
    }

    .container-detail-home-prod .details h2 span {
        padding-left: 10px;
        font-size: 0.4em;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: white;
    }

    .container-detail-home-prod .details p {
        max-width: 85%;
        margin-left: 15%;
        color: #333;
        font-size: 15px;
        margin-bottom: 36px;
    }

    .container-detail-home-prod .details h3 {
        font-weight: 600;
        margin: 0;
        padding: 0;
        font-size: 2.5em;
        color: #a5a500;
        float: left;
    }

    .container-detail-home-prod .details button {
        background: rgb(94, 205, 81);
        color: #fff;
        border: none;
        outline: none;
        padding: 15px 20px;
        margin-top: 5px;
        font-size: 16px;
        letter-spacing: 1px;
        text-transform: uppercase;
        font-weight: 600;
        border-radius: 40px;
        float: right;
    }

    .product-colors span {
        width: 26px;
        height: 26px;
        top: 7px;
        margin-right: 12px;
        left: 10px;
        border-radius: 50%;
        position: relative;
        cursor: pointer;
        display: inline-block;
    }

    .black {
        background: #000;
    }

    .red {
        background: #D5212E;
    }

    .orange {
        background: #F18557;
    }

    .product-colors .active:after {
        content: "";
        width: 36px;
        height: 36px;
        border: 2px solid #000;
        position: absolute;
        border-radius: 50%;
        box-sizing: border-box;
        left: -5px;
        top: -5px;
    }

    /* responsive */
    @media (max-width: 1080px) {
        .container-detail-home-prod {
            height: 100%;
            width: 100%;
            top: 50%;
            bottom: 0;
            position: fixed;
            overflow-y: scroll;
            overflow-x: hidden;
        }

        .container-detail-home-prod .imgBx {
            box-sizing: border-box;
            width: 95%;
            height: 100%;
            text-align: center;
            overflow: hidden;
            margin-bottom: 50px;
        }

        .container-detail-home-prod .imgBx img {
            left: initial;
            width: 100%;
            height: 100%;
            transform: rotate(0deg);
        }

        .details {
            width: 100% !important;
            height: auto;
            padding: 20px;
        }

        .container-detail-home-prod .details p {
            margin-left: 0;
            max-width: 100%;
        }
    }
</style>

<script>
    $(document).ready(function () {
        $(".show-infor").hide();
        $(".hide-infor").click(function () {
            $(".arefixed-ifor-shop").css({ "left": "-200px" });
            $(".show-infor").show(200);
            $(".show-infor").click(function(){
                $(".show-infor").hide();
                $(".hide-infor").show(200);
                $(".arefixed-ifor-shop").css({ "left": "5px" });
            })
            $(this).hide();
        })


    })
</script>
<div class="layout_opacity">

</div>

<div class="arefixed-ifor-shop">
    <img src="./mvc/public/ImgInterfaceDefault/imgsubbanner/phone.png" alt="">
    <span>Liên hệ qua: 0905.471.846</span>
    <div>
        <p>Địa chỉ: Kiot KM34, Chợ Non Nước, P.Hoà Hải, Q.Ngũ Hành Sơn, TP.Đà Nẵng</p>
        <span class="hide-infor"> <
         </span>
         <span class="show-infor"> >
         </span>
    </div>
</div>
<!-- phần show chi tiết sản phẩm tại trang chủ -->
<div class="container-detail-home-prod">
</div>
<marquee class="informaition-shop"
    style=" width: 80%; margin-left: 100px; padding: 5dp; background-color: rgb(198, 186, 18); font-size: 16px; color: white;">
    Các sản phẩm được OCOP-Mart chọn lọc kĩ càng, để đem lại cho khách hàng sự hài lòng và chất lượng tốt nhất! Cảm ơn
    khách hàng đã ghé thăm !</marquee>
<section class="banner-container">
    <!-- sản phẩm sale nhiều nhất -->
    <?php
           if(isset($data['set_salest_product_home'])){
               $x =0;
               $set_salest_product_home= $data['set_salest_product_home'];
               foreach($set_salest_product_home as $key => $value){
                if($x>5){
                    break;
                }
                foreach($value as $k => $vl){
                    echo '    <div class="banner">
                    <img src="./mvc/public/ImgProduct/'.$set_salest_product_home[$key]['imgProd1'].'" alt="">
                    <div class="content">
                        <span>'.$set_salest_product_home[$key]['nameProduct'].'</span>
                        <h3>Giảm '.$set_salest_product_home[$key]['sale'].'% </h3>
                        <a href="javascript:value(0)" class="btna click-show-detail" data-id-prod='.$set_salest_product_home[$key]['idProduct'].'>Xem rõ hơn</a>
                    </div>
                </div>';
                $x++;
                break;
                }}
           }

            ?>

</section>
<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                <!-- đổ các doanh mục sản phẩm từ shop ra ở đây -->
                <?php
                    if(isset($data['set_category_home'])){
                        $set_category_home= $data['set_category_home'];
                        foreach($set_category_home as $key => $value){
                            foreach($value as $k => $vl){
                                echo ' <div class="col-lg-3" >
                                <div class="categories__item set-bg" data-setbg="./mvc/public/ImgProduct/'. $set_category_home[$key]["imgCategory"] .'">
                                    <h5><a href="#">'. $set_category_home[$key]["nameCategory"] .'</a></h5>
                                </div>
                            </div>';
                            break;
                            }
                        }
                    }
                    ?>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>SẢN PHẨM NỔI BẬT</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <!-- ứng với mỗi doanh mục có các sản phẩm khác nhau -->
                        <?php
                            if(isset($data["set_category_home"])){
                                $set_category_home= $data['set_category_home'];
                                echo' <li class="active" data-filter="*">Tất cả</li>';
                                foreach($set_category_home as $key => $value){
                                    foreach($value as $k => $vl){
                                        echo '<li data-filter=".cgt'.$set_category_home[$key]['idCategory'].'">'.$set_category_home[$key]['nameCategory'].'</li>';
                                    break;
                                    }
                                }
                            }
                            ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            <?php
                if(isset($data['set_product_home'])){
                    $set_product_home= $data['set_product_home'];
                    foreach($set_product_home as $key => $value){
                        foreach($value as $k => $vl){
                            echo '<div class="col-lg-3 col-md-4 col-sm-6 mix cgt'.$set_product_home[$key]['idCateProduct'].'">
                            <div class="featured__item">
                                <div class="featured__item__pic set-bg" data-setbg="./mvc/public/ImgProduct/'.$set_product_home[$key]['imgProd1'].'">
                                    <ul class="featured__item__pic__hover">
                                        <li><a href="javascipt:value(0)"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="javascipt:value(0)"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="javascipt:value(0)"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="featured__item__text">
                                    <h6><a href="javascipt:value(0)" class="click-show-detail" data-id-prod ='.$set_product_home[$key]['idProduct'].'>'.$set_product_home[$key]['nameProduct'].'</a></h6>
                                    <h5>'.number_format($set_product_home[$key]['priceProduct']).' vnd</h5>
                                </div>
                            </div>
                        </div>';
                        break;
                        }
                    }
                }
                ?>
            <!-- ứng với mỗi doanh mục có các sản phẩm khác nhau -->

        </div>
    </div>
</section>
<!-- Banner các ảnh được huy hiệu huân chương của shop -->

<div class="sub-banner" style="width: auto; height: auto">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="./mvc/public/ImgInterfaceDefault/imgsubbanner/banner-1.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="./mvc/public/ImgInterfaceDefault/imgsubbanner/banner-2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Latest Product Section Begin -->

<!-- các sản phẩm được show ra theo các chỉ tiêu khác nhau -->
<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Sản phẩm mới nhất</h4>
                    <div class="latest-product__slider owl-carousel">
                        <!-- đổ ra 6 sản phẩm mới nhất ở đây -->
                        <div class="latest-prdouct__slider__item">
                            <?php
                            if(isset($data['set_new_product_home'])){
                                $set_new_product_home = $data['set_new_product_home'];
                                $i = 0;
                                foreach($set_new_product_home as $key => $value){
                                        foreach($value as $k => $vl){
                                            if($i>3){
                                                break;
                                            }else{
                                                echo '<a href="javascript:value(0)" class="latest-product__item click-show-detail " data-id-prod='.$set_new_product_home[$key]['idProduct'].'>
                                                <div class="latest-product__item__pic">
                                                    <img src="./mvc/public/ImgProduct/'.$set_new_product_home[$key]['imgProd1'].'" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <b>'.$set_new_product_home[$key]['nameProduct'].'</b>
                                                    <span class="s-value-price">'.number_format($set_new_product_home[$key]['priceProduct']).' VNĐ</span>
                                                    <span class="shop-now">mua ngay</span>
                                                </div>
                                            </a>';
                                            $i++;
                                                break;
                                            }
                                        }                                
                                }      
                            }
                            ?>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Sản phẩm bán chạy</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <!-- //đổ ra sản phẩm bán chạy ở đây -->
                            <?php
                                if(isset($data['set_special_product_home'])){
                                    $set_special_product_home = $data['set_special_product_home'];
                                    foreach($set_special_product_home as $key => $value){
                                        foreach($value as $k => $vl){
                                           
                                                echo '<a href="javascript:value(0)" class="latest-product__item click-show-detail" data-id-prod='.$set_special_product_home[$key]['idProduct'].' >
                                                <div class="latest-product__item__pic">
                                                    <img src="./mvc/public/ImgProduct/'.$set_special_product_home[$key]['imgProd1'].'" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <b>'.$set_special_product_home[$key]['nameProduct'].'</b>
                                                    <span>'.number_format($set_special_product_home[$key]['priceProduct']).' VNĐ</span>
                                                    <span class="shop-now">mua ngay</span>
                                                </div>
                                            </a>';
                                            $i++;
                                                break;
                                            }
                                                                   
                                }      
                                }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Đánh giá tiêu biểu của Shop</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <?php
                                if(isset($data['set_the_face_product_home'])){
                                    $set_the_face_product_home = $data['set_the_face_product_home'];
                                    foreach($set_the_face_product_home as $key => $value){
                                        foreach($value as $k => $vl){
                                           
                                                echo '<a href="javascript:value(0)" class="latest-product__item click-show-detail" data-id-prod='.$set_the_face_product_home[$key]['idProduct'].'>
                                                <div class="latest-product__item__pic">
                                                    <img src="./mvc/public/ImgProduct/'.$set_the_face_product_home[$key]['imgProd1'].'" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <b>'.$set_the_face_product_home[$key]['nameProduct'].'</b>
                                                    <span>'.number_format($set_the_face_product_home[$key]['priceProduct']).' VNĐ</span>
                                                    <span class="shop-now">mua ngay</span>
                                                </div>
                                            </a>';
                                            $i++;
                                                break;
                                            }
                                                                   
                                }      
                                }
                                ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Latest Product Section End -->
<!-- Blog Section Begin -->
<!-- các bài viết blog -->
<section class="from-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2>Bài viết liên quan</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            if(isset($data['set_new_blog_home'])){
                $set_new_blog_home = $data['set_new_blog_home'];
                foreach($set_new_blog_home as $key => $value){
                    foreach($value as $k => $vl){
                        echo ' <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="./mvc/public/ImgNew/'.$set_new_blog_home[$key]['ImgNew1'].'" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> '.$set_new_blog_home[$key]['Date'].'</li>
                                    <li><i class="fa fa-comment-o"></i> '.$set_new_blog_home[$key]['Location'].'</li>
                                </ul>
                                <h5><a href="detailblog/post/'.$set_new_blog_home[$key]['slug'].'/'.$set_new_blog_home[$key]['IdNew'].'">'.$set_new_blog_home[$key]['Title'].'</a></h5>
                                <p class="text-section">'.$set_new_blog_home[$key]['Section1'].' </p>
                            </div>
                        </div>
                    </div>';
                        break;
                    }}
            }
            ?>
           
            
        </div>
    </div>
</section>
<!-- Blog Section End -->
<!-- Featured Section End -->
<script src="./mvc/public/user/jshome/jquery-3.3.1.min.js"></script>
<script src="./mvc/public/user/jshome/bootstrap.min.js"></script>
<script src="./mvc/public/user/jshome/jquery.nice-select.min.js"></script>
<script src="./mvc/public/user/jshome/jquery-ui.min.js"></script>
<script src="./mvc/public/user/jshome/jquery.slicknav.js"></script>
<script src="./mvc/public/user/jshome/mixitup.min.js"></script>
<script src="./mvc/public/user/jshome/owl.carousel.min.js"></script>
<script src="./mvc/public/user/jshome/main.js"></script>