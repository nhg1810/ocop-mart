<?php
class shop extends Controller{
    public $ShopModel;
    public function __construct()
    {
    //xác định được model nào cần gọi để xử lý dữ liệ
        $this->ShopModel=$this->model("ShopModel");
    }
    function MainFucntion($pageNumber){
        if( $this->ShopModel->GetAllCateProd()==false || $this->ShopModel->GetSale() == false 
        || $this->ShopModel->GetSumProduct()==false
        ||$this->ShopModel->GetHotProduct()==false
        || $this->ShopModel->GetAllProduct($pageNumber)==false || $this->ShopModel->GetNewProduct() == false){
            echo"in ra trang lỗi";
        }else{
            $rs_sum_prod=$this->ShopModel->GetSumProduct();
            $rs_hot_prod= $this->ShopModel->GetHotProduct();
            $rs_new_prod  = $this->ShopModel->GetNewProduct();
            $rs_cate_prod  = $this->ShopModel->GetAllCateProd();
            $rs_sale_prod  = $this->ShopModel->GetSale();
            $rs_all_prod   = $this->ShopModel->GetAllProduct($pageNumber);
            for ($set_sum_prod = array (); $row = $rs_sum_prod->fetch_assoc(); $set_sum_prod[] = $row);
            for ($set_hot_prod = array (); $row = $rs_hot_prod->fetch_assoc(); $set_hot_prod[] = $row);
            for ($set_new_prod = array (); $row = $rs_new_prod->fetch_assoc(); $set_new_prod[] = $row);
            for ($set_all_prod = array (); $row = $rs_all_prod->fetch_assoc(); $set_all_prod[] = $row);
            for ($set_sale_prod = array (); $row = $rs_sale_prod->fetch_assoc(); $set_sale_prod[] = $row);
            for ($set_cate_prod = array (); $row = $rs_cate_prod->fetch_assoc(); $set_cate_prod[] = $row);
            $this->view("mainView",["control"=>"shop",
                                    "set_all_prod"=>$set_all_prod,
                                    "set_sum_prod"=>$set_sum_prod,
                                    "set_hot_prod"=>$set_hot_prod,
                                    "set_new_prod"=>$set_new_prod,
                                    "set_sale_prod"=>$set_sale_prod, 
                                    "pageNumber"=>$pageNumber,
                                    "set_cate_prod"=>$set_cate_prod]);
        }
    }

}
?>