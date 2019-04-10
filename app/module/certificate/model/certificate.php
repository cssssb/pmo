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
 * @DataTime:  2019-04-09
 * @describe:  certificate_certificate model class
 * ================
 */
   class certificate extends model {
       public function __construct() {
           $this->db_config = app::load_config('database');
           $this->db_setting = 'certificate';
           $this->table_name = 'certificate';
           parent::__construct();
           }
           
}