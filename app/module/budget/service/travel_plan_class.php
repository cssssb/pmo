<?php
namespace budget;

defined('IN_LION') or exit('No permission resources.');

final class travel_plan_class
{
	public function __construct()
	{
		$this->model = \app::load_app_class('travel_plan', 'budget');//差旅表
		$this->province = \app::load_app_class('province_cost', 'budget');//长途交通表
		$this->city = \app::load_app_class('city_cost', 'budget');//市内交通表
		$this->stay = \app::load_app_class('stay_cost', 'budget');//住宿表
		$this->fee = \app::load_app_class('fee', 'budget');//住宿表

	}
	public function common_add($data)
	{
		$province = $data['province'];
		$city = $data['city'];
		$stay = $data['stay'];
		$pid = $data['pid'];
		// return print_r($province);die;
		foreach($province as $key){
			// return print_r($key);
			$add_provice = $this->add_province($key,$pid);
		}

		foreach($city as $key){
			$add_city = $this->add_city($key,$pid);
		}
		
		foreach($stay as $key){
			$add_stay = $this->add_stay($key,$pid);
		}
		if($add_provice&&$city&&$add_stay){
			return 1;
		}else{
			return 2;
		}
	}

	private function add_province($data,$pid)
	{
		$data['pid'] = $pid;
		return $this->province->insert($data);
	}

	private function add_city($data,$pid)
	{
		$data['pid'] = $pid;
		return $this->city->insert($data);
	}
	
	private function add_stay($data,$pid)
	{
		$data['pid'] = $pid;
		return $this->stay->insert($data);
	}
	public function pid($data){
		return $this->model->insert($data,$return_insert_id=true);
	}
	public function list_travel($where){
		$where['state'] = 0;
		$travel = $this->model->get_one($where);
		$pid = $travel['pid'];
		$data['province'] = $this->province->select($pid);
		$data['city'] = $this->city->select($pid);
		$data['stay'] = $this->stay->select($pid);
		return $data;
	}
	public function edit_state($where,$data){
		$have = $this->model->get_one($where);
		if($have){
			return  $this->model->update($data,$where);
		}else{
			return false;
		}

	}

	public function del_province($where){
		$data['state'] = 2;
		return $this->province->update($data,$where);
	}
	public function del_city($where){
		$data['state'] = 2;
		return $this->city->update($data,$where);
	}
	public function del_stay($where){
		$data['state'] = 2;
		return $this->stay->update($data,$where);
	}
}