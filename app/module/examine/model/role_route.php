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
 * @DataTime:  2018-11-22
 * @describe:  examine_role_toute model class
 * ================
 */
class role_route extends model {
    public function __construct() {
        $this->db_config = app::load_config('database');
        $this->db_setting = 'default';
        $this->table_name = 'role_route';
        parent::__construct();
    }
    public function get_one_user_ids($user_id){
        $sql = "
             SELECT
            * 
        FROM
            pmo_role_route 
        WHERE
            FIND_IN_SET( $user_id, user_ids )
            limit 1
        ";
        $all = $this->query($sql);
		$data = $this->fetch_array($all);
		return $data;
    }
}