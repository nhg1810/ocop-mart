<?php
class DetailProdModel{
    private $db;
    public function __construct()
    {
    //    gọi class database trong DBprogressing để có thể sử dụng các hàm xử lý database
       $this->db=new Database();
    }
    public function GetProdBySlug($slug_prod)
    {
        $qr="SELECT * FROM tbl_category INNER JOIN tbl_product ON tbl_product.idCateProduct = tbl_category.idCategory WHERE tbl_product.slug LIKE '".$slug_prod."%';";
        $result = $this->db->select($qr);
        if($result == false){
            return false;
          }
          else{
            return $result;
          }
    }
    public function GetRelativeProd($id_prod)
    {
       
        $qr="SELECT * FROM tbl_category INNER JOIN tbl_product ON tbl_product.idCateProduct = tbl_category.idCategory WHERE tbl_product.idProduct < '$id_prod' ORDER BY tbl_product.idProduct LIMIT 4;";
        $result = $this->db->select($qr);
        if($result == false){
            return false;
          }
          else{
            return $result;
          }
    }
    //lấy id Người Dùng rồi mới có thể add card
    public function GetIdBySession($username, $password)
    {
      $qr="SELECT idAccount FROM `tbl_account` WHERE userName = '".$username."' AND passWord='".$password."'";
      $result = $this->db->select($qr);
      if($result == false){
          return false;
        }
        else{
          return $result;
        }
    }
    // kiểm tra coi trong giõ hàng người đó đã có sản phẩm chưa 
    public function CheckProdInCard($idAccount , $idProduct)
    {

      $qr= "SELECT * FROM `tbl_card_product` WHERE tbl_card_product.IdAccount = ".$idAccount." AND tbl_card_product.idProduct = ".$idProduct.";";
      $result = $this->db->select($qr);
      if($result == false){
          return false;
        }
        else{
          return $result;
        }

    }
    // update số lượng sản phẩm nếu sản phẩm đó đã tồn tại trong giõ hàng
    public function UpdateCountProduct($idCard, $count)
    {
     $qr="UPDATE `tbl_card_product` SET `countProduct` = `countProduct`+ ". $count." WHERE `tbl_card_product`.`idCard` = '".$idCard."';";
     $result = $this->db->update($qr);
     if($result != false){
         return true;
       }
       else{
         return false;
       }

    }
    public function AddToCard($idAccount, $idProduct, $countProduct, $date)
    {
      
      $qr = "INSERT INTO `tbl_card_product` (`idCard`, `IdAccount`, `idProduct`, `countProduct`, 
      `dateAddCard`) 
      VALUES (NULL, '".$idAccount."', '".$idProduct."', '".$countProduct."', '".$date."');";
      $result = $this->db->insert($qr);
      if($result == false){
          return false;
        }
        else{
          return true;
        }
    }
    public function GetCard($idAccount)
    {
      $qr="SELECT * FROM `tbl_card_product` INNER JOIN tbl_product ON 
      tbl_card_product.idProduct = tbl_product.idProduct INNER JOIN tbl_account ON
       tbl_account.idAccount = tbl_card_product.IdAccount WHERE tbl_account.idAccount = ".$idAccount." ORDER BY tbl_card_product.idCard DESC  LIMIT 3; ";
      $result = $this->db->select($qr);
      if($result == false){
          return false;
        }
        else{
          return $result;
        }
    }
    public function DelCard($idCard)
    {
      $qr = "DELETE FROM tbl_card_product WHERE idCard =  ".$idCard.";";
      $result = $this->db->delete($qr);
      if($result == false){
          return false;
        }
        else{
          return true;
        }
    }
}
?>