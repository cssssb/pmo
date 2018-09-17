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
class plan_controller
{
    /**
     * 构造函数
     */
    public function __construct()
    {   
        $this->protocol = \app::load_app_class('protocol','user');//加载公共json
        // $this->view = \app::load_view_class('budget_paper', 'budget');//加载json数据模板
        $this->post = json_decode(file_get_contents('php://input'),true);
        $this->lecturer_list = \app::load_service_class('lecturer_plan_class', 'lecturer');//加载讲师安排
        $this->travel_plan = \app::load_service_class('travel_plan_class', 'budget');//加载差旅
        $this->training_cost = \app::load_service_class('training_cost_class', 'budget');//加载实施安排
    }

    //添加/修改讲师安排
    public function add(){
        $post = json_decode($_POST);
        $data["project_id"]=$post["data"]["project_id"];
        $data = [
                'project_id'=>1,
                'lencturer_id'=>1,
                'tax'=>1,
                'fee'=>1,
                'day'=>1,
                'duty_id'=>1,
        ];
        // $this->lecturer_list->have_header($data);
    return $this->lecturer_list->add($data);
    }
    //删除(修改状态)
    public function del(){
        // $data = $post['id'];
        $data =2;
        return $this->lecturer_list->del($data);
    }
    public function edit(){
        $data['id'] = 1;
        return $this->lecturer_list->get_one($data);
    }

        //讲师列表
        public function listLecturer(){
            $data['header_id'] =1;
            return print_r($this->lecturer_list->list_teacher($data));
        }


}