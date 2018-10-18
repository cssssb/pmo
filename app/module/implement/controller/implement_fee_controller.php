<?php
namespace implement;

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
class implement_fee_controller
{
    /**
     * 构造函数
     */
    public function __construct()
    {   
        $this->data = \app::load_sys_class('protocol');//加载json数据模板
        $this->protocol = \app::load_model_class('protocol','user');//加载公共json
        $this->post = json_decode(file_get_contents('php://input'),true);
        $post = $this->data->get_post();
        // $this->training_cost = \app::load_service_class('training_cost_class', 'budget');//加载实施安排
        $this->implement = \app::load_service_class('implement_plan_class', 'implement');//加载实施安排
    }

        //实施费用
        public function fee_training(){
            //会传一个parent_id
            $parent_id = 1;
            $fee = $this->implement->fee_training($parent_id);
            return print_r($fee);
        }
      

}