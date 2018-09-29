<?php
namespace implement;

defined('IN_LION') or exit('No permission resources.');

final class implement_plan_class
{
	public function __construct()
	{
		$this->model = \app::load_app_class('implement_plan', 'implement');//差旅表
		$this->operation = \app::load_app_class('operation_project', 'project');
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
	 * @Parameter:    header_id
	 * @DataTime:     2018-09-13
	 * @Return:       
	 * @Notes:        返回成本列表
	 * @ErrorReason:  null
	 * ================
	 */
	public function list_implement($where){
		$where['state'] = 0;
		return $this->model->select($where);
	}


	/**
	 * ================
	 * @Function:     fee_implement
	 * @Parameter:    header_id
	 * @DataTime:     2018-09-13
	 * @Return:       安排成本
	 * @Notes:        
	 * @ErrorReason:  null
	 * ================
	 */
	public function fee_implement($header_id){
		$where['header_id'] = $header_id;
		$where['state'] = 0;
		$data = $this->model->get_one($where);
		$ass = $data['meet_fee'] + $data['equipment'] + $data['test_fee'] + $data['arder_fee'] + $data['pen_fee'] + $data['serve_fee'] + $data['mail_fee'];
		return  $ass;
	}

	/**
	 * ================
	 * @Function:     edit_implement
	 * @Parameter:    header_id
	 * @DataTime:     2018-09-17
	 * @Return:       
	 * @Notes:        修改数据
	 * @ErrorReason:  null
	 * ================
	 */
	public  function get_one($ass){
		$project_id = $ass['project_id'];
		$token = $ass['token'];
		$bool = $this->operation->get_one_operation($project_id,$token);
		if(!$bool){
			return false;
		}
		$where['header_id'] = $header_id['id'];
		$where['state'] = 0;
		return 	$this->model->get_one($where);
	}
	// public function common_get_one($ass){
	// 	$project_id['project_id'] = $ass['id'];
	// 	$operation = $this->operation->get_one($project_id,'*','id desc');
	// 	$time = time()-strtotime($operation['time']);
	// 	// return var_dump($project_id);
	// 	//如果操作表里没有或者状态为已成功修改过新增一条数据
	// 	if(!$operation || $operation['state']==2){
	// 	$project_id['time'] = date('y-m-d H:i:s',time());
	// 		$this->operation->insert($project_id);
	// 		return  $this->get_one($ass);
	// 		//如果修改延时可以获取
	// 	}elseif($operation['state']==1 && $time>180){
	// 		// return $this->get_one($ass);
	// 		// return $this->get_one($ass);
	// 		return var_dump($time);
	// 	}
	// 		return var_dump('false');
		
	// }
	// public function common_edit($ass){
	// 	$project_id['project_id'] = $ass['id'];
	// 	$operation = $this->operation->get_one($project_id,'*','id desc');
	// 	if($operation['state']==1){
	// 		$this->edit_implement($ass);
	// 		$update['state'] = 2;
	// 		return $this->operation->update($update,$operation['id']);
	// 	}
	// 	return var_dump('false');
	// }
	public function edit_implement($ass){
		$project_id = $ass['project_id'];
		$token = $ass['token'];
		$bool = $this->operation->del_operation($project_id,$token);
		if(!$bool){
			return false;
		}
		 	$where['id'] = $ass['id'];
			$data['state'] = 1;
			$this->model->update($data,$where);
			unset($ass['id']);
			$ass['time'] = date('y-m-d H:i:s',time());
			return  $this->model->insert($ass);
			
		
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
}