<?php
class UpdateAccountModel{
    private $db;
    public function __construct()
    {
    //    gọi class database trong DBprogressing để có thể sử dụng các hàm xử lý database
       $this->db=new Database();
    }
    public function GetAccountByUserPass($username, $password)
    {
        $qr="SELECT * FROM `tbl_account` WHERE userName= '".$username."' AND passWord='".$password."' ";
        $result = $this->db->select($qr);
        if($result == false){
            return false;
          }
          else{
            return $result;
          }
    }
    public function UpdateInforModel($name,$email,$sdt,$address,$avata,$userName,$passWord)
    {
      
      $qr="UPDATE tbl_account
      SET name = '".$name."', email = '".$email."', sdt='".$sdt."', address='".$address."', avata='".$avata."'
      WHERE userName='".$userName."' AND password = '".$passWord."';";
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