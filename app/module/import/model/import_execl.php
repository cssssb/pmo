<?php
namespace import;
defined('IN_LION') or exit('No permission resources.');
use \app;
use \system\model;
\app::load_sys_class('model',false);
/**
 * ================
 * @Author:    css
 * @ver:       
 * @DataTime:  2019-03-05
 * @describe:  import_ model class
 * ================
 */
   class import_execl extends model {
       public function __construct() {
           $this->db_config = app::load_config('database');
           $this->db_setting = 'default';
           $this->table_name = 'import_execl_copy1';
           parent::__construct();
           }
    
}