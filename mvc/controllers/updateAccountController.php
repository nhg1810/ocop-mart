<?php
class updateAccount extends Controller{
    public $UpdateAccountModel;
    
    public function __construct(){
        $this->UpdateAccountModel=$this->model("UpdateAccountModel");
    }
    function MainFucntion(){
      if(isset($_SESSION['username']) && isset($_SESSION['password'])){
        if(isset($_POST['name'])){
            $name= $_POST['name'];
            $email= $_POST['email'];
            $phone= $_POST['phone'];
            $address= $_POST['address'];
            $old_avata= $_POST['old-avata'];
            $img_avata = $old_avata;
           if(isset($_FILES['avata']) && $name != "" && $email != "" && $phone != "" && $address != "" ){
               if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $this->ViewUserUnique("update_account",["alert"=>"Email sai !!! Vui lòng kiểm tra lại !!"]);
               }

                else if(!preg_match('/^[0-9]{10}+$/', $phone)){
                 $this->ViewUserUnique("update_account",["alert"=>"Số điện thoại sai !!! Vui lòng kiểm tra lại !!"]);
                }

                
               else if(isset($_FILES['avata'])){
                    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt');
                    //xử lý phần ảnh
                    $img_avata_i = $_FILES['avata']['name'];
                    if($img_avata_i != ""){
                        /* Location */
                        $location = "./mvc/public/ImgInterfaceDefault/imgAvataUser/".$img_avata_i;
                        $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
                        $imageFileType = strtolower($imageFileType);
                        /* Valid extensions */
                        $valid_extensions = array("jpg","jpeg","png");
                            
                        $response = 0;
                        /* Check file extension */
                        if(in_array(strtolower($imageFileType), $valid_extensions)) {
                        /* Upload file */
                        if(move_uploaded_file($_FILES['avata']['tmp_name'],$location)){
                        $response = $location;
                        $img_avata = $img_avata_i;
                        }   
           
                      }else{
                        $this->ViewUserUnique("update_account",["alert"=>"Đây không phải là tệp ảnh !!! Vui lòng kiểm tra lại !!"]);
                      }
                    }
                      // update ở đây  
                      $update_account = $this->UpdateAccountModel->UpdateInforModel($name,$email,$phone,$address,$img_avata,$_SESSION['username'],$_SESSION['password']);
                     
                      if($update_account != false){
                        if($old_avata != $img_avata && $old_avata != ""){
                          unlink('./mvc/public/ImgInterfaceDefault/imgAvataUser/'.$old_avata);
                        }
                        setcookie("name", $name, time() + (86400 * 30), "/");
                        setcookie("email",  $email, time() + (86400 * 30), "/");
                        setcookie("address",  $address, time() + (86400 * 30), "/");
                        setcookie("sdt",  $phone, time() + (86400 * 30), "/");
                        setcookie("avata",  $img_avata, time() + (86400 * 30), "/");
                        $this->ViewUserUnique("successPage");
                      }  
               }
              

           }else{
            $this->ViewUserUnique("update_account",["alert"=>"Điền thiếu thông tin vui lòng kiểm tra lại !!"]);
          }
        }else{
            // set các thông tin người mua vào session
            if(isset($_SESSION['username']) && isset($_SESSION['password'])){
                $rs_get_account = $this->UpdateAccountModel->GetAccountByUserPass($_SESSION['username'], $_SESSION['password']);
                if( $rs_get_account != false){
                    for ($set_account = array (); $row = $rs_get_account->fetch_assoc(); $set_account[] = $row);
                    $this->ViewUserUnique("update_account",["set_account" => $set_account]);
                 }
               }
        }
      }else{
          echo "ỉn trang lỗi";
      }
    }

}
?>