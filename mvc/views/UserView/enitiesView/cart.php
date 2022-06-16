<style>
    body {
        margin-top: 100px;
        color: #000;
        overflow-x: hidden;
        height: 100%;
        background-color: #fff;
        background-repeat: no-repeat;
    }

    .chosse-payment {
        width: 100%;
        display: flex;
        height: auto;
        align-items: center;
        background: cadetblue;
        color: white;
        font-size: 13px;
    }

    .plus-minus {
        position: relative;
    }

    .plus {
        position: absolute;
        top: -4px;
        left: 2px;
        cursor: pointer;
    }

    .minus {
        position: absolute;
        top: 8px;
        left: 5px;
        cursor: pointer;
    }

    .vsm-text:hover {
        color: #FF5252;
    }

    .book,
    .book-img {
        width: 120px;
        height: 180px;
        border-radius: 5px;
    }

    .book {
        margin: 20px 15px 5px 15px;
    }

    .border-top {
        border-top: 1px solid #EEEEEE !important;
        margin-top: 20px;
        padding-top: 15px;
    }

    .card {
        margin: 40px 0px;
        padding: 40px 50px;
        border-radius: 20px;
        border: none;
        box-shadow: 1px 5px 10px 1px rgba(0, 0, 0, 0.2);
    }

    input,
    textarea {
        background-color: #F3E5F5;
        padding: 8px 15px 8px 15px;
        width: 100%;
        border-radius: 5px !important;
        box-sizing: border-box;
        border: 1px solid #F3E5F5;
        font-size: 15px !important;
        color: #000 !important;
        font-weight: 300;
    }

    input:focus,
    textarea:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: 1px solid #9FA8DA;
        outline-width: 0;
        font-weight: 400;
    }

    button:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        outline-width: 0;
    }

    .pay {
        width: 80px;
        height: 40px;
        border-radius: 5px;
        border: 1px solid #673AB7;
        margin: 10px 20px 10px 0px;
        cursor: pointer;
        box-shadow: 1px 5px 10px 1px rgba(0, 0, 0, 0.2);
    }

    .gray {
        -webkit-filter: grayscale(100%);
        -moz-filter: grayscale(100%);
        -o-filter: grayscale(100%);
        -ms-filter: grayscale(100%);
        filter: grayscale(100%);
        color: #E0E0E0;
    }

    .gray .pay {
        box-shadow: none;
    }

    #tax {
        border-top: 1px lightgray solid;
        margin-top: 10px;
        padding-top: 10px;
    }

    .btn-blue {
        border: none;
        border-radius: 10px;
        background-color: #673AB7;
        color: #fff;
        padding: 8px 15px;
        margin: 20px 0px;
        cursor: pointer;
    }

    .btn-blue:hover {
        background-color: #311B92;
        color: #fff;
    }

    #checkout {
        float: left;
    }

    #check-amt {
        float: right;
    }

    @media screen and (max-width: 768px) {

        .book,
        .book-img {
            width: 100px;
            height: 150px;
        }

        .card {
            padding-left: 15px;
            padding-right: 15px;
        }

        .mob-text {
            font-size: 13px;
        }

        .pad-left {
            padding-left: 20px;
        }
    }
