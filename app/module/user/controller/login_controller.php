<?php
namespace user;
defined('IN_LION') or exit('No permission resources.');

class login_controller{
	/**
	 * 构造函数
	 */
	public function __construct() {
	
        echo 'login';
	}
	public function check(){
		
	$this->data = \app::load_app_class('user','user');//加载json数据模板
		echo "check";
	}
}