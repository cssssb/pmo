<?php
namespace project;

defined('IN_LION') or exit('No permission resources.');

// echo "load ding_member";
// echo  microtime();
// echo "\n";

\app::load_sys_class('model', false);

class project extends \system\model
{
	public function __construct()
	{
		// return 1;die;
// new model;

		$this->db_config = \app::load_config('database');
		$this->db_setting = 'default';
		$this->table_name = 'project_header';
		parent::__construct();
	}
	public function listProject($user_id = '')
	{
		
		// $sql = "
		// SELECT
		// header.id,
		// body.project_name,
		// header.progam_id as project_gather_id,
		// header.staff_id as project_person_in_charge_id,
		// header.template_id as project_project_template_id,
		// body.project_customer_name,
		// body.project_days,
		// body.project_date,
		// body.project_training_numbers,
		// header.budget_id,
		// sta. NAME AS  project_person_in_charge_name,
		// pro.add_program_manage_name AS  project_gather_name,
		// tem. NAME AS  project_project_template_name,
		// concat(
		// 		ares1.name,
		// 		ares2.name,
		// 		address.`name`) as project_training_ares
		// 	FROM
		// 		pmo_project_header AS header
		// 		LEFT JOIN pmo_staff_table AS sta ON header.staff_id = sta.id
		// 		LEFT JOIN pmo_progam AS pro ON header.progam_id = pro.id
		// 		LEFT JOIN pmo_project_template AS tem ON header.template_id = tem.id
		// 		LEFT JOIN pmo_project_body AS body ON header.id = body.parent_id
		// 		LEFT JOIN pmo_address AS address ON address.id = body.project_training_ares
		// 		LEFT JOIN pmo_ares AS ares1 ON ares1.id = address.province_id
		// LEFT JOIN pmo_ares AS ares2 ON ares2.id = address.city_id
		// 	WHERE header.state=0
		// 	order by body.project_date desc
		// ";

		$sql = "
				SELECT
			header.id,
			body.project_name,
			header.progam_id AS project_gather_id,
			header.staff_id AS project_person_in_charge_id,
			header.template_id AS project_project_template_id,
			body.project_customer_name,
			body.project_days,
			body.project_start_date,
			body.project_end_date,
			body.project_training_numbers,
			sta_two. NAME AS project_leader_name,
			sta. NAME AS project_person_in_charge_name,
			pro.add_program_manage_name AS project_gather_name,
			tem. NAME AS project_project_template_name,
			
				ares1. NAME as province,
				ares2. NAME as city,
				address.`name` as address,
			
			body.project_income,
			body.project_tax_rate,
			body.institutional_consulting_fees,
			body.personal_consulting_fees,
			unicode
		FROM
			pmo_project_header AS header
		LEFT JOIN pmo_staff_table AS sta ON header.staff_id = sta.id
		LEFT JOIN pmo_staff_table AS sta_two ON header.project_leader_id = sta_two.id
		LEFT JOIN pmo_progam AS pro ON header.progam_id = pro.id
		LEFT JOIN pmo_project_template AS tem ON header.template_id = tem.id
		LEFT JOIN pmo_project_body AS body ON header.id = body.parent_id
		LEFT JOIN pmo_address AS address ON address.id = body.project_training_ares
		LEFT JOIN pmo_ares AS ares1 ON ares1.id = address.province_id
		LEFT JOIN pmo_ares AS ares2 ON ares2.id = address.city_id
		WHERE
			header.state = 0
		ORDER BY
			body.project_date DESC
		";
		$all = $this->query($sql);
		$data = $this->fetch_array($all);
		return $data;
	}
	public function order_by()
	{
		$sql = "
			select * from test where 1 order by time
		";
		$all = $this->query($sql);
		$data = $this->fetch_array($all);
		return $data;
	}
	public function get_one_project($id)
	{
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
	//讲师
	public function list_lecturer($parent_id)
	{
		$sql = "
			SELECT
			plan.id,
			plan.`day` as teacher_lecture_days,
			plan.duty_id as teacher_duty_id,
			plan.fee as teacher_lecture_fee,
			plan.tax as teacher_income_tax,
			plan.lecturer_id as teacher_name_id,
			duty.`name` as teacher_duty_name,
			le.name as teacher_name_name
			FROM
			pmo_lecturer_plan as plan
			LEFT JOIN pmo_lecturer_duty as duty on plan.duty_id = duty.id
			LEFT JOIN pmo_lecturer as le on plan.lecturer_id = le.id
			WHERE
			plan.state = 0
			and
			plan.parent_id = $parent_id

		";
		$all = $this->query($sql);
		$data = $this->fetch_array($all);
		return $data;
	}
}
?>