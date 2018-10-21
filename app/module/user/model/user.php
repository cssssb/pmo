<?php
namespace user;
defined('IN_LION') or exit('No permission resources.');
use \app;
use \system\model;
\app::load_sys_class('model',false);
/**
 * ================
 * @Author:    lion
 * @ver:       0.1
 * @DataTime:  2018-10-18
 * @describe:  admin_user model class
 * ================
 */
class user extends model {
    public function __construct() {
        $this->db_config = app::load_config('database');
        $this->db_setting = 'default';
        $this->table_name = 'user';
        parent::__construct();
    }
    
}