<?php
namespace course;
defined('IN_LION') or exit('No permission resources.');
use \app;
use \system\model;
\app::load_sys_class('model',false);
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2019-01-07
 * @describe:  course_course model class
 * ================
 */
   class course extends model {
       public function __construct() {
           $this->db_config = app::load_config('database');
           $this->db_setting = 'course';
           $this->table_name = 'course';
           parent::__construct();
           }
    
}