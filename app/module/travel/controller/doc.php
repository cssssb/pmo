<?php
namespace travel;

// use system\ding_password;


// echo "load ding_controller";
// echo  microtime();
// echo "\n";

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       ding_user
 * @DataTime:  2018-08-21
 * @describe:  V1.0
 * ================
 */
class doc
{
    /**
     * 构造函数
     */
    public function __construct()
    {   
        $this->protocol = \app::load_app_class('protocol','user');//加载公共json
        $this->city = \app::load_cont_class('city', 'travel');//加载差旅
    }
    //list
    public function readme(){
        // $post = ['sss'];
        // $return = $this->city->add_city($post);
        // $data['addCity'] = ["addCity","$post","$return","注释"];

        $post = [id=>"1"];
        $return = $this->city->getOneCity($post);
        $data['getOneCity_success'] = ["getOneCity_success",($post),"$return","注释1","code"];

        // $post = [id=>"100"];
        // $return = $this->city->getOneCity($post);
        // $data = ["getOneCity_failed1","$post","$return","注释2","code"];
        echo json_encode($data);
    }
    private function add_return(){

    }
}