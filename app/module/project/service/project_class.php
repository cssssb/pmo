<?php
namespace project;

defined('IN_LION') or exit('No permission resources.');

final class project_class
{
	public function __construct()
	{
		$this->model = \app::load_app_class('project', 'project');
		$this->operation = \app::load_app_class('operation_project', 'project');
		$this->lecturer = \app::load_app_class('lecturer_plan', 'lecturer');
		$this->implement = \app::load_app_class('implement_plan', 'implement');//差旅表
		$this->travel = \app::load_app_class('travel_plan', 'travel');//差旅表

	}
	/**
	 * ================
	 * @Function:     addProject
	 * @Parameter:    
	 * @DataTime:     2018-09-17
	 * @Return:       bool
	 * @Notes:        添加项目,返回项目id
	 * @ErrorReason:  null
	 * ================
	 */
	public function add_project($data)
	{
		$data['time'] = date('y-,-d H:i:s', time());
		return $this->model->insert($data, $return_insert_id = true);
	}

	/**
	 * ================
	 * @Function:     get_one
	 * @Parameter:    
	 * @DataTime:     2018-09-26
	 * @Return:       data
	 * @Notes:        
	 * @ErrorReason:  null
	 * ================
	 */
	public function get_one($id)
	{
		$where['id'] = $id;
		$where['state'] = 0;
		return $this->model->get_one($where);
	}
	/**
	 * ================
	 * @Function:     listProject
	 * @Parameter:    
	 * @DataTime:     2018-09-26
	 * @Return:       data
	 * @Notes:        list
	 * @ErrorReason:  null
	 * ================
	 */
	public function listProject()
	{
		return $this->model->listProject();
	}

	/**
	 * ================
	 * @Function:     really_edit
	 * @Parameter:    
	 * @DataTime:     2018-09-26
	 * @Return:       bool
	 * @Notes:        真修改
	 * @ErrorReason:  null
	 * ================
	 */
	public function really_edit($data)
	{
		$where['id'] = $data['id'];
		return $this->model->update($data, $where);
	}
	/**
	 * ================
	 * @Function:     addnewproject
	 * @Parameter:    
	 * @DataTime:     2018-09-26
	 * @Return:       bool
	 * @Notes:        业务逻辑放入服务层
	 * @ErrorReason:  null
	 * ================
	 */
	public function operation_project_add($ass){
		$project_id = $ass['id'];
		$token = $ass['token'];
		$bool = $this->operation->del_operation($project_id,$token);
		if($bool){
			$this->new_addproject($ass);
		}
		return false;
	}
	private function new_addproject($data)
	{		
			$where['id'] = $data['id'];
			$old_id = $data['id'];
			$get_one = $this->model->get_one($where);
			
			if ($get_one && $get_one['name']) {
			//如果get_one为真。说明是修改,否则是新增  同时触发操作表
				$state['state'] = 1;
				$this->model->update($state, $where);
				unset($data['id']);
				$insert_id = $this->model->insert($data, $return_insert_id = true);
				return $this->return_insert_id($old_id, $insert_id);
			} elseif ($get_one) {
				return $this->model->update($data, $where);
			} else {
				return $this->model->insert($data);
			}
			return false;
		 
	}
	private function return_insert_id($old_id, $insert_id)
	{


		$where['header_id'] = $old_id;
		$data['header_id'] = $insert_id;
		$one = $this->lecturer->update($data, $where);
		$two = $this->implement->update($data, $where);
		$three = $this->travel->update($data, $where);
		if ($one && $two && $three) {
			return true;
		} else {
			return false;
		}
	}
	/**
	 * ================
	 * @Function:     delProject
	 * @Parameter:    
	 * @DataTime:     2018-09-26
	 * @Return:       bool
	 * @Notes:        
	 * @ErrorReason:  null
	 * ================
	 */

	public function delProject($post)
	{
		$data['state'] = 2;
		$where['id'] = $id['id'];
		return $this->model->update($data, $where);
	}
	/**
	 * ================
	 * @Function:     get_one_project
	 * @Parameter:    id
	 * @DataTime:     2018-09-27
	 * @Return:       data
	 * @Notes:        通过id获取整条数据
	 * @ErrorReason:  null
	 * ================
	 */
	public function get_one_project($ass){
		$id = $ass['id'];
		$token = $ass['token'];
		$bool = $this->operation->get_one_operation($id,$token);
		// return $bool;

		if($bool){
			return $this->model->get_one_project($id);
		}
		return false;
			
		}

}