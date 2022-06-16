<!-- chứa các get/set/constructer -->
<?php
class Product{
    private $idProduct;
    private $idCateProduct;
    private $nameProduct;
    private $descriptProduct;
    private $brand;
    private $status;
    private $imgProd1;
    private $imgProd2;
    private $imgProd3;
    private $imgProd4;
    private $price;
    //constructer
    public function __construct($idProduct,$idCateProduct,$nameProduct,$descriptProduct,$brand,$status,$imgProd1,$imgProd2,$imgProd3,$imgProd4,$price)
    {
        $this->idProduct = $idProduct;
        $this->idCateProduct = $idCateProduct;
        $this->nameProduct = $nameProduct;
        $this->descriptProduct = $descriptProduct;
        $this->brand = $brand;
        $this->status = $status;
        $this->imgProd1 = $imgProd1;
        $this->imgProd2 = $imgProd2;
        $this->imgProd3 = $imgProd3;
        $this->imgProd4 = $imgProd4;
        $this->price = $price;
    }
    // idProduct
    public function setIdProduct($idProduct) {
        $this->idProduct = $idProduct;
      }
      
    public function getIdProduct($idProduct) {
        return $this->$idProduct;
      }
    //   idCateProduct

    public function setIdCateProduct($idCateProduct) {
        $this->idCateProduct = $idCateProduct;
      }
      
    public function getIdCateProduct($idCateProduct) {
        return $this->$idCateProduct;
      }
    //   nameProduct
    public function setNameProduct($nameProduct) {
        $this->nameProduct = $nameProduct;
      }
      
    public function getNameProduct($nameProduct) {
        return $this->$nameProduct;
      }
    //   descriptProduct

    public function setDescriptProduct($descriptProduct) {
        $this->descriptProduct = $descriptProduct;
      }
      
    public function getDescriptProduct($descriptProduct) {
        return $this->$descriptProduct;
      }
      //brand
      public function setBrand($brand) {
        $this->brand = $brand;
      }
      
    public function getBrand($brand) {
        return $this->$brand;
      }
      //status
      public function setStatus($status) {
        $this->status = $status;
      }
      
    public function getStatus($status) {
        return $this->$status;
      }
      //imgProd1
      public function setImgProd1($imgProd1) {
        $this->imgProd1 = $imgProd1;
      }
      
    public function getImgProd1($imgProd1) {
        return $this->$imgProd1;
      }     
       //imgProd2
      public function setImgProd2($imgProd2) {
        $this->imgProd2 = $imgProd2;
      }
      
    public function getImgProd2($imgProd2) {
        return $this->$imgProd2;
      }      
      //imgProd3
      public function setImgProd3($imgProd3) {
        $this->imgProd3 = $imgProd3;
      }
      
    public function getImgProd3($imgProd3) {
        return $this->$imgProd3;
      }      
      //imgProd4
      public function setImgProd4($imgProd4) {
        $this->imgProd4 = $imgProd4;
      }
      
    public function getImgProd4($imgProd4) {
        return $this->$imgProd4;
      }
    //   price
    public function setPrice($price) {
        $this->price = $price;
      }
      
    public function getPrice($price) {
        return $this->$price;
      }

      
}
?>