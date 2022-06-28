<?php
class ShopModel
{
  private $db;
  public function __construct()
  {
    //    gọi class database trong DBprogressing để có thể sử dụng các hàm xử lý database
    $this->db = new Database();
  }
  public function GetAllCateProd()
  {
    $qr = "SELECT * FROM `tbl_category`";
    $result = $this->db->select($qr);
    if ($result == false) {
      return false;
    } else {
      return $result;
    }
  }
  public function GetSale()
  {
    $qr = "SELECT * FROM tbl_product INNER JOIN tbl_category ON tbl_product.idCateProduct = tbl_category.idCategory WHERE tbl_product.sale > 1";
    $result = $this->db->select($qr);
    if ($result == false) {
      return false;
    } else {
      return $result;
    }
  }
  public function GetAllProduct($pageNumber)
  {
    $ld_page = ($pageNumber - 1) * 6;
    $qr = "SELECT * FROM tbl_product INNER JOIN tbl_category ON 
     tbl_product.idCateProduct = tbl_category.idCategory 
     ORDER BY tbl_product.idProduct ASC LIMIT 6 OFFSET $ld_page;";

    $result = $this->db->select($qr);
    if ($result == false) {
      return false;
    } else {
      return $result;
    }
  }
  public function GetNewProduct()
  {
    $qr = "SELECT * FROM tbl_product INNER JOIN tbl_category ON tbl_product.idCateProduct = tbl_category.idCategory ORDER BY tbl_product.idProduct DESC LIMIT 3";
    $result = $this->db->select($qr);
    if ($result == false) {
      return false;
    } else {
      return $result;
    }
  }
  public function GetHotProduct()
  {
    $qr = "SELECT  * FROM tbl_product INNER JOIN tbl_category ON tbl_product.idCateProduct = tbl_category.idCategory ORDER BY tbl_product.idProduct ASC LIMIT 3 ";
    $result = $this->db->select($qr);
    if ($result == false) {
      return false;
    } else {
      return $result;
    }
  }
  public function GetSumProduct()
  {
    $qr = "SELECT COUNT(idProduct) AS countProd FROM `tbl_product`;";
    $result = $this->db->select($qr);
    if ($result == false) {
      return false;
    } else {
      return $result;
    }
  }
  public function GetSpecialProShop()
  {
    $qr = "SELECT * FROM `tbl_product` INNER JOIN tbl_category ON tbl_product.idCateProduct = tbl_category.idCategory WHERE tbl_product.special = 2;";
    $result = $this->db->select($qr);
    if ($result == false) {
      return false;
    } else {
      return $result;
    }
  }
  public function AjaxLivSearch($nameProd)
  {
    $qr = "SELECT * FROM tbl_product WHERE nameProduct LIKE '%" . $nameProd . "%' LIMIT 5";
    $result = $this->db->select($qr);
    if ($result == false) {
      return false;
    } else {
      return $result;
    }
  }
}
