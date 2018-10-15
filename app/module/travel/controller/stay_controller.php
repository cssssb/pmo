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
        $this->protocol = \app::load_model_class('protocol','user');//加载公共json
        // $this->view = \app::load_view_class('budget_paper', 'budget');//加载json数据模板
        $this->post = json_decode(file_get_contents('php://input'),true);
        $post = $this->post;
        $this->stay = \app::load_service_class('stay_class', 'travel');//加载差旅
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
        $ass = $this->stay->add_stay($post);
        $msg['code'] = 1;
        $msg['msg'] = '添加失败';
        if($ass){
            $msg['code'] = 0;
            $msg['msg'] = '添加成功';
        }
        echo json_encode($msg);die;
    }
    public function editStay(){
        $post = $this->post;
        return $this->stay->edit_stay($post);
    }
    //删
    public function delStay(){
        $post = $this->post;
        $ass =  $this->stay->del_stay($post);
        $msg['code'] = 1;
        $msg['msg'] = '删除失败';
        if($ass){
            $msg['code'] = 0;
            $msg['msg'] = '删除成功';
        }
        echo json_encode($msg);die;
    }
}