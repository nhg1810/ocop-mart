<?php
class billaccepting extends Controller{
    public $billacceptingAdminModel;
    public function __construct()
    {
        $this->billacceptingAdminModel=$this->model("BillAcceptingAdminModel");
    }
    public function quanly(){
        if($this->billacceptingAdminModel->GetAllBillAccepting() == false){
            echo "in ra trang lỗi";
        }else{
            $rs_bill_accepting = $this->billacceptingAdminModel->GetAllBillAccepting();
            for ($set_bill_accpeting = array(); $row = $rs_bill_accepting->fetch_assoc(); $set_bill_accpeting[] = $row);

            $this->ViewAdmin("mainViewAdmin",["control"=> "billaccepting", 
                                            "set_bill_accpeting"=>$set_bill_accpeting]);
        }
    }
    public function AjaxAcceptDelivery()
    {
        if(isset($_POST['idBill'])){
            $idBill = $_POST['idBill'];
            $rs_delivery_accepting = $this->billacceptingAdminModel->DeliveryAccepting($idBill);
            if($rs_delivery_accepting != false){
                echo 1;
            }
        }
    }
}
?>