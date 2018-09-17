<?php
namespace budget;

defined('IN_LION') or exit('No permission resources.');

final class lecturer_plan_class
{
	public function __construct()
	{
		$this->model = \app::load_app_class('lecturer_plan', 'budget');

	}

	public function add($data)
	{
		return $this->model->insert($data);
	}
	
	public function del($ass)
	{
		$data['state'] = 1;
		$where['id'] = $ass;
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
	 * @Function:     
	 * @Parameter:    
	 * @DataTime:     2018-09-13
	 * @Return:       
	 * @Notes:        验证是否有项目id
	 * @ErrorReason:  null
	 * ================
	 */
	public function have_header($ass)
	{
		$where['header_id'] = $ass['header_id'];
		$data['state'] = 1;
		return $this->model->update($data,$where);
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
}