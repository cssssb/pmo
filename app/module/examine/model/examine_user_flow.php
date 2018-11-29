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
 * @DataTime:  2018-11-26
 * @describe:  examine_user_flow model class
 * ================
 */
class examine_user_flow extends model {
    public function __construct() {
        $this->db_config = app::load_config('database');
        $this->db_setting = 'default';
        $this->table_name = 'examine_user_flow';
        parent::__construct();
    }
    public function select_have_admin_id($admin_id){
        $sql = "
            SELECT
            * 
        FROM
            pmo_examine_user_flow 
        WHERE
            FIND_IN_SET( $admin_id, user_ids );
            ";
        $all = $this->query($sql);
		$data = $this->fetch_array($all);
		return $data;
    }
}