</style>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        function formatNumber (num) {
                return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
            }
        var arr_id_cart = [];
        var arr_id_prod= [];
        var arr_count_prod = [];
        $('.checked_payment').change(function () {
            id_card = $(this).attr('id-card');
            id_cart_prod=$(".data-id-prod-"+id_card+"").val();
            count_cart_prod = $(".count-prod-"+id_card+"").val();
            if ($(this).prop('checked')) {
                //nếu tích chọn thêm mặt hàng vào mục thanh toán
                arr_id_cart.push(id_card);
                arr_id_prod.push(id_cart_prod);
                arr_count_prod.push(count_cart_prod);
                // id_card = arr_id_cart[i];
                $.ajax({
                    url: 'cart/AjaxGetProdByIdCart',
                    type: "POST",
                    data: { id_card: id_card },
                    success: function (data) {
                        $(".contain-orderies").append(data);
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Đã tích chọn đồng ý đặt hàng, đặt hàng sớm để được kiểm duyệt !',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                })

            } else {
                // xoá mặt hàng khỏi thanh toán nếu ko tích chọn
                for (var i = 0; i < arr_id_cart.length; i++) {
                    if (arr_id_cart[i] === id_card) {
                        arr_id_cart.splice(i, 1);
                        arr_id_prod.splice(i,1);
                        arr_count_prod.splice(i,1);
                        $("#cart-" + id_card + "").remove();
                        i--;
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Xoá thành công mặt hàng khỏi danh sách thanh toán, tích chọn lại để thanh toán đặt hàng !',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                }
            }
            // console.log(arr_count_prod);
            $("#sum-order").html(arr_id_cart.length  +  " sản phẩm");

            var sum_price_prod = 30000;
            for (var i = 0; i < arr_id_cart.length; i++) {
                id_card = arr_id_cart[i];
                $.ajax({
                    url: 'cart/AjaxGetPriceByIdCart',
                    type: "POST",
                    data: { id_card: id_card },
                    success: function (data) {
                        sum_price_prod += parseInt(data);
                        $("#sum-payment").html(formatNumber(sum_price_prod) + " đồng");
                    }
                })
            }
            // console.log(arr_id_prod);
        });
         //xử lý duyệt hàng, mặt hàng nào được tích chọn được lưu vào một mảng, duyệt từng mảng đó và thêm vào csdl
        $(".order-user").click(function(){
            if(arr_id_cart.length == 0){
                Swal.fire(
                'Chưa chọn mặt hàng thanh toán?',
                'Bạn chưa chọn mặt hàng trong GIỎ HÀNG để Đặt Mua !',
                'question'
                )
            }else{
                //tạo một bill sau đó thêm trong bill các mặt hàng thanh toán cùng 1 lúc
                var idBillCurrent = Math.floor(Math.random() * 100000);
                $.ajax({
                    url: 'cart/AjaxCreateBillCurrent',
                    type: "POST",
                    data: { idBillCurrent: idBillCurrent },
                    success: function (data) {
                       if(data == true){
                        // sau khi đã tạo đc bill rồi, thì ứng với id bill sẽ là các mặt hàng mà khách hàng đã tích chọn
                        for(i = 0; i<arr_id_cart.length; i++){
                            $.ajax({
                                url: 'cart/AjaxCreateOrder',
                                type: "POST",
                                data: { idBillCurrent: idBillCurrent, arr_id_prod: arr_id_prod[i], count_prod:arr_count_prod[i] },
                                success: function (data) {
                                    if(data == true){
                                    }else{
                                        // lỗi khi tạo order
                                        alert(data);
                                    }
                                }
                            })
                        }
                        Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Đặt hàng, thành công. Chờ chúng tôi duyệt nhé! Hãy kiểm tra trong Mục Đơn Của Bạn. Chúng tôi sẽ liên hệ với bạn sớm nhất !',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        //xoá sản phẩm trong cart ở đây
                        for(i = 0; i<arr_id_cart.length; i++){
                            $.ajax({
                                url: 'cart/AjaxDelProdInCart',
                                type: "POST",
                                data: {id_cart_del: arr_id_cart[i] },
                                success: function (data) {
                                    if(data == 1){
                                        Swal.fire('Đợi chúng tôi duyệt hàng nhé !');
                                        setTimeout(function () { window.location.reload(1); }, 1500);

                                    }else{
                                        // lỗi khi Xoá Sản phẩm trong cart order
                                        alert(data);
                                    }
                                }
                            })
                        }
                       }else{
                        //lỗi khi tạo bill
                        alert(data );
                       }
                    }
                })
              
            }
        })

        // xoá mặt hàng đã chọn trong bản cart
        // thêm mặt hàng đã chọn vào bảng khác,  tất cả cả các mặt hàng đki cùng 1 lúc là 1 đơn
    })
</script>
<div class="container px-4 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-5">
            <h4 class="heading">Giỏ Hàng Của Bạn</h4>
        </div>
        <div class="col-7">
            <div class="row text-right">
                <div class="col-4">
                    <h6 class="mt-2">Trạng thái</h6>
                </div>
                <div class="col-4">
                    <h6 class="mt-2">Số lượng</h6>
                </div>
                <div class="col-4">
                    <h6 class="mt-2">Thành tiền</h6>
                </div>
            </div>
        </div>
    </div>
    <?php
    if(isset($data['rs_cart'])){
        $rs_cart = $data['rs_cart'];
        foreach($rs_cart as $key => $value){
            foreach($value as $k => $vl){
                echo '<div class="row d-flex justify-content-center border-top">
                <div class="col-5">
                    <div class="row d-flex">
                        <div class="book">
                            <div class="chosse-payment">
                                <input type="hidden" class = "count-prod-'. $rs_cart[$key]["idCard"].' " value= "'.$rs_cart[$key]["countProduct"].' " >
                                <input type="hidden" class ="data-id-prod-'.$rs_cart[$key]["idCard"].' " value = "'.$rs_cart[$key]["idProduct"].'">
                                <input type="checkbox" class="checked_payment" id-card="'.$rs_cart[$key]["idCard"].'" name="checked_payment" value="'.$rs_cart[$key]["idCard"].'" style="width: 30px; height: 30px">
                                <label for="vehicle1">Click chọn để thanh toán</label><br>
                            </div>
                            <img src="./mvc/public/ImgProduct/'.$rs_cart[$key]["imgProd1"].'" class="book-img">
                        </div>
                        <div class="my-auto flex-column d-flex pad-left">
                            <h6 class="mob-text" style="background: #546758; color: white" >'.$rs_cart[$key]["nameProduct"].'</h6>
                            <p class="mob-text" style="background: #71f58a"> '.$rs_cart[$key]["brand"].'</p>
                        </div>
                    </div>
                </div>
                <div class="my-auto col-7">
                    <div class="row text-right">
                        <div class="col-4">
                            <p class="mob-text">Chưa duyệt</p>
                        </div>
                        <div class="col-4" style="margin-right: 20px">
                            <div class="row d-flex justify-content-end px-3">
                                <p class="mb-0" id="cnt1">'.$rs_cart[$key]["countProduct"].'</p>
                                
                            </div>
                        </div>
                        <div class="col-1">
                            <h6 class="mob-text" style=" width: 50%; margin-left: 50px;">'.number_format($rs_cart[$key]["priceProduct"]).' đồng</h6>
                        </div>
                    </div>
                </div>
            </div>';
                break;
            }}
    }
    ?>
    <!-- đổ sản phẩm ở giỏ hàng ra ở đây -->



    <!-- phần thanh toán -->
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="row">
                    <div class="col-lg-3 radio-group">

                        <div class="row d-flex px-3 radio">
                            <img class="pay" style="width: 50px; height: 50px"
                                src="./mvc/public/ImgInterfaceDefault/imglogo/delivery-man.png">
                            <p class="my-auto">Thanh Toán Nhận Hàng</p>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="row px-2">
                            <div class="form-group col-md-6">
                                <label class="form-control-label">Tên Người Đặt</label>
                                <input type="text" id="cname" name="cname" placeholder="tên người đặt"
                                    value="<?php if(isset($_COOKIE['name'])){echo $_COOKIE['name'];}?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-control-label">Số Điện Thoại</label>
                                <input type="text" id="cnum" name="cnum" placeholder="số điện thoại"
                                    value="0<?php if(isset($_COOKIE['sdt'])){echo $_COOKIE['sdt'];}?>">
                            </div>
                        </div>
                        <div class="row px-2">
                            <div class="form-group col-md-6">
                                <label class="form-control-label">Địa Chỉ Nhận Hàng(Chỉ trong Đà Nẵng và Quảng
                                    Nam)</label>
                                <input type="text" id="exp" name="exp" placeholder="địa chỉ nhận hàng"
                                    value="<?php if(isset($_COOKIE['address'])){echo $_COOKIE['address'];}?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-control-label">Phương Thức Thanh Toán</label>
                                <input type="text" id="cvv" name="cvv" placeholder="Thanh toán khi nhận hàng"
                                    readonly="true">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-2 contain-orderies">

                        <div class="row d-flex justify-content-between px-4">
                            <p class="mb-1 text-left">Tổng Đơn Hàng(Số sản phẩm đã chọn)</p>
                            <h6 class="mb-1 text-right" id="sum-order"> 0 (sản phẩm)</h6>
                        </div>



                        <button class="btn-block btn-blue order-user" >
                            <span>
                                <span id="checkout" >Đặt Hàng</span>
                            </span>
                        </button>
                        <div class="row d-flex justify-content-between px-4">
                            <p class="mb-1 text-left">Phí Vận Chuyển</p>
                            <h6 class="mb-1 text-right">30,000 đồng</h6>
                        </div>
                        <div class="row d-flex justify-content-between px-4" id="tax">
                            <p class="mb-1 text-left">Tất Cả</p>
                            <h6 class="mb-1 text-right" id="sum-payment">0 đồng</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {

        $('.radio-group .radio').click(function () {
            $('.radio').addClass('gray');
            $(this).removeClass('gray');
        });

        $('.plus-minus .plus').click(function () {
            var count = $(this).parent().prev().text();
            $(this).parent().prev().html(Number(count) + 1);
        });

        $('.plus-minus .minus').click(function () {
            var count = $(this).parent().prev().text();
            $(this).parent().prev().html(Number(count) - 1);
        });

    });
</script>