<?php
namespace budget;

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
class budget_controller
{
    private $view;
    /**
     * 构造函数
     */
    public function __construct()
    {   
        $this->data = \app::load_sys_class('protocol');//加载json数据模板
        $this->protocol = \app::load_model_class('protocol','user');//加载公共json
        $this->header = \app::load_service_class('header_class', 'budget');//加载头class
        $this->post = json_decode(file_get_contents('php://input'),true);
        $this->one_page = \app::load_service_class('one_page_class', 'budget');//加载头class
    }
    
    public function budgetIndexAdd(){
        $post = $this->data->get_post();
        
        $data = $this->one_page->insert($post);
       if($data){
            $msg['code'] = 0;
            $msg['msg'] = '保存成功';
            $msg['data'] = $data;
            echo json_encode($msg);exit();
       }else{
           $msg['code'] = 1;
           $msg['msg'] = '保存失败';
           echo json_encode($msg);exit();
       }
    }
}