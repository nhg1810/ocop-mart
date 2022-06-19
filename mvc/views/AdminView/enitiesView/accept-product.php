<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $(".accept-bill").click(function() {
            var idBill = $(this).attr('data-id-bill');
            var response =  prompt("Gửi phản hồi tới khách hang :", "Xin cảm ơn");
            if(response == "" || response == null){
                response = "Xin cảm ơn !";
            }
            $.ajax({
                url: 'admin/acceptProduct/AjaxAcceptBill',
                data: {
                    idBill: idBill, response:response
                },
                type: "POST",
                success: function(data) {
                    if(data==1){
                        Swal.fire('Duyệt hàng thành công! Đơn hàng sẽ được gửi đi.');
                        setTimeout(function() {
                        window.location.reload(1);
                    }, 1200);
                    }
                   
                }
            });

        })
        $(".no-accept-bill").click(function(){
            var idNoBill = $(this).attr('data-id-bill');
            var nresponse =  prompt("Gửi phản hồi tới khách hang :", "Xin lỗi, chúng tôi không thể duyệt đơn này");
            if(nresponse == "" || nresponse == null){
                nresponse = "chúng tôi không thể duyệt đơn này !";
            }
            $.ajax({
                url: 'admin/acceptProduct/AjaxNoAcceptBill',
                data: {
                    idNoBill: idNoBill, nresponse:nresponse
                },
                type: "POST",
                success: function(data) {
                    if(data==1){
                        Swal.fire('Không duyệt đơn hàng này!');
                        setTimeout(function() {
                        window.location.reload(1);
                    }, 1200);
                    }
                   
                }
            });
        })
    })
