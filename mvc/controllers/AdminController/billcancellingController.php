<?php 
class billcancelling extends Controller{
    public $billcancellingAdminModel;
    public function __construct()
    {
        $this->billcancellingAdminModel=$this->model("BillCancelingAdminModel");
    }
    public function quanly()
    {
        if($this->billcancellingAdminModel->GetAllBillNoAccepting() == false){
            $this->ViewAdmin("mainViewAdmin",["control"=>"nullpage",
                                            "header"=>"Bạn đã duyệt hết hàng rùi !",
                                            "body"=>"Không có bất cứ đơn hàng bị huỷ bỏ nào "]);
        }else{
            $rs_bill_no_accpeting= $this->billcancellingAdminModel->GetAllBillNoAccepting();
            for ($set_bill_no_accpeting = array(); $row = $rs_bill_no_accpeting->fetch_assoc(); $set_bill_no_accpeting[] = $row);
            $this->ViewAdmin("mainViewAdmin",["control"=> "billcanceling",
                                            "set_bill_no_accpeting"=>$set_bill_no_accpeting]);

        }
    }
    public function AjaxReAcceptBill()
    {
        if( isset($_POST['idBill']) && isset($_POST['response']) ){
            $idBill = $_POST['idBill'];
            $response = $_POST['response'];
            $rs_update_delivery =  $this->billcancellingAdminModel->DeliveryAccepting($idBill, $response);
            if($rs_update_delivery != false){
                echo 1;
            }
        }
    }

}

?>