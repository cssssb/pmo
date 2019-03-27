<?php
namespace project;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2019-03-27
 * @describe:  proejct_pmo service class
 * ================
 */
final class pmo_class
{
    public function __construct()
    {
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
    public function pmo_return_data_body($post,$query){
        $old_data = $this->project->model->pmo_json_list($post['page_num']['query_data'], $post['page_size']['query_data'], $query);
		foreach($old_data as $key=>$val){
            $old_data[$key]['project_traing_ares']['province'] = $val['province'];
			$old_data[$key]['project_traing_ares']['city'] = $val['city'];
			$old_data[$key]['project_traing_ares']['address'] = $val['address'];
			$old_data[$key]['project_date']['start'] = $val['project_start_date'];
			$old_data[$key]['project_date']['end'] = $val['project_end_date'];

            	//labor_cost  人工成本 计算方式为 讲师费加税的总和 1.0
			$old_data[$key]['labor_cost'] = $this->lecturer->get_fee($val['id']);
			if (!$old_data[$key]['labor_cost']) {
				$old_data[$key]['labor_cost'] = 0;
			}
		//implementation_cost 实施成本 计算方式为几个预算的和  还需要加上会场费1.0
			$old_data[$key]['implementation_cost'] = $this->implement->get_fee($val['id']);
			if (!$old_data[$key]['implementation_cost']) {
				$old_data[$key]['implementation_cost'] = 0;
			}
			$old_data[$key]['conference_cost'] = $this->implement->get_conference_cost($val['id']);
			if (!$old_data[$key]['conference_cost']) {
				$old_data[$key]['conference_cost'] = 0;
			}
			$old_data[$key]['stay'] = $this->stay->get_fee($val['id']);//住宿1.0
			if (!$old_data[$key]['stay']) {
				$old_data[$key]['stay'] = 0;
			}
			$old_data[$key]['city'] = $this->city->get_fee($val['id']);//市内交通1.0
			if (!$old_data[$key]['city']) {
				$old_data[$key]['city'] = 0;
			}
			$old_data[$key]['province'] = $this->province->get_fee($val['id']);//长途交通1.0
			if (!$old_data[$key]['province']) {
				$old_data[$key]['province'] = 0;
			}
			$old_data[$key]['meal'] = $this->meal->get_fee($val['id']);//餐费1.0
			if (!$old_data[$key]['meal']) {
				$old_data[$key]['meal'] = 0;
			}
		//travel_cost 差旅成本 计算方式为长途交通、市内交通、住宿、餐饮相加
			$old_data[$key]['travel_cost'] = $old_data[$key]['stay'] + $old_data[$key]['city'] + $old_data[$key]['province'] + $old_data[$key]['meal'];
			if (!$old_data[$key]['travel_cost']) {
				$old_data[$key]['travel_cost'] = 0;
			}
			$old_data[$key]['lecturer'] = $this->project->list_lecturer($val['id']);
			$old_data[$key]['lecturers'] = $this->project->list_lecturer($val['id']);
			$old_data[$key]['implement'] = $this->implement->get_one($val['id']);
			$old_data[$key]['venue'] = $this->room->get_project($val['id']);
		// 咨询成本1.0
			$old_data[$key]['consulting_cost'] = $old_data[$key]['institutional_consulting_fees'] + $old_data[$key]['personal_consulting_fees'];
			if (!$old_data[$key]['consulting_cost']) {
				$old_data[$key]['consulting_cost'] = 0;
			}
		//成本合计  讲师 + 实施 + 差旅 + 咨询成本 1.0
			$old_data[$key]['costing'] = $old_data[$key]['project_tax_rate'] + $old_data[$key]['labor_cost'] + $old_data[$key]['implementation_cost'] + $old_data[$key]['travel_cost'] + $old_data[$key]['consulting_cost'];
		// $old_data[$key]['costing'] =  $old_data[$key]['labor_cost'] + $old_data[$key]['implementation_cost'] + $old_data[$key]['travel_cost'] + $old_data[$key]['consulting_cost'];
			if (!$old_data[$key]['costing']) {
				$old_data[$key]['costing'] = 0;
			}
		//预计收入  1.0
			$old_data[$key]['expected_income'] = $old_data[$key]['project_income'];
			if (!$old_data[$key]['expected_income']) {
				$old_data[$key]['expected_income'] = 0;
			}
		//项目利润 1.0
			$old_data[$key]['project_profit'] = $old_data[$key]['project_income'] - $old_data[$key]['costing'];
			if (!$old_data[$key]['project_profit']) {
				$old_data[$key]['project_profit'] = 0;
			}
		//毛利率
			if ($old_data[$key]['expected_income'] && $old_data[$key]['project_profit']) {
				$old_data[$key]['gross_interest_rate'] = round($old_data[$key]['project_profit'] / $old_data[$key]['expected_income'] * 100, 2) . '%';
			}
		// echo json_encode($k);die;
				$old_data[$key]['examine']['budget']['step'] = $this->examine->examine_notes_list($val['id']);
			$examine_state_number = $this->examine->examine_state($val['id']);
		//0为未提交 1为审批中 2为审批通过 -1为审批未通过
			$old_data[$key]['examine']['budget']['state'] = $examine_state_number;
		// $examine_state_number==4 ? $old_data[$key]['examine']['budget']['state'] = '0':$old_data[$key]['examine']['budget']['state']=$examine_state_number;//0为未提交 1为审批中 2为审批通过 -1为审批未通过
		// $old_data[$key]['examine']['finalAccounts']['step'] ? $old_data[$key]['examine']['finalAccounts']['step']:"0";
		// $old_data[$key]['examine']['finalAccounts']['state'] ? $old_data[$key]['examine']['finalAccounts']['state'] :"0";
				$old_data[$key]['examine']['finalAccounts']['step'] = $this->examine->examine_notes_list($val['id'], 2);
			$old_data[$key]['examine']['finalAccounts']['state'] = $this->examine->examine_state($val['id'], 2);;//决算
            }
        
        return $old_data;
    }
    
}