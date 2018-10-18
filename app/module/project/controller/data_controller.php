<?php
namespace project;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css   project_data_getByProjectId;edit;
 * @ver:       0.1
 * @DataTime:  2018-10-16
 * ================
 */
class data_controller
{
    private $data;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        //todo 加载相关模块
        // $this->type = app::load_service_class('type', 'project');//
		$this->project = \app::load_service_class('project_class', 'project');//加载项目大表
    }
    public function getByProjectId()
    {
        //获取一条项目信息
        $post = $this->data->get_post();//获得post
        $cond = 0;//默认成功
        // $post['id'] = 93;
		$data = $this->project->get_one_project($post['id']);
        $data?$cond = 0:$cond = 1;
        switch ($cond) {
            case   1://异常1
                $this->data->out(2002);
                break;
          
            default:
                $this->data->out(2001, $data[0]);
            }
       
    }
    public function edit(){
        //项目修改
        $post = $this->data->get_post();
        $cond = 0;
        $post['data']['parent_id'] ? $data['id'] = $post['data']['parent_id'] : true;
		$post['data']['project_name'] ? $data['name'] = $post['data']['project_name'] : true;
		$post['data']['project_gather'] ? $data['progam_id'] = $post['data']['project_gather'] : true;
		$post['data']['project_person_in_charge_id'] ? $data['staff_id'] = $post['data']['project_person_in_charge_id'] : true;
		$post['data']['project_customer_name'] ? $data['customer_name'] = $post['data']['project_customer_name'] : true;
		$post['data']['project_days'] ? $data['day_number'] = $post['data']['project_days'] : true;
		$post['data']['project_date'] ? $data['date'] = $post['data']['project_date'] : true;
		$post['data']['project_gather_id'] ? $data['progam_id'] = $post['data']['project_gather_id'] : true;
		$post['data']['project_training_numbers'] ? $data['student_number'] = $post['data']['project_training_numbers'] : true;
		$post['data']['project_training_ares'] ? $data['address'] = $post['data']['project_training_ares'] : true;
        // $data['id'] = 117;
        // $data['name'] = 1;
        // $data['progam_id'] = 1;
        // $data['staff_id'] = 1;
        // $data['customer_name'] = 1;
        // $data['day_number'] = 1;
        // $data['date'] = date('Y-m-d H:i:s',time());
        // $data['progam_id'] = 1;
        // $data['student_number'] = 1;
        // $data['address'] = 1;
        if(!$data['id']){
            $this->data->out(3901);
        }
        $ass = $this->project->edit_project($data);
        $ass?$cond=0:$cond=1;
        
        switch($cond){
            case 1:
            $this->data->out(2006);
            break;
            
        default:
            $this->data->out(2005,$data);
        }
    }
}