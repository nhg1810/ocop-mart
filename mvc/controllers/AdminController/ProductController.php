<?php
class product extends Controller{
    public $ProductModel;
    public function __construct()
    {
        //truyền model cần gọi
        $this->ProductModel=$this->model("ProductAdminModel");
    }

    function quanly(){
        if($this->ProductModel->GetAllTheFaceProduct() == false||$this->ProductModel->GetAllSpecialProduct()==false||$this->ProductModel->GetAllCategory() == false || $this->ProductModel->GetAllProd() == false){
            // in ra trang lỗi
        }else{
            $rs_the_face_prod = $this->ProductModel->GetAllTheFaceProduct();
            $rs_special_prod = $this->ProductModel->GetAllSpecialProduct();
            $rs_product_admin= $this->ProductModel-> GetAllProd();
            $rs_cate_product_admin= $this->ProductModel-> GetAllCategory();

            for ($set_the_face_product_admin = array (); $row = $rs_the_face_prod->fetch_assoc(); $set_the_face_product_admin[] = $row);
            for ($set_special_product_admin = array (); $row = $rs_special_prod->fetch_assoc(); $set_special_product_admin[] = $row);
            for ($set_product_admin = array (); $row = $rs_product_admin->fetch_assoc(); $set_product_admin[] = $row);
            for ($set_cate_product_admin = array (); $row = $rs_cate_product_admin->fetch_assoc(); $set_cate_product_admin[] = $row);
            $this->ViewAdmin("mainViewAdmin",["control"=> "product",
            "set_cate_product_admin"=>$set_cate_product_admin,
            "set_special_product_admin"=>$set_special_product_admin,
            "set_the_face_product_admin" => $set_the_face_product_admin,
            "set_product_admin" => $set_product_admin]);
        }
    }
    //ajax update sản phẩm
    function UpdateProductById(){
        if(isset($_POST['dtn_id_product'])){
            $idProduct = $_POST['dtn_id_product'];
            $nameProduct = $_POST['dtn_name_prod'];
            $idCateProduct = $_POST['dtn_idCategoryCurrent'];
            $descriptProduct = $_POST['dtn_descript'];
            $brand = $_POST['dtn_brand_prod'];
            $status = $_POST['dtn_status_prod'];
            $priceProduct= $_POST['dtn_price_prod'];
            $sale= $_POST['dtn_sale_prod'];

            $imgProd1 = $_POST['dto_img_prod_1'];
            $imgProd2 =$_POST['dto_img_prod_2'];
            $imgProd3 =$_POST['dto_img_prod_3'];
            $imgProd4 =$_POST['dto_img_prod_4'];
            //các kiểu định dạng ảnh
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt');
            //xử lý 4 ảnh
             if(isset($_FILES['dtn_img_prod_1'])){
                //xử lý phần ảnh
                $img_prod_1 = $_FILES['dtn_img_prod_1']['name'];
                /* Location */
                $location = "./mvc/public/ImgProduct/".$img_prod_1;
                $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
                $imageFileType = strtolower($imageFileType);
                /* Valid extensions */
                $valid_extensions = array("jpg","jpeg","png");
    
                $response = 0;
                /* Check file extension */
                if(in_array(strtolower($imageFileType), $valid_extensions)) {
                   /* Upload file */
                   if(move_uploaded_file($_FILES['dtn_img_prod_1']['tmp_name'],$location)){
                      $response = $location;
                      $imgProd1 = $img_prod_1;
                   }
                }
             }

             if(isset($_FILES['dtn_img_prod_2'])){
                //xử lý phần ảnh
                $img_prod_2 = $_FILES['dtn_img_prod_2']['name'];
                /* đường dẫn lưu file */
                $location = "./mvc/public/ImgProduct/".$img_prod_2;
                $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
                $imageFileType = strtolower($imageFileType);
                /* check xem có phải ảnh không */
                $valid_extensions = array("jpg","jpeg","png");
    
                $response = 0;
                /* Check file extension */
                if(in_array(strtolower($imageFileType), $valid_extensions)) {
                   /* tải file lên */
                   if(move_uploaded_file($_FILES['dtn_img_prod_2']['tmp_name'],$location)){
                      $response = $location;
                      $imgProd2 = $img_prod_2;
                   }
                }
             }

             if(isset($_FILES['dtn_img_prod_3'])){
                //xử lý phần ảnh
                $img_prod_3 = $_FILES['dtn_img_prod_3']['name'];
                /* đường dẫn lưu file */
                $location = "./mvc/public/ImgProduct/".$img_prod_3;
                $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
                $imageFileType = strtolower($imageFileType);
                /* check xem có phải ảnh không */
                $valid_extensions = array("jpg","jpeg","png");
    
                $response = 0;
                /* Check file extension */
                if(in_array(strtolower($imageFileType), $valid_extensions)) {
                   /* tải file lên */
                   if(move_uploaded_file($_FILES['dtn_img_prod_3']['tmp_name'],$location)){
                      $response = $location;
                      $imgProd3 = $img_prod_3;
                   }
                }
             }
             if(isset($_FILES['dtn_img_prod_4'])){
                //xử lý phần ảnh
                $img_prod_4 = $_FILES['dtn_img_prod_4']['name'];
                /* đường dẫn lưu file */
                $location = "./mvc/public/ImgProduct/".$img_prod_4;
                $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
                $imageFileType = strtolower($imageFileType);
                /* check xem có phải ảnh không */
                $valid_extensions = array("jpg","jpeg","png");
    
                $response = 0;
                /* Check file extension */
                if(in_array(strtolower($imageFileType), $valid_extensions)) {
                   /* tải file lên */
                   if(move_uploaded_file($_FILES['dtn_img_prod_4']['tmp_name'],$location)){
                      $response = $location;
                      $imgProd4 = $img_prod_4;
                   }
                }
             }

            $rs_update_product = $this->ProductModel->UpdateProductById($idProduct,$nameProduct,$idCateProduct,
            $descriptProduct,
            $brand, $status,$imgProd1,$imgProd2,$imgProd3,$imgProd4,$priceProduct,$sale);
            if($rs_update_product != false){
                echo 1;
            }else{
                echo 0;
            }
            exit;
            
        }
    }
    //ajax xoá sản phẩm
    function DeleteProductById(){
        if(isset($_POST['dtnIdProduct'])){
            $idProduct = $_POST['dtnIdProduct'];
            $rs_del_product_admin= $this->ProductModel->DeleteProductById($idProduct);
            if($rs_del_product_admin != false){
                echo 1;
            }
            else{
                echo "2343";
            }
        }
       
    }
    // ajax thêm sản phẩm
    function AddProduct(){
     if(isset($_POST['dtna_idCategoryCurrent'])){
        $idCateProduct = $_POST['dtna_idCategoryCurrent'];
        $nameProduct = $_POST['dtna_name_prod'];
        $descriptProduct = $_POST['dtna_descript'];
        $brand = $_POST['dtna_brand_prod'];
        $status = $_POST['dtna_status_prod'];
        $priceProduct = $_POST['dtna_price_prod'];
        $sale = $_POST['dtna_sale_prod'];
        $imgProd1= "chưa có ảnh";
        $imgProd2= "chưa có ảnh";
        $imgProd3= "chưa có ảnh";
        $imgProd4= "chưa có ảnh";
                    //xử lý 4 ảnh
                if(isset($_FILES['dtna_img_prod_1'])){
                        //xử lý phần ảnh
                        $img_prod_1 = $_FILES['dtna_img_prod_1']['name'];
                        /* Location */
                        $location = "./mvc/public/ImgProduct/".$img_prod_1;
                        $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
                        $imageFileType = strtolower($imageFileType);
                        /* Valid extensions */
                        $valid_extensions = array("jpg","jpeg","png");
            
                        $response = 0;
                        /* Check file extension */
                        if(in_array(strtolower($imageFileType), $valid_extensions)) {
                           /* Upload file */
                           if(move_uploaded_file($_FILES['dtna_img_prod_1']['tmp_name'],$location)){
                              $response = $location;
                              $imgProd1 = $img_prod_1;
                           }
                        }
                     }
        
                if(isset($_FILES['dtna_img_prod_2'])){
                        //xử lý phần ảnh
                        $img_prod_2 = $_FILES['dtna_img_prod_2']['name'];
                        /* đường dẫn lưu file */
                        $location = "./mvc/public/ImgProduct/".$img_prod_2;
                        $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
                        $imageFileType = strtolower($imageFileType);
                        /* check xem có phải ảnh không */
                        $valid_extensions = array("jpg","jpeg","png");
            
                        $response = 0;
                        /* Check file extension */
                        if(in_array(strtolower($imageFileType), $valid_extensions)) {
                           /* tải file lên */
                           if(move_uploaded_file($_FILES['dtna_img_prod_2']['tmp_name'],$location)){
                              $response = $location;
                              $imgProd2 = $img_prod_2;
                           }
                        }
                     }
        
                if(isset($_FILES['dtna_img_prod_3'])){
                        //xử lý phần ảnh
                        $img_prod_3 = $_FILES['dtna_img_prod_3']['name'];
                        /* đường dẫn lưu file */
                        $location = "./mvc/public/ImgProduct/".$img_prod_3;
                        $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
                        $imageFileType = strtolower($imageFileType);
                        /* check xem có phải ảnh không */
                        $valid_extensions = array("jpg","jpeg","png");
            
                        $response = 0;
                        /* Check file extension */
                        if(in_array(strtolower($imageFileType), $valid_extensions)) {
                           /* tải file lên */
                           if(move_uploaded_file($_FILES['dtna_img_prod_3']['tmp_name'],$location)){
                              $response = $location;
                              $imgProd3 = $img_prod_3;
                           }
                        }
                     }
                if(isset($_FILES['dtna_img_prod_4'])){
                        //xử lý phần ảnh
                        $img_prod_4 = $_FILES['dtna_img_prod_4']['name'];
                        /* đường dẫn lưu file */
                        $location = "./mvc/public/ImgProduct/".$img_prod_4;
                        $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
                        $imageFileType = strtolower($imageFileType);
                        /* check xem có phải ảnh không */
                        $valid_extensions = array("jpg","jpeg","png");
            
                        $response = 0;
                        /* Check file extension */
                        if(in_array(strtolower($imageFileType), $valid_extensions)) {
                           /* tải file lên */
                           if(move_uploaded_file($_FILES['dtna_img_prod_4']['tmp_name'],$location)){
                              $response = $location;
                              $imgProd4 = $img_prod_4;
                           }
                        }
                }

                $rs_insert_product_admin= $this->ProductModel-> InsertProduct($idCateProduct, $nameProduct,
                $descriptProduct,
                $brand,$status,$imgProd1,$imgProd2,$imgProd3, $imgProd4, $priceProduct,$sale);

                if($rs_insert_product_admin != false){
                    echo 1;
                    exit;
                }
    }
   }
    //ajax update danh mục sản phẩm
   function UpdateCategoryById(){
      if(isset($_POST['idCategory'])){
      $nameCategory= $_POST['dtn_name_category'];
      $idCategory= $_POST['idCategory'];
      $imgCategory= $_POST['dto_imgCategory'];
      $reviewCate= $_POST['dtn_descriptCategor'];
      //xử lý  ảnh CATE
      if(isset($_FILES['dtn_imgCategory'])){
          //xử lý phần ảnh
         $nimgCategory = $_FILES['dtn_imgCategory']['name'];
         /* Location */
         $location = "./mvc/public/ImgProduct/".$nimgCategory;
         $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
         $imageFileType = strtolower($imageFileType);
         /* Valid extensions */
          $valid_extensions = array("jpg","jpeg","png");
         $response = 0;
          /* Check file extension */
         if(in_array(strtolower($imageFileType), $valid_extensions)) {
         /* Upload file */
         if(move_uploaded_file($_FILES['dtn_imgCategory']['tmp_name'],$location)){
         $response = $location;
         $imgCategory = $nimgCategory;
            }
           }
         }

      $rs_update_cate_product_admin= $this->ProductModel->UpdateCategoryProduct($idCategory, $imgCategory, $reviewCate, $nameCategory);
      if($rs_update_cate_product_admin!= false){
         echo 1;
      }
     }
   }
   // ajax add danh mục sản phẩm
   function InsertCategoryProduct(){
      if(isset($_POST['dtna_name_category'])){
         $reviewCate = $_POST['dtna_des_category'];
         $nameCategory = $_POST['dtna_name_category'];
         $imgCategory ="";
               //xử lý  ảnh CATE
         if(isset($_FILES['dtna_img_category'])){
           //xử lý phần ảnh
            $nimgCategory = $_FILES['dtna_img_category']['name'];
          /* Location */
           $location = "./mvc/public/ImgProduct/".$nimgCategory;
           $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
           $imageFileType = strtolower($imageFileType);
           /* Valid extensions */
            $valid_extensions = array("jpg","jpeg","png");
            $response = 0;
             /* Check file extension */
           if(in_array(strtolower($imageFileType), $valid_extensions)) {
           /* Upload file */
            if(move_uploaded_file($_FILES['dtna_img_category']['tmp_name'],$location)){
            $response = $location;
             $imgCategory = $nimgCategory;
           }
          }
        }
         $rs_insert_cate_product_admin= $this->ProductModel->InsertCategoryProduct($imgCategory, $reviewCate, $nameCategory);
         if($rs_insert_cate_product_admin != false){
            echo 1;
         }
         exit;
      }
   }
   //ajax xoá danh mục sản phẩm
   function DeleteCategoryById()
   {
      if(isset($_POST['dtd_category'])){
         $idCategory = $_POST['dtd_category'];
         $rs_transfer_product_admin= $this->ProductModel->TransferProductToDelCategory($idCategory);
         if($rs_transfer_product_admin != false){
            //cho phép xoá category
            $rs_delete_category_admin= $this->ProductModel-> DeleteCategoryById($idCategory);
            if( $rs_delete_category_admin != false){
               echo 1;
            }
         }
       }
   }
   // ajax tim kiếm sản phẩm theo danh mục
   function FindProductByIdcategory($idCategory){
      if(isset($_POST['fidCategory'])){
         $idCategory= $_POST['fidCategory'];
         $rs_product_by_idcategory = $this->ProductModel->FindProductByIdCategory($idCategory);
         if($rs_product_by_idcategory != false){
            for ($set_product_by_cate_admin = array (); $row = $rs_product_by_idcategory->fetch_assoc(); $set_product_by_cate_admin[] = $row);
            //xử lý thg này
            $sumCate=0;
            foreach($set_product_by_cate_admin as $key => $value){
               $sumCate++;
               foreach($value as $k => $vl){
                   echo '<tr>
                   <td>
                   '.$set_product_by_cate_admin[$key]['idProduct'].'
                   </td>
                   <td>
                   <button type="button"  dt_bt_update_prod ='.$set_product_by_cate_admin[$key]['idProduct'].' class="btn btn-primary btn-rounded btn-icon bt_update_prod">
                   <i class="mdi mdi-auto-fix"></i>
                    </button>
                   </td>
                   <td>
                   <button type="button" class="btn btn-success btn-rounded btn-icon ">
                   <i class="mdi mdi-cart-off"></i>
                 </button
                   </td>
                   <td>
                   <button type="button" class="btn btn-danger btn-rounded btn-icon bt_del_prod" dt_bt_del_prod='.$set_product_by_cate_admin[$key]['idProduct'].'>
                   <i class="mdi mdi-close-circle"></i>
                 </button>
                   </td>
                   <td>
                   <input type="hidden" id="nameprod_'.$set_product_by_cate_admin[$key]['idProduct'].'" value= "'.$set_product_by_cate_admin[$key]['nameProduct'].'">
                   '.$set_product_by_cate_admin[$key]['nameProduct'].'
                   </td>
                   <td class="py-1">
                   <input type="hidden" id="imageprod_1_'.$set_product_by_cate_admin[$key]['idProduct'].'" value= "'.$set_product_by_cate_admin[$key]['imgProd1'].'">
                     <img src="./mvc/public/ImgProduct/'.$set_product_by_cate_admin[$key]['imgProd1'].'" alt="image" />
                   </td>
                   <td class="py-1">
                   <input type="hidden" id="imageprod_2_'.$set_product_by_cate_admin[$key]['idProduct'].'" value= "'.$set_product_by_cate_admin[$key]['imgProd2'].'">
                   <img src="./mvc/public/ImgProduct/'.$set_product_by_cate_admin[$key]['imgProd2'].'" alt="image" />
                 </td>
                 <td class="py-1">
                 <input type="hidden" id="imageprod_3_'.$set_product_by_cate_admin[$key]['idProduct'].'" value= "'.$set_product_by_cate_admin[$key]['imgProd3'].'">
                 <img src="./mvc/public/ImgProduct/'.$set_product_by_cate_admin[$key]['imgProd3'].'" alt="image" />
               </td>
               <td class="py-1">
               <input type="hidden" id="imageprod_4_'.$set_product_by_cate_admin[$key]['idProduct'].'" value= "'.$set_product_by_cate_admin[$key]['imgProd4'].'">
               <img src="./mvc/public/ImgProduct/'.$set_product_by_cate_admin[$key]['imgProd4'].'" alt="image" />
             </td>
                   <td>
                   <input type="hidden" id="priceprod_'.$set_product_by_cate_admin[$key]['idProduct'].'" value= "'.$set_product_by_cate_admin[$key]['priceProduct'].'">
                   '.$set_product_by_cate_admin[$key]['priceProduct'].'
                   </td>
                   <td>
                   <input type="hidden" id="brand_'.$set_product_by_cate_admin[$key]['idProduct'].'" value= "'.$set_product_by_cate_admin[$key]['brand'].'">
                   '.$set_product_by_cate_admin[$key]['brand'].'
                   </td>
                   <td>
                   <input type="hidden" id="idcategory_'.$set_product_by_cate_admin[$key]['idProduct'].'" value= "'.$set_product_by_cate_admin[$key]['idCategory'].'">
                   '.$set_product_by_cate_admin[$key]['nameCategory'].'
                   </td>

                   <td>
                   <input type="hidden" id="status_'.$set_product_by_cate_admin[$key]['idProduct'].'" value= "'.$set_product_by_cate_admin[$key]['status'].'">
                   '; if($set_product_by_cate_admin[$key]['status'] == 0){echo "<p style='color:red'>Hết hàng</p>";} else{echo "<p style='color:green'>Còn hàng</p>";} echo'
                   </td>

                   <td>
                   <input type="hidden" id="descript_product_'.$set_product_by_cate_admin[$key]['idProduct'].'" value= "'.$set_product_by_cate_admin[$key]['descriptProduct'].'">
                   '.$set_product_by_cate_admin[$key]['descriptProduct'].'
                   </td>
                   <td>
                   <input type="hidden" id="sale_'.$set_product_by_cate_admin[$key]['idProduct'].'" value= "'.$set_product_by_cate_admin[$key]['sale'].'">
                   '.$set_product_by_cate_admin[$key]['sale'].'
                   </td>
                 </tr>';
               break;
               }
            }
         }
      }

   }
   //ajax get allcategory
   public function AllCategory()
   {
      $ajax_get_category = $this->ProductModel->GetAllCategory();
      for ($category = array (); $row = $ajax_get_category->fetch_assoc(); $category[] = $row);
      echo json_encode($category);
   }
   //ajax get ra tổng các sản phẩm trong 1 danh mục
   public function SumProdCate()
   {
      if(isset($_POST['Idcategory'])){
        $ajax_get_sum_prod_category = $this->ProductModel->GetSumProductByCategory($_POST['Idcategory']);
      for ($sum_prod_cate = array (); $row = $ajax_get_sum_prod_category->fetch_assoc(); $sum_prod_cate[] = $row);
      echo json_encode($sum_prod_cate);
      }
   }
   // ajax seach tìm kiếm sản phẩm( live search)
   public function LiveSearch()
   {
      if(isset($_POST['input'])){
         $input = $_POST['input'];
         $ajax_live_seach = $this->ProductModel->LiveSearchByName($input); 
         if($ajax_live_seach != false ){
            for ($set_live_search_product_admin = array (); $row = $ajax_live_seach->fetch_assoc(); $set_live_search_product_admin[] = $row);
               foreach($set_live_search_product_admin as $key => $value){      
                     foreach($value as $k => $vl){
                        echo '<tr>
                        <td>'.$set_live_search_product_admin[$key]['idProduct'].'</td>
                           <td>'.$set_live_search_product_admin[$key]['nameProduct'].'</td>
                              <td><img src= "./mvc/public/ImgProduct/'.$set_live_search_product_admin[$key]['imgProd1'].'"/></td>';

                              if($set_live_search_product_admin[$key]['special'] == 0){
                                 echo ' <td><button type="button" class="btn btn-primary btn-sm btn-chosse-special-prod" data-id-prod='.$set_live_search_product_admin[$key]['idProduct'].'>Chọn</button></td>
                                 </tr>'; 
                              }else if($set_live_search_product_admin[$key]['special'] == 1){
                                 echo ' <td><button type="button" class="btn btn-inverse-success btn-sm ">Đã được chọn</button></td>
                                 </tr>'; 
                              }else{
                                 echo ' <td><button type="button" class="btn btn-inverse-success btn-sm ">Sp tiêu biểu shop</button></td>
                                 </tr>'; 
                              }

                                               
                     break;         
               }
            }
            
       }else{
         echo "<tr><td>0 Sản phẩm được tìm thấy</td></tr>";
      }  
      }
   }
   //ajax add sản phẩm vào mục nổi bật
   public function AddSpecialProd()
   {
      if(isset($_POST['data_id_prod'])){
         $idProduct =$_POST['data_id_prod'];
         $ajax_update_special_prod = $this->ProductModel->ChangeSpecialProduct($idProduct);
         if($ajax_update_special_prod != false){
            echo 1;
         }
      }
   }
   // ajax thêm vào sản phẩm tiêu biểu của shop
   public function AddTheFaceProd()
   {
      if(isset($_POST['data_id_prod'])){
         $idProduct =$_POST['data_id_prod'];
         $ajax_update_special_prod = $this->ProductModel->ChangeTheFaceProduct($idProduct);
         if($ajax_update_special_prod != false){
            echo 1;
         }
      }
   }
   // ajax huỷ bỏ special cho một sản phẩm
   public function DelSpecialProduct()
   {
      if(isset($_POST['data_id_prod'])){
         $idProduct = $_POST['data_id_prod'];
         $ajax_del_special_prod = $this->ProductModel->GetOutSpecialProduct($idProduct);
         if($ajax_del_special_prod != false){
            echo 1;
         }

      }
   }
}
?>