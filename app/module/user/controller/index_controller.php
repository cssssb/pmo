<?php
namespace user;
defined('IN_LION') or exit('No permission resources.');

class index_controller{
	/**
	 * 构造函数
	 */
	public function __construct() {
		$this->data = \app::load_view_class('budget_paper','user');
		$this->ass = \app::load_service_class('login','user');//加载json数据模板

	}
	public function check(){
	}
}