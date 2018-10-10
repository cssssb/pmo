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
class manage_controller
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
		$this->lecturer = \app::load_service_class('lecturer_plan_class', 'lecturer');//加载讲师安排预算
		$this->implement = \app::load_service_class('implement_plan_class', 'implement');//加载安排预算
		$this->travel = \app::load_service_class('travel_plan_class', 'travel');//加载差旅预算
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

	
	public function delProject(){
		$post = $this->post;
		// $id = 45;
		$data = $this->project->delProject($post);
		if($data){
			$msg['code'] = 0;
			$msg['msg'] = '删除成功';
		}else{
			$msg['code'] = 1;
			$msg['msg'] = '删除失败';
		}
	}
	/**
	 * ================
	 * @Function:     addTemplate
	 * @Parameter:    
	 * @DataTime:     2018-10-10
	 * @Return:       bool
	 * @Notes:        新建项目保存项目模板
	 * @ErrorReason:  null
	 * ================
	 */
	public function addTemplate(){
		$post = $this->post;
		$post['data']['project_project_template_id'] = $data['template_id'];
		$ass = $this->project->add_template($data);
		$msg['code'] = 1;
		$msg['msg'] = '操作失败';
		if($ass){
			$msg['code'] = 0;
			$msg['msg'] = '操作成功';
		}
		echo json_encode($msg);die;
	}
	/**
	 * ================
	 * @Function:     addProject
	 * @Parameter:    
	 * @DataTime:     2018-10-10
	 * @Return:       bool
	 * @Notes:        修改项目接口
	 * @ErrorReason:  null
	 * ================
	 */
	public function addProject(){
		$post = $this->post;
		$post['data']['id'] ? $data['id'] = $post['data']['id'] : true;
		$post['data']['project_name'] ? $data['name'] = $post['data']['project_name'] : true;
		$post['data']['project_gather'] ? $data['progam_id'] = $post['data']['project_gather'] : true;
		$post['data']['project_person_in_charge_id'] ? $data['staff_id'] = $post['data']['project_person_in_charge_id'] : true;
		$post['data']['project_customer_name'] ? $data['customer_name'] = $post['data']['project_customer_name'] : true;
		$post['data']['project_days'] ? $data['day_number'] = $post['data']['project_days'] : true;
		$post['data']['project_date'] ? $data['date'] = $post['data']['project_date'] : true;
		$post['data']['project_gather_id'] ? $data['progam_id'] = $post['data']['project_gather_id'] : true;
		$post['data']['project_training_numbers'] ? $data['opening_number'] = $post['data']['project_training_numbers'] : true;
		$post['data']['project_training_ares'] ? $data['address'] = $post['data']['project_training_ares'] : true;
		
		$ass = $this->project->add_project();
		$msg['code'] = 1;
		$msg['msg'] = '操作失败';
		if($ass){
			$msg['code'] = 0;
			$msg['msg'] = '操作成功';
		}
		echo json_encode($msg);die;
	}

	/**
	 * ================
	 * @Function:     editProject
	 * @Parameter:    
	 * @DataTime:     2018-10-10
	 * @Return:       bool	
	 * @Notes:        编辑接口
	 * @ErrorReason:  null
	 * ================
	 */
	public function editProject(){
		$post = $this->post;
		$post['data']['id'] ? $data['id'] = $post['data']['id'] : true;
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
		
		$ass = $this->project->editProject($data);
		// return var_dump($ass);die;
		$msg['code'] = 1;
		$msg['msg'] = '操作失败';
		if($ass){
			$msg['code'] = 0;
			$msg['msg'] = '操作成功';
		}
		echo json_encode($msg);
	}
	//获取一条项目数据
	public function getOneProject(){
		//获取id
		$post = $this->post;
		// $post['id'] = 88;
		// $post['token'] = 123456;
		$data = $this->project->get_one_project($post);
		if($data){
			$msg['code'] = 0;
			$msg['msg'] = '查询成功';
			$msg['data'] = $data[0];
			echo json_encode($msg);die;
		}else{
			$msg['code'] = 1;
			$msg['msg'] = '查询失败';
			echo json_encode($msg);die;
			}
	}
}