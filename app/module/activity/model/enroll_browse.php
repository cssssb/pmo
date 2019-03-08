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
 * @DataTime:  2019-03-05enroll_browse
 * @describe:  enroll_enroll_browse model class
 * ================
 */
   class enroll_browse extends model {
       public function __construct() {
           $this->db_config = app::load_config('database');
           $this->db_setting = 'activity';
           $this->table_name = 'invform_browse';
           parent::__construct();
           }
    
}