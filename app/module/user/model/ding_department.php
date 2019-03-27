<?php
namespace user;
defined('IN_LION') or exit('No permission resources.');
\app::load_sys_class('model',false);

class ding_department extends \system\model {
	public function __construct() {
		// return 1;die;
// new model;

		$this->db_config = \app::load_config('database');
		$this->db_setting = 'default';
		$this->table_name = 'department_table';
		parent::__construct();
	}
	public function of_ding(){
		// $department = 
		// $sql = "select * from pmo_staff_user as be   inner JOIN  pmo_department_table as te on be.department = te.department_id";
		$sql = "select * from pmo_department_table as de  inner join  pmo_staff_user as st on FIND_IN_SET(de.department_id,st.department)";
		
		$all = $this->query($sql);
		$date = $this->fetch_array($all);
		return $date;
	}
	
}
?>