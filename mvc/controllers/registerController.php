<?php
class register extends Controller{
    public $registerModel;
    public function __construct(){
        $this->registerModel=$this->model("RegisterModel");
    }
    function MainFucntion(){
        if(isset($_POST['username'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $repassword = $_POST['repassword'];
            $alert="";
           if(!isset($_POST['checked-inf'])){
            $alert="Chưa đồng ý với các điều khoản của shop, Vui lòng kiểm tra lại !";
             $this->ViewUserUnique("register",["alert"=> $alert]); 
           }
           else if(empty($email) || empty($password) || empty($repassword) ){
              $alert="Chưa nhập đủ các thông tin, Vui lòng kiểm tra lại !";
              $this->ViewUserUnique("register",["alert"=> $alert]); 
           }
           else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $alert="Email không hợp lệ, Vui lòng kiểm tra lại !";
            $this->ViewUserUnique("register",["alert"=> $alert]); 
           }
           else if($password !=  $repassword){
            $alert="Mật khẩu không trùng khớp, Vui lòng kiểm tra lại !";
            $this->ViewUserUnique("register",["alert"=> $alert]); 
           }
           //CHECK COI ĐÃ TỒN TẠI TÊN ĐĂNG NHẬP CHƯA
           else if( $this->registerModel->CheckAccountAvalid($username) == true ){
            $alert="Tên đăng nhập đã tồn tại, Vui lòng kiểm tra lại !";
            $this->ViewUserUnique("register",["alert"=> $alert]); 
           }
           else{
                // duyệt đúng các điều kiện thì oke la chuyển qua trang login
                $rs_create_account = $this->registerModel->CreateAccount($username, $email, $password);
                if($rs_create_account != false){
                    $this->ViewUserUnique("login");
                } else{
                    echo "in ra trang lỗi";
                }
           }  
        }else{
            $this->ViewUserUnique("register");
        }
    }
}
?>