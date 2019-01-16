<?php
namespace payment;
defined('IN_LION') or exit('No permission resources.');
use \app;
use \system\model;
\app::load_sys_class('model',false);
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2019-01-15
 * @describe:  payment_payment model class
 * ================
 */
   class payment extends model {
       public function __construct() {
           $this->db_config = app::load_config('database');
           $this->db_setting = 'default';
           $this->table_name = 'payment'; 
           parent::__construct();
           }
    
        public function my_dep_list($user_ids){
        $sql = "
            SELECT
            * 
            FROM
                pmo_payment 
            WHERE
                payee IN ($user_ids)
        ";
		
		$this->query($sql);
        return $this->fetch_array();
        }
}