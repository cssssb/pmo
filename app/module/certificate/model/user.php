<?php
namespace certificate;
defined('IN_LION') or exit('No permission resources.');
use \app;
use \system\model;
\app::load_sys_class('model',false);
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2019-04-12
 * @describe:  certificate_user model class
 * ================
 */
   class user extends model {
       public function __construct() {
           $this->db_config = app::load_config('database');
           $this->db_setting = 'certificate';
           $this->table_name = 'user';
           parent::__construct();
           }
    
}