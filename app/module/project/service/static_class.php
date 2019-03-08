<?php
namespace project;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       static
 * @DataTime:  2018-12-11
 * @describe:  project_static service class
 * ================
 */
final class static_class
{
	public function __construct()
	{
		$this->model = app::load_model_class('projectstatic', 'project');
		$this->lecturer = \app::load_service_class('lecturer_plan_class', 'lecturer');//加载讲师安排
		$this->implement = \app::load_service_class('implement_plan_class', 'implement');//加载实施安排
		$this->room = \app::load_service_class('implement_room_class', 'implement');//加载会场
		$this->stay = \app::load_service_class('stay_class', 'travel');//加载差旅
		$this->city = \app::load_service_class('city_class', 'travel');//加载室内交通
		$this->province = \app::load_service_class('province_class', 'travel');//加载长途交通
		$this->meal = \app::load_service_class('meal_class', 'travel');//加载餐费
		$this->project = \app::load_service_class('project_class', 'project');//加载项目大表
		$this->examine = \app::load_service_class('examine_notes_class', 'examine');//加载审批
	}
	/**
	 * ================
	 * @Author:        css
	 * @Parameter:     add_project
	 * @DataTime:      2018-12-11
	 * @Return:        bool
	 * @Notes:         只用一次 把list返回的数据添加至静态表
	 * @ErrorReason:   
	 * ================
	 */
	public function add_project2($data)
	{
		foreach ($data as $key => $val) {
			$json['parent_id'] = $val['id'];
			$json['data'] = json_encode($val, JSON_UNESCAPED_UNICODE);
			$this->model->insert($json);
		}
		return true;
	}

	/**
	 * ================
	 * @Author:        css
	 * @Parameter:     add_project
	 * @DataTime:      2018-12-11
	 * @Return:        bool
	 * @Notes:         添加项目时把json也添加
	 * @ErrorReason:   
	 * ================
	 */
	public function add_project($parent_id)
	{
		$data['parent_id'] = $parent_id;
		$this->model->insert($data);
		return $this->static_service($parent_id);
	}
	public function add_project_final($parent_id){
		$data['parent_id'] = $parent_id;
		$this->model->insert($data);
		return $this->static_service($parent_id,2);
	}
	/**
	 * ================
	 * @Author:        css
	 * @Parameter:     list
	 * @DataTime:      2018-12-11
	 * @Return:        data
	 * @Notes:         项目list
	 * @ErrorReason:   
	 * ================
	 */
	public function list()
	{
		$data = $this->model->select(1, '*', '', 'id DESC');
		foreach ($data as $k) {
			$ass[] = json_decode($k['data']);
		}
		return $ass;
	}


	/**
	 * ================
	 * @Author:        css
	 * @Parameter:     static_service
	 * @DataTime:      2018-12-11
	 * @Return:        bool
	 * @Notes:         点击保存然后获取最新状态将列表压入数组通过项目id获取是哪一条数据修改这条数据的json静态数据
	 * @ErrorReason:   
	 * ================
	 */
	
	 
	 
