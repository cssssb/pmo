<?php
namespace examine;
defined('IN_LION') or exit('No permission resources.');
use \app;
use \system\model;
\app::load_sys_class('model',false);
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2018-11-29
 * @describe:  examine_fole_in_route model class
 * ================
 */
class role_in_route extends model {
    public function __construct() {
        $this->db_config = app::load_config('database');
        $this->db_setting = 'default';
        $this->table_name = 'role_in_route';
        parent::__construct();
    }
    
}