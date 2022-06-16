<?php
class detailblog extends Controller{
    public $BlogModel;
    public $Slug;
    public function __construct()
    {
        $this->Slug = new Slug();
        $this->BlogModel=$this->model("blogModel");
    }
    public function MainFucntion()
    {
       echo $this->Slug->create_slug("Lỗi truy cập URL");
    }
    function post($st, $id){
        if($this->BlogModel->GetDetailPostBySlug($st) == false||
        $this->BlogModel->GetNewPost()==false||
        $this->BlogModel->GetLastedPost()==false||
        $this->BlogModel->GetRelativePostById($id)==false
        ){
            echo "in ra trang lỗi";
        }else{
            $rs_relative_post = $this->BlogModel->GetRelativePostById($id);
            $rs_new_blog =$this->BlogModel->GetNewPost();
            $rs_detail_post = $this->BlogModel->GetDetailPostBySlug($st);
            $rs_lasted_blog =$this->BlogModel->GetLastedPost();
            for ($set_relavite_post = array (); $row = $rs_relative_post->fetch_assoc(); $set_relavite_post[] = $row);
            for ($set_new_blog = array (); $row = $rs_new_blog->fetch_assoc(); $set_new_blog[] = $row);
            for ($set_lasted_blog = array (); $row = $rs_lasted_blog->fetch_assoc(); $set_lasted_blog[] = $row);

            for ($set_detail_post = array (); $row = $rs_detail_post->fetch_assoc(); $set_detail_post[] = $row);
            $this->view("mainView",["control"=>"detailblog",
                                    "set_new_blog"=>$set_new_blog,
                                    "set_lasted_blog"=>$set_lasted_blog,
                                    "set_relavite_post"=>$set_relavite_post,
                                    "set_detail_post"=>$set_detail_post]);
        }
        
    }
}
?>