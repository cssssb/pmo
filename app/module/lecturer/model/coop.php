<?php
namespace lecturer;
defined('IN_LION') or exit('No permission resources.');
use \app;
use \system\model;
\app::load_sys_class('model',false);
/**
 * ================
 * @Author:    lion
 * @ver:       1.0
 * @DataTime:  2018-10-21
 * @describe:  lecturer_coop model class
 * ================
 */
class coop extends model {
    public function __construct() {
        $this->db_config = app::load_config('database');
        $this->db_setting = 'default';
        $this->table_name = 'lecturer_coop';
        parent::__construct();
    }
    
}