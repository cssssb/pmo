<?php
namespace budget;

defined('IN_LION') or exit('No permission resources.');

final class training_cost_class
{
	public function __construct()
	{
		$this->model = \app::load_app_class('training_cost', 'budget');//差旅表
		$this->fee = \app::load_app_class('fee', 'budget');//差旅表
	}
    public function add($data){
		return $this->model->insert($data);
	}
	public function list_training($where){
		$where['state'] = 0;
		return $this->model->select($where);
	}
	public function have_header($ass){
		$where['header_id'] = $ass['header_id'];
		$data['state'] = 1;
		return $this->model->update($data,$where);
	}
}