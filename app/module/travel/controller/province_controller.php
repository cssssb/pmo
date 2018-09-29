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
class province_controller
{
    /**
     * 构造函数
     */
    public function __construct()
    {   
        $this->protocol = \app::load_app_class('protocol','user');//加载公共json
        // $this->view = \app::load_view_class('budget_paper', 'budget');//加载json数据模板
        $this->post = json_decode(file_get_contents('php://input'),true);
        $post = $this->post;
        $this->province = \app::load_app_class('province_class', 'travel');//加载差旅
    }

    //list
    public function listProvince(){
        $post = $this->post;
        return $this->province->list_province($post);
    }
    //get_one
    public function getOneProvince(){
        $post = $this->post;
        return $this->province->get_one_province($post);
    }
    
    //增/改
    public function addProvince(){
        $post = $this->post;
        return $this->province->add_province($post);
    }

    //删
    public function delProvince(){
        $post = $this->post;
        return $this->province->del_province($post);
    }
}