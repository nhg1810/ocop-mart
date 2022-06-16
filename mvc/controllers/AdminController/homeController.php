<?php
class home extends Controller{
    public $LoginAdminModel;
    public function __construct()
    {
        $this->LoginAdminModel=$this->model("LoginAdminModel");
    }
    //tạo hai biến ở cookie, quét 2 biến này với csdl nếu đúng mới cho vào các chức năng của admin
    //bắt buộc phải đăng nhập để vào được trang admin
    public function quanly(){
        if(!isset($_SESSION["administration"]) || $_SESSION["administration"] == false){
            if(isset($_POST["btnsigninamdin"])){
                $username=$_POST["ADusername"];
                $password=$_POST["ADpassword"];
                $ResultLoginAdmin = $this->LoginAdminModel->CheckAdminstrator($username,  $password);
                if($ResultLoginAdmin == false ){
                    $this->ViewAdminUnique("login",["alertcheck"=>"Sai tài khoản mật khẩu. Nhập lại !!!"]);
                }else{
                    // $this->ViewAdmin("mainViewAdmin",["control"=> "home"]);
                    //tạo 1 trang chào mừng admin, admin bấm tiếp tục thì gọi lại url này
                    $this->ViewAdminUnique("WelcomeAdmin");

                    $_SESSION["administration"] = true;
                }
            }else{
                $this->ViewAdminUnique("login");
            }
        }else{
            $this->ViewAdmin("mainViewAdmin",["control"=> "home"]);
        }

    }
    public function logout(){
        unset($_SESSION["administration"]);
        $this->ViewAdminUnique("login");
    }
}
?>