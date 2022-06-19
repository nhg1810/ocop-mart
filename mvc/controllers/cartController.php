<?php
class cart extends Controller{
    public $CartModel;
    
    public function __construct()
    {
        $this->CartModel=$this->model("CartModel");
    }
    function MainFucntion(){
        if(isset($_SESSION['username']) && isset($_SESSION['password'])){
            if($this->CartModel->GetIdAccountBySession($_SESSION['username'], $_SESSION['password'])!=false){
                $rs_id_account = $this->CartModel->GetIdAccountBySession( $_SESSION['username'], $_SESSION['password'] );
                for ($id_account = array (); $row = $rs_id_account->fetch_assoc(); $id_account[] = $row);

                $id_account =  $id_account[0]['idAccount'];
                if($this->CartModel->GetAllCardUser($id_account) != false){
                    $rs_cart_account = $this->CartModel->GetAllCardUser($id_account);
                    for ($rs_cart = array (); $row = $rs_cart_account->fetch_assoc(); $rs_cart[] = $row);

                    $this->view("mainView",["control"=>"cart","rs_cart"=>$rs_cart]);

                }else{

                    //trong giỏ hàng người này trống 
                    $this->ViewUserUnique("successPage", ['alert'=>"Giỏ hàng bạn đang trống vui lòng thêm vào giỏ để tiếp tục đến bước thanh toán"]);
                }
            }else{
                echo "lỗi ko tồn tại tài khoản";
            }
        }else{
            echo "lỗi không tồn tại sesison";
        }
    }
    public function AjaxGetProdByIdCart()
    {
        if(isset($_POST['id_card'])){
            $rs_prod_cart = $this->CartModel->GetProdByIdCard($_POST['id_card']);
            if($rs_prod_cart != false){
                for ($cart_prod = array (); $row = $rs_prod_cart->fetch_assoc(); $cart_prod[] = $row);
                foreach($cart_prod as $key => $value){
                    foreach($value as $k => $vl){
                        echo '  <div class="row d-flex justify-content-between px-4" id= "cart-'. $cart_prod[$key]["idCard"].'">
                        <p class="mb-1 text-left">'.$cart_prod[$key]['nameProduct'].'</p>
                        <h6 class="mb-1 text-right">'.number_format($cart_prod[$key]['priceProduct'] - ($cart_prod[$key]['sale'] / 100 *$cart_prod[$key]['priceProduct']) ).' đồng (sale: '.$cart_prod[$key]['sale'].' %)</h6>
                    </div>';
                        break;
                    }}
            }
        }
    }
    public function AjaxGetPriceByIdCart()
    {
        if(isset($_POST['id_card'])){
            $rs_prod_cart = $this->CartModel->GetProdByIdCard($_POST['id_card']);
            if($rs_prod_cart != false){
                for ($cart_prod = array (); $row = $rs_prod_cart->fetch_assoc(); $cart_prod[] = $row);
                foreach($cart_prod as $key => $value){
                    foreach($value as $k => $vl){
                        echo ( $cart_prod[$key]['priceProduct'] - ($cart_prod[$key]['sale'] / 100 * $cart_prod[$key]['priceProduct']) ) * $cart_prod[$key]['countProduct'] ;
                        break;
                    }}
            }
        }
    }
    public function AjaxCreateBillCurrent()
    {
        $rs_id_user = $this->CartModel->GetIdUserByAccount($_SESSION['username'], $_SESSION['password']);
        if( $rs_id_user != false){
            for ($id_user = array (); $row = $rs_id_user->fetch_assoc(); $id_user[] = $row);
            $idUser= $id_user[0]['idAccount'];
            if(isset($_POST['idBillCurrent'])){
                $rs_create_bill = $this->CartModel->CreateBill($_POST['idBillCurrent'], $idUser);
                if($rs_create_bill != false){
                    echo true;
                }
            }
        }

    }
    public function AjaxDelProdInCart()
    {
        if(isset($_POST['id_cart_del'])){
          
            $idCart = $_POST['id_cart_del'];
            $rs_del_cart  =  $this->CartModel->DelProdInCart($idCart);
            if($rs_del_cart != false){
                echo 1;
            }
        }else{
            echo "lỗi xoá cart-prod";
        }
    }
    public function AjaxCreateOrder()
    {
        if(isset($_POST['arr_id_prod'])){
            $idProd = $_POST['arr_id_prod'];
            $idBill = $_POST['idBillCurrent'];
            $count_prod = $_POST['count_prod'];
            $dateOrder = date("Y-m-d");
            $rs_create_order = $this->CartModel->CreateOrder($idProd, $dateOrder, $idBill, $count_prod);
            if($rs_create_order != false){
                echo true;
            }else{
                echo "ngu";
            }
        }
    }
}
?>