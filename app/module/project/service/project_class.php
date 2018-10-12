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
		$this->implement = \app::load_app_class('implement_plan', 'implement');
		$this->city = \app::load_app_class('city_class', 'travel');
		$this->stay = \app::load_app_class('stay_class', 'travel');
		$this->province = \app::load_app_class('province_class', 'travel');

	}
	
	/**
	 * ================
	 * @Function:     add_project
	 * @Parameter:    
	 * @DataTime:     2018-10-10
	 * @Return:       id
	 * @Notes:        添加项目
	 * @ErrorReason:  null
	 * ================
	 */

	public function add_project($template_id = 0)
	{
		$data['template_id'] = $template_id;
		$data['unicode']=$this->set_project_unicode();
		$data['time'] = date('y-m-d H:i:s', time());
		$data['id'] = $this->model->insert($data,true);
		return $data;
		
	}
	/**
	 * ================
	 * @Function:     edit_project
	 * @Parameter:    
	 * @DataTime:     2018-10-10
	 * @Return:       bool
	 * @Notes:        修改项目
	 * @ErrorReason:  null
	 * ================
	 */
	public function edit_project($data){
		$where['id'] = $data['id'];
		return $this->model->update($data,$where);
	}

	/**
	 * ================
	 * @Function:     edit_project
	 * @Parameter:    
	 * @DataTime:     2018-10-10
	 * @Return:       bool
	 * @Notes:        编辑项目后的保存
	 * @ErrorReason:  null
	 * ================
	 */
	public function edit_project2($data){
		$old_id = $where['id'] = $data['id'];
		$state['state'] = 1;
		$this->model->update($state,$where);
		$return  = $this->model->get_one($where);
		unset($data['id'],$return['id'],$return['state']);
		$id = $this->model->insert($return,$id=true);
		return $this->return_insert_id($old_id,$id);
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
	public function operation_project_add($data){
		$project_id = $data['id'];
		$token = $data['token'];
		$bool = $this->operation->del_operation($project_id,$token);
		// return var_dump($bool);
		if($bool){
			return $this->new_addproject($data);
		}
		return false;
	}
	// //弃用
	// private function new_addproject($data)
	// {		
	// 		$where['id'] = $data['id'];
	// 		$old_id = $data['id'];
	// 		$get_one = $this->model->get_one($where);
			
	// 		if (!$get_one['name']&&$get_one['template_id']) {
	// 			return $this->model->update($data, $where);
	// 		} elseif ($get_one) {
	// 			//如果get_one为真。说明是修改,否则是新增  同时触发操作表
	// 			$state['state'] = 1;
	// 			$this->model->update($state, $where);
	// 			unset($data['id']);
	// 			//10.9
	// 			/*//未完成关联表id跟着修改
	// 			**/
	// 			$insert_id = $this->model->insert($data, $return_insert_id = true);
	// 			return $this->return_insert_id($old_id, $insert_id);
	// 		}
	// 		return false;
		 
	// }
	
	private function return_insert_id($old_id, $insert_id)
	{


		
		$oldproject['project_id'] = $where['header_id'] = $old_id;
		$project['project_id'] = $data['header_id'] = $insert_id;
		$lecturer = $this->lecturer->update($data, $where);
		$implement = $this->implement->update($data, $where);
		$city = $this->city->update($project,$oldproject);
		$stay = $this->stay->update($project,$oldproject);
		$province = $this->province->update($project,$oldproject);
		if ($lecturer && $implement && $city && $stay && $province) {
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
		$where['id'] = $post['id'];
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

		if($bool){
			return $this->model->get_one_project($id);
		}
		return false;
			
		}
	
	//返回项目编号
	private function set_project_unicode($length = 8){
		$pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ';  
		for($i=0;$i<$length;$i++)   
		{   
		$key .= $pattern{mt_rand(0,35)};    //生成php随机数   
		}   
		return $key;   
	}

}