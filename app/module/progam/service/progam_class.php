<?php
namespace progam;

defined('IN_LION') or exit('No permission resources.');

final class progam_class
{
	public function __construct()
	{
		$this->model = \app::load_model_class('progam', 'progam');
	}
   
	public function add($data){
		return $this->model->insert($data);
	}
	public function del($id){
		$data['state'] = 2;
		$where['id'] = $id;
		return $this->model->update($data,$where);
	}
	public function edit($id){
		$data['state'] = 1;
		$where['id'] = $id;
		return $this->model->update($data,$where);
	}
	public function get_one($id){
		$where['id'] = $id;
		$where['state'] = 0;
		return $this->model->get_one($where);
	}
	public function select(){
        return $this->model->select(1,'id,name');
    }
}