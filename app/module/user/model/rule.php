<?php
namespace user;
defined('IN_LION') or exit('No permission resources.');
\app::load_sys_class('model');

class rule extends \system\model {
	public function __construct() {
		// return 1;die;
// new model;

		$this->db_config = \app::load_config('database');
		$this->db_setting = 'default';
		$this->table_name = 'meet_cost';
		parent::__construct();
	}
}
?>