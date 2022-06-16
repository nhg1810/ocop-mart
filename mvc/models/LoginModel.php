<?php
class LoginModel{
    public function __construct()
    {
    //    gọi class database trong DBprogressing để có thể sử dụng các hàm xử lý database
       $this->db=new Database();
    }
    public function Login($username, $password)
    {
        $qr="SELECT * FROM `tbl_account` WHERE userName = '".$username."' and passWord='".$password."'";
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