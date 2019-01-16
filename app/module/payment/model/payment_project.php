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
 * @DataTime:  2019-01-16
 * @describe:  payment_payment_project model class
 * ================
 */
   class payment_project extends model {
       public function __construct() {
           $this->db_config = app::load_config('database');
           $this->db_setting = 'default';
           $this->table_name = 'payment_project';
           parent::__construct();
           }
    public function payment_project_list($payee){
        $sql = "
        SELECT
        pay.id,
        pay.item_content,
        pay.amount,
        pay.create_time,
        pay.payee,
        pay.state,
        pay.submit_time,
        pay.financial_number,
        header.unicode,
        body.project_name
        FROM
            pmo_payment AS pay
            LEFT JOIN pmo_payment_project AS pay_pro ON pay.id = pay_pro.payment_id
            LEFT JOIN pmo_project_header AS header ON header.id = pay_pro.project_id
            LEFT JOIN pmo_project_body AS body ON body.parent_id = pay_pro.project_id 
        WHERE
            pay.payee = $payee
        ";
		
		$this->query($sql);
        return $this->fetch_array();
    }
}