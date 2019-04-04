<?php
namespace recruit;
defined('IN_LION') or exit('No permission resources.');
use \app;
use \system\model;
\app::load_sys_class('model',false);
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2019-04-01
 * @describe:  recruit_job_resume model class
 * ================
 */
   class job_resume extends model {
       public function __construct() {
           $this->db_config = app::load_config('database');
           $this->db_setting = 'default';
           $this->table_name = 'job_resume';
           parent::__construct();
           }
        public function select_distinct($time){
          $sql  = 'SELECT distinct file_name FROM `pmo_c`.`pmo_job_resume` WHERE time = '.$time;
          $this->query($sql);
        return $this->fetch_array();
        }
}