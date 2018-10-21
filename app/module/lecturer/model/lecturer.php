<?php
namespace lecturer;
defined('IN_LION') or exit('No permission resources.');

// echo "load ding_member";
// echo  microtime();
// echo "\n";

\app::load_sys_class('model',false);

class lecturer extends \system\model {
	public function __construct() {
		// return 1;die;
// new model;

		$this->db_config = \app::load_config('database');
		$this->db_setting = 'default';
		$this->table_name = 'lecturer';
		parent::__construct();
	}
	public function of_list(){
		$sql = "
			SELECT
				*
			FROM
				pmo_lecturer as tr
				left join pmo_lecturer_coop as nm on tr.coop_id = nm.add_a_teacher_cooperation_model_id
			WHERE
				tr.state=0
				
		";
		$all = $this->query($sql);
		$data = $this->fetch_array($all);
		return $data;
	}
}
?>