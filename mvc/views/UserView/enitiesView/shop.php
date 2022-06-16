<link rel="stylesheet" href="./mvc/public/user/css/cssshop/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="./mvc/public/user/css/cssshop/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="./mvc/public/user/css/cssshop/elegant-icons.css" type="text/css">
<link rel="stylesheet" href="./mvc/public/user/css/cssshop/nice-select.css" type="text/css">
<link rel="stylesheet" href="./mvc/public/user/css/cssshop/jquery-ui.min.css" type="text/css">
<link rel="stylesheet" href="./mvc/public/user/css/cssshop/owl.carousel.min.css" type="text/css">
<link rel="stylesheet" href="./mvc/public/user/css/cssshop/slicknav.min.css" type="text/css">
<link rel="stylesheet" href="./mvc/public/user/css/cssshop/style.css" type="text/css">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
<style>
    .header {
        position: absolute;
    }
    .latest-product__item__text h6{
        width: 100%;
    }
    .latest-product__text h4{
        background: white;
        color: brown
    }
</style>
<section class="hero hero-normal" style="margin-top: 60px">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Danh mục</span>
                    </div>
                    <!-- đổ danh mục ra đây  -->
                    <ul>
                        <?php
                    if(isset($data['set_cate_prod'])){
                        $set_cate_prod = $data['set_cate_prod'];
                        foreach($set_cate_prod as $key => $value){
                            foreach($value as $k => $vl){
                                echo ' <li><a href="#">'.$set_cate_prod[$key]['nameCategory'].'</a></li>';
                                break;
                            }}
                    }
                    ?>
                    </ul>

                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            
                            <input type="text" placeholder="Tìm kiếm sản phẩm bạn mà bạn muốn mua">
                            <button type="submit" class="site-btn">Tìm kiếm</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>0905.471.846</h5>
                            <span>Hỗ trợ 24/7</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="breadcrumb-section set-bg" data-setbg="./mvc/public/ImgInterfaceDefault/imgbanner/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Ocop-Mart Đà Nẵng</h2>
                    <div class="breadcrumb__option">
                        <a href="shop"></a>
                        <span>Chào mừng quý khách hàng đã ghé thăm !</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Danh mục</h4>
                        <ul>
                            <?php
                    if(isset($data['set_cate_prod'])){
                        $set_cate_prod = $data['set_cate_prod'];
                        foreach($set_cate_prod as $key => $value){
                            foreach($value as $k => $vl){
                                echo ' <li><a href="#">'.$set_cate_prod[$key]['nameCategory'].'</a></li>';
                                break;
                            }}
                    }
                    ?>
                        </ul>
                    </div>
                
                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Sản phẩm HOT</h4>
                            <div class="latest-product__slider owl-carousel">

                                <div class="latest-prdouct__slider__item">
                                    <?php
                                    if(isset($data['set_new_prod'])){
                                        $set_new_prod = $data['set_new_prod'];
                                        foreach($set_new_prod as $key => $value){
                                            foreach($value as $k => $vl){
                                                echo ' <a href="detailProd/sanpham/'.$set_new_prod[$key]['slug'].'/'.$set_new_prod[$key]['idProduct'].'" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="./mvc/public/ImgProduct/'.$set_new_prod[$key]['imgProd1'].'" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <b>'.$set_new_prod[$key]['nameProduct'].'</b>
                                                    <span>'.number_format($set_new_prod[$key]['priceProduct']).'</span>
                                                    <span class="shop-now">mua ngay</span>
                                                </div>
                                            </a>';
                                                break;
                                            }}
                                    }
                                    ?>

                                </div>

                                <div class="latest-prdouct__slider__item">
                                <?php
                                    if(isset($data['set_hot_prod'])){
                                        $set_hot_prod = $data['set_hot_prod'];
                                        foreach($set_hot_prod as $key => $value){
                                            foreach($value as $k => $vl){
                                                echo ' <a href="detailProd/sanpham/'.$set_hot_prod[$key]['slug'].'/'.$set_hot_prod[$key]['idProduct'].'" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="./mvc/public/ImgProduct/'.$set_hot_prod[$key]['imgProd1'].'" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <b>'.$set_hot_prod[$key]['nameProduct'].'</b>
                                                    <span>'.number_format($set_hot_prod[$key]['priceProduct']).' đ </span>
                                                    <span class="shop-now">mua ngay</span>
                                                </div>
                                            </a>';
                                                break;
                                            }}
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <span>Sắp xếp theo</span>
                                <select>
                                    <option value="0">Default</option>
                                    <option value="0">Default</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6><span>16</span> Products found</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <div class="filter__option">
                                <span class="icon_grid-2x2"></span>
                                <span class="icon_ul"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- tất cả sản phẩm ở đây -->
                <div class="row">
                    <?php
                    if (isset($data['set_all_prod'])) {
                         $set_all_prod = $data['set_all_prod'];
                                foreach($set_all_prod as $key => $value){
                            foreach($value as $k => $vl){
                                echo'<div class="col-lg-4 col-md-6 col-sm-6 ">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="./mvc/public/ImgProduct/'.$set_all_prod[$key]['imgProd1'].'">
                                <div class="sale-percent">Giảm giá: '.$set_all_prod[$key]['sale'].'%</div>
                                <ul class="product__item__pic__hover">
                                    <li><a href="detailProd/sanpham/'.$set_all_prod[$key]['slug'].'/ '.$set_all_prod[$key]['idProduct'].'"><i class="fa fa-eye"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="detailProd/sanpham/'.$set_all_prod[$key]['slug'].'/'.$set_all_prod[$key]['idProduct'].'">'.$set_all_prod[$key]['nameProduct'].'</a></h6>
                                <b>Giá gốc:'.number_format($set_all_prod[$key]['priceProduct']).' đồng </b>
                                <h5>Giá chỉ: '.number_format($set_all_prod[$key]['priceProduct'] - ($set_all_prod[$key]['sale']/100)*$set_all_prod[$key]['priceProduct'] ).' đồng</h5>
                                <p>Nguồn góc: '.$set_all_prod[$key]['brand'].' </p>
                                <a class="show-inf" href="detailProd/sanpham/'.$set_all_prod[$key]['slug'].'/'.$set_all_prod[$key]['idProduct'].'">Xem ngay</a>

                            </div>
                        </div>
                    </div>';
                                break;
                               }
                            }
                     } 
                     ?>

                </div>
                <div class="product__pagination">
                    <?php
                    if(isset($data['set_sum_prod'])){
                        $page_number = 0;
                        $set_sum_prod = $data['set_sum_prod'];
                        $x = (round($set_sum_prod[0]['countProd']/6) - $set_sum_prod[0]['countProd']/6);
                        if($x > 0){
                            $page_number = round($set_sum_prod[0]['countProd']/6);
                        }else{
                            $page_number = round($set_sum_prod[0]['countProd']/6)+1;
                        }
                        for($i=1; $i<=$page_number; $i++ ){
                            echo '<a href="shop/page/'.$i.'" 
                            ';
                            if($data['pageNumber'] ==  $i){
                                echo 'style="background: #28a745; color: white"';
                            }
                            echo '>'.$i.'</a>';
                        }
                       
                    }
                    ?>
                </div>
                <div class="product__discount" style="margin-top: 50px">
                    <div class="section-title product__discount__title">
                        <h2>Giảm giá</h2>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">
                            <?php 
                            if(isset($data['set_sale_prod'])){
                                $set_sale_prod = $data['set_sale_prod'];
                                foreach($set_sale_prod as $key => $value){
                            foreach($value as $k => $vl){
                                echo'<div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg"
                                        data-setbg="./mvc/public/ImgProduct/'.$set_sale_prod[$key]['imgProd1'].'">
                                        <div class="product__discount__percent">-'.$set_sale_prod[$key]['sale'].'%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="detailProd/sanpham/'.$set_sale_prod[$key]['slug'].'/'.$set_sale_prod[$key]['idProduct'].'"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span>'.$set_sale_prod[$key]['nameCategory'].'</span>
                                        <h5><a href="detailProd/sanpham/'.$set_sale_prod[$key]['slug'].'/'.$set_sale_prod[$key]['idProduct'].'">'.$set_sale_prod[$key]['nameProduct'].'</a></h5>
                    <div class="product__item__price">'.number_format($set_sale_prod[$key]['priceProduct'] - ($set_sale_prod[$key]['sale']/100)*$set_sale_prod[$key]['priceProduct'] ).' đồng <span>'.number_format($set_sale_prod[$key]['priceProduct']).'</span></div>
                                    </div>
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
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
<script src="./mvc/public/user/js/jsshop/jquery-3.3.1.min.js"></script>
<script src="./mvc/public/user/js/jsshop/bootstrap.min.js"></script>
<script src="./mvc/public/user/js/jsshop/jquery.nice-select.min.js"></script>
<script src="./mvc/public/user/js/jsshop/jquery-ui.min.js"></script>
<script src="./mvc/public/user/js/jsshop/jquery.slicknav.js"></script>
<script src="./mvc/public/user/js/jsshop/mixitup.min.js"></script>
<script src="./mvc/public/user/js/jsshop/owl.carousel.min.js"></script>
<script src="./mvc/public/user/js/jsshop/main.js"></script>