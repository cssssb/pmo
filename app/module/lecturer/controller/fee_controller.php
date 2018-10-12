<?php
namespace lecturer;

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
class fee_controller
{
    /**
     * 构造函数
     */
    public function __construct()
    {   
        $this->protocol = \app::load_app_class('protocol','user');//加载公共json
        $this->post = json_decode(file_get_contents('php://input'),true);
        $this->lecturer_list = \app::load_service_class('lecturer_plan_class', 'lecturer');//加载讲师安排
    }


        //讲师金额
        public function sumCost(){
            //会传一个header_id
            // $header_id = 1;
            $post = $this->post;
            $header_id['header_id'] = $post['project_id'];
            //获取金额
          $fee = $this->lecturer_list->fee_teacher($header_id);
          return print_r($fee);
        }
        public function ass(){
            $data = [
                'a'=>1,
                'b'=>1,
                'c'=>1,
            ];
            unset($data['a']);
            return print_r($data);
        }

}