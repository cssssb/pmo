<?php
namespace project;

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
class project_controller
{
    /**
     * 构造函数
     */
    public function __construct()
    {   
        $this->protocol = \app::load_app_class('protocol','user');//加载公共json
        // $this->view = \app::load_view_class('budget_paper', 'budget');//加载json数据模板
        $this->post = json_decode(file_get_contents('php://input'),true);
        $this->project = \app::load_service_class('project_class', 'project');//加载讲师安排
    }

    public function addProject(){
        
    //    $project_name = $post['project_name'];                       //项目名称
    //    $project_customer_name = $post['project_customer_name'];     //客户名称
    //    $project_days = $post['project_days'];                       //天数
    //    $project_gather = $post['project_gather'];                   //项目集
    //    $project_person_in_charge = $post['project_person_in_charge'];//实施负责人
    //    $project_project_templete = $post['project_project_templete'];//项目模板
    //    $project_training_ares = $post['project_training_ares'];     //培训地区
    //    $project_training_numbers = $post['project_training_numbers'];//培训人数
    $post = $this->post;
    $post['data']['project_name']?$data['name'] = $post['data']['project_name']:true;
    $post['data']['project_gather']?$data['of_project_id'] = $post['data']['project_gather']:true;
    $post['data']['project_person_in_charge']?$data['staff_id'] = $post['data']['project_person_in_charge']:true;
    $post['data']['project_customer_name']?$data['corporate_name'] = $post['data']['project_customer_name']:true;
    $post['data']['project_days']?$data['day_number'] = $post['data']['project_days']:true;
    $post['data']['project_training_numbers']?$data['opening_number'] = $post['data']['project_training_numbers']:true;
    $post['data']['project_training_ares']?$data['address'] = $post['data']['project_training_ares']:true;
       return var_dump($this->project->add_project($data));
    }
   
}