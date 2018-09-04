<?php
namespace user;
defined('IN_LION') or exit('No permission resources.');

final class project_template_class{
    public function __construct() {
		$this->model = \app::load_app_class('project_template','user');
	
    }
    public function select($limit){
        return $this->model->select(1,$limit);
    }
}