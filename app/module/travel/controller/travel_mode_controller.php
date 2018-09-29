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
class travel_mode_controller
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
        $this->travel_mode = \app::load_app_class('travel_mode', 'travel');//加载差旅
    }

   public function listAll(){
       $msg['data'] = $this->travel_mode->select(1);
       $msg['code'] = 0;
       $msg['msg'] = '查询成功';
       echo json_encode($msg);die;
   }
}