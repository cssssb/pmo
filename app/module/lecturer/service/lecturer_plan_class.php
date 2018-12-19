<?php
namespace lecturer;

defined('IN_LION') or exit('No permission resources.');

final class lecturer_plan_class
{
	public function __construct()
	{
		$this->model = \app::load_model_class('lecturer_plan', 'lecturer');
		$this->operation = \app::load_model_class('operation_project', 'project');
	}

	public function add($data)
	{
		$data['time'] = date('y-m-d H:i:s',time());
		return $this->model->insert($data,1);
		
	}
	public  function edit($ass){
			$where['id'] = $ass['id'];
			$ass['time'] = date('y-m-d H:i:s',time());
			return $this->model->update($ass,$where);
	}

	public function get_one($id){
		$where['id'] = $id['id'];
		return $this->model->get_one($where);
	}
	public function del($ass)
	{
		$where['id'] = $ass['id'];
		return $this->model->delete( $where);
	}
	/**
	 * ================
	 * @Function:     讲师列表
	 * @Parameter:    项目id
	 * @DataTime:     2018-09-13
	 * @Return:       
	 * @ErrorReason:  null
	 * ================
	 */
	public function list_teacher($data)
	{	
		$sql = 'parent_id='.$data['parent_id'].' and state=0';
		return $this->model->select($sql);
	}

	/**
	 * ================
	 * @Function:     fee_teacher
	 * @Parameter:    parent_id
	 * @DataTime:     2018-09-13
	 * @Return:       讲师成本
	 * @Notes:        
	 * @ErrorReason:  null
	 * ================
	 */
	public function get_fee($parent_id){
		$where['parent_id'] = $parent_id;
		$data = $this->model->select($where);
		if($data){
		foreach($data as $key){
			$ass[] = $key['fee']+$key['tax'];
		}
		
		return array_sum($ass);}
		return 0;
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

//9.29
	public function get_one_teacher($data){
		$id = $data['id'];
		return  $this->model->get_one_teacher($id);
		
	}

}