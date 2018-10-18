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
class travel_fee_controller
{
    /**
     * 构造函数
     */
    public function __construct()
    {   
        $this->data = \app::load_sys_class('protocol');//加载json数据模板
        $this->protocol = \app::load_model_class('protocol','user');//加载公共json
        // $this->view = \app::load_view_class('budget_paper', 'budget');//加载json数据模板
        $this->post = json_decode(file_get_contents('php://input'),true);
        $post = $this->data->get_post();
        $this->travel_plan = \app::load_service_class('travel_plan_class', 'travel');//加载差旅
    }

        //差旅费用
        public function feeTravel(){
            //会传一个parent_id
            $parent_id = 1;
            $ass = $this->travel_plan->fee_travel($parent_id
        );
            return print_r($ass);
        }

}