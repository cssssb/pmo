<?php
namespace progam;

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
class progam_controller
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
        $this->progam = \app::load_service_class('progam_class', 'progam');//加载讲师安排
    }
    public function add(){
        $post = $this->post();
        $id = $post['data']['id'];
        echo json_encode($this->progam->add($id));exit;
    }
    public function del(){
        $post = $this->data->get_post();
        $id = $post['data']['id'];
        echo json_encode($this->progam->del($id));exit;
    }
    public function edit(){
        $post = $this->data->get_post();
        $id = $post['data']['id'];
        echo json_encode($this->progam->edit($id));exit;
    }
    public function get_one(){
        $post = $this->data->get_post();
        $id = $post['data']['id'];
        echo json_encode($this->progam->get_one($id));exit;
    }
}