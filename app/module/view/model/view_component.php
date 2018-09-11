<?php
namespace view;
defined('IN_LION') or exit('No permission resources.');

// echo "load ding_member";
// echo  microtime();
// echo "\n";

\app::load_sys_class('model',false);

class view_component extends \system\model {
	public function __construct() {
		// return 1;die;
// new model;

		$this->db_config = \app::load_config('database');
		$this->db_setting = 'default';
		$this->table_name = 'view_component';
		parent::__construct();
	}
	
}
?>