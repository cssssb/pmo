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
        $this->protocol = \app::load_model_class('protocol','user');//加载公共json
        // $this->view = \app::load_view_class('budget_paper', 'budget');//加载json数据模板
        $this->post = json_decode(file_get_contents('php://input'),true);
        $post = $this->post;
        $this->city = \app::load_service_class('city_class', 'travel');//加载差旅
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
        $ass =  $this->city->add_city($post);
        $msg['code'] = 1;
        $msg['msg'] = '添加失败';
        if($ass){
            $msg['code'] = 0;
            $msg['msg'] = '添加成功';
        }
        echo json_encode($msg);die;
    }
    public function editCity(){
        $post = $this->post;
        return $this->city->edit_city($post);
    }
    //删
    public function delCity(){
        $post = $this->post;
        $ass = $this->city->del_city($post);
        $msg['code'] = 1;
        $msg['msg'] = '删除失败';
        if($ass){
            $msg['code'] = 0;
            $msg['msg'] = '删除成功';
        }
        echo json_encode($msg);die;
    }
    public function test(){
        return 123;
    }
}