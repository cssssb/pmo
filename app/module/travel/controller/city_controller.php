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
class city_controller
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
        $this->city = \app::load_app_class('city_class', 'travel');//加载差旅
    }
    //list
    public function listCity(){
        $post = $this->post;
        return $this->city->list_city($post);
    }
    //get_one
    public function getOneCity(){
        $post = $this->post;
        return $this->city->get_one_city($post);
    }
    
    //增/改
    public function addCity(){
        $post = $this->post;
        return $this->city->add_city($post);
    }

    //删
    public function delCity(){
        $post = $this->post;
        return $this->city->del_city($post);
    }
  
}