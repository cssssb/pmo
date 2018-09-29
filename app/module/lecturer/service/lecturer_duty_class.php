<?php
namespace lecturer;

defined('IN_LION') or exit('No permission resources.');

final class lecturer_duty_class
{
	public function __construct()
	{
		$this->model = \app::load_app_class('lecturer_duty', 'lecturer');

	}

    public function get_one($id=1){
        $where['id'] = $id;
        return $this->model->get_one($where);
    }

    public function of_list(){
        return $this->model->select(1);
    }
}