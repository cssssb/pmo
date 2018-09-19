<?php
namespace template;

defined('IN_LION') or exit('No permission resources.');

final class template_class
{
	public function __construct()
	{
		$this->model = \app::load_app_class('template', 'template');
	}
    public function listProject($id){
		$where['id'] = $id;
		return $this->model->get_one($where);
	}
}