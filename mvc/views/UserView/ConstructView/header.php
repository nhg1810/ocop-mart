<style>
    .contain-infor-user {
        width: 100%;
        height: auto;
        display: flex;
        align-items: center;
    }

    .contain-infor-user .infor {
        margin-left: 10px;
        display: flex;
        flex-direction: column;
    }

    .contain-infor-user .infor>p {
        line-height: 15px;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $("#cart-btn").click(function () {
            $.ajax({
                url: 'detailProd/GetCardUser',
                type: "GET",
                success: function (data) {
                    if (data == false) {
                        Swal.fire('Bạn phải đăng nhập đã !!!');
                        setTimeout(function () { window.location.href = 'login'; }, 1200);
                    } else {
                        $(".shopping-cart").html(data);
                        //xoá card ở đây
                        $(".del-card-user").click(function () {
                            var id_card = $(this).attr('data-id-card');
                            Swal.fire({
                                title: 'Bạn có chắc muốn xoá sản phẩm này trong giỏ hàng chứ ?',
                                showDenyButton: true,
                                showCancelButton: true,
                                confirmButtonText: 'Đồng ý',
                                denyButtonText: `Huỷ Bỏ`,
                            }).then((result) => {
                                /* Read more about isConfirmed, isDenied below */
                                if (result.isConfirmed) {
                                    $.ajax({
                                        url: 'detailProd/DelCardUser',
                                        type: "POST",
                                        data: { id_card: id_card },
                                        success: function (data) {
                                            if (data == 1) {
                                                setTimeout(function () { window.location.reload(1); }, 1000);
                                                Swal.fire('Xoá thành công!', '', 'success');
                                            }
                                        }
                                    })
                                } else if (result.isDenied) {
                                    Swal.fire('Thao tác chưa được thực hiện', '', 'info')
                                }
                            })
                        })
                    }
                }
            })
        })

    })
</script>
<header class="header">

    <a href="home.html" class="logo"> <i class="fas fa-shopping-basket"></i> OCOP-Mart </a>

    <nav class="navbar">
        <a href="home">Trang Chủ</a>
        <a href="shop/page/1">OCOP-Mart</a>
        <a href="about">Giới Thiệu</a>
        <a href="blog">Blog</a>
        <a href="contact">Liên Hệ</a>
        <a href="delivery/don-hang-cua-toi">Đơn Hàng</a>

    </nav>

    <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <div id="search-btn" class="fas fa-search"></div>
        <div id="cart-btn" class="fas fa-shopping-cart"></div>
        <div id="login-btn" class="fas fa-user"></div>
    </div>

    <form action="" class="search-form">
        <input type="search" placeholder="search here..." id="search-box">
        <label for="search-box" class="fas fa-search"></label>
    </form>

    <div class="shopping-cart">
        <!-- thông tin giỏ hàng nằm ở đây -->



    </div>

    <form action="" class="login-form">
        <h3>Thông tin của bạn</h3>
        <div class="contain-infor-user">
            <img src=" <?php if(isset($_COOKIE['avata'])){echo './mvc/public/ImgInterfaceDefault/imgAvataUser/'.$_COOKIE['avata']; } else{echo ' ./mvc/public/ImgInterfaceDefault/imglogo/profile.png ' ; }?>"
                class="avata" style="width: 80px; height: 80px; border-radius: 50%;" alt="">
            <div class="infor">
                <p>Tên: <a href="javascript: value(0)">
                        <?php if(isset($_COOKIE['name'])){echo $_COOKIE['name']; }?>
                    </a> <a
                        href="<?php if( isset($_SESSION['username'])  &&  isset($_SESSION['password'])) {echo 'updateAccount/chinh-sua-thong-tin-ca-nhan'; } else{echo 'login';}?>"
                        style="color: red">Chỉnh sửa</a></p>
                <p>Số điện thoại: <a href="javascript: value(0)">+
                        <?php if(isset($_COOKIE['sdt'])){echo $_COOKIE['sdt']; }?>
                    </a></p>
                <p>Địa chỉ nhận hàng: <a href="javascript: value(0)">
                        <?php if(isset($_COOKIE['address'])){echo $_COOKIE['address']; }?>
                    </a></p>
            </div>
        </div>


        <p>Quên mật khẩu <a href="#">click tại đây</a></p>
        <?php
        if(isset($_SESSION['username'])){
            echo '<p>Đăng xuất ngay <a href="login/LogOut">Đăng xuất</a></p>
            ';
        }else{
            echo '<p>Chưa có tài khoản <a href="register">Tạo ngay</a></p>
            <a href="login" style="background: #4f9186; padding: 10px; color: white;">Đăng nhập</a>
            ';
        }
        ?>
    </form>

</header>