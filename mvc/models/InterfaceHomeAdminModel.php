<?php
class InterfaceHomeAdminModel{
    private $db;
    public function __construct()
    {
    //    gọi class database trong DBprogressing để có thể sử dụng các hàm xử lý database
       $this->db=new Database();
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
    public function GetAllSlideBanner()
    {
        $qr="SELECT * FROM `banner`";
        $result = $this->db->select($qr);
        if($result == false){
            return false;
          }
          else{
            return $result;
          }
    }
    public function UpdateBannerInterface($backgroundBanner, $subBannerProduct1 , $subBannerProduct2)
    {
      $qr='UPDATE `interface_home` 
      SET  
      `backgroundBanner` = "'.$backgroundBanner.'",
      `subBannerProduct1` = "'.$subBannerProduct1.'",
      `subBannerProduct2` = "'.$subBannerProduct2.'"

      WHERE  1=1 ';
      $result = $this->db->update($qr);
      if($result == false){
          return false;
        }
        else{
          return true;
        }
    }
    public function UpdateSliderBannerInterface($idBanner,$titleBanner,$imgBanner, $descriptBanner)
    {
      $qr="UPDATE banner
      SET titleBanner = '".$titleBanner."', imgBanner = '".$imgBanner."', descriptBanner= '".$descriptBanner."'
      WHERE idBanner = '".$idBanner."';";      
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