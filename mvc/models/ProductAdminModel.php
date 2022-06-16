<?php
class ProductAdminModel{
    public function __construct()
    {
    //    gọi class database trong DBprogressing để có thể sử dụng các hàm xử lý database
       $this->db=new Database();
    }
    public function GetAllCategory(){
        $qr="SELECT * FROM `tbl_category`"; 
        $result = $this->db->select($qr);
        if($result == false){
            return false;
          }
          else{
            return $result;
          }
    }
    public function GetAllProd(){
        $qr='SELECT * FROM `tbl_product` INNER JOIN tbl_category WHERE tbl_product.idCateProduct = tbl_category.idCategory ORDER BY tbl_product.idProduct ASC;';
        $result = $this->db->select($qr);
        if($result == false){
            return false;
          }
          else{
            return $result;
          }
    }

  public function UpdateProductById($idProduct,$nameProduct,$idCateProduct,$descriptProduct,
      $brand, $status,$imgProd1,$imgProd2,$imgProd3,$imgProd4,$priceProduct,$sale){
      $qr='UPDATE tbl_product SET tbl_product.idCateProduct = "'.$idCateProduct.'",
      tbl_product.nameProduct = "'.$nameProduct.'",
       tbl_product.descriptProduct = "'.$descriptProduct.'",
        tbl_product.brand = "'.$brand.'", tbl_product.status = "'.$status.'",
        tbl_product.imgProd1 = "'.$imgProd1.'", tbl_product.imgProd2 = "'.$imgProd2.'",
         tbl_product.imgProd3 = "'.$imgProd3.'", tbl_product.imgProd4 = "'.$imgProd4.'",
          tbl_product.priceProduct = "'.$priceProduct.'", tbl_product.sale = "'.$sale.'"
           WHERE tbl_product.idProduct = "'.$idProduct.'" ';

      $result = $this->db->update($qr);
      if($result == false){
          return false;
        }
        else{
          return true;
        }
  }
  public function DeleteProductById($idProduct){
    $qr='DELETE FROM tbl_product WHERE tbl_product.idProduct = "'.$idProduct.'";';
    $result = $this->db->delete($qr);
    if($result == false){
        return false;
      }
      else{
        return true;
      }

  }
  public function InsertProduct($idCateProduct, $nameProduct,$descriptProduct,
   $brand,$status,$imgProd1,$imgProd2,$imgProd3, $imgProd4, $priceProduct,$sale){
    $qr = 'INSERT INTO `tbl_product` (`idProduct`, `idCateProduct`, 
   `nameProduct`, `descriptProduct`, `brand`, `status`, `imgProd1`,  
   `imgProd2`, `imgProd3`, `imgProd4`, `priceProduct`, `special`, `sale`)
    VALUES (NULL, "'.$idCateProduct.'", "'.$nameProduct.'", "'.$descriptProduct.'", "'.$brand.'", 
    "'.$status.'", "'.$imgProd1.'", "'.$imgProd2.'", "'.$imgProd3.'", "'.$imgProd4.'", "'.$priceProduct.'", "0", "'.$sale.'");';
    $result = $this->db->insert($qr);
    if($result == false){
      return false;
    }
    else{
      return $result;
    }
  }
  public function UpdateCategoryProduct($idCategory, $imgCategory, $reviewCate, $nameCategory){
    $qr="UPDATE `tbl_category` SET `nameCategory` = '". $nameCategory."', `reviewCate` = '".$reviewCate."',`imgCategory` = '".$imgCategory."' WHERE `tbl_category`.`idCategory` = ".$idCategory.";";
    $result = $this->db->update($qr);
    if($result == false){
        return false;
      }
      else{
        return true;
      }
  }
  public function InsertCategoryProduct($imgCategory, $reviewCate, $nameCategory)
   {
    $qr = "INSERT INTO tbl_category (nameCategory, reviewCate, imgCategory)
    VALUES ('".$nameCategory."', '".$reviewCate."', '".$imgCategory."');";

        $result = $this->db->insert($qr);
        if($result == false){
          return false;
        }
        else{
          return true;
        }
  }
  public function DeleteCategoryById($idCategory){
    //phải chuyển sản phẩm chứa cate ấy sang thể loại khác
    $qr='DELETE FROM tbl_category WHERE tbl_category.idCategory = "'.$idCategory.'";';
    $result = $this->db->delete($qr);
    if($result == false){
        return false;
      }
      else{
        return true;
      }
  }
  public function TransferProductToDelCategory($idCategory)
  {
    $qr="UPDATE tbl_product SET idCateProduct = 8 WHERE idCateProduct = '".$idCategory."';";
    $result = $this->db->update($qr);
    if($result == false){
      return false;
    }
    else{
      return true;
    }
  }
  public function FindProductByIdCategory($idCategory)
  {
    $qr='SELECT * FROM `tbl_product` INNER JOIN tbl_category WHERE tbl_product.idCateProduct = tbl_category.idCategory AND tbl_product.idCateProduct = '.$idCategory.' ORDER BY tbl_product.idProduct ASC;';
    $result = $this->db->select($qr);
    if($result == false){
        return false;
      }
      else{
        return $result;
      }
  }
  public function GetSumProductByCategory($idcategory)
  {
    $qr="SELECT COUNT(idProduct) AS sumprodcate FROM tbl_product WHERE idCateProduct = $idcategory GROUP BY idCateProduct;
    ";
    $result = $this->db->select($qr);
    if($result == false){
        return false;
      }
      else{
        return $result;
      }
  }
  public function LiveSearchByName($input)
  {
    $qr="SELECT * FROM tbl_product INNER JOIN tbl_category WHERE tbl_product.nameProduct like '{$input}%' ";
    $result = $this->db->select($qr);
    if($result == false){
      return false;
    }
    else{
      return $result;
    }
  }
  public function ChangeSpecialProduct($idProduct)
  {
    $qr="UPDATE `tbl_product` SET `special` = '1' WHERE `tbl_product`.`idProduct` = ".$idProduct.";";
    $result = $this->db->update($qr);
    if($result == false){
      return false;
    }
    else{
      return true;
    }
  }
  public function GetAllSpecialProduct()
  {
    $qr= "SELECT * FROM `tbl_product` WHERE special = 1;";
    $result = $this->db->select($qr);
    if($result == false){
        return false;
      }
      else{
        return $result;
      }
  }
  public function GetOutSpecialProduct($idProduct)
  {
    $qr="UPDATE `tbl_product` SET `special` = '0' WHERE `tbl_product`.`idProduct` = ".$idProduct.";";
    $result = $this->db->update($qr);
    if($result == false){
      return false;
    }
    else{
      return true;
    }
  }
  public function ChangeTheFaceProduct($idProduct)
  {
    $qr="UPDATE `tbl_product` SET `special` = '2' WHERE `tbl_product`.`idProduct` = ".$idProduct.";";
    $result = $this->db->update($qr);
    if($result == false){
      return false;
    }
    else{
      return true;
    }
  }
  public function GetAllTheFaceProduct()
  {
    $qr= "SELECT * FROM `tbl_product` WHERE special = 2;";
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