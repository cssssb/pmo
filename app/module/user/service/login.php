<?php
namespace user;
defined('IN_LION') or exit('No permission resources.');
final class login{
    public function __construct() {
		$this->data = \app::load_app_class('rule','user');//加载json数据模板
	
	}
    public function get_one($where){
        return $this->data->get_one($where);
    }
}