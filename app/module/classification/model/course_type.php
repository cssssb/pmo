<?php
namespace classification;
defined('IN_LION') or exit('No permission resources.');
use \app;
use \system\model;
\app::load_sys_class('model',false);
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2019-03-14
 * @describe:  classification_classification model class
 * ================
 */
   class course_type extends model {
       public function __construct() {
           $this->db_config = app::load_config('database');
           $this->db_setting = 'course';
           $this->table_name = 'course_type';
           parent::__construct();
           }
    public function list_page_json($page_num='',$page_size='',$condition=''){
        $offset = $page_size*($page_num-1);
        $condition==null ? $condition=1:true;
        $where = app::load_sys_class('request')->where_sql($condition);
        $sql = "
            SELECT 
            *
            FROM
            erp_course_type
          
            where
            $where
        ";
        if($page_size!=null){
            $sql .= "limit $offset,$page_size";
        }
        $this->query($sql);
        $data = $this->fetch_array();
        return $data;
    }
    public function list_page_json_count($condition=''){
        $where = app::load_sys_class('request')->where_sql($condition);
        $sql = "
            SELECT
            count(*)
            FROM
            erp_course_type
            where
            $where
        ";
        $this->query($sql);
        return $this->fetch_array()[0]['count(*)'];
    }
}