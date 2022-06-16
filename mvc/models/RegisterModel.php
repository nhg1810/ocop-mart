<?php
class RegisterModel{
    public function __construct()
    {
    //    gọi class database trong DBprogressing để có thể sử dụng các hàm xử lý database
       $this->db=new Database();
    }
    public function CreateAccount($username, $email , $password)
    {
        $qr="INSERT INTO tbl_account (userName, tbl_account.passWord, email)
        VALUES ('".$username."','".$password."','".$email."');";
        $result = $this->db->insert($qr);
        if($result == false){
             return false;
           }
           else{
             return true;
           }
    }
    public function CheckAccountAvalid($username)
    {
      $qr="SELECT * FROM `tbl_account` WHERE userName = '".$username."' ;";
      $result = $this->db->select($qr);
      if($result == false){
           return false;
        }
         else{
           return true;
         }
    }
}
?>