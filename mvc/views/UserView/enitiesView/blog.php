<style>
    .main-contain-blog {
        width: 95%;
        min-height: 500px;
        margin: auto;
        margin-top: 100px;
    }
</style>
<link rel="stylesheet" href="./mvc/public/user/css/cssblog/style.css">
<div class="main-contain-blog">
    <div id="preloader">
        <div class="preload-content">
            <div id="world-load"></div>
        </div>
    </div>

    <div class="hero-area">
        <!-- Hai slide chính của trang blog -->
        <div class="hero-slides owl-carousel">
            <!-- Single Slide -->
            <div class="single-hero-slide bg-img background-overlay"
                style="background-image: url(./mvc/public/ImgNew/bg-slide-new1.avif);"></div>
            <!-- Single Slide -->
            <div class="single-hero-slide bg-img background-overlay"
                style="background-image: url(./mvc/public/ImgNew/bg-slide-new2.avif);"></div>
        </div>

        <!-- các bài viết nổi bật hiển thị ở slide -->
        <div class="hero-post-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-post-slide">
                            <!-- Single Slide -->
                            <?php
                            
                            if(isset($data['set_post_had_id_three'])){
                                $set_post_had_id_three  = $data['set_post_had_id_three'];
                                foreach($set_post_had_id_three as $key => $value){
                                    foreach($value as $k => $vl){
                                        echo ' <div class="single-slide d-flex align-items-center">
                                        <div class="post-number">
                                            <p>1</p>
                                        </div>
                                        <div class="post-title">
                                            <a href="detailblog/post/'.$set_post_had_id_three[$key]['slug'].'/'.$set_post_had_id_three[$key]['IdNew'].'">'.$set_post_had_id_three[$key]['Title'].'</a>
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
    </div>
    <!-- ********** Hero Area End ********** -->

    <div class="main-content-wrapper section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <!-- ============= Post Content Area Start ============= -->
                <div class="col-12 col-lg-8">
                    <div class="post-content-area mb-50">
                        <!-- Đổ ra các danh mục báo -->
                        <div class="world-catagory-area">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="title">Đừng Bỏ Lỡ</li>

                                <?php
                                if(isset($data['set_catenew_blog'])){
                                    $set_catenew_blog = $data['set_catenew_blog'];
                                    $i=0;
                                    foreach($set_catenew_blog as $key => $value){
                                        foreach($value as $k => $vl){
                                            echo ' <li class="nav-item">
                                            <a class="nav-link '; if($i==0){echo "active";} 
                                            echo '" id="tab1" data-toggle="tab" href="javascript:value(0)"
                                                role="tab" aria-controls="world-tab-1" aria-selected="true">'.$set_catenew_blog[$key]['NameCateNews'].'</a>
                                        </li>';
                                        $i++;
                                            break;
                                        }}
                                }
                                ?>
                                <!-- các danh mục đọc báo nằm ở đây -->

                            </ul>

                            <div class="tab-content" id="myTabContent">

                                <div class="tab-pane fade show active" id="world-tab-1" role="tabpanel"
                                    aria-labelledby="tab1">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="world-catagory-slider owl-carousel wow fadeInUpBig"
                                                data-wow-delay="0.1s">
                                                <!-- 3 bài viết đặc sắc nhất-->
                                                <!-- Single Blog Post -->
                                                <?php
                                                if(isset($data['set_special_blog'])){
                                                    $set_special_blog = $data['set_special_blog'];
                                                    foreach($set_special_blog as $key => $value){
                                                        foreach($value as $k => $vl){
                                                            echo' <div class="single-blog-post">
                                                            <!-- Post Thumbnail -->
                                                            <div class="post-thumbnail">
                                                                <img src="./mvc/public/ImgNew/'.$set_special_blog[$key]['ImgNew1'].'" alt="">
                                                                <!-- Catagory -->
                                                                <div class="post-cta"><a href="detailblog/post/'.$set_special_blog[$key]['slug'].'/'.$set_special_blog[$key]['IdNew'].'">'.$set_special_blog[$key]['NameCateNews'].'</a></div>
                                                            </div>
                                                            <!-- Post Content -->
                                                            <div class="post-content">
                                                                <a href="detailblog/post/'.$set_special_blog[$key]['slug'].'/'.$set_special_blog[$key]['IdNew'].'" class="headline">
                                                                    <h5>'.$set_special_blog[$key]['Title'].'</h5>
                                                                </a>
                                                                <p>'.$set_special_blog[$key]['Section1'].'</p>
                                                                <!-- Post Meta -->
                                                                <div class="post-meta">
                                                                    <p><a href="#" class="post-author">'.$set_special_blog[$key]['Location'].'</a> on <a
                                                                            href="#" class="post-date">'.$set_special_blog[$key]['Date'].'</a></p>
                                                                </div>
                                                            </div>
                                                        </div>';
                                                            break;
                                                        }}
                                                }
                                                ?>



                                            </div>
                                        </div>

                                        <!-- mỗi danh mục lấy ra 4 bài viết -->
                                        <div class="col-12 col-md-6">
                                            <?php
                                            if(isset($data['set_post_had_id_three'])){
                                                $set_post_had_id_three = $data['set_post_had_id_three'];
                                                foreach($set_post_had_id_three as $key => $value){
                                                    foreach($value as $k => $vl){
                                                        echo ' <div class="single-blog-post post-style-2 d-flex align-items-center wow fadeInUpBig"
                                                        data-wow-delay="0.2s">
                                                        <!-- Post Thumbnail -->
                                                        <div class="post-thumbnail">
                                                            <img src="./mvc/public/ImgNew/'.$set_post_had_id_three[$key]['ImgNew2'].'" alt="">
                                                        </div>
                                                        <!-- Post Content -->
                                                        <div class="post-content">
                                                            <a href="detailblog/post/'.$set_post_had_id_three[$key]['slug'].'/'.$set_post_had_id_three[$key]['IdNew'].'" class="headline">
                                                                <h5>'.$set_post_had_id_three[$key]['Title'].'
                                                                </h5>
                                                            </a>
                                                            <!-- Post Meta -->
                                                            <div class="post-meta">
                                                                <p><a href="#" class="post-author">'.$set_post_had_id_three[$key]['Location'].'</a> on <a href="#"
                                                                        class="post-date">'.$set_post_had_id_three[$key]['Date'].'</a></p>
                                                            </div>
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

                        <!-- Catagory Area -->
                        <div class="world-catagory-area mt-50">
                            <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                <li class="title">Thế giới hôm nay</li>

                            </ul>

                            <div class="tab-content" id="myTabContent2">

                                <div class="tab-pane fade show active" id="world-tab-10" role="tabpanel"
                                    aria-labelledby="tab10">
                                    <div class="row">
                                        <!-- hai bài viết mới nhất về chủ đề thế giới -->
                                        <?php
                                        if(isset($data['set_post_had_id_five'])){
                                            $set_post_had_id_five = $data['set_post_had_id_five'];
                                            foreach($set_post_had_id_five as $key => $value){
                                                foreach($value as $k => $vl){
                                                    echo '  <div class="col-12 col-md-6">
                                                    <!-- Single Blog Post -->
                                                    <div class="single-blog-post wow fadeInUpBig" data-wow-delay="0.2s">
                                                        <!-- Post Thumbnail -->
                                                        <div class="post-thumbnail">
                                                            <img src="./mvc/public/ImgNew/'.$set_post_had_id_five[$key]['ImgNew1'].'" alt="">
                                                            <!-- Catagory -->
                                                            <div class="post-cta"><a href="#">'.$set_post_had_id_five[$key]['NameCateNews'].'</a></div>
                                                        </div>
                                                        <!-- Post Content -->
                                                        <div class="post-content">
                                                            <a href="detailblog/post/'.$set_post_had_id_five[$key]['slug'].'/'.$set_post_had_id_five[$key]['IdNew'].'" class="headline">
                                                                <h5>'.$set_post_had_id_five[$key]['Title'].'</h5>
                                                            </a>
                                                            <p>'.$set_post_had_id_five[$key]['Section1'].'</p>
                                                            <!-- Post Meta -->
                                                            <div class="post-meta">
                                                                <p><a href="#" class="post-author">'.$set_post_had_id_five[$key]['Location'].'</a> on <a href="#"
                                                                        class="post-date">'.$set_post_had_id_five[$key]['Date'].'</a></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>';
                                                    break;
                                                }
                                            }
                                        }

                                        ?>
                                        <!-- 4 bài viết về chủ đề con người và 4 bài về cuộc sông -->
                                        <!-- 4 bài viết về con người  -->
                                        <div class="col-12">
                                            <div class="world-catagory-slider2 owl-carousel wow fadeInUpBig"
                                                data-wow-delay="0.4s">
                                                <!-- ========= Single Catagory Slide ========= -->
                                                <div class="single-cata-slide">
                                                    <div class="row">
                                                        <?php
                                                        if(isset($data['set_post_had_id_one'])){
                                                            $set_post_had_id_one = $data['set_post_had_id_one'];
                                                            foreach($set_post_had_id_one as $key => $value){
                                                                foreach($value as $k => $vl){
                                                                    echo' <div class="col-12 col-md-6">
                                                                    <!-- Single Blog Post -->
                                                                    <div
                                                                        class="single-blog-post post-style-2 d-flex align-items-center mb-1">
                                                                        <!-- Post Thumbnail -->
                                                                        <div class="post-thumbnail">
                                                                            <img src="./mvc/public/ImgNew/'.$set_post_had_id_one[$key]['ImgNew1'].'" alt="">
                                                                        </div>
                                                                        <!-- Post Content -->
                                                                        <div class="post-content">
                                                                            <a href="detailblog/post/'.$set_post_had_id_one[$key]['slug'].'/'.$set_post_had_id_one[$key]['IdNew'].'" class="headline">
                                                                                <h5>'.$set_post_had_id_one[$key]['Title'].'</h5>
                                                                            </a>
                                                                            <!-- Post Meta -->
                                                                            <div class="post-meta">
                                                                                <p><a href="#" class="post-author">'.$set_post_had_id_one[$key]['Location'].'</a>
                                                                                    on <a href="#" class="post-date">'.$set_post_had_id_one[$key]['Date'].'</a></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>';
                                                                    break;
                                                                }}
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <!-- 4 bài viết về cuộc sống -->
                                                <!-- ========= Single Catagory Slide ========= -->
                                                <div class="single-cata-slide">
                                                    <div class="row">
                                                        <?php
                                                        if(isset($data['set_post_had_id_tow'])){
                                                            $set_post_had_id_tow = $data['set_post_had_id_tow'];
                                                            foreach($set_post_had_id_tow as $key => $value){
                                                                foreach($value as $k => $vl){
                                                                    echo' <div class="col-12 col-md-6">
                                                                    <!-- Single Blog Post -->
                                                                    <div
                                                                        class="single-blog-post post-style-2 d-flex align-items-center mb-1">
                                                                        <!-- Post Thumbnail -->
                                                                        <div class="post-thumbnail">
                                                                            <img src="./mvc/public/ImgNew/'.$set_post_had_id_tow[$key]['ImgNew1'].'" alt="">
                                                                        </div>
                                                                        <!-- Post Content -->
                                                                        <div class="post-content">
                                                                            <a href="detailblog/post/'.$set_post_had_id_tow[$key]['slug'].'/'.$set_post_had_id_tow[$key]['IdNew'].'" class="headline">
                                                                                <h5>'.$set_post_had_id_tow[$key]['Title'].'</h5>
                                                                            </a>
                                                                            <!-- Post Meta -->
                                                                            <div class="post-meta">
                                                                                <p><a href="#" class="post-author">'.$set_post_had_id_tow[$key]['Location'].'</a>
                                                                                    on <a href="#" class="post-date">'.$set_post_had_id_tow[$key]['Date'].'</a></p>
                                                                            </div>
                                                                        </div>
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
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <!-- ==========phần các bài viết mới nhất nằm bên phải ========== -->
                <div class="col-12 col-md-8 col-lg-4">
                    <div class="post-sidebar-area wow fadeInUpBig" data-wow-delay="0.2s">
                        <!-- Widget Area -->
                        <div class="sidebar-widget-area">
                            <h5 class="title">Lợi ích của việc đọc báo</h5>
                            <div class="widget-content">
                                <p>Báo chí đã tác động mạnh mẽ đến mọi mặt của đời sống,
                                    trở thành một trong những động lực quan trọng thúc đẩy sự phát triển của xã hội.
                                    Việc đọc báo hàng ngày mang lại cho chúng ta rất nhiều lợi ích.</p>
                            </div>
                        </div>
                        <!-- Widget Area -->
                        <div class="sidebar-widget-area">
                            <h5 class="title">Các bài viết mới nhất</h5>
                            <div class="widget-content">
                                <!-- 5 bài viết mới nhât -->
                                <?php
                                if(isset($data['set_new_blog'])){
                                    $set_new_blog= $data['set_new_blog'];
                                    $i=0;
                                    foreach($set_new_blog as $key => $value){
                                        foreach($value as $k => $vl){
                                            if($i <5){
                                                echo '<div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                                <!-- Post Thumbnail -->
                                                <div class="post-thumbnail">
                                                    <img src="./mvc/public/ImgNew/'.$set_new_blog[$key]['ImgNew1'].'" alt="">
                                                </div>
                                                <!-- Post Content -->
                                                <div class="post-content">
                                                    <a href="detailblog/post/'.$set_new_blog[$key]['slug'].'/'.$set_new_blog[$key]['IdNew'].'" class="headline">
                                                        <h5 class="mb-0">'.$set_new_blog[$key]['Title'].'
                                                        </h5>
                                                    </a>
                                                </div>
                                            </div>';
                                            $i++;
                                            break;
                                            }
                                        }}
                                }else{
                                    echo 123;
                                }
                                ?>
                            </div>
                        </div>
                        <!-- Widget Area -->
                        <div class="sidebar-widget-area">
                            <h5 class="title">Liên hệ chúng tôi</h5>
                            <div class="widget-content">
                                <div class="social-area d-flex justify-content-between">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-vimeo"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-google"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Widget Area -->
                        <div class="sidebar-widget-area">
                            <h5 class="title">Bài viết mới đăng</h5>
                            <div class="widget-content">
                                <?php
                                if(isset($data['set_lasted_blog'])){
                                    $set_lasted_blog = $data['set_lasted_blog'];
                                    foreach($set_lasted_blog as $key => $value){
                                        foreach($value as $k => $vl){
                                            echo '   <div class="single-blog-post todays-pick">
                                            <!-- Post Thumbnail -->
                                            <div class="post-thumbnail">
                                                <img src="./mvc/public/ImgNew/'.$set_lasted_blog[$key]['ImgNew1'].'" alt="">
                                            </div>
                                            <!-- Post Content -->
                                            <div class="post-content px-0 pb-0">
                                                <a href="detailblog/post/'.$set_lasted_blog[$key]['slug'].'/'.$set_lasted_blog[$key]['IdNew'].'" class="headline">
                                                    <h5>'.$set_lasted_blog[$key]['Title'].'</h5>
                                                </a>
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

            <!-- đổ ra 3 bài viết mới nhất về con người -->
            <div class="row justify-content-center">
                <?php
                if(isset($data['set_post_had_id_three'])){
                    $set_post_had_id_three = $data['set_post_had_id_three'];
                    foreach($set_post_had_id_three as $key => $value){
                        foreach($value as $k => $vl){
                            echo'  <div class="col-12 col-md-6 col-lg-4">
                            <div class="single-blog-post post-style-3 mt-50 wow fadeInUpBig" data-wow-delay="0.2s">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="./mvc/public/ImgNew/'.$set_post_had_id_three[$key]['ImgNew2'].'" alt="">
                                    <!-- Post Content -->
                                    <div class="post-content d-flex align-items-center justify-content-between">
                                        <!-- Catagory -->
                                        <div class="post-tag"><a href="#">'.$set_post_had_id_three[$key]['NameCateNews'].'</a></div>
                                        <!-- Headline -->
                                        <a href="detailblog/post/'.$set_post_had_id_three[$key]['slug'].'/'.$set_post_had_id_three[$key]['IdNew'].'" class="headline">
                                            <h5>'.$set_post_had_id_three[$key]['Title'].'</h5>
                                        </a>
                                        <!-- Post Meta -->
                                        <div class="post-meta">
                                            <p><a href="#" class="post-author">'.$set_post_had_id_three[$key]['Location'].'</a> on <a href="#" class="post-date">'.$set_post_had_id_three[$key]['Date'].'</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                            break;
                        }}
                }
                ?>
            </div>

            <div class="world-latest-articles">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="title">
                            <h5>Bài viết hay nhất</h5>
                        </div>
                        <!-- đổ ra 4 bài viết mới nhât -->
                        <?php
                        if(isset($data['set_new_blog'])){
                            $set_new_blog = $data['set_new_blog'];
                            $i=0;
                            foreach($set_new_blog as $key => $value){
                                foreach($value as $k => $vl){
                                    if($i<5){
                                        echo '  <div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig"
                                        data-wow-delay="0.2s">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="./mvc/public/ImgNew/'.$set_new_blog[$key]['ImgNew2'].'" alt="">
                                        </div>
                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="detailblog/post/'.$set_new_blog[$key]['slug'].'/'.$set_new_blog[$key]['IdNew'].'" class="headline">
                                                <h5>'.$set_new_blog[$key]['Title'].'</h5>
                                            </a>
                                            <p>'.$set_new_blog[$key]['Section1'].'</p>
                                            <!-- Post Meta -->
                                            <div class="post-meta">
                                                <p><a href="#" class="post-author">'.$set_new_blog[$key]['Location'].'</a> on <a href="#" class="post-date">
                                                '.$set_new_blog[$key]['Date'].'</a></p>
                                            </div>
                                        </div>
                                    </div>';
                                    }
                                    $i++;
                                    break;
                                }}
                        }
                        ?>
                    </div>

                    <div class="col-12 col-lg-4">
                        <div class="sidebar-widget-area">
                            <h5 class="title">Các bài viết mới nhất</h5>
                            <div class="widget-content">
                                <!-- 5 bài viết mới nhât -->
                                <?php
                                if(isset($data['set_new_blog'])){
                                    $set_new_blog= $data['set_new_blog'];
                                    $i=0;
                                    foreach($set_new_blog as $key => $value){
                                        foreach($value as $k => $vl){
                                            if($i <5){
                                                echo '<div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
                                                <!-- Post Thumbnail -->
                                                <div class="post-thumbnail">
                                                    <img src="./mvc/public/ImgNew/'.$set_new_blog[$key]['ImgNew1'].'" alt="">
                                                </div>
                                                <!-- Post Content -->
                                                <div class="post-content">
                                                    <a href="detailblog/post/'.$set_new_blog[$key]['slug'].'/'.$set_new_blog[$key]['IdNew'].'" class="headline">
                                                        <h5 class="mb-0">'.$set_new_blog[$key]['Title'].'
                                                        </h5>
                                                    </a>
                                                </div>
                                            </div>';
                                            $i++;
                                            break;
                                            }
                                        }}
                                }else{
                                    echo 123;
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
<!-- D:\Wamp\www\FoodOganicShop\mvc\public\user\js\jsblog -->
<script src="./mvc/public/user/js/jsblog/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="./mvc/public/user/js/jsblog/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="./mvc/public/user/js/jsblog/bootstrap.min.js"></script>
<!-- Plugins js -->
<script src="./mvc/public/user/js/jsblog/plugins.js"></script>
<!-- Active js -->
<script src="./mvc/public/user/js/jsblog/active.js"></script>