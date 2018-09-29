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
			*
		FROM
			pmo_lecturer_plan AS tr,
			pmo_lecturer AS nm
		WHERE
			tr.lecturer_id = nm.id
		AND tr.state = 0
		AND tr.id = $id
		AND nm.state = 0";
		$all = $this->query($sql);
		$data = $this->fetch_array($all);
		return $data;
	}
}
?>