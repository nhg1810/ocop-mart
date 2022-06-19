<?php
class AcceptProductAdminModel{
    private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
    public function GetAllBillNoAccepts()
    {
        $qr="SELECT * FROM tbl_bill INNER JOIN tbl_orders ON tbl_orders.idBill = tbl_bill.idBill
         INNER JOIN tbl_account ON tbl_account.idAccount = tbl_bill.idUser 
         INNER JOIN tbl_product ON tbl_product.idProduct = tbl_orders.idProd ORDER BY tbl_orders.dateOrder desc
         WHERE tbl_bill.statusAccept = 0;";
        $result = $this->db->select($qr);
        if($result == false){
            return false;
          }
          else{
            return $result;
          }
    }
    public function UpdateAcceptBill($idBill, $response)
    {
        $qr="UPDATE `tbl_bill` SET `statusAccept` = '1', respone = '". $response."'  WHERE `tbl_bill`.`idBill` = '$idBill'; ";
        $result = $this->db->update($qr);
        if($result == false){
            return false;
          }
          else{
            return true;
          }
    }
    public function UpdateNoAcceptBill($idBill, $response)
    {
        $qr="UPDATE `tbl_bill` SET `statusAccept` = '2', respone = '". $response."'  WHERE `tbl_bill`.`idBill` = '$idBill'; ";
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