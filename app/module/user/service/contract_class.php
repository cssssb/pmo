<?php
namespace user;
defined('IN_LION') or exit('No permission resources.');

final class contract_class{
    public function __construct() {
		$this->model = \app::load_model_class('contract','user');
    }

    public function select($limit){
        return $this->model->select(1,$limit);
    }
}