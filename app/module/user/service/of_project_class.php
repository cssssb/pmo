<?php
namespace user;
defined('IN_LION') or exit('No permission resources.');

final class of_project_class{
    public function __construct() {
		$this->model = \app::load_app_class('of_project','user');
	
    }
    public function select($limit){
        return $this->model->select(1,$limit);
    }
}