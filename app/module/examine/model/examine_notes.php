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
 * @describe:  examine_examine_notes model class
 * ================
 */
class examine_notes extends model {
    public function __construct() {
        $this->db_config = app::load_config('database');
        $this->db_setting = 'default';
        $this->table_name = 'examine_notes';
        parent::__construct();
    }
    public function examine_notes_get_unpass($parent_id,$examine_type){
        $sql = "
        SELECT
        admin_user,
        time,
        is_pass as pass,
        note,
        examine_type,
        admin_id
    
    FROM
        pmo_examine_notes 
    WHERE
        parent_id = $parent_id
        and examine_type = $examine_type
        order by id DESC
        limit 1
        ";
        $this->query($sql);
		$data = $this->fetch_array();
		return $data;
    }
    public function select_list($parent_id,$examine_type){
        $sql = "
        SELECT
        admin_user,
        time,
        is_pass as pass,
        note,
        examine_type,
        admin_id
    
    FROM
        pmo_examine_notes 
    WHERE
        parent_id = $parent_id
        and examine_type = $examine_type
        ";
         $this->query($sql);
		$data = $this->fetch_array();
		return $data;
    }
    //返回待审批的预算节点
    public function select_budget_note_will_list($admin_id){
        $sql = "
        SELECT
            e.data
        FROM
            pmo_examine_notes n
            LEFT JOIN pmo_examine_project e ON n.examine_id = e.id 
        WHERE
            n.admin_id = $admin_id 
            AND n.is_pass = 0 
            AND n.examine_type = 1
            AND e.state = 0
            ;
        ";
         $this->query($sql);
		$data = $this->fetch_array();
		return $data;
    }
     //返回待审批的决算节点
     public function select_final_note_will_list($admin_id){
        $sql = "
        SELECT
            e.data
        FROM
            pmo_examine_notes n
            LEFT JOIN pmo_examine_project e ON n.examine_id = e.id 
        WHERE
            n.admin_id = $admin_id 
            AND n.is_pass = 0 
            AND n.examine_type = 2
            AND e.state = 0;
        ";
         $this->query($sql);
		$data = $this->fetch_array();
		return $data;
    }
}