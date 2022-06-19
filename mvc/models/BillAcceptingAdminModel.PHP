<?php
class BillAcceptingAdminModel{
    private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
    public function GetAllBillAccepting()
    {
        $qr="SELECT * FROM tbl_bill INNER JOIN tbl_orders ON tbl_orders.idBill = tbl_bill.idBill
         INNER JOIN tbl_account ON tbl_account.idAccount = tbl_bill.idUser 
         INNER JOIN tbl_product ON tbl_product.idProduct = tbl_orders.idProd 
         WHERE tbl_bill.statusAccept = 1;";
        $result = $this->db->select($qr);
        if($result == false){
            return false;
          }
          else{
            return $result;
          }
    }
    public function DeliveryAccepting($idBill)
    {
        $qr="UPDATE `tbl_bill` SET `statusDelivery` = '1'  WHERE `tbl_bill`.`idBill` = '$idBill'; ";
        $result = $this->db->update($qr);
        if($result == false){
            return false;
          }
          else{
            return true;
          }
    }
}
?>