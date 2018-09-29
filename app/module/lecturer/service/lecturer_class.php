<?php
namespace lecturer;

defined('IN_LION') or exit('No permission resources.');

final class lecturer_class
{
	public function __construct()
	{
		$this->model = \app::load_app_class('lecturer', 'lecturer');

	}

    public function get_one($id){
        $where['id'] = $id;
        return $this->model->get_one($where);
    }
    public function of_list(){
        return $this->model->select(1);
    }
}