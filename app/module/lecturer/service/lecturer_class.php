<?php
namespace lecturer;

defined('IN_LION') or exit('No permission resources.');

final class lecturer_class
{
	public function __construct()
	{
		$this->model = \app::load_model_class('lecturer', 'lecturer');
		$this->coop = \app::load_model_class('coop', 'lecturer');

	}

    public function get_one($id){
        $where['id'] = $id;
        return $this->model->get_one($where);
    }
    public function of_list(){
        return $this->model->of_list();
    }
    public function add($data){
        // return $data;
        return $this->model->insert($data);
    }
    public function cooperation_list(){
        return $this->coop->select(1);
    }
}