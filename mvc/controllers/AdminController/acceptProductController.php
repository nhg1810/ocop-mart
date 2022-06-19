<?php
class acceptProduct extends Controller{
    public $acceptProductAdminModel;
    public function __construct()
    {
        $this->acceptProductAdminModel=$this->model("AcceptProductAdminModel");
    }
    public function quanly()
    {
        if($this->acceptProductAdminModel->GetAllBillNoAccepts() ==false){
            $this->ViewAdmin("mainViewAdmin",["control"=>"nullpage",
            "header"=>"Bạn đã duyệt hết hàng rùi !",
            "body"=>"Không có bất cứ nào cần bạn xác nhận "]);
        }else{
            $rs_bill_no_accept = $this->acceptProductAdminModel->GetAllBillNoAccepts();
            for ($set_bill_no_accpet = array(); $row = $rs_bill_no_accept->fetch_assoc(); $set_bill_no_accpet[] = $row);

            $this->ViewAdmin("mainViewAdmin",["control"=> "accept-product",
                                            "set_bill_no_accpet"=>$set_bill_no_accpet]);
        }
    }
    public function AjaxAcceptBill()
    {
        if(isset($_POST['idBill']) && isset($_POST['response'])){
            $response =  $_POST['response'];
            $idBill = $_POST['idBill'];
            $rs_bill_no_accept = $this->acceptProductAdminModel->UpdateAcceptBill($idBill, $response);
            if($rs_bill_no_accept != false){
                echo 1;
            }
        }
    }
    public function AjaxNoAcceptBill()
    {
        if(isset($_POST['nresponse']) && isset($_POST['idNoBill'])){
            $response =  $_POST['nresponse'];
            $idBill = $_POST['idNoBill'];
            $rs_bill_no_accept = $this->acceptProductAdminModel->UpdateNoAcceptBill($idBill, $response);
            if($rs_bill_no_accept != false){
                echo 1;
            }
        }
    }
}
?>