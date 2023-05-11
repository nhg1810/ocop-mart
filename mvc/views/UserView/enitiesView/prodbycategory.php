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
    .show-live-search {
        z-index: 100;
        position: absolute;
        width: 100%;
        height: auto;
        top: 50px;
        display: flex;
        flex-direction: column;
        background-color: red;
        background-color: rgb(140, 217, 157, 0.5);
        border-radius: 10px;
    }

    .show-live-search .items {
        margin-left: 20px;
        width: 90%;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: space-evenly;
        padding: 20px;
        margin-top: 10px;
        background-color: white;
        border-left: solid 5px #2a9b46;
    }

    .show-live-search .items>img {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        background-color: black;
    }

    .show-live-search .items>.inf {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: space-around;
    }

    .show-live-search .items>.inf>p {
        font-size: 14px;
        margin: 0;
    }

    .show-live-search .items>a {
        padding: 10px;
        color: white;
        border-radius: 10px;
        background-color: #2a9b46;
    }


    .header {
        position: absolute;
    }

    .latest-product__item__text h6 {
        width: 100%;
    }

    .latest-product__text h4 {
        background: white;
        color: brown
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $(".live-search-prod").keyup(function() {
            var nameProd = $(this).val();
            if (nameProd == "") {
                $(".show-live-search").html("");
            } else {
                $.ajax({
                    url: 'shop/AjaxLiveSearch',
                    data: {
                        nameProd: nameProd
                    },
                    type: "POST",
                    success: function(data) {
                        $(".show-live-search").html(data);
                    }
                })
            }
        })
    })
