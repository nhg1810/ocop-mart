<?php
class login extends Controller{
    public $loginModel;
    public function __construct(){
        $this->loginModel=$this->model("LoginModel");
    }
    function MainFucntion(){
        if(isset($_POST['Uusername'])){
            $username = $_POST['Uusername'];
            $password = $_POST['Upassword'];
            $rs_login_user = $this->loginModel->Login($username, $password);
            if($rs_login_user != false){
                $this->ViewUserUnique("welcome");
                //nếu tích vào cái nớ thì lưu tài khoản mật khẩu vào cookie
                setcookie("username", $username, time() + (86400 * 30), "/");
                if(isset($_POST['cheked-save-cookie'])){
                    setcookie("password",  $password, time() + (86400 * 30), "/");
                }
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;

                // set các thuộc tính người mua vào cookie ngay lúc này
                for ($infor_user = array (); $row = $rs_login_user->fetch_assoc(); $infor_user[] = $row);
                setcookie("name", $infor_user[0]['name'], time() + (86400 * 30), "/");
                setcookie("email",  $infor_user[0]['email'], time() + (86400 * 30), "/");
                setcookie("address",  $infor_user[0]['address'], time() + (86400 * 30), "/");
                setcookie("sdt",  $infor_user[0]['sdt'], time() + (86400 * 30), "/");
                setcookie("avata",  $infor_user[0]['avata'], time() + (86400 * 30), "/");




            }else{
                $this->ViewUserUnique("login",["alert"=>"Sai tài khoản. Kiểm tra lại !"]);
            }
        }else{
            $this->ViewUserUnique("login");
        }
    }
    public function LogOut()
    {
        if (isset($_COOKIE['username']) || isset($_COOKIE['password']) ) {

            unset($_COOKIE['username']); 
            unset($_COOKIE['password']); 
            unset($_COOKIE['email']); 
            unset($_COOKIE['address']); 
            unset($_COOKIE['name']); 
            unset($_COOKIE['sdt']); 
            unset($_COOKIE['avata']); 


            setcookie('username', null, -1, '/'); 
            setcookie('password', null, -1, '/'); 
            setcookie('sdt', null, -1, '/'); 
            setcookie('name', null, -1, '/'); 
            setcookie('address', null, -1, '/'); 
            setcookie('email', null, -1, '/'); 
            setcookie('avata', null, -1, '/'); 



            unset($_SESSION['username']);
            unset($_SESSION['password']);
            $this->ViewUserUnique("login");
        }else{
            $this->ViewUserUnique("login");
        }
    }
}
?>