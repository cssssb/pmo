<?php
namespace project;
defined('IN_LION') or exit('No permission resources.');
use \app;
use \system\model;
\app::load_sys_class('model',false);
/**
 * ================
 * @Author:    lion
 * @ver:       0.1
 * @DataTime:  2018-10-15
 * @describe:  project_type model class
 * ================
 */
class type extends model {
    public function __construct() {
        $this->db_config = app::load_config('database');
        $this->db_setting = 'default';
        $this->table_name = 'type';
        parent::__construct();
    }
    
}

