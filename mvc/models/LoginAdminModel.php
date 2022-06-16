<?php
class LoginAdminModel{
    private $db;
    public function __construct()
    {
    //    gọi class database trong DBprogressing để có thể sử dụng các hàm xử lý database
       $this->db=new Database();
    }
     public function CheckAdminstrator($username, $password){
        //câu truy vấn
        $qr= "SELECT * FROM tbl_account WHERE userName = '$username' and passWord = '$password' ";
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
