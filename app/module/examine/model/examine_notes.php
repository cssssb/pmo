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
        $all = $this->query($sql);
		$data = $this->fetch_array($all);
		return $data;
    }
}