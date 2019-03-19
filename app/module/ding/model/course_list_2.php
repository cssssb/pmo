<?php
namespace ding;
defined('IN_LION') or exit('No permission resources.');
use \app;
use \system\model;
\app::load_sys_class('model',false);
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2019-03-19
 * @describe:  ding_course_list_2 model class
 * ================
 */
   class course_list_2 extends model {
       public function __construct() {
           $this->db_config = app::load_config('database');
           $this->db_setting = 'course';
           $this->table_name = 'course_list_2';
           parent::__construct();
           }
    
}