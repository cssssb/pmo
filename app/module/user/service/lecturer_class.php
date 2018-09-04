<?php
namespace user;
defined('IN_LION') or exit('No permission resources.');

final class lecturer_class{
    public function __construct() {
		$this->model = \app::load_app_class('lecturer','user');
	
    }
    public function select($limit){
        return $this->model->select(1,$limit);
    }
}