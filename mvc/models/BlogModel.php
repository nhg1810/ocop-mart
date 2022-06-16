<?php
class blogModel{
    private $db;
    public function __construct()
    {
    //    gọi class database trong DBprogressing để có thể sử dụng các hàm xử lý database
       $this->db=new Database();
    }
    public function GetAllCateNew()
    {
        $qr="SELECT * FROM `catenews`";
        $result = $this->db->select($qr);
        if($result == false){
            return false;
          }
          else{
            return $result;
          }
    }
    public function GetThreeNew()
    {
        $qr="SELECT * FROM `news` INNER JOIN catenews ON news.IdCateNews = catenews.IdCateNews WHERE news.specialNew=1;";
        $result = $this->db->select($qr);
        if($result == false){
            return false;
          }
          else{
            return $result;
          }
    }
    public function GetNewPost()
    {
        $qr="SELECT * FROM `news` INNER JOIN catenews ON news.IdCateNews = catenews.IdCateNews ORDER BY news.IdNew DESC;";
        $result = $this->db->select($qr);
        if($result == false){
            return false;
          }
          else{
            return $result;
          }
    }
    public function GetLastedPost()
    {
        $qr="SELECT * FROM `news`INNER JOIN catenews ON news.IdCateNews = catenews.IdCateNews ORDER BY news.IdNew DESC LIMIT 1";
        $result = $this->db->select($qr);
        if($result == false){
            return false;
          }
          else{
            return $result;
          }
    }
    public function GetTowPostHadIdFive()
    {
        $qr="SELECT * FROM `news`INNER JOIN catenews ON news.IdCateNews = catenews.IdCateNews WHERE news.IdCateNews=5 ORDER BY news.IdNew DESC LIMIT 2";
        $result = $this->db->select($qr);
        if($result == false){
            return false;
          }
          else{
            return $result;
          }
    }
    public function GetFourPostHadIdOne()
    {
        $qr="SELECT * FROM `news`INNER JOIN catenews ON news.IdCateNews = catenews.IdCateNews WHERE news.IdCateNews=1 ORDER BY news.IdNew DESC LIMIT 4";
        $result = $this->db->select($qr);
        if($result == false){
            return false;
          }
          else{
            return $result;
          }
    }
    public function GetFourPostHadIdTow()
    {
        $qr="SELECT * FROM `news`INNER JOIN catenews ON news.IdCateNews = catenews.IdCateNews WHERE news.IdCateNews=2 ORDER BY news.IdNew DESC LIMIT 4";
        $result = $this->db->select($qr);
        if($result == false){
            return false;
          }
          else{
            return $result;
          }
    }
    public function GetThreePostHadIdThree()
    {
        $qr="SELECT * FROM `news`INNER JOIN catenews ON news.IdCateNews = catenews.IdCateNews WHERE news.IdCateNews=3 ORDER BY news.IdNew DESC LIMIT 3";
        $result = $this->db->select($qr);
        if($result == false){
            return false;
          }
          else{
            return $result;
          }
    }
    public function GetDetailPostBySlug($slug_title)
    {
      $qr="SELECT * FROM `news`INNER JOIN catenews ON news.IdCateNews = catenews.IdCateNews WHERE news.slug LIKE '".$slug_title."'";
        $result = $this->db->select($qr);
        if($result == false){
            return false;
          }
          else{
            return $result;
          }
    }
    public function GetRelativePostById($IdNew)
    {
      $qr="SELECT * FROM `news`INNER JOIN catenews ON news.IdCateNews = catenews.IdCateNews ORDER BY IdNew LIMIT 3 OFFSET ".($IdNew-1).";";
      $result = $this->db->select($qr);
      if($result == false){
          return false;
        }
        else{
          return $result;
        }
    }
    public function GetThreeNewHome()
    {
      $qr ="SELECT * FROM `news` INNER JOIN catenews ON news.IdCateNews = catenews.IdCateNews ORDER BY news.IdNew DESC LIMIT 3;";
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