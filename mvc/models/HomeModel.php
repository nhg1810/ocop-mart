<?php
class HomeModel{
    private $db;
    public function __construct()
    {
    //    gọi class database trong DBprogressing để có thể sử dụng các hàm xử lý database
       $this->db=new Database();
    }
    public function GetBannerShop(){
        $qr="SELECT * FROM banner";
        $result = $this->db->select($qr);
        if($result == false){
            return false;
          }
          else{
            return $result;
          }
    }
    public function GetCategoryShop(){
        $qr="SELECT * FROM tbl_category";
        $result = $this->db->select($qr);
        if($result == false){
            return false;
          }
          else{
            return $result;
          }
    }
    public function GetAllProduct(){
        $qr="SELECT * FROM tbl_product WHERE special = 1";
        $result = $this->db->select($qr);
        if($result == false){
            return false;
          }
          else{
            return $result;
          }
    }
    public function GetAllInterfaceHome()
    {
        $qr="SELECT * FROM `interface_home`";
        $result = $this->db->select($qr);
        if($result == false){
            return false;
          }
          else{
            return $result;
          }
    }
    public function GetSixNewProd()
    {
     $qr="SELECT * FROM `tbl_product` ORDER BY idProduct DESC;";
     $result = $this->db->select($qr);
     if($result == false){
         return false;
       }
       else{
         return $result;
       }
    }
    public function GetSpecialProd()
    {
      $qr="SELECT * FROM `tbl_product` WHERE special = '1' ORDER BY idProduct DESC;";
      $result = $this->db->select($qr);
      if($result == false){
          return false;
        }
        else{
          return $result;
        }
    }
    public function GetTheFaceProd()
    {
      $qr="SELECT * FROM `tbl_product` WHERE special = '2' ORDER BY idProduct DESC;";
      $result = $this->db->select($qr);
      if($result == false){
          return false;
        }
        else{
          return $result;
        }
    }
    public function GetProdMostSales()
    {
      $qr="SELECT * FROM `tbl_product`   ORDER BY sale DESC;";
      $result = $this->db->select($qr);
      if($result == false){
          return false;
        }
        else{
          return $result;
        }
    }
    public function GetProdById($idProd)
    {
      $qr="SELECT * FROM `tbl_product` INNER JOIN tbl_category ON tbl_product.idCateProduct = tbl_category.idCategory where tbl_product.idProduct=".$idProd.";";
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