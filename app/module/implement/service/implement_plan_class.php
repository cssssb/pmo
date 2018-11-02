<?php
namespace implement;

defined('IN_LION') or exit('No permission resources.');

final class implement_plan_class
{
	public function __construct()
	{
		$this->model = \app::load_model_class('implement_plan', 'implement');//差旅表
		$this->room = \app::load_model_class('implement_room','implement');
		$this->operation = \app::load_model_class('operation_project', 'project');
	}
	/**
	 * ================
	 * @Function:     
	 * @Parameter:    
	 * @DataTime:     2018-09-13
	 * @Return:       
	 * @Notes:        添加培训成本内容
	 * @ErrorReason:  null
	 * ================
	 */
    public function add($data){
		if($data['id']){
			return $this->edit_implement($data);
		}
		$data['time'] = date('y-m-d H:i:s',time());
		return $this->model->insert($data);
	}
	/**
	 * ================
	 * @Function:     
	 * @Parameter:    parent_id
	 * @DataTime:     2018-09-13
	 * @Return:       
	 * @Notes:        返回成本列表
	 * @ErrorReason:  null
	 * ================
	 */
	public function list_implement($parent_id){
		$sql = 'parent_id='.$parent_id.' and state=0';
		return $this->model->select($sql);
	}


	/**
	 * ================
	 * @Function:     fee_implement
	 * @Parameter:    parent_id
	 * @DataTime:     2018-09-13
	 * @Return:       安排成本
	 * @Notes:        
	 * @ErrorReason:  null
	 * ================
	 */
	public function get_fee($parent_id){
		$where['parent_id'] = $parent_id['parent_id'];
		$where['state'] = 0;
		$data = $this->model->get_one($where);
		$vebue_fee = $this->room->select($where);

		foreach($vebue_fee as $key){
			$fee[] = $key['total_price'];
		}

		$room_fee = array_sum($fee);
		// return $room_fee;die;测试通过

		$ass = $data['examination_fee'] + $data['tea_break'] + $data['stationery'] + $data['hospitality'] + $data['postage'] + $data['material_cost'] + $data['equipment_cost'] + $room_fee;
		return  $ass;
	}

	/**
	 * ================
	 * @Function:     edit_implement
	 * @Parameter:    parent_id
	 * @DataTime:     2018-09-17
	 * @Return:       
	 * @Notes:        修改数据
	 * @ErrorReason:  null
	 * ================
	 */
	public  function get_one($parent_id){
		$where['parent_id'] = $parent_id;
		$where['state'] = 0;
		return 	$this->model->get_one($where,'*','id DESC');
	}

	public function edit_implement($ass){
		 	$where['parent_id'] = $ass['parent_id'];
			$data['state'] = 1;
			$this->model->update($data,$where);
			$ass['parent_id'] = $ass['id'];
			unset($ass['id']);
			$ass['time'] = date('y-m-d H:i:s',time());
			return  $this->model->insert($ass);
	}

		/**
	 * ================
	 * @Function:     edit_parent_id
	 * @Parameter:    parent_id
	 * @DataTime:     2018-09-20
	 * @Return:       bool
	 * @Notes:        修改表关联id
	 * @ErrorReason:  null
	 * ================
	 */
	public function edit_parent_id($old_id,$id){
		$where['parent_id'] = $old_id;
		$data['parent_id'] = $id;
		return $this->model->update($data,$where);
	}
}