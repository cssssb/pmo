<?php
namespace activity;
defined('IN_LION') or exit('No permission resources.');
use \app;
use \system\model;
\app::load_sys_class('model',false);
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2019-02-22
 * @describe:  activity_enroll_mobile_msg model class
 * ================
 */
   class enroll_signup extends model {
       public function __construct() {
           $this->db_config = app::load_config('database');
           $this->db_setting = 'activity';
           $this->table_name = 'invform_signup';
           parent::__construct();
           }
    
}