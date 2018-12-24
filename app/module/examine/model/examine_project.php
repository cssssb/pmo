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
}