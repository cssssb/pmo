<?php
namespace implement;

defined('IN_LION') or exit('No permission resources.');

final class implement_plan_class
{
	public function __construct()
	{
		$this->model = \app::load_app_class('implement_plan', 'implement');//差旅表
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
	 * @Function:     
	 * @Parameter:    
	 * @DataTime:     2018-09-13
	 * @Return:       
	 * @Notes:        修改培训成本
	 * @ErrorReason:  null
	 * ================
	 */
	public function have_header($ass){
		$where['header_id'] = $ass['header_id'];
		$data['state'] = 1;
		return $this->model->update($data,$where);
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
	public function get_one($header_id){
		$where['header_id'] = $header_id;
		$where['state'] = 0;
		return 	$this->model->get_one($where);
	}
	public function edit_implement($id,$data){
		$where['id'] = $id;
		return $this->model->update($data,$where);
	}
}