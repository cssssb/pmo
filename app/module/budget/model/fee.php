<?php
namespace budget;
defined('IN_LION') or exit('No permission resources.');

// echo "load ding_member";
// echo  microtime();
// echo "\n";

\app::load_sys_class('model',false);

class fee extends \system\model {
	public function __construct() {

		$this->db_config = \app::load_config('database');
		$this->db_setting = 'default';
		$this->table_name = 'fee';
		parent::__construct();
	}
	
}
?>