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
        public function select_list_pass($page_num,$page_size,$condition=null){
            $offset = $page_size*($page_num-1);
            $condition==null ? $where=1:true;
        $where = app::load_sys_class('request')->where_sql($condition);
            $sql  = "
                select
                *
                from
                pmo_payment
                where
                $where 
            ";
            if($page_size!=null){$sql.="    LIMIT $offset,$page_size";}
            $this->query($sql);
            return $this->fetch_array();
        }
        public function list_pass_count($condition){
            $condition==null ? $where=1:true;
            $where = app::load_sys_class('request')->where_sql($condition);
            $sql= "
            select
            count(*)
            from
            pmo_payment
            where
            $where
            ";
            $this->query($sql);
        return $this->fetch_array()[0]['count(*)'];
        }
        public function my_dep_list($user_ids){
        $sql = "
            SELECT
            * 
            FROM
                pmo_payment 
            WHERE
                payee_id IN ($user_ids)
        ";
		
		$this->query($sql);
        return $this->fetch_array();
        }

        public function sql(){
           $this->request = app::load_sys_class('request');
           $database = 'pmo_payment';
           $data = [
               "page_num"=>["condition"=>"equal", "query_data"=>1,"database"=>"pmo_payment"],
               "page_size"=>["condition"=>"equal", "query_data"=>5,"database"=>"pmo_payment"],
               "project_person_in_charge_name"=>["condition"=>"equal_many", "query_data"=>["柳芳","宋丹"],"database"=>"pmo_payment"],
               "project_project_template_name"=>["condition"=>"equal", "query_data"=>"内训","database"=>"pmo_payment"],
               "submit_time"=>["condition"=>"between", "query_data"=>[1546272000,1577807999],"database"=>"pmo_payment"],
               "unicode"=>["condition"=>"like", "query_data"=>"1","database"=>"pmo_project_header"],
           ];
           $left_join = [
               0=>['base'=>'pmo_project_header',
                   'base_field'=>'id',
                   'chain_base'=>'pmo_project_body',
                   'chain_base_field'=>'parent_id'
           ],
               1=>['base'=>'pmo_project_header',
                   'base_field'=>'id',
                   'chain_base'=>'pmo_project_static',
                   'chain_base_field'=>'parent_id'
           ],
           ];
           
           $page_json = $this->request->sql_make_page($database,$data,$left_join,'','','');
        //    $sql = "select * from ";
            $this->query($sql);
            return $this->fetch_array();
        }
}