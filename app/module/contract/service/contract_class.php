<?php
namespace contract;

defined('IN_LION') or exit('No permission resources.');

final class contract_class
{
	public function __construct()
	{
		$this->model = \app::load_model_class('contract', 'contract');//差旅表
	}
	public function select($return){
        return $this->model->select(1,$return);
    }
}