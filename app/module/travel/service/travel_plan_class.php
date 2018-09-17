<?php
namespace travel;

defined('IN_LION') or exit('No permission resources.');

final class travel_plan_class
{
	public function __construct()
	{
		$this->model = \app::load_app_class('travel_plan', 'travel');//差旅表
		$this->province = \app::load_app_class('province_cost', 'travel');//长途交通表
		$this->city = \app::load_app_class('city_cost', 'travel');//市内交通表
		$this->stay = \app::load_app_class('stay_cost', 'travel');//住宿表

	}
	/**
	 * ================
	 * @Function:     添加差旅费用
	 * @Parameter:    data
	 * @DataTime:     2018-09-13
	 * @Return:       state(成功或失败状态)
	 * @Notes:        公共添加（同用于修改）
	 * @ErrorReason:  null
	 * ================
	 */
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
	/**
	 * ================
	 * @Function:     
	 * @Parameter:    header_id
	 * @DataTime:     2018-09-13
	 * @Return:       
	 * @Notes:        返回差旅费用列表
	 * @ErrorReason:  null
	 * ================
	 */
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

	public function del_province($header_id,$user_id){
		$data['state'] = 2;
		$where['header_id']=$header_id;
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
	/**
	 * ================
	 * @Function:     fee_travel
	 * @Parameter:    header_id
	 * @DataTime:     2018-09-13
	 * @Return:       fee
	 * @Notes:        返回长途交通、市内交通、住宿成本总和
	 * @ErrorReason:  null
	 * ================
	 */
	public function fee_travel($header_id){
		$where['header_id'] = $header_id; 
		$where['state'] = 0; 
		$data = $this->model->get_one($where);
		$ass['pid'] = $data['id'];
		$ass['state'] = 0;
		$province = $this->province->select($ass);
		$city = $this->city->select($ass);
		$stay = $this->stay->select($ass);
		$fee_provibce = $this->fee_foreach($province);
		$fee_city = $this->fee_foreach($city);
		$fee_stay = $this->fee_foreach($stay);
		return $fee_stay+$fee_city+$fee_provibce;
	}
	private function fee_foreach($data=null){
		if($data){
			foreach($data as $key){
				$ass[] = $key['fee'];
			}
			
			return array_sum($ass);
		}else{
			return false;
		}
	}
	public function get_one_province($id){
		$where['id'] = $id;
		return $this->province->get_one($where);
	}
	public function get_one_city($id){
		$where['id'] = $id;
		return $this->city->get_one($where);
	}
	public function get_one_stay($id){
		$where['id'] = $id;
		return $this->stay->get_one($where);
	}

	public function edit_province($id,$data){
		$where['id'] = $id;
		return $this->province->update($data,$where);
	}
	public function edit_city($id,$data){
		$where['id'] = $id;
		return $this->city->update($data,$where);
	}
	public function edit_stay($id,$data){
		$where['id'] = $id;
		return $this->stay->update($data,$where);
	}
}