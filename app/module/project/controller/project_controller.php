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
		$this->protocol = \app::load_app_class('protocol', 'user');//加载公共json
        // $this->view = \app::load_view_class('budget_paper', 'budget');//加载json数据模板
		$this->post = json_decode(file_get_contents('php://input'), true);
		$this->project = \app::load_service_class('project_class', 'project');//加载项目大表
		$this->progam = \app::load_service_class('progam_class', 'progam');//加载所属项目
		$this->staff = \app::load_service_class('staff_class', 'staff');//加载负责人id
		$this->template = \app::load_service_class('template_class', 'template');//加载项目模板id
	}

	public function addProject()
	{
        
    //    $project_name = $post['project_name'];                       //项目名称
    //    $project_customer_name = $post['project_customer_name'];     //客户名称
    //    $project_days = $post['project_days'];                       //天数
    //    $project_gather = $post['project_gather'];                   //项目集
    //    $project_person_in_charge = $post['project_person_in_charge'];//实施负责人
    //    $project_project_templete = $post['project_project_templete'];//项目模板
    //    $project_training_ares = $post['project_training_ares'];     //培训地区
    //    $project_training_numbers = $post['project_training_numbers'];//培训人数
		$post = $this->post;
		$have = $post['data']['id'];
		$data = $this->project->get_one($have);
		if($data){
			$this->project->deit($have);
			$this->common_add($post);
		}else{
		$this->common_add($post);
	}
	}
	public function getProject_bug()
	{
		$post = $this->post;
		$id = 12;
		$data = $this->project->get_one($id);
		$progam_id = $data['progam_id'];//所属项目id
		$staff_id = $data['staff_id'];//员工
		$template_id = $data['temolate'];//项目模板
        // $customer_name_id = $data['customer_name_id'];客户名称
		$progam = $this->progam->listProject($progam_id);
		$staff = $this->staff->listProject($staff_id);
		$template = $this->template->listProject($template_id);
		$rng['project_name'] = $data['name'];
		$rng['project_gather'] = $progam['name'];
		$rng['project_person_in_charge_name'] = $staff['name'];
		$rng['project_days'] = $data['day_number'];
		$rng['project_date'] = $data['date'];
		$rng['project_customer_name'] = $data['customer_name'];
		$rng['project_gather_id'] = $progam['id'];
		$rng['project_person_in_charge'] = $staff['id'];
		$rng['project_project_template_id'] = $template['id'];
		$rng['project_project_template_name'] = $template['name'];
		$rng['project_training_ares'] = $data['address'];
		$rng['project_training_numbers'] = $data['opening_number'];
		


		return print_r($rng);
		die;
	}

	public function listProject()
	{
		$data = $this->project->listProject();
		if($data){
			$msg['code'] = 0;
			$msg['msg'] = '查询列表成功';
			$msg['data'] = $data;
		}else{
			$msg['code'] = 1;
			$msg['msg'] = '查询列表失败';
		}
		echo json_encode($msg);exit;
	}
	public function allProjectList()
	{
		return var_dump($this->project->test());
	}
	private function common_add($post){
		$post['data']['project_name'] ? $data['name'] = $post['data']['project_name'] : true;
		$post['data']['project_gather'] ? $data['progam_id'] = $post['data']['project_gather'] : true;
		$post['data']['project_person_in_charge_id'] ? $data['staff_id'] = $post['data']['project_person_in_charge_id'] : true;
		$post['data']['project_customer_name'] ? $data['customer_name'] = $post['data']['project_customer_name'] : true;
		$post['data']['project_days'] ? $data['day_number'] = $post['data']['project_days'] : true;
		$post['data']['project_date'] ? $data['date'] = $post['data']['project_date'] : true;
		$post['data']['project_project_template_id'] ? $data['template_id'] = $post['data']['project_project_template_id'] : true;
		$post['data']['project_gather_id'] ? $data['progam_id'] = $post['data']['project_gather_id'] : true;
		$post['data']['project_training_numbers'] ? $data['opening_number'] = $post['data']['project_training_numbers'] : true;
		$post['data']['project_training_ares'] ? $data['address'] = $post['data']['project_training_ares'] : true;
		if ($this->project->add_project($data)) {
			$msg['code'] = 0;
			$msg['msg'] = '添加成功';
			echo json_encode($msg);  
			die;
		} else {
			$msg['code'] = 1;
			$msg['msg'] = '添加失败';
			echo json_encode($msg);
			die;
		}
	}
}