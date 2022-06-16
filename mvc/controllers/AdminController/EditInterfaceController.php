<?php
class editInterface extends Controller{
    public $InterfaceHomeAdminModel;
    public function __construct()
    {
        $this->InterfaceHomeAdminModel=$this->model("InterfaceHomeAdminModel");
    }
    public function quanly()
    {
        $rs_slider_banner =  $this->InterfaceHomeAdminModel->GetAllSlideBanner();
        $rs_interface_home = $this->InterfaceHomeAdminModel->GetAllInterfaceHome();
        if($rs_interface_home != false && $rs_slider_banner != false ){
            $background_banner = "";
            $nameTabHome = "";
            $nameTabShop = "";
            $nameTabIntro= "";
            $nameTabBlog = "";
            $nameTabContact = "";

            $subBannerProduct1="";
            $subBannerProduct2="";

            $idProdHot1= 1;
            $idProdHot2= 1 ;
            $idProdHot3= 1;

            for ($set_slider_banner_home = array (); $row = $rs_slider_banner->fetch_assoc(); $set_slider_banner_home[] = $row);
            // foreach($set_interface_home as $key => $value){
            //     foreach($value as $k => $vl){
                  
            //     break;
            //     }
            // }

            for ($set_interface_home = array (); $row = $rs_interface_home->fetch_assoc(); $set_interface_home[] = $row);
            foreach($set_interface_home as $key => $value){
                foreach($value as $k => $vl){
                   $background_banner = $set_interface_home[$key]['backgroundBanner'];
                   $nameTabHome = $set_interface_home[$key]['nameTabHome'];
                   $nameTabShop = $set_interface_home[$key]['nameTabShop'];
                   $nameTabIntro = $set_interface_home[$key]['nameTabIntro'];
                   $nameTabBlog = $set_interface_home[$key]['nameTabBlog'];
                   $nameTabContact = $set_interface_home[$key]['nameTabContact'];
                   $subBannerProduct1 = $set_interface_home[$key]['subBannerProduct1'];
                   $subBannerProduct2 = $set_interface_home[$key]['subBannerProduct2'];
                break;
                }
            }
            $this->ViewAdmin("mainViewAdmin",["control"=> "interface",
                                            "set_slider_banner_home"=>$set_slider_banner_home,
                                            "background_banner"=>$background_banner,
                                            "subBannerProduct1"=>$subBannerProduct1,
                                            "subBannerProduct2"=>$subBannerProduct2,
                                            ]);

        }
    }
    // ajax để xử lý update inter face
    public function updateInterface()
    {
       if(isset($_POST['dto_img_sub_banner_2'])){
           $img_banner = $_POST['dto_img_banner'];
            
           $img_sub_banner_1 = $_POST['dto_img_sub_banner_1'];
           $img_sub_banner_2 = $_POST['dto_img_sub_banner_2'];

           $img_sl_banner_1 = $_POST['dto_img_sl_banner_1'];
           $img_sl_banner_2 = $_POST['dto_img_sl_banner_2'];
           $img_sl_banner_3 = $_POST['dto_img_sl_banner_3'];

           $title_sl_banner_1 = $_POST['dtn_title_slide_banner_1'];
           $title_sl_banner_2 = $_POST['dtn_title_slide_banner_2'];
           $title_sl_banner_3 = $_POST['dtn_title_slide_banner_3'];

           $des_sl_banner_1 = $_POST['dtn_des_slide_banner_1'];
           $des_sl_banner_2 = $_POST['dtn_des_slide_banner_2'];
           $des_sl_banner_3 = $_POST['dtn_des_slide_banner_3'];

        if(isset($_FILES['dtn_img_banner'])){
            //xử lý phần ảnh
            $fimg_banner = $_FILES['dtn_img_banner']['name'];
            /* Location */
            $location = "./mvc/public/ImgInterfaceDefault/imgbanner/".$fimg_banner;
            $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
            $imageFileType = strtolower($imageFileType);
            /* Valid extensions */
            $valid_extensions = array("jpg","jpeg","png");

            $response = 0;
            /* Check file extension */
            if(in_array(strtolower($imageFileType), $valid_extensions)) {
               /* Upload file */
               if(move_uploaded_file($_FILES['dtn_img_banner']['tmp_name'],$location)){
                  $response = $location;
                  $img_banner = $fimg_banner;
               }
            }
        }

        if(isset($_FILES['dtn_img_sl_banner_1'])){
            //xử lý phần ảnh
            $fimg_slide_banner_1 = $_FILES['dtn_img_sl_banner_1']['name'];
            /* Location */
            $location = "./mvc/public/ImgInterfaceDefault/ImgSliderBanner/".$fimg_slide_banner_1;
            $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
            $imageFileType = strtolower($imageFileType);
            /* Valid extensions */
            $valid_extensions = array("jpg","jpeg","png");

            $response = 0;
            /* Check file extension */
            if(in_array(strtolower($imageFileType), $valid_extensions)) {
               /* Upload file */
               if(move_uploaded_file($_FILES['dtn_img_sl_banner_1']['tmp_name'],$location)){
                  $response = $location;
                  $img_sl_banner_1 = $fimg_slide_banner_1;
               }
            }
        }
        if(isset($_FILES['dtn_img_sl_banner_2'])){
            //xử lý phần ảnh
            $fimg_slide_banner_2 = $_FILES['dtn_img_sl_banner_2']['name'];
            /* Location */
            $location = "./mvc/public/ImgInterfaceDefault/ImgSliderBanner/".$fimg_slide_banner_2;
            $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
            $imageFileType = strtolower($imageFileType);
            /* Valid extensions */
            $valid_extensions = array("jpg","jpeg","png");

            $response = 0;
            /* Check file extension */
            if(in_array(strtolower($imageFileType), $valid_extensions)) {
               /* Upload file */
               if(move_uploaded_file($_FILES['dtn_img_sl_banner_2']['tmp_name'],$location)){
                  $response = $location;
                  $img_sl_banner_2 = $fimg_slide_banner_2;
               }
            }
        }
        if(isset($_FILES['dtn_img_sl_banner_3'])){
            //xử lý phần ảnh
            $fimg_slide_banner_3 = $_FILES['dtn_img_sl_banner_3']['name'];
            /* Location */
            $location = "./mvc/public/ImgInterfaceDefault/ImgSliderBanner/".$fimg_slide_banner_3;
            $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
            $imageFileType = strtolower($imageFileType);
            /* Valid extensions */
            $valid_extensions = array("jpg","jpeg","png");

            $response = 0;
            /* Check file extension */
            if(in_array(strtolower($imageFileType), $valid_extensions)) {
               /* Upload file */
               if(move_uploaded_file($_FILES['dtn_img_sl_banner_3']['tmp_name'],$location)){
                  $response = $location;
                  $img_sl_banner_3 = $fimg_slide_banner_3;
               }
            }
        }

        if(isset($_FILES['dtn_banner_prod_1'])){
            //xử lý phần ảnh
            $fimg_sub_banner_1 = $_FILES['dtn_banner_prod_1']['name'];
            /* Location */
            $location = "./mvc/public/ImgInterfaceDefault/imgsubbanner/".$fimg_sub_banner_1;
            $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
            $imageFileType = strtolower($imageFileType);
            /* Valid extensions */
            $valid_extensions = array("jpg","jpeg","png");

            $response = 0;
            /* Check file extension */
            if(in_array(strtolower($imageFileType), $valid_extensions)) {
               /* Upload file */
               if(move_uploaded_file($_FILES['dtn_banner_prod_1']['tmp_name'],$location)){
                  $response = $location;
                  $img_sub_banner_1 = $fimg_sub_banner_1;
               }
            }
        }
        if(isset($_FILES['dtn_banner_prod_2'])){
            //xử lý phần ảnh
            $fimg_sub_banner_2 = $_FILES['dtn_banner_prod_2']['name'];
            /* Location */
            $location = "./mvc/public/ImgInterfaceDefault/imgsubbanner/".$fimg_sub_banner_2;
            $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
            $imageFileType = strtolower($imageFileType);
            /* Valid extensions */
            $valid_extensions = array("jpg","jpeg","png");

            $response = 0;
            /* Check file extension */
            if(in_array(strtolower($imageFileType), $valid_extensions)) {
               /* Upload file */
               if(move_uploaded_file($_FILES['dtn_banner_prod_2']['tmp_name'],$location)){
                  $response = $location;
                  $img_sub_banner_2 = $fimg_sub_banner_2;
               }
            }
        }
        $rs_update_interface=$this->InterfaceHomeAdminModel->UpdateBannerInterface($img_banner, $img_sub_banner_1 , $img_sub_banner_2);
        if($rs_update_interface != false){
            // update các banner hoàn thành sau đó update các slide banner
            $rs_update_slider_banner_1=$this->InterfaceHomeAdminModel->UpdateSliderBannerInterface(1,$title_sl_banner_1,$img_sl_banner_1, $des_sl_banner_1);
            $rs_update_slider_banner_2=$this->InterfaceHomeAdminModel->UpdateSliderBannerInterface(2,$title_sl_banner_2,$img_sl_banner_2, $des_sl_banner_2);
            $rs_update_slider_banner_3=$this->InterfaceHomeAdminModel->UpdateSliderBannerInterface(3,$title_sl_banner_3,$img_sl_banner_3, $des_sl_banner_3);
            if($rs_update_slider_banner_1 != false ||$rs_update_slider_banner_2 != false ||$rs_update_slider_banner_3 != false) {
                echo 1;
            }
        }

      }
    }
    //AJAX xử lý cập nhật các tab menu
}
?>