<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $(".re-accepting").click(function(){
            var idBill = $(this).attr('data-id-bill');
            var response =  prompt("Gửi phản hồi tới khách hang :", "Xin cảm ơn");
            if(response == "" || response == null){
                response = "Xin cảm ơn !";
            }
            $.ajax({
                url: 'admin/billcancelling/AjaxReAcceptBill',
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
    })
</script>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Các đơn hàng không được duyệt</h4>
                        <p class="card-description">
                            Chỉ được sử dụng <code>bởi người quản trị</code>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-striped">

                                <thead>
                                    <tr>
                                        <th>
                                            Duyệt lại
                                        </th>
                                        <th>
                                            Lý do phản hồi
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
                                    if (isset($data['set_bill_no_accpeting'])) {
                                        $set_bill_no_accpeting = $data['set_bill_no_accpeting'];
                                        $idBill = 0;
                                        foreach ($set_bill_no_accpeting as $key => $value) {
                                            foreach ($value as $k => $vl) {
                                                echo '  <tr>
                                                <td>
                                                ';
                                                if ($idBill != $set_bill_no_accpeting[$key]['idBill']) {
                                                    echo '<label class="badge badge-info done-delivery re-accepting" style="cursor: pointer;" data-id-bill= ' . $set_bill_no_accpeting[$key]['idBill'] . '>Duyệt lại</label>';
                                                } else {
                                                    echo "";
                                                }
                                                echo '
                                                </td>
                                                <td>
                                                ';
                                                if ($idBill != $set_bill_no_accpeting[$key]['idBill']) {
                                                    echo '<label class="badge badge-danger">'.$set_bill_no_accpeting[$key]['respone'].'</label>';
                                                } else {
                                                    echo "";
                                                }
                                                echo '
                                                </td>
                                               
                                                ';

                                                echo '
                                                
                                    <td>';
                                                if ($idBill != $set_bill_no_accpeting[$key]['idBill']) {
                                                    echo '<label class="badge badge-success">' . $set_bill_no_accpeting[$key]['idBill'] . '</label>';
                                                } else {
                                                    echo "";
                                                }
                                                echo '
                                  </td>
                                  <td>
                                  ';
                                                if ($idBill != $set_bill_no_accpeting[$key]['idBill']) {
                                                    echo $set_bill_no_accpeting[$key]['dateOrder'];
                                                } else {
                                                    echo "";
                                                }
                                                echo '</td>
                                <td style="width: 50px; height: auto; white-space: initial; line-height: 20px">
                                ';
                                                if ($idBill != $set_bill_no_accpeting[$key]['idBill']) {
                                                    echo $set_bill_no_accpeting[$key]['name'];
                                                } else {
                                                    echo "";
                                                }
                                                echo '</td>
                                <td style="width: 50px; height: auto; white-space: initial; line-height: 20px">
                                ';
                                                if ($idBill != $set_bill_no_accpeting[$key]['idBill']) {
                                                    echo $set_bill_no_accpeting[$key]['address'];
                                                } else {
                                                    echo "";
                                                }
                                                echo '</td >
                                <td>
                                ';
                                                $sum = 0;
                                                $idSBill = 0;
                                                if ($idBill != $set_bill_no_accpeting[$key]['idBill']) {
                                                    foreach ($set_bill_no_accpeting as $key1 => $value1) {
                                                        foreach ($value1 as $k => $vl) {
                                                            if ($set_bill_no_accpeting[$key]['idBill'] == $set_bill_no_accpeting[$key1]['idBill']) {
                                                                $sum += (($set_bill_no_accpeting[$key1]['priceProduct'] - $set_bill_no_accpeting[$key1]['sale'] / 100 * $set_bill_no_accpeting[$key1]['priceProduct']) * $set_bill_no_accpeting[$key1]['countProd'] + 30000);
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
                                ' . $set_bill_no_accpeting[$key]['nameProduct'] . '
                              </td>
                                    <td class="py-1">
                                    ' . number_format($set_bill_no_accpeting[$key]['priceProduct']) . ' Đ
                                    </td>
                                    <td class="py-1">
                                    ' . number_format($set_bill_no_accpeting[$key]['sale']) . ' %
                                    </td>
                                  
                                    <td>
                                      <img src="./mvc/public/ImgProduct/' . $set_bill_no_accpeting[$key]['imgProd1'] . '" alt="">
                                    </td>
                                    <td>
                                      ' . $set_bill_no_accpeting[$key]['countProd'] . '
                                    </td>
                                    <td>
                                    
                                    </td>
                                  </tr>';
                                                $idBill = $set_bill_no_accpeting[$key]['idBill'];
                                                break;
                                            }
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>