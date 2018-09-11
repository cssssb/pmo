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
        $this->protocol = \app::load_app_class('protocol','user');//加载公共json
        // $this->view = \app::load_view_class('budget_paper', 'budget');//加载json数据模板
        $this->post = json_decode(file_get_contents('php://input'),true);
        $this->lecturer_list = \app::load_service_class('lecturer_class', 'budget');//加载头class
    }

    //添加讲师安排
    public function add_teacher(){}
}