<?php
namespace travel;
defined('IN_LION') or exit('No permission resources.');

// echo "load ding_member";
// echo  microtime();
// echo "\n";

\app::load_sys_class('model',false);

class province_cost extends \system\model {
	public function __construct() {

		$this->db_config = \app::load_config('database');
		$this->db_setting = 'default';
		$this->table_name = 'province_cost';
		parent::__construct();
	}
	public function list_travel($project_id){
		$sql = "
		
		";
		$all = $this->query($sql);
		$data = $this->fetch_array($all);
	}
}
?>