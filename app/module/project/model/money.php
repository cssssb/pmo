<?php
namespace project;
defined('IN_LION') or exit('No permission resources.');
use \app;
use \system\model;
\app::load_sys_class('model',false);
/**
 * ================
 * @Author:    css
 * @ver:       0.1
 * @DataTime:  2018-10-25
 * @describe:  project_money model class
 * ================
 */
class money extends model {
    public function __construct() {
        $this->db_config = app::load_config('database');
        $this->db_setting = 'default';
        $this->table_name = 'project_fee';
        parent::__construct();
    }
    
}