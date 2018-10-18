<?php
namespace project;
defined('IN_LION') or exit('No permission resources.');

// echo "load ding_member";
// echo  microtime();
// echo "\n";

\app::load_sys_class('model',false);

class operation_project extends \system\model {
	public function __construct() {
		// return 1;die;
// new model;

		$this->db_config = \app::load_config('database');
		$this->db_setting = 'default';
		$this->table_name = 'operation_project';
		parent::__construct();
	}
	/**
	 * ================
	 * @Function:     del_operation
	 * @Parameter:    parent_id token
	 * @DataTime:     2018-09-28
	 * @Return:       bool
	 * @Notes:        添加操作
	 * @ErrorReason:  null
	 * ================
	 */	
	public function get_one_operation($parent_id,$token){
		return true;
		$where['parent_id'] = $parent_id;
		$where['token'] = $token;
		$return = $this->get_one($where);
		if($return){
			//验证token
			return true;
		}
			//验证失败
		$data = $this->get_one("parent_id=$parent_id");
		if(!$data){
			$operation['parent_id'] = $parent_id;
			$operation['time'] = date('y-m-d H:i:s',time());
			$operation['token'] = $token;
			return $this->insert($operation);
			
		}
		$time = time()-strtotime($data['time']);
		//操作延时
		if($time>180){
			$this->delete($parent_id);
			$operation['time'] = date('y-m-d H:i:s',time());
			$operation['parent_id'] = $parent_id;
			$operation['token'] = $token;
			return $this->insert($operation);
		}
		return false;
		echo json_decode('xx',true);
	}
	
	/**
	 * ================
	 * @Function:     del_operation
	 * @Parameter:    parent_id token
	 * @DataTime:     2018-09-28
	 * @Return:       bool
	 * @Notes:        
	 * @ErrorReason:  null
	 * ================
	 */
	public function del_operation($parent_id,$token){
		// $where['parent_id'] = $parent_id;
		// $where['token'] = $token;
		// $return = $this->get_one($where);
		// if($return){
		// 	 $this->delect($where);
		// 	 return true;
		// }
		// return false;
		return true;
	}

}
?>