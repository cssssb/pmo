<?php
namespace user;
defined('IN_LION') or exit('No permission resources.');

final class project_header_class{
    public function __construct() {
		$this->model = \app::load_model_class('project_header','user');
	
    }
    public function select($limit=null){
        return $this->model->select(1,$limit);
    }

}