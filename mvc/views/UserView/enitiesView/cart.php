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
    $(document).ready(function() {
        function formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
        }
        var arr_id_cart = [];
        var arr_id_prod = [];
        var arr_count_prod = [];
        $('.checked_payment').change(function() {
            id_card = $(this).attr('id-card');
            id_cart_prod = $(".data-id-prod-" + id_card + "").val();
            count_cart_prod = $(".count-prod-" + id_card + "").val();
            if ($(this).prop('checked')) {
                //n???u t??ch ch???n th??m m???t h??ng v??o m???c thanh to??n
                arr_id_cart.push(id_card);
                arr_id_prod.push(id_cart_prod);
                arr_count_prod.push(count_cart_prod);
                // id_card = arr_id_cart[i];
                $.ajax({
                    url: 'cart/AjaxGetProdByIdCart',
                    type: "POST",
                    data: {
                        id_card: id_card
                    },
                    success: function(data) {
                        $(".contain-orderies").append(data);
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: '???? t??ch ch???n ?????ng ?? ?????t h??ng, ?????t h??ng s???m ????? ???????c ki???m duy???t !',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                })

            } else {
                // xo?? m???t h??ng kh???i thanh to??n n???u ko t??ch ch???n
                for (var i = 0; i < arr_id_cart.length; i++) {
                    if (arr_id_cart[i] === id_card) {
                        arr_id_cart.splice(i, 1);
                        arr_id_prod.splice(i, 1);
                        arr_count_prod.splice(i, 1);
                        $("#cart-" + id_card + "").remove();
                        i--;
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Xo?? th??nh c??ng m???t h??ng kh???i danh s??ch thanh to??n, t??ch ch???n l???i ????? thanh to??n ?????t h??ng !',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                }
            }
            // console.log(arr_count_prod);
            $("#sum-order").html(arr_id_cart.length + " s???n ph???m");

            var sum_price_prod = 30000;
            for (var i = 0; i < arr_id_cart.length; i++) {
                id_card = arr_id_cart[i];
                $.ajax({
                    url: 'cart/AjaxGetPriceByIdCart',
                    type: "POST",
                    data: {
                        id_card: id_card
                    },
                    success: function(data) {
                        sum_price_prod += parseInt(data);
                        $("#sum-payment").html(formatNumber(sum_price_prod) + " ?????ng");
                    }
                })
            }
            // console.log(arr_id_prod);
        });
        //x??? l?? duy???t h??ng, m???t h??ng n??o ???????c t??ch ch???n ???????c l??u v??o m???t m???ng, duy???t t???ng m???ng ???? v?? th??m v??o csdl
        $(".order-user").click(function() {
            var nameOder = $("#cname").val();
            var phoneOrder = $("#cnum").val();
            var addressOrder = $("#caddress").val();
            if (nameOder == "" || phoneOrder == "" || addressOrder == "") {
                Swal.fire({
                    icon: 'error',
                    title: 'L???i',
                    text: 'C??c th??ng tin ?????t h??ng ??ang tr???ng!',
                    footer: '<a href="#">Vui l??ng th??? l???i</a>'
                })
            } else {
                // alert(nameOder);
                if (arr_id_cart.length == 0) {
                    Swal.fire(
                        'Ch??a ch???n m???t h??ng thanh to??n?',
                        'B???n ch??a ch???n m???t h??ng trong GI??? H??NG ????? ?????t Mua !',
                        'question'
                    )
                } else {
                    //t???o m???t bill sau ???? th??m trong bill c??c m???t h??ng thanh to??n c??ng 1 l??c
                    var idBillCurrent = Math.floor(Math.random() * 100000);
                    $.ajax({
                        url: 'cart/AjaxCreateBillCurrent',
                        type: "POST",
                        data: {
                            idBillCurrent: idBillCurrent, phoneOrder:phoneOrder, addressOrder:addressOrder
                        },
                        success: function(data) {
                            if (data == true) {
                                // sau khi ???? t???o ??c bill r???i, th?? ???ng v???i id bill s??? l?? c??c m???t h??ng m?? kh??ch h??ng ???? t??ch ch???n
                                for (i = 0; i < arr_id_cart.length; i++) {
                                    $.ajax({
                                        url: 'cart/AjaxCreateOrder',
                                        type: "POST",
                                        data: {
                                            idBillCurrent: idBillCurrent,
                                            arr_id_prod: arr_id_prod[i],
                                            count_prod: arr_count_prod[i]
                                        },
                                        success: function(data) {
                                            if (data == true) {} else {
                                                // l???i khi t???o order
                                                alert(data);
                                            }
                                        }
                                    })
                                }
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: '?????t h??ng, th??nh c??ng. Ch??? ch??ng t??i duy???t nh??! H??y ki???m tra trong M???c ????n C???a B???n. Ch??ng t??i s??? li??n h??? v???i b???n s???m nh???t !',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                //xo?? s???n ph???m trong cart ??? ????y
                                for (i = 0; i < arr_id_cart.length; i++) {
                                    $.ajax({
                                        url: 'cart/AjaxDelProdInCart',
                                        type: "POST",
                                        data: {
                                            id_cart_del: arr_id_cart[i]
                                        },
                                        success: function(data) {
                                            if (data == 1) {
                                                Swal.fire('?????i ch??ng t??i duy???t h??ng nh?? !');
                                                setTimeout(function() {
                                                    window.location.reload(1);
                                                }, 1500);

                                            } else {
                                                // l???i khi Xo?? S???n ph???m trong cart order
                                                alert(data);
                                            }
                                        }
                                    })
                                }
                            } else {
                                //l???i khi t???o bill
                                alert(data);
                            }
                        }
                    })

                }
            }

        })

        // xo?? m???t h??ng ???? ch???n trong b???n cart
        // th??m m???t h??ng ???? ch???n v??o b???ng kh??c,  t???t c??? c??? c??c m???t h??ng ??ki c??ng 1 l??c l?? 1 ????n
    })
</script>
<div class="container px-4 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-5">
            <h4 class="heading">Gi??? H??ng C???a B???n</h4>
        </div>
        <div class="col-7">
            <div class="row text-right">
                <div class="col-4">
                    <h6 class="mt-2">Tr???ng th??i</h6>
                </div>
                <div class="col-4">
                    <h6 class="mt-2">S??? l?????ng</h6>
                </div>
                <div class="col-4">
                    <h6 class="mt-2">Th??nh ti???n</h6>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($data['rs_cart'])) {
        $rs_cart = $data['rs_cart'];
        foreach ($rs_cart as $key => $value) {
            foreach ($value as $k => $vl) {
                echo '<div class="row d-flex justify-content-center border-top">
                <div class="col-5">
                    <div class="row d-flex">
                        <div class="book">
                            <div class="chosse-payment">
                                <input type="hidden" class = "count-prod-' . $rs_cart[$key]["idCard"] . ' " value= "' . $rs_cart[$key]["countProduct"] . ' " >
                                <input type="hidden" class ="data-id-prod-' . $rs_cart[$key]["idCard"] . ' " value = "' . $rs_cart[$key]["idProduct"] . '">
                                <input type="checkbox" class="checked_payment" id-card="' . $rs_cart[$key]["idCard"] . '" name="checked_payment" value="' . $rs_cart[$key]["idCard"] . '" style="width: 30px; height: 30px">
                                <label for="vehicle1">Click ch???n ????? thanh to??n</label><br>
                            </div>
                            <img src="./mvc/public/ImgProduct/' . $rs_cart[$key]["imgProd1"] . '" class="book-img">
                        </div>
                        <div class="my-auto flex-column d-flex pad-left">
                            <h6 class="mob-text" style="background: #546758; color: white" >' . $rs_cart[$key]["nameProduct"] . '</h6>
                            <p class="mob-text" style="background: #71f58a"> ' . $rs_cart[$key]["brand"] . '</p>
                        </div>
                    </div>
                </div>
                <div class="my-auto col-7">
                    <div class="row text-right">
                        <div class="col-4">
                            <p class="mob-text">Ch??a duy???t</p>
                        </div>
                        <div class="col-4" style="margin-right: 20px">
                            <div class="row d-flex justify-content-end px-3">
                                <p class="mb-0" id="cnt1">' . $rs_cart[$key]["countProduct"] . '</p>
                                
                            </div>
                        </div>
                        <div class="col-1">
                            <h6 class="mob-text" style=" width: 50%; margin-left: 50px;">' . number_format($rs_cart[$key]["priceProduct"]) . ' ?????ng</h6>
                        </div>
                    </div>
                </div>
            </div>';
                break;
            }
        }
    }
    ?>
    <!-- ????? s???n ph???m ??? gi??? h??ng ra ??? ????y -->



    <!-- ph???n thanh to??n -->
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="row">
                    <div class="col-lg-3 radio-group">

                        <div class="row d-flex px-3 radio">
                            <img class="pay" style="width: 50px; height: 50px" src="./mvc/public/ImgInterfaceDefault/imglogo/delivery-man.png">
                            <p class="my-auto">Thanh To??n Nh???n H??ng</p>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="row px-2">
                            <div class="form-group col-md-6">
                                <label class="form-control-label">T??n Ng?????i ?????t</label>
                                <input type="text" id="cname" name="cname" placeholder="t??n ng?????i ?????t" value="<?php if (isset($_COOKIE['name'])) {
                                                                                                                    echo $_COOKIE['name'];
                                                                                                                } ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-control-label">S??? ??i???n Tho???i</label>
                                <input type="text" id="cnum" name="cnum" placeholder="s??? ??i???n tho???i" value="0<?php if (isset($_COOKIE['sdt'])) {
                                                                                                                    echo $_COOKIE['sdt'];
                                                                                                                } ?>">
                            </div>
                        </div>
                        <div class="row px-2">
                            <div class="form-group col-md-6">
                                <label class="form-control-label">?????a Ch??? Nh???n H??ng(Ch??? trong ???? N???ng v?? Qu???ng
                                    Nam)</label>
                                <input type="text" id="caddress" name="exp" placeholder="?????a ch??? nh???n h??ng" value="<?php if (isset($_COOKIE['address'])) {
                                                                                                                        echo $_COOKIE['address'];
                                                                                                                    } ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-control-label">Ph????ng Th???c Thanh To??n</label>
                                <input type="text" id="cvv" name="cvv" placeholder="Thanh to??n khi nh???n h??ng" readonly="true">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-2 contain-orderies">

                        <div class="row d-flex justify-content-between px-4">
                            <p class="mb-1 text-left">T???ng ????n H??ng(S??? s???n ph???m ???? ch???n)</p>
                            <h6 class="mb-1 text-right" id="sum-order"> 0 (s???n ph???m)</h6>
                        </div>



                        <button class="btn-block btn-blue order-user">
                            <span>
                                <span id="checkout">?????t H??ng</span>
                            </span>
                        </button>
                        <div class="row d-flex justify-content-between px-4">
                            <p class="mb-1 text-left">Ph?? V???n Chuy???n</p>
                            <h6 class="mb-1 text-right">30,000 ?????ng</h6>
                        </div>
                        <div class="row d-flex justify-content-between px-4" id="tax">
                            <p class="mb-1 text-left">T???t C???</p>
                            <h6 class="mb-1 text-right" id="sum-payment">0 ?????ng</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        $('.radio-group .radio').click(function() {
            $('.radio').addClass('gray');
            $(this).removeClass('gray');
        });

        $('.plus-minus .plus').click(function() {
            var count = $(this).parent().prev().text();
            $(this).parent().prev().html(Number(count) + 1);
        });

        $('.plus-minus .minus').click(function() {
            var count = $(this).parent().prev().text();
            $(this).parent().prev().html(Number(count) - 1);
        });

    });
</script>