   //$is_unset_examine_type 预算为1 决算为2
	public function static_service($parent_id, $is_unset_examine_type = '')
	{
		//返回$parent_id获取项目的整条数据
		// $parent_id = 45;
		$data = $this->project->get_one_project($parent_id);
		if ($data[0]['project_training_ares_id']) {
			$data[0]['project_training_ares_name'] = app::load_service_class('address_class', 'project')->connect($data[0]['project_training_ares_id']);
		}
		foreach ($data as $key => $val) {

			$data[$key]['project_traing_ares']['province'] = $val['province'];
			$data[$key]['project_traing_ares']['city'] = $val['city'];
			$data[$key]['project_traing_ares']['address'] = $val['address'];
			$data[$key]['project_date']['start'] = $val['project_start_date'];
			$data[$key]['project_date']['end'] = $val['project_end_date'];

            	//labor_cost  人工成本 计算方式为 讲师费加税的总和 1.0
			$data[$key]['labor_cost'] = $this->lecturer->get_fee($val['id']);
			if (!$data[$key]['labor_cost']) {
				$data[$key]['labor_cost'] = 0;
			}
		//implementation_cost 实施成本 计算方式为几个预算的和  还需要加上会场费1.0
			$data[$key]['implementation_cost'] = $this->implement->get_fee($val['id']);
			if (!$data[$key]['implementation_cost']) {
				$data[$key]['implementation_cost'] = 0;
			}
			$data[$key]['conference_cost'] = $this->implement->get_conference_cost($val['id']);
			if (!$data[$key]['conference_cost']) {
				$data[$key]['conference_cost'] = 0;
			}
			$data[$key]['stay'] = $this->stay->get_fee($val['id']);//住宿1.0
			if (!$data[$key]['stay']) {
				$data[$key]['stay'] = 0;
			}
			$data[$key]['city'] = $this->city->get_fee($val['id']);//市内交通1.0
			if (!$data[$key]['city']) {
				$data[$key]['city'] = 0;
			}
			$data[$key]['province'] = $this->province->get_fee($val['id']);//长途交通1.0
			if (!$data[$key]['province']) {
				$data[$key]['province'] = 0;
			}
			$data[$key]['meal'] = $this->meal->get_fee($val['id']);//餐费1.0
			if (!$data[$key]['meal']) {
				$data[$key]['meal'] = 0;
			}
		//travel_cost 差旅成本 计算方式为长途交通、市内交通、住宿、餐饮相加
			$data[$key]['travel_cost'] = $data[$key]['stay'] + $data[$key]['city'] + $data[$key]['province'] + $data[$key]['meal'];
			if (!$data[$key]['travel_cost']) {
				$data[$key]['travel_cost'] = 0;
			}
			$data[$key]['lecturer'] = $this->project->list_lecturer($val['id']);
			$data[$key]['lecturers'] = $this->project->list_lecturer($val['id']);
			$data[$key]['implement'] = $this->implement->get_one($val['id']);
			$data[$key]['venue'] = $this->room->get_project($val['id']);
		// 咨询成本1.0
			$data[$key]['consulting_cost'] = $data[$key]['institutional_consulting_fees'] + $data[$key]['personal_consulting_fees'];
			if (!$data[$key]['consulting_cost']) {
				$data[$key]['consulting_cost'] = 0;
			}
		//成本合计  讲师 + 实施 + 差旅 + 咨询成本 1.0
			$data[$key]['costing'] = $data[$key]['project_tax_rate'] + $data[$key]['labor_cost'] + $data[$key]['implementation_cost'] + $data[$key]['travel_cost'] + $data[$key]['consulting_cost'];
		// $data[$key]['costing'] =  $data[$key]['labor_cost'] + $data[$key]['implementation_cost'] + $data[$key]['travel_cost'] + $data[$key]['consulting_cost'];
			if (!$data[$key]['costing']) {
				$data[$key]['costing'] = 0;
			}
		//预计收入  1.0
			$data[$key]['expected_income'] = $data[$key]['project_income'];
			if (!$data[$key]['expected_income']) {
				$data[$key]['expected_income'] = 0;
			}
		//项目利润 1.0
			$data[$key]['project_profit'] = $data[$key]['project_income'] - $data[$key]['costing'];
			if (!$data[$key]['project_profit']) {
				$data[$key]['project_profit'] = 0;
			}
		//毛利率
			if ($data[$key]['expected_income'] && $data[$key]['project_profit']) {
				$data[$key]['gross_interest_rate'] = round($data[$key]['project_profit'] / $data[$key]['expected_income'] * 100, 2) . '%';
			}
		// echo json_encode($data);die;
			if (isset($is_unset_examine_type) && ($is_unset_examine_type == 1 || $is_unset_examine_type==2)) {
				$data[$key]['examine']['budget']['step'] = $this->examine->examine_notes_get_unpass($val['id']);//预算最后一个
			} else {
				$data[$key]['examine']['budget']['step'] = $this->examine->examine_notes_list($val['id']);
			}
			$examine_state_number = $this->examine->examine_state($val['id']);
		//0为未提交 1为审批中 2为审批通过 -1为审批未通过
			$data[$key]['examine']['budget']['state'] = $examine_state_number;

		// $examine_state_number==4 ? $data[$key]['examine']['budget']['state'] = '0':$data[$key]['examine']['budget']['state']=$examine_state_number;//0为未提交 1为审批中 2为审批通过 -1为审批未通过
		// $data[$key]['examine']['finalAccounts']['step'] ? $data[$key]['examine']['finalAccounts']['step']:"0";
		// $data[$key]['examine']['finalAccounts']['state'] ? $data[$key]['examine']['finalAccounts']['state'] :"0";
			if (isset($is_unset_examine_type) && $is_unset_examine_type == 2) {
				$data[$key]['examine']['finalAccounts']['step'] = $this->examine->examine_notes_get_unpass($val['id'], 2);;//决算最后一个
			} else {
				$data[$key]['examine']['finalAccounts']['step'] = $this->examine->examine_notes_list($val['id'], 2);
			}//决算详细数据
			$data[$key]['examine']['finalAccounts']['state'] = $this->examine->examine_state($val['id'], 2);;//决算

			$id['parent_id'] = $val['id'];

			$json_data['data'] = json_encode($data[$key], JSON_UNESCAPED_UNICODE);
			$json_data['user_id'] = $this->project->model->get_one('id=' . $parent_id)['add_user_id'];
			return $this->model->update($json_data, $id);
		}
	}

	/**
	 * ================
	 * @Author:        css
	 * @Parameter:     return_only_user
	 * @DataTime:      2018-12-12
	 * @Return:        data
	 * @Notes:         只返回自己的user_id的list
	 * @ErrorReason:   
	 * ================
	 */
	public function return_only_user($user_id)
	{
		$where['user_id'] = $user_id;
		$data = $this->model->select($where);
		foreach ($data as $key) {
			$ass[] = json_decode($key['data'], true);
		}
		return $ass;
	}
}