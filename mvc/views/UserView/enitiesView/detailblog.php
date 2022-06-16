<style>
    .contain-detail-post {
        width: 95%;
        min-height: 500px;
        margin: auto;
        margin-top: 100px;
    }

    .ds_section {
        text-indent: 30px;
        overflow: unset;
        word-break: break-word;
        white-space: pre-line;
        margin-left: 10px;
        color: black;
    }
</style>
<link rel="stylesheet" href="./mvc/public/user/css/cssblog/style.css">
<div class="contain-detail-post">
    <div id="preloader">
        <div class="preload-content">
            <div id="world-load"></div>
        </div>
    </div>
    <!-- ********** Hero Area Start  ********** -->
    <div class="hero-area height-600 bg-img background-overlay" style="background-image: url(./mvc/public/ImgNew/bg-slide-new1.avif);">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="single-blog-title text-center">
                        <!-- danh mục và tiêu đề bài viết -->
                        <?php
                        if(isset($data['set_detail_post'])){
                            $set_detail_post = $data['set_detail_post'];
                            foreach($set_detail_post as $key => $value){
                                foreach($value as $k => $vl){
                                    echo ' <div class="post-cta"><a href="detailblog/post/'.$set_detail_post[$key]['slug'].'/'.$set_detail_post[$key]['IdNew'].'">'.$set_detail_post[$key]['NameCateNews'].'</a></div>
                                    <h3>'.$set_detail_post[$key]['Title'].'</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-content-wrapper section-padding-100">
                    <div class="container">
                        <div class="row justify-content-center">
                            <!-- ============= Post Content Area ============= -->
                            <div class="col-12 col-lg-8">
                                <div class="single-blog-content mb-100">
                                    <!-- Post Meta -->
                                    <div class="post-meta">
                                        <p><a href="#" class="post-author">'.$set_detail_post[$key]['Location'].'</a> on <a href="#" class="post-date">'.$set_detail_post[$key]['Date'].'</a></p>
                                    </div>
                                    <!-- Post Content -->
                                    <div class="post-content">
                                    <img src="./mvc/public/ImgNew/'.$set_detail_post[$key]['ImgNew1'].'" alt="">
                                        <h6 class="ds_section">'.$set_detail_post[$key]['Section1'].'</h6>
                                        <img src="./mvc/public/ImgNew/'.$set_detail_post[$key]['ImgNew2'].'" alt="">

                                        <h6 class="ds_section">'.$set_detail_post[$key]['Section2'].'</h6>
                                        <blockquote class="mb-30">
                                            <h6 class="ds_section">'.$set_detail_post[$key]['Section3'].'</h6>
                                            <div class="post-author">
                                                <p>'.$set_detail_post[$key]['Date'].'</p>
                                            </div>
                                        </blockquote>';
                                    break;
                                }}
                        }
                        ?>



                    </div>
                </div>
            </div>

            <!-- ========== Sidebar Area ========== -->
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

        <!-- ============== 3 BÀI VIẾT LIÊN QUAN ============== -->
        <div class="row">
            <?php
                if(isset($data['set_relavite_post'])){
                    $set_relavite_post = $data['set_relavite_post'];
                    foreach($set_relavite_post as $key => $value){
                        foreach($value as $k => $vl){
                            echo'  <div class="col-12 col-md-6 col-lg-4">
                            <!-- Single Blog Post -->
                            <div class="single-blog-post">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="./mvc/public/ImgNew/'.$set_relavite_post[$key]['ImgNew1'].'" alt="">
                                    <!-- Catagory -->
                                    <div class="post-cta"><a href="#">'.$set_relavite_post[$key]['NameCateNews'].'</a></div>
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <a href="detailblog/post/'.$set_relavite_post[$key]['slug'].'/'.$set_relavite_post[$key]['IdNew'].'" class="headline">
                                        <h5>'.$set_relavite_post[$key]['Title'].'</h5>
                                    </a>
                                    <p>'.$set_relavite_post[$key]['Section1'].'</p>
                                    <!-- Post Meta -->
                                    <div class="post-meta">
                                        <p><a href="#" class="post-author">'.$set_relavite_post[$key]['Location'].'</a> on <a href="#" class="post-date">'.$set_relavite_post[$key]['Date'].'</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>';
                            break;
                        }}
                }
                ?>

        </div>

        <!-- phần bình luận của khách hàng -->
        <!-- <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="post-a-comment-area mt-70">
                        <h5>Get in Touch</h5>
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="group">
                                        <input type="text" name="name" id="name" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Enter your name</label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="group">
                                        <input type="email" name="email" id="email" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Enter your email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="group">
                                        <textarea name="message" id="message" required></textarea>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Enter your comment</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn world-btn">Post comment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-lg-8">
                    <div class="comment_area clearfix mt-70">
                        <ol>
                            <li class="single_comment_area">
                                <div class="comment-content">
                                    <div class="comment-meta d-flex align-items-center justify-content-between">
                                        <p><a href="#" class="post-author">Katy Liu</a> on <a href="#"
                                                class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                                        <a href="#" class="comment-reply btn world-btn">Reply</a>
                                    </div>
                                    <p>Pick the yellow peach that looks like a sunset with its red, orange, and pink
                                        coat skin, peel it off with your teeth. Sink them into unripened...</p>
                                </div>
                                <ol class="children">
                                    <li class="single_comment_area">
                                        <div class="comment-content">
                                            <div class="comment-meta d-flex align-items-center justify-content-between">
                                                <p><a href="#" class="post-author">Katy Liu</a> on <a href="#"
                                                        class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                                                <a href="#" class="comment-reply btn world-btn">Reply</a>
                                            </div>
                                            <p>Pick the yellow peach that looks like a sunset with its red, orange, and
                                                pink coat skin, peel it off with your teeth. Sink them into unripened...
                                            </p>
                                        </div>
                                    </li>
                                </ol>
                            </li>

                            <li class="single_comment_area">
                                <div class="comment-content">
                                    <div class="comment-meta d-flex align-items-center justify-content-between">
                                        <p><a href="#" class="post-author">Katy Liu</a> on <a href="#"
                                                class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                                        <a href="#" class="comment-reply btn world-btn">Reply</a>
                                    </div>
                                    <p>Pick the yellow peach that looks like a sunset with its red, orange, and pink
                                        coat skin, peel it off with your teeth. Sink them into unripened...</p>
                                </div>
                            </li>

                        </ol>
                    </div>
                </div>
            </div> -->
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