</script>
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
                        if (isset($data['set_cate_prod'])) {
                            $set_cate_prod = $data['set_cate_prod'];
                            foreach ($set_cate_prod as $key => $value) {
                                foreach ($value as $k => $vl) {
                                    echo ' <li><a href="shop/GetProdByIdCategory/' . $set_cate_prod[$key]['idCategory'] . '/1">' . $set_cate_prod[$key]['nameCategory'] . '</a></li>';
                                    break;
                                }
                            }
                        }
                        ?>
                    </ul>

                </div>
            </div>

            <div class="col-lg-9" style="position: relative;">
                <div class="show-live-search">

                </div>
                <div class="hero__search">

                    <div class="hero__search__form">
                        <form action="#">
                            <input type="text" class="live-search-prod" placeholder="Tìm kiếm sản phẩm bạn mà bạn muốn mua">
                            <button type="submit" class="site-btn ">Tìm kiếm</button>

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
                            if (isset($data['set_cate_prod'])) {
                                $set_cate_prod = $data['set_cate_prod'];
                                foreach ($set_cate_prod as $key => $value) {
                                    foreach ($value as $k => $vl) {
                                        echo ' <li><a href="shop/GetProdByIdCategory/' . $set_cate_prod[$key]['idCategory'] . '/1">' . $set_cate_prod[$key]['nameCategory'] . '</a></li>';
                                        break;
                                    }
                                }
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
                                    if (isset($data['set_new_prod'])) {
                                        $set_new_prod = $data['set_new_prod'];
                                        foreach ($set_new_prod as $key => $value) {
                                            foreach ($value as $k => $vl) {
                                                echo ' <a href="detailProd/sanpham/' . $set_new_prod[$key]['slug'] . '/' . $set_new_prod[$key]['idProduct'] . '" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="./mvc/public/ImgProduct/' . $set_new_prod[$key]['imgProd1'] . '" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <b>' . $set_new_prod[$key]['nameProduct'] . '</b>
                                                    <span>' . number_format($set_new_prod[$key]['priceProduct']) . '</span>
                                                    <span class="shop-now">mua ngay</span>
                                                </div>
                                            </a>';
                                                break;
                                            }
                                        }
                                    }
                                    ?>

                                </div>

                                <div class="latest-prdouct__slider__item">
                                    <?php
                                    if (isset($data['set_hot_prod'])) {
                                        $set_hot_prod = $data['set_hot_prod'];
                                        foreach ($set_hot_prod as $key => $value) {
                                            foreach ($value as $k => $vl) {
                                                echo ' <a href="detailProd/sanpham/' . $set_hot_prod[$key]['slug'] . '/' . $set_hot_prod[$key]['idProduct'] . '" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="./mvc/public/ImgProduct/' . $set_hot_prod[$key]['imgProd1'] . '" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <b>' . $set_hot_prod[$key]['nameProduct'] . '</b>
                                                    <span>' . number_format($set_hot_prod[$key]['priceProduct']) . ' đ </span>
                                                    <span class="shop-now">mua ngay</span>
                                                </div>
                                            </a>';
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
                                <h6><span><?php if(isset($data['set_sum_prod_by_cate'])){echo $data['set_sum_prod_by_cate'][0]['countProd'];}else{echo 0;}?></span> Sản phẩm tìm được</h6>
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
                    if (isset($data['set_all_prod_by_cate'])) {
                        $set_all_prod_by_cate = $data['set_all_prod_by_cate'];
                        if (isset($set_all_prod_by_cate[0]['idProduct'])) {
                            foreach ($set_all_prod_by_cate as $key => $value) {
                                foreach ($value as $k => $vl) {
                                    echo '<div class="col-lg-4 col-md-6 col-sm-6 ">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="./mvc/public/ImgProduct/' . $set_all_prod_by_cate[$key]['imgProd1'] . '">
                                <div class="sale-percent">Giảm giá: ' . $set_all_prod_by_cate[$key]['sale'] . '%</div>
                                <ul class="product__item__pic__hover">
                                    <li><a href="detailProd/sanpham/' . $set_all_prod_by_cate[$key]['slug'] . '/ ' . $set_all_prod_by_cate[$key]['idProduct'] . '"><i class="fa fa-eye"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="detailProd/sanpham/' . $set_all_prod_by_cate[$key]['slug'] . '/' . $set_all_prod_by_cate[$key]['idProduct'] . '">' . $set_all_prod_by_cate[$key]['nameProduct'] . '</a></h6>
                                <b>Giá gốc:' . number_format($set_all_prod_by_cate[$key]['priceProduct']) . ' đồng </b>
                                <h5>Giá chỉ: ' . number_format($set_all_prod_by_cate[$key]['priceProduct'] - ($set_all_prod_by_cate[$key]['sale'] / 100) * $set_all_prod_by_cate[$key]['priceProduct']) . ' đồng</h5>
                                <p>Nguồn góc: ' . $set_all_prod_by_cate[$key]['brand'] . ' </p>
                                <a class="show-inf" href="detailProd/sanpham/' . $set_all_prod_by_cate[$key]['slug'] . '/' . $set_all_prod_by_cate[$key]['idProduct'] . '">Xem ngay</a>

                            </div>
                        </div>
                    </div>';
                                    break;
                                }
                            }
                        }
                        else{
                            echo  '<h2 style="color: #769645">'.$set_all_prod_by_cate.'</h2>';
                        }
                    }
                    ?>

                </div>
              
                <div class="product__pagination">
                    <?php
                    if (isset($data['set_sum_prod_by_cate'])) {
                        $page_number = 0;
                        $set_sum_prod_by_cate = $data['set_sum_prod_by_cate'];
                        $x = (round($set_sum_prod_by_cate[0]['countProd'] / 6) - $set_sum_prod_by_cate[0]['countProd'] / 6);
                        if ($x > 0) {
                            $page_number = round($set_sum_prod_by_cate[0]['countProd'] / 6);
                        } else {
                            $page_number = round($set_sum_prod_by_cate[0]['countProd'] / 6) + 1;
                        }
                        for ($i = 1; $i <= $page_number; $i++) {
                            echo '<a href="shop/GetProdByIdCategory/';
                            if (isset($data['id_cate_gory'])) {
                                echo $data['id_cate_gory'];
                            }
                            echo '/' . $i . '" 
                            ';
                            if ($data['pageNumber'] ==  $i) {
                                echo 'style="background: #28a745; color: white"';
                            }
                            echo '>' . $i . '</a>';
                        }
                    }
                    ?>
                </div>
                <div class="product__discount" style="margin-top: 50px">
                    <div class="section-title product__discount__title">
                        <h2>Sản phẩm nổi bật</h2>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">
                            <?php
                            if (isset($data['set_special_prod'])) {
                                $set_special_prod = $data['set_special_prod'];
                                foreach ($set_special_prod as $key => $value) {
                                    foreach ($value as $k => $vl) {
                                        echo '<div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg"
                                        data-setbg="./mvc/public/ImgProduct/' . $set_special_prod[$key]['imgProd1'] . '">
                                        <div class="product__discount__percent">-' . $set_special_prod[$key]['sale'] . '%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="detailProd/sanpham/' . $set_special_prod[$key]['slug'] . '/' . $set_special_prod[$key]['idProduct'] . '"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span>' . $set_special_prod[$key]['nameCategory'] . '</span>
                                        <h5><a href="detailProd/sanpham/' . $set_special_prod[$key]['slug'] . '/' . $set_special_prod[$key]['idProduct'] . '">' . $set_special_prod[$key]['nameProduct'] . '</a></h5>
                    <div class="product__item__price">' . number_format($set_special_prod[$key]['priceProduct'] - ($set_special_prod[$key]['sale'] / 100) * $set_special_prod[$key]['priceProduct']) . ' đồng <span>' . number_format($set_special_prod[$key]['priceProduct']) . '</span></div>
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
                <div class="product__discount" style="margin-top: 50px">
                    <div class="section-title product__discount__title">
                        <h2>Giảm giá</h2>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">
                            <?php
                            if (isset($data['set_sale_prod'])) {
                                $set_sale_prod = $data['set_sale_prod'];
                                foreach ($set_sale_prod as $key => $value) {
                                    foreach ($value as $k => $vl) {
                                        echo '<div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg"
                                        data-setbg="./mvc/public/ImgProduct/' . $set_sale_prod[$key]['imgProd1'] . '">
                                        <div class="product__discount__percent">-' . $set_sale_prod[$key]['sale'] . '%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="detailProd/sanpham/' . $set_sale_prod[$key]['slug'] . '/' . $set_sale_prod[$key]['idProduct'] . '"><i class="fa fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span>' . $set_sale_prod[$key]['nameCategory'] . '</span>
                                        <h5><a href="detailProd/sanpham/' . $set_sale_prod[$key]['slug'] . '/' . $set_sale_prod[$key]['idProduct'] . '">' . $set_sale_prod[$key]['nameProduct'] . '</a></h5>
                    <div class="product__item__price">' . number_format($set_sale_prod[$key]['priceProduct'] - ($set_sale_prod[$key]['sale'] / 100) * $set_sale_prod[$key]['priceProduct']) . ' đồng <span>' . number_format($set_sale_prod[$key]['priceProduct']) . '</span></div>
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