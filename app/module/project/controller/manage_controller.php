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
			if($data['name']){
			$this->project->edit($have);
			$msg = $this->common_add($post);
			$id = $msg['id'];
			unset($msg['id']);
			
			$return = $this->edit_header_id($have,$id);
			if(!$return){
				$msg['code'] = 1;
				$msg['msg'] = '修改失败';
				echo json_encode($msg);die;
			}}else{
				$msg = $this->really_edit($post);
			}
		}else{
			$msg =$this->common_add($post);
	}
			echo json_encode($msg);die;
	}

	private function really_edit($post=null){
		$data = $post['data'];
		$ass = $this->project->really_edit($data);
		if($ass){
			$msg['code'] = 0;
			$msg['msg'] = '修改成功';
		}else{
			$msg['code'] = 1;
			$msg['msg'] = '修改失败';
		}
		return $msg;
	}

	private function edit_header_id($old_id,$id){
		$lecturer = $this->lecturer->edit_header_id($old_id,$id);
		$implement = $this->implement->edit_header_id($old_id,$id);
		$travel = $this->travel->edit_header_id($old_id,$id);
		if($lecturer&&$implement&&$travel){
			return true;
		}else{
			return false;
		}
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
		
		$ass = $this->project->add_project($data);
		if ($ass) {
			$msg['code'] = 0;
			$msg['msg'] = '添加成功';
			$msg['id'] = $ass;
			return $msg;  
		} else {
			$msg['code'] = 1;
			$msg['msg'] = '添加失败';
			return $msg;  
		}
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
	public function addnewproject(){
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
		
		$ass = $this->project->operation_project_add($data);
		if($ass){
			$msg['code'] = 0;
			$msg['msg'] = '操作成功';
		}
		$msg['code'] = 1;
		$msg['msg'] = '操作失败';
		return $msg;
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