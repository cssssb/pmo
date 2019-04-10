<?php
namespace menu;
defined('IN_LION') or exit('No permission resources.');
use \app;
use \system\model;
\app::load_sys_class('model',false);
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2018-11-30
 * @describe:  menu_on model class
 * ================
 */
class on extends model {
    public function __construct() {
        $this->db_config = app::load_config('database');
        $this->db_setting = 'onlineview';
        $this->table_name = 'view_on_menu';
        parent::__construct();
    }
    
}