<?php
namespace budget;

defined('IN_LION') or exit('No permission resources.');

final class lecturer_plan_class
{
	public function __construct()
	{
		$this->model = \app::load_app_class('lecturer_plan', 'budget');
		$this->fee = \app::load_app_class('fee', 'budget');

	}
	public function add($data)
	{
		return $this->model->insert($data);
	}

	public function del($ass)
	{
		$data['state'] = 1;
		$where['id'] = $ass;
		return $this->model->update($data, $where);
	}
	public function list_teacher($where)
	{
		$where['state'] = 0;
		return $this->model->select($where);
	}
	public function have_header($ass)
	{
		$where['header_id'] = $ass['header_id'];
		$data['state'] = 1;
		return $this->model->update($data,$where);
	}
}