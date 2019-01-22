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
    public function list_page_json($data,$count=''){
        $this->request = app::load_sys_class('request');
        $database = 'pmo_payment';
        $left_join = [
            0=>[
                'base'=>'pmo_payment',
                'base_field'=>'id',
                'chain_base'=>'pmo_payment_project',
                'chain_base_field'=>'payment_id',
            ],
            1=>[
                'base'=>'pmo_payment_project',
                'base_field'=>'project_id',
                'chain_base'=>'pmo_project_header',
                'chain_base_field'=>'id',
            ],
            2=>[
                'base'=>'pmo_payment_project',
                'base_field'=>'project_id',
                'chain_base'=>'pmo_project_body',
                'chain_base_field'=>'parent_id',
            ],
        ];
        $sql = $this->request->sql_make_page($database,$data,'*',$left_join,$count);
        $this->query($sql);
        return $this->fetch_array();
    }
    public function payment_project_list($payee_id,$page_num,$page_size){
        $offset = $page_size*($page_num-1);
        $sql = "
        SELECT
        pay.id,
        pay.item_content,
        pay.amount,
        pay.create_time,
        pay.payee_id,
        pay.payee_name,
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
            pay.payee_id = $payee_id
            and pay.state in (1,2)
            order by id limit $offset,$page_size
        ";
		
		$this->query($sql);
        return $this->fetch_array();
    }
    public function payment_project_count($payee_id){
        $sql = "
        SELECT
        count(*)
        FROM
            pmo_payment AS pay
            LEFT JOIN pmo_payment_project AS pay_pro ON pay.id = pay_pro.payment_id
            LEFT JOIN pmo_project_header AS header ON header.id = pay_pro.project_id
            LEFT JOIN pmo_project_body AS body ON body.parent_id = pay_pro.project_id 
        WHERE
            pay.payee_id = $payee_id
            and pay.state in (1,2)
        ";
		
		$this->query($sql);
        return $this->fetch_array()[0]['count(*)'];
    }
}