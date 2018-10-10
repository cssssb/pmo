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
		
	}
    public function test(){
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
		 $data['opening_number'] = 2;
		 $data['address'] = 2;
		// echo '<pre>'; print_R($data);die;
		// return var_dump($this->project->add_template($data));
		// return var_dump($this->project->add_project($data));
		return var_dump($this->project->edit_project($data));
    }

}