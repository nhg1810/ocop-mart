<?php 
class delivery extends Controller{
    public $deliveryModel;
    
    public function __construct()
    {
        $this->deliveryModel=$this->model("DeliveryModel");
    }
    public function MainFucntion()
    {
        if(isset($_SESSION['username']) && isset($_SESSION['password'])){
            if($this->deliveryModel->GetBillUser() != false){
                $rs_bill_user= $this->deliveryModel->GetBillUser();
                for ($set_bill_user = array (); $row = $rs_bill_user->fetch_assoc(); $set_bill_user[] = $row);
                $this->view("mainView",["control"=>"delivery",
                "set_bill_user"=>$set_bill_user]);
            }else{
                $this->ViewUserUnique("successPage",["alert"=>"Quý khách chưa ĐẶT BẤT CỨ SẢN PHẨM NÀO! Vui lòng ĐẶT HÀNG và kiểm tra lại! "]);
            } 
        }else{
            $this->ViewUserUnique("successPage",["alert"=>"Quý khách chưa đăng nhập! Vui lòng đăng nhập và kiểm tra lại! "]);
            echo "chưa đăng nhập";
        }
      
        // print_r($set_bill_user);
    }
}
?>