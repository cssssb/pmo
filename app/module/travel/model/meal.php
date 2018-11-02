<?php
namespace travel;
defined('IN_LION') or exit('No permission resources.');
use \app;
use \system\model;
\app::load_sys_class('model',false);
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2018-10-29
 * @describe:  travel_meal model class
 * ================
 */
class meal extends model {
    public function __construct() {
        $this->db_config = app::load_config('database');
        $this->db_setting = 'default';
        $this->table_name = 'travel_meal';
        parent::__construct();
    }
    public function list_meal($parent_id){
        $sql = "
        SELECT
        *
        FROM
        pmo_travel_meal AS meal
        LEFT JOIN pmo_travel_people AS people ON meal.meal_fee_people_id = people.meal_fee_people_id
        where
        parent_id = $parent_id
        and state = 0
        
        ";
        $all = $this->query($sql);
		$data = $this->fetch_array($all);
		return $data;
    }
}