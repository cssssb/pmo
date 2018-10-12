<?php
namespace lecturer;
defined('IN_LION') or exit('No permission resources.');

// echo "load ding_member";
// echo  microtime();
// echo "\n";

\app::load_sys_class('model',false);

class lecturer_plan extends \system\model {
	public function __construct() {
		// return 1;die;
// new model;

		$this->db_config = \app::load_config('database');
		$this->db_setting = 'default';
		$this->table_name = 'lecturer_plan';
		parent::__construct();
	}
	public function get_one_teacher($id){
		$sql = "
			SELECT
				tr.id as id,
				tr.header_id as header_id,
				tr.duty_id as teacher_duty_id,
				dt.name as teacher_duty_name,
				tr.tax as teacher_income_tax,
				tr.day as teacher_lecture_days,
				tr.fee as teacher_lecture_fee,
				tr.lecturer_id as teacher_name_id,
				nm.name as teacher_name_name
			FROM
				pmo_lecturer_plan as tr
				left join pmo_lecturer as nm on tr.lecturer_id = nm.id
				left join pmo_lecturer_duty as  dt on tr.duty_id=dt.id
			WHERE
				tr.state=0
				AND tr.id = $id
		";
		$all = $this->query($sql);
		$data = $this->fetch_array($all);
		return $data;
	}
}
?>