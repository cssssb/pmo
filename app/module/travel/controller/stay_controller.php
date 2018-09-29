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
class stay_controller
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
        $this->stay = \app::load_app_class('stay_class', 'travel');//加载差旅
    }

    //list
    public function listStay(){
        $post = $this->post;
        return $this->stay->list_stay($post);
    }
    //get_one
    public function getOneStay(){
        $post = $this->post;
        return $this->stay->get_one_stay($post);
    }
    
    //增/改
    public function addStay(){
        $post = $this->post;
        return $this->stay->add_stay($post);
    }

    //删
    public function delStay(){
        $post = $this->post;
        return $this->stay->del_stay($post);
    }
}