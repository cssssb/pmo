<?php
namespace implement;
defined('IN_LION') or exit('No permission resources.');
use \app;
use \system\model;
\app::load_sys_class('model',false);
/**
 * ================
 * @Author:    css
 * @ver:       0.1
 * @DataTime:  2018-10-23
 * @describe:  implement_implement model class
 * ================
 */
class implement_room extends model {
    public function __construct() {
        $this->db_config = app::load_config('database');
        $this->db_setting = 'default';
        $this->table_name = 'implement_room';
        parent::__construct();
    }
    
}