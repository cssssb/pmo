<?php
namespace contract;
defined('IN_LION') or exit('No permission resources.');

// echo "load ding_member";
// echo  microtime();
// echo "\n";

\app::load_sys_class('model',false);

class contract extends \system\model {
	public function __construct() {

		$this->db_config = \app::load_config('database');
		$this->db_setting = 'default';
		$this->table_name = 'contract';
		parent::__construct();
	}

}
?>