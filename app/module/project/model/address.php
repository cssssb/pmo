<?php
namespace project;
defined('IN_LION') or exit('No permission resources.');
use \app;
use \system\model;
\app::load_sys_class('model',false);
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2018-10-24
 * @describe:  address_address model class
 * ================
 */
class address extends model {
    public function __construct() {
        $this->db_config = app::load_config('database');
        $this->db_setting = 'default';
        $this->table_name = 'address';
        parent::__construct();
    }
    public function list(){
        $sql = "
                SELECT
                ares.id,
                ares.name,
                o.name as province_name,
                t.name as city_name
            
                
                FROM
                pmo_address ares
                LEFT JOIN pmo_ares o ON ares.province_id = o.id
                LEFT JOIN pmo_ares t ON ares.city_id = t.id
                where 1
        ";
        $all = $this->query($sql);
		$data = $this->fetch_array($all);
		return $data;
    }
}