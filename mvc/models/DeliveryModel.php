<?php
class deliveryModel{
    private $db;
    public function __construct()
    {
    //    gọi class database trong DBprogressing để có thể sử dụng các hàm xử lý database
       $this->db=new Database();
    }
    public function GetBillUser()
    {
        $qr=" SELECT * FROM `tbl_orders` INNER JOIN tbl_bill ON tbl_orders.idBill 
        = tbl_bill.idBill INNER JOIN tbl_product ON tbl_product.idProduct 
        = tbl_orders.idProd INNER JOIN tbl_account ON tbl_account.idAccount= tbl_bill.idUser WHERE 
        tbl_account.userName= '".$_SESSION['username']."' 
        and tbl_account.passWord='".$_SESSION['password']."'  ORDER BY tbl_orders.dateOrder DESC ;";
        $result = $this->db->select($qr);
        if($result == false){
            return false;
          }
          else{
            return $result;
          }
    }
}
?>