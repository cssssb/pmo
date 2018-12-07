<?php
namespace role;
defined('IN_LION') or exit('No permission resources.');
use \app;
use \system\model;
\app::load_sys_class('model',false);
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2018-12-06
 * @describe:  mrole_menu_static model class
 * ================
 */
class menustatic extends model {
    public function __construct() {
        $this->db_config = app::load_config('database');
        $this->db_setting = 'default';
        $this->table_name = 'role_menu_static';
        parent::__construct();
    }
    
}