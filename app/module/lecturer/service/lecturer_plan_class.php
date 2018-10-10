<?php
namespace lecturer;

defined('IN_LION') or exit('No permission resources.');

final class lecturer_plan_class
{
	public function __construct()
	{
		$this->model = \app::load_app_class('lecturer_plan', 'lecturer');
		$this->operation = \app::load_app_class('operation_project', 'project');
	}

	public function add($data)
	{
		$project_id = $data['id'];
		$token = $data['token'];
		$bool = $this->operation->del_operation($project_id,$token);
		if(!$bool){
			return false;
		}
		$data['time'] = date('y-m-d H:i:s',time());
		return $this->model->insert($data);
		
	}
	public  function edit($ass){
		$project_id = $ass['id'];
		$token = $ass['token'];
		$bool = $this->operation->del_operation($project_id,$token);
		if(!$bool){
			return false;
		}
			$where['id'] = $ass['id'];
			$data['state'] = 1;
			$this->model->update($data,$where);
			unset($ass['id']);
			return $ass = $this->model->insert($ass);
	}

	public function get_one($id){
		$where['id'] = $id['id'];
		$where['state'] = 0;
		return $this->model->get_one($where);
	}
	public function del($ass)
	{
		$data['state'] = 2;
		$where['id'] = $ass['id'];
		return $this->model->update($data, $where);
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
	public function list_teacher($where)
	{
		$where['state'] = 0;
		return $this->model->select($where);
	}

	/**
	 * ================
	 * @Function:     fee_teacher
	 * @Parameter:    header_id
	 * @DataTime:     2018-09-13
	 * @Return:       讲师成本
	 * @Notes:        
	 * @ErrorReason:  null
	 * ================
	 */
	public function fee_teacher($project_id){
		$where['state'] = 0;
		$where['header_id'] = $project_id;
		$data = $this->model->select($where);
		// $ass =  $data['fee'] * $data['day'];
		foreach($data as $key){
			$ass[] = $key['fee']+$key['tax'];
		}
		return array_sum($ass);
	}
	/**
	 * ================
	 * @Function:     edit_header_id
	 * @Parameter:    header_id
	 * @DataTime:     2018-09-20
	 * @Return:       bool
	 * @Notes:        修改表关联id
	 * @ErrorReason:  null
	 * ================
	 */
	public function edit_header_id($old_id,$id){
		$where['header_id'] = $old_id;
		$data['header_id'] = $id;
		return $this->model->update($data,$where);
	}
	// /**
	//  * ================
	//  * @Function:     get_one_teacher			
	//  * @Parameter:    id
	//  * @DataTime:     2018-09-27
	//  * @Return:       data
	//  * @Notes:        服务层通过id获取这条数据应返回的值
	//  * @ErrorReason:  null
	//  * ================
	//  */

	// public function operation_get_one($ass){
	// 	$project_id['project_id'] = $ass['id'];
	// 	$operation = $this->operation->get_one($project_id,'*','id desc');
	// 	$time = time()-strtotime($operation['time']);
	// 	//如果操作表里没有或者状态为已成功修改过新增一条数据
	// 	if(!$operation || $operation['state']==2){
	// 		$project_id['time'] = date('y-m-d H:i:s',time());
	// 			$this->operation->insert($project_id);
	// 			return  $this->get_one_teacher($ass);
	// 			//如果修改延时可以获取
	// 		}elseif($operation['state']==1 && $time>180){
	// 			// return $this->get_one($ass);
	// 			return $this->get_one_teacher($ass);
	// 		}
	// 			return var_dump('false');
	// }



//9.29
	public function get_one_teacher($data){
		$id = $data['id'];
		return  $this->model->get_one_teacher($id);
		
	}
	/**
	 * ================
	 * @Function:     add_edit
	 * @Parameter:    id
	 * @DataTime:     2018-09-27
	 * @Return:       bool
	 * @Notes:        服务层通过id获取这条数据修改状态字段，新增数据
	 * @ErrorReason:  null
	 * ================
	 */
	// private function operation_edit($ass){
	// 	$project_id['project_id'] = $ass['id'];
	// 	$operation = $this->operation->get_one($project_id,'*','id desc');
	// 	if($operation['state']==1){
	// 		$this->edit($ass);
	// 		$update['state'] = 2;
	// 		return $this->operation->update($update,$operation['id']);
	// 	}
	// 	return var_dump('false');	
	// }

}