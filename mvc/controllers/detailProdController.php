<?php
class detailProd extends Controller{
    public $detailProdModel;
    public $slug;
    public function __construct()
    {
    //xác định được model nào cần gọi để xử lý dữ liệ
        $this->detailProdModel=$this->model("DetailProdModel");
        $this->slug= new Slug();
    }
    function MainFucntion($slug_prod, $idProd){
        if( $this->detailProdModel->GetProdBySlug($slug_prod)==false || 
        $this->detailProdModel->GetRelativeProd($idProd) == false
        ){
            echo "in ra trang lỗi";
        }else{
            $rs_relative_prod = $this->detailProdModel->GetRelativeProd($idProd);
            if($rs_relative_prod != null){
                for ($set_relative_product = array (); $row = $rs_relative_prod->fetch_assoc(); $set_relative_product[] = $row);
            }else{
                $set_relative_product = "";
            }

            $rs_detail_prod = $this->detailProdModel->GetProdBySlug($slug_prod);
            for ($set_detail_product = array (); $row = $rs_detail_prod->fetch_assoc(); $set_detail_product[] = $row);

            $this->view("mainView",["control"=>"detailProduct",
                                    "set_relative_product"=>$set_relative_product,
                                    "set_detail_product"=>$set_detail_product]);
        }
    }
    public function AddToCard()
    {
        if(isset($_POST['id_prod'])){
            if(isset($_SESSION['username'])&& isset($_SESSION['password'])){
                //lấy id User ra sau đó thêm vào csdl tbl_card
                $rs_id_account = $this->detailProdModel->GetIdBySession( $_SESSION['username'], $_SESSION['password'] );


                if($rs_id_account != false ){
                    for ($id_account = array (); $row = $rs_id_account->fetch_assoc(); $id_account[] = $row);
                    $id_account =  $id_account[0]['idAccount'];
                    $id_prod = $_POST['id_prod'];
                    $count_prod = $_POST['val_count_prod'];
                    $date = date("Y-m-d");

                    //kiểm tra trong giỏ hàng người đó có sản phẩm chưa, nếu có rồi thì chỉ update số lượng
                 
                    if($this->detailProdModel->CheckProdInCard($id_account , $id_prod) == false) {
                        // thêm mới sản phẩm này vào cơ sơ dữ liệu gio hàng
                        // thêm vào cơ sở dư liệu, mỗi người sẽ có một giỏ hàng
                        $rs_add_card = $this->detailProdModel->AddToCard($id_account,$id_prod, $count_prod, $date);
                        if($rs_add_card != false){
                            echo 1;
                        }
                    }
                    else{
                        // update số lượng cho sản phẩm đó
                        $rs_apear_prod = $this->detailProdModel->CheckProdInCard($id_account , $id_prod);
                        for ($id_card = array (); $row = $rs_apear_prod->fetch_assoc(); $id_card[] = $row);
                        $rs_update_card = $this->detailProdModel->UpdateCountProduct($id_card[0]['idCard'], $count_prod);
                        if($rs_update_card != false){
                            echo 1;
                        }
                    }
                  
                }

            }else{
                echo false;
            }
        }
    }
    public function GetCardUser()
    {
        if(isset($_SESSION['username']) && isset($_SESSION['password'])){
            //lấy id User ra sau đó thêm vào csdl tbl_card
            $rs_id_account = $this->detailProdModel->GetIdBySession( $_SESSION['username'], $_SESSION['password'] );
            if($rs_id_account != false){
                for ($id_account = array (); $row = $rs_id_account->fetch_assoc(); $id_account[] = $row);
                $id_account =  $id_account[0]['idAccount'];
                if($this->detailProdModel->GetCard($id_account)!= false){
                    $rs_card_for_user = $this->detailProdModel->GetCard($id_account);
                    if($rs_card_for_user != null){
                        $sum_card = 0;
                        for ($set_card_user = array (); $row = $rs_card_for_user->fetch_assoc(); $set_card_user[] = $row);
                        foreach($set_card_user as $key => $value){      
                            foreach($value as $k => $vl){
                                echo '<div class="box ">
                                <i class="fas fa-times  del-card-user"  data-id-card = '.$set_card_user[$key]['idCard'].'></i>
                                <img src="./mvc/public/ImgProduct/'.$set_card_user[$key]['imgProd1'].'" alt="">
                                <div class="content">
                                    <h3>'.$set_card_user[$key]['nameProduct'].'</h3>
                                    <span class="quantity">'.$set_card_user[$key]['countProduct'].'</span>
                                    <span class="multiply" >x</span>
                                    <span class="price">'.number_format($set_card_user[$key]['priceProduct']).' dong</span>
                                </div>
                            </div>';
                            $sum_card +=  $set_card_user[$key]['priceProduct']*$set_card_user[$key]['countProduct'];
                                break;
                            }}
                            echo ' <h4 class="total"> Tổng : <span> '.number_format($sum_card).' đồng</span> </h4>
                            <a href="cart/thanh-toan-gio-hang" class="btn" style="   background: #44ad5b;
                            color: #e0f5e2;
                            font-size: 14px;">Thanh Toán</a>';
                    }else{echo "óc chó";}
                }else{echo "giỏ hàng trống ";}
            }else{echo "ngu";}
        }else{
            echo false;
        }
    }
    public function DelCardUser()
    {
        $rs_id_account = $this->detailProdModel->GetIdBySession( $_SESSION['username'], $_SESSION['password'] );
        if($rs_id_account != false){
            if(isset($_POST['id_card'])){
                $idCard = $_POST['id_card'];
                 $rs_del_card = $this->detailProdModel->DelCard( $idCard);
                 if($rs_del_card != false){
                     echo 1;
                 }
            }
        }
    }

}
?>