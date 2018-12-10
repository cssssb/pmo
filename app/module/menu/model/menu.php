<?php
namespace menu;
defined('IN_LION') or exit('No permission resources.');
use \app;
use \system\model;
\app::load_sys_class('model',false);
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2018-11-30
 * @describe:  menu_menu model class
 * ================
 */
class menu extends model {
    public function __construct() {
        $this->db_config = app::load_config('database');
        $this->db_setting = 'default';
        $this->table_name = 'view_menu';
        parent::__construct();
    }
    public function select_viewand_type(){
        $sql = "
        SELECT
        m.id,
        m.name,
        m.type,
        f.path,
        f.title,
        f.url,
        f.component
        FROM
            pmo_view_menu m
            LEFT JOIN pmo_view_on_menu f ON f.fid = m.id
        WHERE
            
            1
        ";
        $all = $this->query($sql);
		$data = $this->fetch_array($all);
		return $data;
    }
}