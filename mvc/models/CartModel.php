<?php
class CartModel{
    private $db;
    public function __construct()
    {
    //    gọi class database trong DBprogressing để có thể sử dụng các hàm xử lý database
       $this->db=new Database();
    }
    public function GetAllCardUser($idAccount)
    {
        $qr="SELECT * FROM `tbl_card_product` INNER JOIN `tbl_product` ON `tbl_product`.idProduct = `tbl_card_product`.idProduct  WHERE IdAccount = ".$idAccount.";";
        $result = $this->db->select($qr);
        if($result == false){
            return false;
          }
          else{
            return $result;
          }
    }
    public function GetIdAccountBySession($username, $password)
    {
        $qr="SELECT idAccount FROM `tbl_account` WHERE userName = '".$username."' AND tbl_account.passWord = '".$password."';";
        $result = $this->db->select($qr);
        if($result == false){
            return false;
          }
          else{
            return $result;
          }
    }
    public function GetProdByIdCard($idCard)
    {
      $qr="SELECT * FROM `tbl_card_product` INNER JOIN tbl_product ON tbl_card_product.idProduct = tbl_product.idProduct WHERE idCard= '".$idCard."';";
      $result = $this->db->select($qr);
      if($result == false){
          return false;
        }
        else{
          return $result;
        }
    }
    public function GetIdUserByAccount($username, $password)
    {
      $qr="SELECT * FROM `tbl_account` WHERE userName = '".$username."' and passWord = '".$password."';
      ";
      $result = $this->db->select($qr);
      if($result == false){
          return false;
        }
        else{
          return $result;
        }
    }
    public function CreateBill($idBill, $idUser, $phone, $address)
    {
      $qr="INSERT INTO 
      `tbl_bill` (`idBill`, `statusAccept`, `dateAccept`, `respone`, `idUser`, `phoneOrder`, `addressOrder`) 
      VALUES ('".$idBill."', '0', NULL, '', '".$idUser."', '".$phone."', '".$address."' );";
      $result = $this->db->insert($qr);
      if($result == false){
          return false;
        }
        else{
          return true;
        }

    }
    public function CreateOrder($idProd, $dateOrder, $idBill, $countProd )
    {
      $qr="INSERT INTO `tbl_orders` (`idOrder`, `idProd`, `dateOrder`, `idBill`,`countProd`) VALUES (NULL, '".$idProd."', '".$dateOrder."', '".$idBill."','".$countProd."');";
      $result = $this->db->insert($qr);
      if($result == false){
        return false;
      }
      else{
        return true;
      }
    }
    public function DelProdInCart($idCart)
    {
      $qr="DELETE FROM tbl_card_product WHERE idCard= '".$idCart."';" ;
      $result = $this->db->insert($qr);
      if($result == false){
        return false;
      }
      else{
        return true;
      }
    }
}
?>