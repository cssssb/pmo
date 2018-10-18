<?php
namespace test;

// use system\ding_password;


// echo "load ding_controller";
// echo  microtime();
// echo "\n";

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       ding_user
 * @DataTime:  2018-10-11
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
		
	}
    public function project(){
		$this->project = \app::load_service_class('project', 'test');
		$data = [];
		 $data['id'] = 110;
		 $data['name'] = 2;
		 $data['progam_id'] = 2;
		 $data['staff_id'] = 2;
		 $data['customer_name'] = 2;
		 $data['day_number'] = 2;
		 $data['date'] = 2;
		//  $data['template_id'] = 1;
		 $data['progam_id'] = 2;
		 $data['student_number'] = 2;
		 $data['address'] = 2;
		// echo '<pre>'; print_R($data);die;
		// return var_dump($this->project->add_template($data));
		// return var_dump($this->project->add_project($data));
		// return var_dump($this->project->edit_project($data));
		// return var_dump($this->project->delProject($data));
		// return var_dump($this->project->delProject($data));
		// echo '<pre>'; print_R($this->project->get_one_project($data));
		echo '<pre>';print_r($this->project->listProject());
    }

	public function lecturer(){
		$this->lecturer = \app::load_service_class('lecturer_plan_class', 'lecturer');//加载讲师安排
		$data["id"] = 30;
		$data["parent_id"] = 94;
		$data["lecturer_id"] = 1;
		$data["tax"] = '王二丫';
		$data["fee"] = '崔思思';
		$data["day"] = '崔思思'; 
		$data["duty_id"] = 1;
		// return var_Dump($this->lecturer->add($data));
		// return var_Dump($this->lecturer->edit($data));
		// return var_Dump($this->lecturer->get_one($data));
		// return var_Dump($this->lecturer->del($data));
		// echo '<pre>';print_r($this->lecturer->list_teacher($data));
		// return var_dump($this->lecturer->fee_teacher($data));
		return var_Dump($this->lecturer->get_one_teacher($data));
	}

	public function implement(){
        $this->implement = \app::load_service_class('implement_plan_class', 'implement');//加载实施安排
		$data = [
			'id'=>10,
			'meet_fee'=>1,
			'equipment'=>1,
			'test_fee'=>1,
			'arder_fee'=>1,
			'pen_fee'=>1,
			'serve_fee'=>1,
			'mail_fee'=>1,
			'parent_id'=>1,
		];
		// return var_dump($this->implement->add($data));
		// return var_dump($this->implement->edit_implement($data));
		// return var_dump($this->implement->list_implement($data));
		return var_dump($this->implement->fee_implement($data));

	}
}