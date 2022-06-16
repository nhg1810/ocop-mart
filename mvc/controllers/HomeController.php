<?php
class Home extends Controller{
    public $homeModel;
    public $blogModel;
    public function __construct()
    {
    //xác định được model nào cần gọi để xử lý dữ liệ
        $this->homeModel=$this->model("HomeModel");
        $this->blogModel=$this->model("BlogModel");
    }
    // kế thừa lại Controller trong Thư mục core để có thể sử dụng được hai hàm này

    //hàm mặc định khi không gọi Function
    function MainFucntion(){
        // echo "Đây là hàm mặc định khi gọi tới Controller này";

        //lấy dử liệu ấy quăng vào thằng view nào
        //có thể truyền ta cả biến, vĩ dụ biến control
        if($this->homeModel->GetBannerShop() == false ||
         $this->homeModel->GetCategoryShop()==false ||
          $this->homeModel->GetAllProduct() ==false||
          $this->homeModel->GetAllInterfaceHome()==false||
          $this->homeModel->GetSixNewProd()==false||
          $this->blogModel->GetThreeNewHome()==false||
          $this->homeModel->GetSpecialProd() == false||
          $this->homeModel->GetTheFaceProd() == false||
          $this->homeModel->GetProdMostSales()==false
          ){
            //in ra trang lỗi he thống
            echo "123";
        }else{
            $background_banner= "";
            $subBannerProduct1= "";
            $subBannerProduct2= "";
            $rs_new_blog_home = $this->blogModel->GetThreeNewHome();
            $rs_special_prod = $this->homeModel->GetSpecialProd();
            $rs_new_prod = $this->homeModel->GetSixNewProd();
            $rs_product_home= $this->homeModel-> GetAllProduct();
            $rs_category_home = $this->homeModel->GetCategoryShop();
            $rs_banner_home = $this->homeModel->GetBannerShop();
            $rs_interface_home = $this->homeModel->GetAllInterfaceHome();
            $rs_the_face_prod_home =$this->homeModel->GetTheFaceProd();
            $rs_the_salest_prod_home =$this->homeModel->GetProdMostSales();
            //xử lý dữ liệu từ database đổ ra
            for ($set_interface_home = array (); $row = $rs_interface_home->fetch_assoc(); $set_interface_home[] = $row);
            foreach($set_interface_home as $key => $value){
                foreach($value as $k => $vl){
                   $background_banner = $set_interface_home[$key]['backgroundBanner'];
                   $subBannerProduct1 = $set_interface_home[$key]['subBannerProduct1'];
                   $subBannerProduct2 = $set_interface_home[$key]['subBannerProduct2'];
                break;
                }
            }
            for ($set_new_blog_home = array (); $row = $rs_new_blog_home->fetch_assoc(); $set_new_blog_home[] = $row);

            for ($set_salest_product_home = array (); $row = $rs_the_salest_prod_home->fetch_assoc(); $set_salest_product_home[] = $row);
            for ($set_the_face_product_home = array (); $row = $rs_the_face_prod_home->fetch_assoc(); $set_the_face_product_home[] = $row);
            for ($set_special_product_home = array (); $row = $rs_special_prod->fetch_assoc(); $set_special_product_home[] = $row);
            for ($set_new_product_home = array (); $row = $rs_new_prod->fetch_assoc(); $set_new_product_home[] = $row);
            for ($set_product_home = array (); $row = $rs_product_home->fetch_assoc(); $set_product_home[] = $row);
            for ($set_category_home = array (); $row = $rs_category_home->fetch_assoc(); $set_category_home[] = $row);
            for ($set_banner_home = array (); $row = $rs_banner_home->fetch_assoc(); $set_banner_home[] = $row);
            $this->view("mainView",["control"=>"Home", "set_banner_home"=>$set_banner_home
                                                        ,"set_category_home"=>$set_category_home
                                                    ,"set_product_home"=>$set_product_home,
                                                    "set_interface_home"=> $set_interface_home,
                                                    "background_banner" =>$background_banner,
                                                    "subBannerProduct1"=>$subBannerProduct1,
                                                    "set_new_blog_home"=>$set_new_blog_home,
                                                    "set_new_product_home" => $set_new_product_home,
                                                    "set_special_product_home"=>$set_special_product_home,
                                                    "set_the_face_product_home"=>$set_the_face_product_home,
                                                    "set_salest_product_home"=>$set_salest_product_home,
                                                    
                                                    "subBannerProduct2"=>$subBannerProduct2]);


            // // print_r($set_banner_home);

        }
    }
    function Test(){
        echo "123";
    }
    // ajaz lấy sản phẩm theo id
    public function GetProdById()
    {
        if(isset($_POST['data_id_prod'])){
            $idProd=  $_POST['data_id_prod'];
            $rs_detail_prod = $this->homeModel->GetProdById($idProd);
            if($rs_detail_prod != false){
              for ($set_detail_product_home = array (); $row = $rs_detail_prod->fetch_assoc(); $set_detail_product_home[] = $row);
              foreach($set_detail_product_home as $key => $value){
                foreach($value as $k => $vl){
                    echo '
                    <div class="imgBx">
                    <div class="cancel-panel-detail-prod" id ="cancel-panel-detail-prod">
                    X
                    </div>
                    <img src="./mvc/public/ImgProduct/'.$set_detail_product_home[$key]['imgProd1'].'" alt="">
                    </div>
                    <div class="details">
                    <div class="content" id="detail-prod-home"> 
                    <h2>'.$set_detail_product_home[$key]['nameProduct'].'<br>
                    <span>'.$set_detail_product_home[$key]['nameCategory'].'</span>
                </h2>
                <p>
                '.$set_detail_product_home[$key]['descriptProduct'].'
                </p>
                
                <p>Nguồn góc xuất xứ: --:
                '.$set_detail_product_home[$key]['brand'].'
                </p>
                
                <h3>'.number_format($set_detail_product_home[$key]['priceProduct']).' VNĐ</h3>
                <button>Xem chi tiết hơn </button>
                </div>
                </div>';
                 break;
                }}
            }
        }
       
    }
    
}
?>