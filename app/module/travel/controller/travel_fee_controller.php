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
        $this->protocol = \app::load_app_class('protocol','user');//加载公共json
        // $this->view = \app::load_view_class('budget_paper', 'budget');//加载json数据模板
        $this->post = json_decode(file_get_contents('php://input'),true);
        $post = $this->post;
        $this->travel_plan = \app::load_service_class('travel_plan_class', 'travel');//加载差旅
    }

        //差旅费用
        public function fee_travel(){
            //会传一个header_id
            $header_id = 1;
            $ass = $this->travel_plan->fee_travel($header_id
        );
            return print_r($ass);
        }

}