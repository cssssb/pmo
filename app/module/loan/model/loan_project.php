<?php
namespace loan;
defined('IN_LION') or exit('No permission resources.');
use \app;
use \system\model;
\app::load_sys_class('model',false);
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2019-01-16
 * @describe:  loan_loan_project model class
 * ================
 */
   class loan_project extends model {
       public function __construct() {
           $this->db_config = app::load_config('database');
           $this->db_setting = 'default';
           $this->table_name = 'loan_project';
           parent::__construct();
           }
    // public function list_csv($data){
    //     $this->request = app::load_sys_class('request');
    //     $data['query_condition']['loan_state']['database'] = 'pmo_loan';
    //     $database = 'pmo_loan';
    //     $left_join = [
    //         0=>[
    //             'base'=>'pmo_loan',
    //             'base_field'=>'id',
    //             'chain_base'=>'pmo_loan_project',
    //             'chain_base_field'=>'loan_id',
    //         ],
    //         1=>[
    //             'base'=>'pmo_loan_project',
    //             'base_field'=>'project_id',
    //             'chain_base'=>'pmo_project_header',
    //             'chain_base_field'=>'id',
    //         ],
    //         2=>[
    //             'base'=>'pmo_loan_project',
    //             'base_field'=>'project_id',
    //             'chain_base'=>'pmo_project_body',
    //             'chain_base_field'=>'parent_id',
    //         ],
    //     ];
    //     // 借款ID 
    //     // 借款单内容 
    //     // 借款单金额 
    //     // 借款财务编号 
    //     // 关联项目编号   
    //     // 关联项目名称 
    //     // 关联项目金额 
    //     // 领款人
    //     // 备注
    //     // 借款状态
    //     $requirement = "
    //     pmo_loan.id,
    //     pmo_loan.loan_content,
    //     pmo_loan.loan_fee,
    //     pmo_loan.loan_number,
    //     pmo_project_header.unicode,
    //     pmo_project_body.project_name,
    //     pmo_loan_project.price,
    //     pmo_loan.loan_user_name,
    //     pmo_loan.loan_describe,
    //     pmo_loan.loan_state
    //     ";
    //     $where = ' and pmo_loan.loan_state!=0 ';
    //     $sql = $this->request->sql_make_page($database,$data,$requirement,$left_join,$where,$count);
    //     $this->query($sql);
    //     return $this->fetch_array();
    // }
    public function list_page_json1($data,$count){
        $this->request = app::load_sys_class('request');
        $data['query_condition']['loan_state']['database'] = 'pmo_loan';
        $database = 'pmo_loan';
        $left_join = [
            0=>[
                'base'=>'pmo_loan',
                'base_field'=>'id',
                'chain_base'=>'pmo_loan_project',
                'chain_base_field'=>'loan_id',
            ],
            1=>[
                'base'=>'pmo_loan_project',
                'base_field'=>'project_id',
                'chain_base'=>'pmo_project_header',
                'chain_base_field'=>'id',
            ],
            2=>[
                'base'=>'pmo_loan_project',
                'base_field'=>'project_id',
                'chain_base'=>'pmo_project_body',
                'chain_base_field'=>'parent_id',
            ],
        ];
        $requirement = "
        pmo_loan.id,
        pmo_loan.loan_state,
        pmo_loan.loan_content,
        pmo_loan.loan_fee,
        pmo_loan.create_time,
        pmo_loan.loan_user_id,
        pmo_loan.loan_user_name,
        pmo_loan.loan_state,
        pmo_loan.submit_time,
        pmo_loan.loan_number,
        pmo_project_header.unicode,
        pmo_project_body.project_name
        ";
        $where = ' and pmo_loan.loan_state!=0 ';
        $sql = $this->request->sql_make_page($database,$data,$requirement,$left_join,$where,$count);
        $this->query($sql);
        return $this->fetch_array();
    }

    public function list_page_json2(){
        $sql = "
        SELECT
            * 
        FROM
            pmo_loan_project 
        
            left JOIN pmo_loan ON pmo_loan.id = pmo_loan_project.loan_id where pmo_loan.loan_state!=0  

        UNION

        SELECT
            * 
        FROM
            pmo_loan_project 
        
            right JOIN pmo_loan ON pmo_loan.id = pmo_loan_project.loan_id where pmo_loan.loan_state!=0  
        ";
        $this->query($sql);
        return $this->fetch_array();
    }
    public function list_page_json($page_num,$page_size,$condition=null){
        $offset = $page_size*($page_num-1);
        $condition==null ? $condition=1:true;
        $where = app::load_sys_class('request')->where_sql($condition);
        $sql = "
                            SELECT
                        header.unicode,
                        body.project_name,
                        b.relation_id,
                        b.loan_id,
                        b.project_id,
                        b.price,
                        b.id,
                        b.loan_content,
                        b.create_time,
                        b.loan_fee,
                        b.loan_user_id,
                        b.`loan_state`,
                        b.submit_time,
                        b.loan_number,
                        b.loan_user_name,
                        b.`loan_describe` 
                    FROM
                        (
                            (
                            SELECT
                                pro.id AS relation_id,
                                pro.loan_id,
                                pro.project_id,
                                pro.price,
                                ment.id,
                                ment.loan_content,
                                ment.create_time,
                                ment.loan_fee,
                                ment.loan_user_id,
                                ment.`loan_state`,
                                ment.submit_time,
                                ment.loan_number,
                                ment.loan_user_name,
                                ment.`loan_describe` 
                            FROM
                                pmo_loan_project AS pro
                                RIGHT JOIN pmo_loan AS ment ON ment.id = pro.loan_id 
                            WHERE
                                $where
                            ) UNION
                            (
                            SELECT
                                pro.id AS relation_id,
                                pro.loan_id,
                                pro.project_id,
                                pro.price,
                                ment.id,
                                ment.loan_content,
                                ment.create_time,
                                ment.loan_fee,
                                ment.loan_user_id,
                                ment.`loan_state`,
                                ment.submit_time,
                                ment.loan_number,
                                ment.loan_user_name,
                                ment.`loan_describe` 
                            FROM
                                pmo_loan_project AS pro
                                LEFT JOIN pmo_loan AS ment ON ment.id = pro.loan_id 
                            WHERE
                            $where
                            ) 
                        ) AS b
                        LEFT JOIN pmo_project_header AS header ON b.project_id = header.id
                        LEFT JOIN pmo_project_body AS body ON b.project_id = body.parent_id  ";
                    if($page_size!=null){$sql.="    LIMIT $offset,$page_size";}
        $this->query($sql);
        $data = $this->fetch_array();
        return $data;
    }
    public function loan_project_list($loan_user_id,$page_num,$page_size){
        $offset = $page_size*($page_num-1);
        $sql = "
        SELECT
        pay.id,
        pay.loan_content,
        pay.loan_fee,
        pay.create_time,
        pay.loan_user_id,
        pay.loan_user_name,
        pay.loan_state,
        pay.submit_time,
        pay.loan_number,
        header.unicode,
        body.project_name
        FROM
            pmo_loan AS pay
            LEFT JOIN pmo_loan_project AS pay_pro ON pay.id = pay_pro.loan_id
            LEFT JOIN pmo_project_header AS header ON header.id = pay_pro.project_id
            LEFT JOIN pmo_project_body AS body ON body.parent_id = pay_pro.project_id 
        WHERE
            pay.loan_user_id = $loan_user_id
            and pay.loan_state in (1,2)
            order by id limit $offset,$page_size
        ";
		
		$this->query($sql);
        return $this->fetch_array();
    }
    public function list_page_json_count($condition=null){
        $condition==null ? $where=1:true;
        $where = app::load_sys_class('request')->where_sql($condition);
        $sql = "
        SELECT
                        count(*)
                    FROM
                        (
                            (
                            SELECT
                                pro.id AS relation_id,
                                pro.loan_id,
                                pro.project_id,
                                pro.price,
                                ment.id,
                                ment.loan_content,
                                ment.create_time,
                                ment.loan_fee,
                                ment.loan_user_id,
                                ment.`loan_state`,
                                ment.submit_time,
                                ment.loan_number,
                                ment.loan_user_name,
                                ment.`loan_describe` 
                            FROM
                                pmo_loan_project AS pro
                                LEFT JOIN pmo_loan AS ment ON ment.id = pro.loan_id 
                            WHERE
                            $where
                            ) UNION
                            (
                            SELECT
                                pro.id AS relation_id,
                                pro.loan_id,
                                pro.project_id,
                                pro.price,
                                ment.id,
                                ment.loan_content,
                                ment.create_time,
                                ment.loan_fee,
                                ment.loan_user_id,
                                ment.`loan_state`,
                                ment.submit_time,
                                ment.loan_number,
                                ment.loan_user_name,
                                ment.`loan_describe` 
                            FROM
                                pmo_loan_project AS pro
                                RIGHT JOIN pmo_loan AS ment ON ment.id = pro.loan_id 
                            WHERE
                                $where
                            ) 
                        ) AS b
        ";
		
		$this->query($sql);
        return $this->fetch_array()[0]['count(*)'];
    }
    public function loan_project_count($loan_user_id){
        $sql = "
        SELECT
        count(*)
        FROM
            pmo_loan AS pay
            LEFT JOIN pmo_loan_project AS pay_pro ON pay.id = pay_pro.loan_id
            LEFT JOIN pmo_project_header AS header ON header.id = pay_pro.project_id
            LEFT JOIN pmo_project_body AS body ON body.parent_id = pay_pro.project_id 
        WHERE
            pay.loan_user_id = $loan_user_id
            and pay.loan_state in (1,2)
        ";
		
		$this->query($sql);
        return $this->fetch_array()[0]['count(*)'];
    }
}