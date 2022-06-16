<?php
class App{
    //nếu không có controller nào được gọi tới mặc định nó sẽ vào homecontroller
    protected $controller="Home";
    //nếu không có action nào gọi tới thì nó sẽ mặc định vào MainFunctiion của controller đó
    protected $action="MainFucntion";
    protected $params=[];

    protected $AdminController = "home";
    protected $AdminAction = "quanly";
    protected $AdminParams = [];

    function __construct(){
        $arr = $this->UrlProcess();
        if($arr != null && $arr[0] != "admin"){
                // echo "vào trưởng hợp 1";
                    // Controller
                if( file_exists("./mvc/controllers/".$arr[0]."Controller.php")){
                    $this->controller = $arr[0];
                    unset($arr[0]);
                }
                require_once "./mvc/controllers/". $this->controller ."Controller.php";
                $this->controller = new $this->controller;
            // Action
            if(isset($arr[1])){
                if( method_exists( $this->controller , $arr[1]) ){
                    $this->action = $arr[1];
                }
                unset($arr[1]);
            }
            // Params
           
            $this->params = $arr?array_values($arr):[];
            call_user_func_array([$this->controller, $this->action], $this->params );
            // print_r( $arr);       
        }else if($arr != null && $arr[0] == "admin"){
            // echo "vào trưởng hợp 2";
            // Controller
                if(isset($arr[1])){
                    //phải bắt buộc login mới vào được các controller khác
                    if(isset($_SESSION["administration"])){
                        if($_SESSION["administration"] == true){
                            // echo "đã login";

                            if(file_exists("./mvc/controllers/AdminController/".$arr[1]."Controller.php")){
                                $this->AdminController = $arr[1];
                                unset($arr[1]);
                            }
                        }else{
                            // echo "chưa login";
                            unset($arr[1]);
                        }
                    }else{
                        // echo "không tồn tại session";
                        unset($arr[1]);
                    }
                   
                }
                require_once "./mvc/controllers/AdminController/". $this->AdminController ."Controller.php";
                $this->AdminController = new $this->AdminController;

              // Action
                if(isset($arr[2])){
                    if(isset($_SESSION["administration"])){
                        if($_SESSION["administration"] == true){
                        if( method_exists( $this->AdminController , $arr[2]) ){
                            $this->AdminAction = $arr[2];
                        }
                    }      
                }
                unset($arr[2]);      
                }
                // echo $this->AdminAction;

                //pram
                $this->AdminParams = $arr?array_values($arr):[];
                call_user_func_array([$this->AdminController, $this->AdminAction], $this->AdminParams );

        }else{
            // echo "vào trưởng hợp 3";
            require_once "./mvc/controllers/". $this->controller ."Controller.php";
            $this->controller = new $this->controller;
            $this->params = $arr?array_values($arr):[];
            call_user_func_array([$this->controller, $this->action], $this->params );
        }
     
    }

    function UrlProcess(){
        if( isset($_GET["url"]) ){
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
    }

}
?>