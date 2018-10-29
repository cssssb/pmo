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
		// $return['project_training_numbers'] = $ass['student_number'];//开班人数
		$sql = "
		SELECT
		header.id,
		body.project_name,
		header.progam_id as project_gather_id,
		header.staff_id as project_person_in_charge_id,
		header.template_id as project_project_template_id,
		body.project_customer_name,
		body.project_days,
		body.project_date,
		body.project_training_numbers,
		header.budget_id,
		sta. NAME AS  project_person_in_charge_name,
		pro.add_program_manage_name AS  project_gather_name,
		tem. NAME AS  project_project_template_name,
		concat(
				ares1.name,
				ares2.name,
				address.`name`) as project_training_ares
			FROM
				pmo_project_header AS header
				LEFT JOIN pmo_staff_table AS sta ON header.staff_id = sta.id
				LEFT JOIN pmo_progam AS pro ON header.progam_id = pro.id
				LEFT JOIN pmo_project_template AS tem ON header.template_id = tem.id
				LEFT JOIN pmo_project_body AS body ON header.id = body.parent_id
				LEFT JOIN pmo_address AS address ON address.id = body.project_training_ares
				LEFT JOIN pmo_ares AS ares1 ON ares1.id = address.province_id
		LEFT JOIN pmo_ares AS ares2 ON ares2.id = address.city_id
			WHERE header.state=0
			order by body.project_date desc
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
		body.project_name,
		body.project_customer_name,
		gm.add_program_manage_name as  project_gather_name,
		gm.id as  project_gather_id,
		staff.name as project_person_in_charge_id,
		header.staff_id as project_person_in_charge_id,
		te.name as project_project_template_name,
		header.template_id as project_project_template_id,
		body.project_days,
		body.project_training_numbers,
		body.project_training_ares as project_training_ares_id,
		staff.id as project_person_in_charge_id,
		staff.name as project_person_in_charge_name,
		body.project_date,
		header.unicode,
		lala.name as project_leader_name,
		lala.id as project_leader_id,
		body.project_tax_rate,
		body.project_income,
		body.project_end_date,
		body.project_start_date,
		body.institutional_consulting_fees,
		body.personal_consulting_fees
	FROM
		pmo_project_header AS header
		LEFT JOIN pmo_staff_table as staff on header.staff_id=staff.id
		LEFT JOIN pmo_staff_table as lala on header.project_leader_id=lala.id
		LEFT JOIN pmo_progam as gm on header.progam_id = gm.id
		LEFT JOIN pmo_project_template as te on header.template_id = te.id
	  LEFT JOIN pmo_project_body as body on header.id = body.parent_id
	where 
		header.id = $id
				limit 1
		";
		$all = $this->query($sql);
		$data = $this->fetch_array($all);
		return $data;
	}
}
?>