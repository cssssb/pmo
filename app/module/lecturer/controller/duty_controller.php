<?php
namespace lecturer;

// use system\ding_password;


// echo "load ding_controller";
// echo  microtime();
// echo "\n";

defined('IN_LION') or exit('No permission resources.');


class duty_controller
{
    /**
     * 构造函数
     */
    public function __construct()
    {   
        $this->protocol = \app::load_model_class('protocol','user');//加载公共json
        $this->post = json_decode(file_get_contents('php://input'),true);
        $this->lecturer_duty = \app::load_service_class('lecturer_duty_class', 'lecturer');//加载讲师安排
    }

    public function dutyList(){
        $data = $this->lecturer_duty->of_list();
        if($data){
        $msg['code'] = 0;
        $msg['data'] = $data;
        $msg['msg'] = '返回列表成功';
    }else{
        $msg['code'] = 1;
        $msg['msg'] = '返回列表失败';
    }
    }
}