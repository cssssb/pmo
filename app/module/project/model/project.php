<?php
namespace project;
defined('IN_LION') or exit('No permission resources.');

// echo "load ding_member";
// echo  microtime();
// echo "\n";

\app::load_sys_class('model',false);

class project extends \system\model {
	public function __construct() {
		// return 1;die;
// new model;

		$this->db_config = \app::load_config('database');
		$this->db_setting = 'default';
		$this->table_name = 'project_header';
		parent::__construct();
	}
	public function listProject($user_id=''){
		// $return['project_customer_name'] = $ass['customer_name'];//客户名称
		// $return['project_date'] = $ass['date'];//开班时间
		// $return['project_days'] = $ass['day_number'];//培训天数
		// $return['project_gather_id'] = $ass['progam_id'];//项目集id
		// $return['project_gather_name'] = $ass['progam_name'];//项目集名称
		// $return['project_name'] = $ass['name'];//项目名称
		// $return['project_person_in_charge_id'] = $ass['staff_id'];//实施负责人id
		// $return['project_person_in_charge_name'] = $ass['staff_name'];//实施负责人名称
		// $return['project_project_templete_id'] = $ass['templete_id'];//项目模板id
		// $return['project_project_templete_name'] = $ass['templete_name'];//项目模板名称
		// $return['project_training_ares'] = $ass['address'];//开班地址
		// $return['project_training_numbers'] = $ass['opening_number'];//开班人数
		$sql = "
				SELECT
			header.id,
			header.name as project_name,
			header.progam_id as project_gather_id,
			header.staff_id as project_person_in_charge_id,
			header.template_id as project_project_template_id,
			header.customer_name as project_customer_name,
			header.day_number as project_days,
			header.date as project_date,
			header.opening_number as project_training_numbers,
			header.address as project_training_ares,
			header.budget_id,
			header.money,
			header.budget_tax,
			header.budget_consulting_fee,
			header.budget_expects_revenue,
			header.course_name,
			sta. NAME AS  project_person_in_charge_name,
			pro. NAME AS  project_gather_name,
			tem. NAME AS  project_project_template_name 
		FROM
			pmo_project_header AS header
		LEFT JOIN pmo_staff_table AS sta ON header.staff_id = sta.id
		LEFT JOIN pmo_progam AS pro ON header.progam_id = pro.id
		LEFT JOIN pmo_project_template AS tem ON header.template_id = tem.id
		WHERE header.state=0
		order by date desc
		";
		//date  名字 as project_date
		$all = $this->query($sql);
		$data = $this->fetch_array($all);
		return $data;
	}
	public function order_by(){
		$sql = "
			select * from test where 1 order by time
		";
		$all = $this->query($sql);
		$data = $this->fetch_array($all);
		return $data;
	}
	public function get_one_project($id){
		$sql = "
		SELECT
		header.id,
		header.name as project_name,
		header.customer_name as project_customer_name,
		gm.name as gmname,

		staff.name as project_person_in_charge_id,
		header.staff_id as project_person_in_charge_id,
		te.name as project_project_template_name,
		header.template_id as project_project_template_id,
		header.day_number as project_days,
		header.opening_number as project_training_numbers,
		header.address as project_training_ares
		
	FROM
		pmo_project_header AS header
		LEFT JOIN pmo_staff_table as staff on header.staff_id=staff.id
		LEFT JOIN pmo_progam as gm on header.progam_id = gm.id
		LEFT JOIN pmo_project_template as te on header.template_id = te.id
		
	where 
		header.id = $id
				
		";
		$all = $this->query($sql);
		$data = $this->fetch_array($all);
		return $data;
	}
}
?>