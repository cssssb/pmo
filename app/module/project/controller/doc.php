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
class doc
{
    /**
     * 构造函数
     */
    public function __construct()
    {   
        $this->protocol = \app::load_model_class('protocol','user');//加载公共json
        $this->manage = \app::load_service_class('project_class', 'project');//加载差旅
    }
    //list
    public function readme(){
        // $post = ['sss'];
        // $return = $this->city->add_city($post);
        // $data['addCity'] = ["addCity","$post","$return","注释"];

        // $post = [id=>"1"];
        // $return = $this->city->getOneCity($post);
        // $data['getOneCity_success'] = ["getOneCity_success",($post),"$return","注释1","code"];

        // $post = [id=>"100"];
        // $return = $this->city->getOneCity($post);
        // $data = ["getOneCity_failed1","$post","$return","注释2","code"];


        $post = [
            'id'=>100,
            'name'=>100,
            'progam_id'=>100,
            'staff_id'=>100,
            'customer_name'=>100,
            'day_number'=>100,
            'date'=>100,
            'progam_id'=>100,
            'student_number'=>100,
            'address'=>100,
            'template_id'=>100,
        ];
        $return  = $this->manage->listProject($post);
        $data['listProject'] = ['listProject',$post,$return,'返回项目列表'];
        echo json_encode($data);
    }
    private function add_return(){

    }
}