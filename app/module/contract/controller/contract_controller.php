<?php
namespace contract;

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
class contract_controller
{
    /**
     * 构造函数
     */
    public function __construct()
    {   
        $this->protocol = \app::load_app_class('protocol','user');//加载公共json
        $this->post = json_decode(file_get_contents('php://input'),true);
        $post = $this->post;
        // $this->implement_cost = \app::load_service_class('implement_cost_class', 'budget');//加载实施安排
        $this->contract = \app::load_service_class('contract_class', 'contract');//加载实施安排
    }
     //返回合同表
     public function contract(){
        $data = $this->contract->select('id,name');
        $msg['data'] = $data;
        $msg['code'] = 0;
        $msg['msg'] = "查询成功";
        echo json_encode($msg);
    }

}