</script>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Các đơn cần xác nhận</h4>
                        <p class="card-description">
                            Chỉ được sử dụng <code>bởi người quản trị</code>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>
                                            Duyệt
                                        </th>
                                        <th>
                                            Không Duyệt
                                        </th>
                                        <th>
                                            Id Đơn Hàng
                                        </th>
                                        <th>
                                            Ngày Đặt
                                        </th>
                                        <th>
                                            Tên Khách Hàng
                                        </th>
                                        <th>
                                            Địa Chỉ Nhận Hàng
                                        </th>
                                        <th>
                                            Tổng đơn hàng
                                        </th>
                                        <th>
                                            Tên Sản Phẩm
                                        </th>
                                        <th>
                                            Giá
                                        </th>
                                        <th>
                                            Sale
                                        </th>
                                        <th>
                                            Ảnh
                                        </th>
                                        <th>
                                            Số Lượng
                                        </th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    if (isset($data['set_bill_no_accpet'])) {
                                        $set_bill_no_accpet = $data['set_bill_no_accpet'];
                                        $idBill = 0;
                                        foreach ($set_bill_no_accpet as $key => $value) {
                                            foreach ($value as $k => $vl) {
                                                echo '  <tr>
                                                <td>
                                                ';
                                                if ($idBill != $set_bill_no_accpet[$key]['idBill']) {
                                                    echo '<label class="badge badge-info accept-bill" style="cursor: pointer;" data-id-bill= ' . $set_bill_no_accpet[$key]['idBill'] . '>Duyệt</label>';
                                                } else {
                                                    echo "";
                                                }
                                                echo '
                                                </td>
                                                <td>
                                                ';
                                                if ($idBill != $set_bill_no_accpet[$key]['idBill']) {
                                                    echo '<label class="badge badge-danger no-accept-bill" style="cursor: pointer;" data-id-bill= ' . $set_bill_no_accpet[$key]['idBill'] . '>Không Duyệt</label>';
                                                } else {
                                                    echo "";
                                                }
                                                echo'
                                                </td>
                                    <td>';
                                                if ($idBill != $set_bill_no_accpet[$key]['idBill']) {
                                                    echo '<label class="badge badge-success">' . $set_bill_no_accpet[$key]['idBill'] . '</label>';
                                                } else {
                                                    echo "";
                                                }
                                                echo '
                                  </td>
                                  <td>
                                  ';
                                                if ($idBill != $set_bill_no_accpet[$key]['idBill']) {
                                                    echo $set_bill_no_accpet[$key]['dateOrder'];
                                                } else {
                                                    echo "";
                                                }
                                                echo '</td>
                                <td style="width: 50px; height: auto; white-space: initial; line-height: 20px">
                                ';
                                                if ($idBill != $set_bill_no_accpet[$key]['idBill']) {
                                                    echo $set_bill_no_accpet[$key]['name'];
                                                } else {
                                                    echo "";
                                                }
                                                echo '</td>
                                <td style="width: 50px; height: auto; white-space: initial; line-height: 20px">
                                ';
                                                if ($idBill != $set_bill_no_accpet[$key]['idBill']) {
                                                    echo $set_bill_no_accpet[$key]['address'];
                                                } else {
                                                    echo "";
                                                }
                                                echo '</td >
                                <td>
                                ';
                                                $sum = 0;
                                                $idSBill = 0;
                                                if ($idBill != $set_bill_no_accpet[$key]['idBill']) {
                                                    foreach ($set_bill_no_accpet as $key1 => $value1) {
                                                        foreach ($value1 as $k => $vl) {
                                                            if ($set_bill_no_accpet[$key]['idBill'] == $set_bill_no_accpet[$key1]['idBill']) {
                                                                $sum += (($set_bill_no_accpet[$key1]['priceProduct'] - $set_bill_no_accpet[$key1]['sale'] / 100 * $set_bill_no_accpet[$key1]['priceProduct']) * $set_bill_no_accpet[$key1]['countProd'] + 30000);
                                                            }
                                                            break;
                                                        }
                                                    }
                                                    echo number_format($sum) . " đ";
                                                } else {
                                                    echo "";
                                                }
                                                echo '
                                </td>
                                <td>
                                ' . $set_bill_no_accpet[$key]['nameProduct'] . '
                              </td>
                                    <td class="py-1">
                                    ' . number_format($set_bill_no_accpet[$key]['priceProduct']) . ' Đ
                                    </td>
                                    <td class="py-1">
                                    ' . number_format($set_bill_no_accpet[$key]['sale']) . ' %
                                    </td>
                                  
                                    <td>
                                      <img src="./mvc/public/ImgProduct/' . $set_bill_no_accpet[$key]['imgProd1'] . '" alt="">
                                    </td>
                                    <td>
                                      ' . $set_bill_no_accpet[$key]['countProd'] . '
                                    </td>
                                    <td>
                                    
                                    </td>
                                  </tr>';
                                                $idBill = $set_bill_no_accpet[$key]['idBill'];
                                                break;
                                            }
                                        }
                                    }
                                    ?>

                                    <!-- <tr>
                          <td class="py-1">
                            <img src="../../images/faces/face2.jpg" alt="image"/>
                          </td>
                          <td>
                            Messsy Adam
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $245.30
                          </td>
                          <td>
                            July 1, 2015
                          </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="../../images/faces/face3.jpg" alt="image"/>
                          </td>
                          <td>
                            John Richards
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $138.00
                          </td>
                          <td>
                            Apr 12, 2015
                          </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="../../images/faces/face4.jpg" alt="image"/>
                          </td>
                          <td>
                            Peter Meggik
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $ 77.99
                          </td>
                          <td>
                            May 15, 2015
                          </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="../../images/faces/face5.jpg" alt="image"/>
                          </td>
                          <td>
                            Edward
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $ 160.25
                          </td>
                          <td>
                            May 03, 2015
                          </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="../../images/faces/face6.jpg" alt="image"/>
                          </td>
                          <td>
                            John Doe
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $ 123.21
                          </td>
                          <td>
                            April 05, 2015
                          </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="../../images/faces/face7.jpg" alt="image"/>
                          </td>
                          <td>
                            Henry Tom
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $ 150.00
                          </td>
                          <td>
                            June 16, 2015
                          </td>
                        </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>