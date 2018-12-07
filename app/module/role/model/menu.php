<?php
namespace role;
defined('IN_LION') or exit('No permission resources.');
use \app;
use \system\model;
\app::load_sys_class('model',false);
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2018-12-05
 * @describe:  role_menu model class
 * ================
 */
class menu extends model {
    public function __construct() {
        $this->db_config = app::load_config('database');
        $this->db_setting = 'default';
        $this->table_name = 'role_menu';
        parent::__construct();
    }
    public function retrun_menu($role_id){
        $sql = "
        SELECT
            role.id,
            f.name,
            f.type,
            m.path,
            m.title,
            m.component
        FROM
            pmo_role_menu role
            LEFT JOIN pmo_view_menu f ON f.id = role.fmenu_id
            LEFT JOIN pmo_view_on_menu m ON m.id = role.menu_id 
        WHERE
            role_id = $role_id
            AND m.fid = f.id
        ";
        $all = $this->query($sql);
		$data = $this->fetch_array($all);
		return $data;
    }
}