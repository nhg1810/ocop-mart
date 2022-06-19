<?php
class blog extends Controller
{
    public $BlogModel;

    public function __construct()
    {
        $this->BlogModel = $this->model("blogModel");
    }
    function MainFucntion()
    {
        if (
            $this->BlogModel->GetAllCateNew() == false ||
            $this->BlogModel->GetThreeNew() == false ||
            $this->BlogModel->GetNewPost() == false ||
            $this->BlogModel->GetLastedPost() == false ||
            $this->BlogModel->GetTowPostHadIdFive() == false ||
            $this->BlogModel->GetFourPostHadIdOne() == false ||
            $this->BlogModel->GetFourPostHadIdTow() == false ||
            $this->BlogModel->GetThreePostHadIdThree() == false
        ) {
            // in ra trang lỗi
        } else {
            $rs_post_had_id_three = $this->BlogModel->GetThreePostHadIdThree();
            $rs_post_had_id_two = $this->BlogModel->GetFourPostHadIdTow();
            $rs_post_had_id_one = $this->BlogModel->GetFourPostHadIdOne();
            $rs_post_had_id_five = $this->BlogModel->GetTowPostHadIdFive();
            $rs_lasted_blog = $this->BlogModel->GetLastedPost();
            $rs_new_blog = $this->BlogModel->GetNewPost();
            $rs_special_blog = $this->BlogModel->GetThreeNew();
            $rs_catenew_blog = $this->BlogModel->GetAllCateNew();
            for ($set_post_had_id_three = array(); $row = $rs_post_had_id_three->fetch_assoc(); $set_post_had_id_three[] = $row);
            for ($set_post_had_id_tow = array(); $row = $rs_post_had_id_two->fetch_assoc(); $set_post_had_id_tow[] = $row);
            for ($set_post_had_id_five = array(); $row = $rs_post_had_id_five->fetch_assoc(); $set_post_had_id_five[] = $row);
            for ($set_post_had_id_one = array(); $row = $rs_post_had_id_one->fetch_assoc(); $set_post_had_id_one[] = $row);

            for ($set_lasted_blog = array(); $row = $rs_lasted_blog->fetch_assoc(); $set_lasted_blog[] = $row);
            for ($set_new_blog = array(); $row = $rs_new_blog->fetch_assoc(); $set_new_blog[] = $row);
            for ($set_special_blog = array(); $row = $rs_special_blog->fetch_assoc(); $set_special_blog[] = $row);
            for ($set_catenew_blog = array(); $row = $rs_catenew_blog->fetch_assoc(); $set_catenew_blog[] = $row);
            // print_r($set_special_blog);
            $this->view("mainView", [
                "control" => "blog",
                "set_special_blog" => $set_special_blog,
                "set_lasted_blog" => $set_lasted_blog,
                "set_post_had_id_five" => $set_post_had_id_five,
                "set_new_blog" => $set_new_blog,
                "set_post_had_id_one" => $set_post_had_id_one,
                "set_post_had_id_tow" => $set_post_had_id_tow,
                "set_post_had_id_three" => $set_post_had_id_three,
                "set_catenew_blog" => $set_catenew_blog
            ]);
        }
    }
}
