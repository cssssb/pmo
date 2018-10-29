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
        $this->data = \app::load_sys_class('protocol');//加载json数据模板
        $this->protocol = \app::load_model_class('protocol','user');//加载公共json
        $this->post = json_decode(file_get_contents('php://input'),true);
        $this->lecturer_duty = \app::load_service_class('lecturer_duty_class', 'lecturer');//加载讲师安排
        $this->code = \app::load_cont_class('common','user');//加载token
       
    }

    public function list(){
        $data = $this->lecturer_duty->of_list();
      
    $data?$cond = 0:$cond = 1;
        switch ($cond) {
            case   1://异常1
                $this->data->out(2002,[]);
                break;
          
            default:
                $this->data->out(2001, $data);
            }
    }
}