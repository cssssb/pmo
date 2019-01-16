<?php
namespace examine;
defined('IN_LION') or exit('No permission resources.');
use \app;
use \system\model;
\app::load_sys_class('model',false);
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2018-11-02
 * @describe:  mxamine_examine_project model class
 * ================
 */
class examine_project extends model {
    public function __construct() {
        $this->db_config = app::load_config('database');
        $this->db_setting = 'default';
        $this->table_name = 'examine_project';
        parent::__construct();
    }
    public function examine_state($id,$type){
        //
        $where['parent_id'] = $id;
        $where['examine_type'] = $type;
        $data = $this->get_one($where);
        return $data['state'];
    }
    public function select_user_list($user_id,$unicode,$project_person_in_charge_name,$project_project_template_name,$page_num='1',$page_size='100'){
        $offset = $page_size*($page_num-1);
        $where = " WHERE
        apply_user = $user_id
        ";
        $unicode?$where.=" and unicode like '%$unicode%'":true;
        if($project_person_in_charge_name==true){
            strpos($project_person_in_charge_name,',')?$where .= $this->project_person_in_charge_name($project_person_in_charge_name):$where.="  and  find_in_set ('$project_person_in_charge_name',project_person_in_charge_name) ";
        }
        $project_project_template_name?$where.="  and project_person_in_charge_name in ($project_project_template_name) ":true;
        $sql = "
                        SELECT
                        unicode,
                        examine_type_name,
                        project_project_template_name,
                        project_person_in_charge_name,
                        month,
                        project_customer_name,
                        project_name,
                        project_training_numbers,
                        project_start_date,
                        project_end_date,
                        project_days,
                        project_training_ares_name,
                        travel_cost,
                        labor_cost,
                        personal_consulting_fees,
                        institutional_consulting_fees,
                        conference_cost,
                        material_cost,
                        equipment_cost,
                        examination_fee,
                        tea_break,
                        stationery,
                        hospitality,
                        postage,
                        project_tax_rate,
                        costing,
                        expected_income,
                        project_profit,
                        gross_interest_rate

                FROM
                    pmo_examine_project 
               $where
               order by id  limit $offset,$page_size;
            ";
            $this->query($sql);
            $data = $this->fetch_array();
            return $data;
    }
    public function select_user_list2($user_id,$page_num='1',$page_size='100'){
        $offset = $page_size*($page_num-1);
        $sql = "
                        SELECT
                    data_field 
                FROM
                    pmo_examine_project 
                WHERE
                   apply_user = $user_id
                    order by id  limit $offset,$page_size;
            ";
            $this->query($sql);
            $data = $this->fetch_array();
            return $data;
    }
    public function select_user_count($user_id){
         $sql = "
                        SELECT
                    count(*)
                FROM
                    pmo_examine_project 
                WHERE
                   apply_user = $user_id
            ";
            $this->query($sql);
            $data = $this->fetch_array();
            return $data;
    }
    private function project_person_in_charge_name($data){
        $project = explode(',',$data);
        foreach($project as $k){
            $str .= "find_in_set('".$k."',project_person_in_charge_name) or ";
        }
        $str = substr($str,0,strrpos($str,'or '));
        $where = ' and ('.$str.')';

        return $where;
    }
    public function record_list($unicode,$project_person_in_charge_name,$project_project_template_name,$page_num='1',$page_size='100'){
        $offset = $page_size*($page_num-1);
        $where = " WHERE
        id IN ( SELECT n.examine_id FROM pmo_examine_notes n WHERE 1 )";
        $unicode?$where.=" and unicode like '%$unicode%'":true;
        // $user_name?$where.=" and user_name like '%$user_name%'":true;
        // $project_person_in_charge_name = '张三,李四';
        // $where .= " and (find_in_set('张三',project_person_in_charge_name) or find_in_set('李四',project_person_in_charge_name))";
        if($project_person_in_charge_name==true){
        strpos($project_person_in_charge_name,',')?$where .= $this->project_person_in_charge_name($project_person_in_charge_name):$where.="  and  find_in_set ('$project_person_in_charge_name',project_person_in_charge_name) ";
    }
        $project_project_template_name?$where.="  and  find_in_set ('$project_project_template_name',project_project_template_name) ":true;

        $sql = "
                    SELECT
                    unicode,
                    examine_type_name,
                    project_project_template_name,
                    project_person_in_charge_name,
                    month,
                    project_customer_name,
                    project_name,
                    project_training_numbers,
                    project_start_date,
                    project_end_date,
                    project_days,
                    project_training_ares_name,
                    travel_cost,
                    labor_cost,
                    personal_consulting_fees,
                    institutional_consulting_fees,
                    conference_cost,
                    material_cost,
                    equipment_cost,
                    examination_fee,
                    tea_break,
                    stationery,
                    hospitality,
                    postage,
                    project_tax_rate,
                    costing,
                    expected_income,
                    project_profit,
                    gross_interest_rate
            FROM
                pmo_examine_project p $where
           
                order by id  limit $offset,$page_size";
        $this->query($sql);
        $data = $this->fetch_array();
		return $data;
    }


    public function record_list2($admin_id,$page_num='1',$page_size='100'){
        $offset = $page_size*($page_num-1);
     
        $sql = "
                    SELECT
                p.data_field 
            FROM
                pmo_examine_project p 
            WHERE
                id IN ( SELECT n.examine_id FROM pmo_examine_notes n WHERE n.admin_id = $admin_id )
                order by id  limit $offset,$page_size;
        ";
        $this->query($sql);
        $data = $this->fetch_array();
		return $data;
    }
    public function record_count(){
        $count_sql = "
        SELECT
      count(*)
    FROM
        pmo_examine_project p 
    WHERE
        id IN ( SELECT n.examine_id FROM pmo_examine_notes n WHERE 1 )
       
        ";
        $this->query($count_sql);
        $count = $this->fetch_array();
        return $count;
    }
    public function admin_body_list($admin_id){
    $sql = "
                        SELECT
                    p.data_field 
                FROM
                    pmo_examine_project p 
                WHERE
                    id IN ( SELECT n.examine_id FROM pmo_examine_notes n WHERE n.admin_id = $admin_id )
            ";
            $this->query($sql);
            $data = $this->fetch_array();
            return $data;
    }
    public function user_body_list($apply_user){
        $sql  = "
        SELECT data_field
        FROM pmo_examine_project where apply_user = $apply_user
        ";
        $this->query($sql);
        $data = $this->fetch_array();
        return $data;
    }
}