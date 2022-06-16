<style>
  .gradient-custom-2 {
    /* fallback for old browsers */
    background: #a1c4fd;

    /* Chrome 10-25, Safari 5.1-6 */
    background: -webkit-linear-gradient(to right, rgba(161, 196, 253, 1), rgba(194, 233, 251, 1));

    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    background: linear-gradient(to right, rgb(55 143 55), rgba(194, 233, 251, 1))
  }

  #progressbar-1 {
    color: #455A64;
  }

  #progressbar-1 li {
    list-style-type: none;
    font-size: 13px;
    width: 33.33%;
    float: left;
    position: relative;
  }

  #progressbar-1 #step1:before {
    content: "1";
    color: #fff;
    width: 29px;
    margin-left: 22px;
    padding-left: 11px;
  }

  #progressbar-1 #step2:before {
    content: "2";
    color: #fff;
    width: 29px;
  }

  #progressbar-1 #step3:before {
    content: "3";
    color: #fff;
    width: 29px;
    margin-right: 22px;
    text-align: center;
  }

  #progressbar-1 li:before {
    line-height: 29px;
    display: block;
    font-size: 12px;
    background: #455A64;
    border-radius: 50%;
    margin: auto;
  }

  #progressbar-1 li:after {
    content: '';
    width: 121%;
    height: 2px;
    background: #455A64;
    position: absolute;
    left: 0%;
    right: 0%;
    top: 15px;
    z-index: -1;
  }

  #progressbar-1 li:nth-child(2):after {
    left: 50%
  }

  #progressbar-1 li:nth-child(1):after {
    left: 25%;
    width: 121%
  }

  #progressbar-1 li:nth-child(3):after {
    left: 25%;
    width: 50%;
  }

  .mr-30 {
    margin-top: 50px;
  }

  #progressbar-1 li.active:before,
  #progressbar-1 li.active:after {
    background: #1266f1;
  }
</style>
<section class=" gradient-custom-2">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <!-- các đơn hàng nằm ở đây -->
      <?php
        if(isset($data['set_bill_user'])){
            $set_bill_user = $data['set_bill_user'];
            $idBill=0;
            foreach($set_bill_user as $key => $value){
                foreach($value as $k => $vl){
                  $sum = 0;
                  if($set_bill_user[$key]['idBill'] !=  $idBill){
                    $idBill = $set_bill_user[$key]['idBill'];
                    echo ' <div class="col-md-10 col-lg-8 col-xl-6 mr-30">
                    <div class="card card-stepper" style="border-radius: 16px;">
                      <div class="card-header p-4">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class=" mb-2" style="color: #2b68ba"> Ngày đặt: '.$set_bill_user[$key]['dateOrder'].' </h4>
                            <p class="text-muted mb-2"> Order ID:'.$set_bill_user[$key]['idBill'].'  <span class="fw-bold text-body"></span></p>
                            <p class="text-muted mb-0"> Địa chỉ nhận hàng: '.$set_bill_user[$key]['address'].' <span class="fw-bold text-body"></span> </p>
                          </div>
                          <div>
                            <h6 class="mb-0"> <a href="#">';if($set_bill_user[$key]['statusAccept'] == 0){echo "Chưa xác nhận";} else{echo "Đã xác nhận, chờ nhận hàng";}  echo '</a> </h6>
                          </div>
                        </div>
                      </div> ';

                      foreach($set_bill_user as $key1 => $value){
                        foreach($value as $k => $vl){
                          if($set_bill_user[$key1]['idBill'] == $set_bill_user[$key]['idBill']){
                            $sum +=   ($set_bill_user[$key1]['priceProduct'] -($set_bill_user[$key1]['sale'] / 100)*$set_bill_user[$key1]['priceProduct']) * $set_bill_user[$key1]['countProd'];
                            echo'
                            <div class="card-body p-4">
                              <div class="d-flex flex-row mb-4 pb-2">
                                <div class="flex-fill">
                                  <h5 class="bold">'.$set_bill_user[$key1]['nameProduct'].'</h5>
                                  <p class="text-muted"> Số lượng: '.$set_bill_user[$key1]['countProd'].' (sản phẩm)</p>
                                  <h4 class="mb-3"> '.number_format($set_bill_user[$key1]['priceProduct'] -($set_bill_user[$key1]['sale'] / 100)*$set_bill_user[$key1]['priceProduct']).'  Đồng <span class="small text-muted"> sales: '.$set_bill_user[$key1]['sale'].'%  </span></h4>
                                  <p class="text-muted">Ngày đặt: <span class="text-body">'.$set_bill_user[$key1]['dateOrder'].'</span></p>
                                </div>
                                <div>
                                  <img class="align-self-center img-fluid"
                                    src="./mvc/public/ImgProduct/'.$set_bill_user[$key1]['imgProd1'].'" width="250">
                                </div>
                              </div>
                             
                            </div>';
                          }
                          break;
                        }}
                      
                        
                    

                        echo '
                        <ul id="progressbar-1" class="mx-0 mt-0 mb-5 px-0 pt-0 pb-4">
                        <li class="step0 active" id="step1"><span
                            style="margin-left: 22px; margin-top: 12px;">Đặt hàng</span></li>

                        <li class="step0 '; if($set_bill_user[$key]['statusAccept'] == 1){echo "active";} echo' text-center" id="step2"><span>Duyệt hàng</span></li>

                        <li class="step0 text-muted text-end" id="step3"><span
                            style="margin-right: 22px;">Quá trình vận chuyển</span></li>
                      </ul>
                        <div class="card-footer p-4">
                        <div class="col-md-12">
                        <div class="card mb-4">
                          <div class="card-header py-3">
                            <h5 class="mb-0">Tổng thanh toán: </h5>
                          </div>
                          <div class="card-body">
                            <ul class="list-group list-group-flush">
                              <li style="font-size: 14px"
                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                Tiền mua hàng
                                <p>'.number_format($sum).' Đồng</p>
                              </li>
                              <li style="font-size: 14px"class="list-group-item d-flex justify-content-between align-items-center px-0">
                                Phí vận chuyển
                                <span>Bộ phận vận chuyển của shop(30.000 đồng)</span>
                              </li>
                              <li style="font-size: 14px"
                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                  <strong>Tổng cộng</strong>
                                  <strong>
                                    <p class="mb-0">(bao gồm VAT)</p>
                                  </strong>
                                </div>
                                <span><strong>'.number_format($sum + 30000).' Đồng</strong></span>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      </div>
                    </div>
                  </div>';

                  }
                    break;
                }
              }
        }
        ?>



    </div>
  </div>

</section>