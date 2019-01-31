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
    public function list_csv($data){
        $this->request = app::load_sys_class('request');
        $data['query_condition']['state']['database'] = 'pmo_payment';
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
        $requirement = "
        pmo_payment.id,
        pmo_payment.state,
        pmo_payment.item_content,
        pmo_payment.amount,
        pmo_payment.create_time,
        pmo_payment.payee_id,
        pmo_payment.payee_name,
        pmo_payment.state,
        pmo_payment.submit_time,
        pmo_payment.financial_number,
        pmo_project_header.unicode,
        pmo_project_body.project_name
        ";
        $where = ' and pmo_payment.state!=0 ';
        $sql = $this->request->sql_make_page($database,$data,$requirement,$left_join,$where,$count);
        $this->query($sql);
        return $this->fetch_array();
    }
    public function list_page_json1($data,$count=''){
        $this->request = app::load_sys_class('request');
        $data['query_condition']['state']['database'] = 'pmo_payment';
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
        $requirement = "
        pmo_payment.id,
        pmo_payment.state,
        pmo_payment.item_content,
        pmo_payment.amount,
        pmo_payment.create_time,
        pmo_payment.payee_id,
        pmo_payment.payee_name,
        pmo_payment.state,
        pmo_payment.submit_time,
        pmo_payment.financial_number,
        pmo_project_header.unicode,
        pmo_project_body.project_name
        ";
        $where = ' and pmo_payment.state!=0 ';
        $sql = $this->request->sql_make_page($database,$data,$requirement,$left_join,$where,$count);
        $this->query($sql);
        return $this->fetch_array();
    }

    public function list_page_json2(){
        $sql = "
        SELECT
            * 
        FROM
            pmo_payment_project 
        
            left JOIN pmo_payment ON pmo_payment.id = pmo_payment_project.payment_id where pmo_payment.state!=0  

        UNION

        SELECT
            * 
        FROM
            pmo_payment_project 
        
            right JOIN pmo_payment ON pmo_payment.id = pmo_payment_project.payment_id where pmo_payment.state!=0  
        ";
        $this->query($sql);
        return $this->fetch_array();
    }
    public function list_page_json($page_num,$page_size){
        $offset = $page_size*($page_num-1);
        $sql = "
                            SELECT
                        header.unicode,
                        body.project_name,
                        b.relation_id,
                        b.payment_id,
                        b.project_id,
                        b.price,
                        b.id,
                        b.item_content,
                        b.create_time,
                        b.amount,
                        b.payee_id,
                        b.`state`,
                        b.submit_time,
                        b.financial_number,
                        b.payee_name,
                        b.`describe` 
                    FROM
                        (
                            (
                            SELECT
                                pro.id AS relation_id,
                                pro.payment_id,
                                pro.project_id,
                                pro.price,
                                ment.id,
                                ment.item_content,
                                ment.create_time,
                                ment.amount,
                                ment.payee_id,
                                ment.`state`,
                                ment.submit_time,
                                ment.financial_number,
                                ment.payee_name,
                                ment.`describe` 
                            FROM
                                pmo_payment_project AS pro
                                LEFT JOIN pmo_payment AS ment ON ment.id = pro.payment_id 
                            WHERE
                                ment.state != 0 
                            ) UNION
                            (
                            SELECT
                                pro.id AS relation_id,
                                pro.payment_id,
                                pro.project_id,
                                pro.price,
                                ment.id,
                                ment.item_content,
                                ment.create_time,
                                ment.amount,
                                ment.payee_id,
                                ment.`state`,
                                ment.submit_time,
                                ment.financial_number,
                                ment.payee_name,
                                ment.`describe` 
                            FROM
                                pmo_payment_project AS pro
                                RIGHT JOIN pmo_payment AS ment ON ment.id = pro.payment_id 
                            WHERE
                                ment.state != 0 
                            ) 
                        ) AS b
                        LEFT JOIN pmo_project_header AS header ON b.project_id = header.id
                        LEFT JOIN pmo_project_body AS body ON b.project_id = body.parent_id 
                        LIMIT $offset,$page_size
        ";
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
    public function list_page_json_count(){
        $sql = "
        SELECT
                        count(*)
                    FROM
                        (
                            (
                            SELECT
                                pro.id AS relation_id,
                                pro.payment_id,
                                pro.project_id,
                                pro.price,
                                ment.id,
                                ment.item_content,
                                ment.create_time,
                                ment.amount,
                                ment.payee_id,
                                ment.`state`,
                                ment.submit_time,
                                ment.financial_number,
                                ment.payee_name,
                                ment.`describe` 
                            FROM
                                pmo_payment_project AS pro
                                LEFT JOIN pmo_payment AS ment ON ment.id = pro.payment_id 
                            WHERE
                                ment.state != 0 
                            ) UNION
                            (
                            SELECT
                                pro.id AS relation_id,
                                pro.payment_id,
                                pro.project_id,
                                pro.price,
                                ment.id,
                                ment.item_content,
                                ment.create_time,
                                ment.amount,
                                ment.payee_id,
                                ment.`state`,
                                ment.submit_time,
                                ment.financial_number,
                                ment.payee_name,
                                ment.`describe` 
                            FROM
                                pmo_payment_project AS pro
                                RIGHT JOIN pmo_payment AS ment ON ment.id = pro.payment_id 
                            WHERE
                                ment.state != 0 
                            ) 
                        ) AS b
        ";
		
		$this->query($sql);
        return $this->fetch_array()[0]['count(*)'];
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