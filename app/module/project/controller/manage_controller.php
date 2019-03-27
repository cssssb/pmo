<?php
namespace project;

// use system\ding_password;
use \app;

// echo "load ding_controller";
// echo  microtime();
// echo "\n";

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       ding_user
 * @DataTime:  2018-08-21
 * @describe:  V1.0
 * ================
 */
class manage_controller
{
	/**
	 * 构造函数
	 */
	public function __construct()
	{
		$this->protocol = \app::load_model_class('protocol', 'user');//加载公共json
        $this->data = \app::load_sys_class('protocol');//加载json数据模板
		$this->post = json_decode(file_get_contents('php://input'), true);
		$this->project = \app::load_service_class('project_class', 'project');//加载项目大表
		$this->implement = \app::load_service_class('implement_plan_class', 'implement');//加载实施安排
		$this->room = \app::load_service_class('implement_room_class','implement');//加载会场
        $this->stay = \app::load_service_class('stay_class', 'travel');//加载差旅
        $this->city = \app::load_service_class('city_class', 'travel');//加载室内交通
        $this->meal = \app::load_service_class('meal_class', 'travel');//加载餐费
        $this->province = \app::load_service_class('province_class', 'travel');//加载长途交通
        $this->lecturer = \app::load_service_class('lecturer_plan_class', 'lecturer');//加载讲师安排
		// $this->code = app::load_cont_class('common','user');//加载token
        $this->operation = \app::load_service_class('operation_class','operation');//加载操作
        $this->examine = \app::load_service_class('examine_notes_class','examine');//加载审批
		$this->static = \app::load_service_class('static_class','project');//加载列表json
		$this->user = \app::load_service_class('common_class','examine');//在审批的公共服务加载用户
		$this->pmo = \app::load_service_class('pmo_class','project');//在审批的公共服务加载用户
	}
	//12.12PMO专用项目列表的三种接口格式
	public function list_pmo()
	{
		/**
		 * ================
		 * @Author:    css
		 * @ver:       PMO
		 * @DataTime:  2019-03-27
		 * @describe:  PMO function
		 * ================
		 */
		$post = $this->data->get_post();//获得post
		$data_head = [
		];
		$post['data_type'] = 'page_json';
		//开始输出
		switch ($post['data_type']) {
			case   'page_json':
				$this->pmo_list_page_json($post['query_condition'],$data_head);
				break;
			// case   'json':
			// 	$this->pmo_list_json($post,$data_head);
			// 	break;
			// case   'page_csv':
			// 	$this->pmo_list_csv($post,$data_head);
			// 	break;
			default:
				$this->data->out(1003);
			}
	}
	private function pmo_list_page_json($post,$data_head=[]){
		$post['page_num']['query_data']?true:$post['page_num']['query_data'] = 1;
		$post['page_size']['query_data']?true:$post['page_size']['query_data'] = 20;
		$query = $post;
		unset($query['page_num'],$query['page_size']);
		$data['data_body'] = $this->pmo->pmo_return_data_body($post,$query);
		$data ? $cond = 0 : $cond = 1;
		$data['count'] = $this->project->model->pmo_json_list_count($query);
		// $data['count'] = "100";
		$data['data_head'] = [];
		$data['page_size'] = $post['page_size'];
		$data['page_num'] = $post['page_num'];
		//开始输出
		switch ($cond) {
			case 1://异常1
				$this->data->out(2002, $data);
				break;
			default:
				$this->data->out(2001, $data);
		}
	}
	
	//12/12返回所有项目静态列表
	public function list_static()
	{
		/**
		 * ================
		 * @Author:    css
		 * @ver:       
		 * @DataTime:  2019-03-26
		 * @describe:   function
		 * ================
		 */
		$post = $this->data->get_post();//获得post
		
		//开始输出
		switch ($post['data_type']) {
			case   'page_json':
				$this->list_page_json_static($post['query_condition']);
				break;
			case   '':
				$this->list_page_json_static($post['query_condition']);
				break;
			// case   'page_csv':
			// 	$this->list_csv_static($post);
			// 	break;
			default:
				$this->data->out(1003);
			}
	}
	private function list_page_json_static($post)
	{
		/**
		 * ================
		 * @Author:    css
		 * @ver:       1.0
		 * @DataTime:  2019-03-26
		 * @describe:  list_page_json_static function
		 * ================
		 */
		if ($post['page_num'] == true) {
			$condition = $post;
			unset($condition['page_num'], $condition['page_size']);
			$data['data_body'] = $this->static->list($post['page_num']['query_data'], $post['page_size']['query_data'], $condition);
		} else {
			$data['data_body'] = $this->static->list();
		}
		$data ? $cond = 0 : $cond = 1;
		$data['count'] = $this->static->count();
		$data['data_head'] = [];
		$data['page_size'] = $post['page_size'];
		$data['page_num'] = $post['page_num'];
		//开始输出
		switch ($cond) {
			case 1://异常1
				$this->data->out(2002, $data);
				break;
			default:
				$this->data->out(2001, $data);
		}
	}
	public function list()
	{
		/**
		 * ================
		 * @Author:    css
		 * @ver:       1.0
		 * @DataTime:  2018-12-11
		 * @describe:  list function
		 * ================
		 */
		$post = $this->data->get_post();//获得post
		switch ($post['data_type']) {
			case 'page_json':
				# code...
				$this->page_json_list($post);
				break;
			case 'page_csv':
				$this->page_csv_list($post);die;
			break;
			default:
				# code...
				break;
		}
		$data = $this->static->list();
		$data?$cond = 0:$cond = 1;
		
		//开始输出
		switch ($cond) {
			case   1://异常1
				$this->data->out(2002,[]);
				break;
			default:
				$this->data->out(2001,$data);
			}
	}
	public function page_csv_list($post){
		$data = $this->project->page_json_list($post);
		$data?true:$data = [];
		$data_head = [
			["key"=> "id", "value"=> "项目ID","size"=>"5"],
			["key"=> "unicode", "value"=> "项目编号","size"=>"5"],
			["key"=> "project_name", "value"=> "项目名称","size"=>"5"],
		];
		foreach($data as $k){
			$list[$k]['id'] = $k['id'];
			$list[$k]['unicode'] = $k['unicode'];
			$list[$k]['project_name'] = $k['project_name'];
		}
		foreach($data_head as $k){
			$heade[] = $k['value'];
		}
		$file_name = time();
		return app::load_sys_class('csv_out')->csv_class($data,$file_name,$heade);
	}
	public function page_json_list($post)
	{
		/**
		 * ================
		 * @Author:    css
		 * @ver:       1.0
		 * @DataTime:  2019-01-24
		 * @describe:  page_json_list function
		 * ================
		 */
		$data['data_body'] = $this->project->page_json_list($post);
		$data['data_body']?true:$data['data_body'] = [];
		$data?$cond = 0:$cond = 1;
			$data_head = [
				["key"=> "id", "value"=> "项目ID","size"=>"5"],
				["key"=> "unicode", "value"=> "项目编号","size"=>"5"],
				["key"=> "project_name", "value"=> "项目名称","size"=>"5"],
			];
			$data['page_num'] = $post['query_condition']['page_num']['query_data'];
			$data['page_size'] = $post['query_condition']['page_size']['query_data'];
			$data['count'] = $this->project->page_json_list($post,1);
			$data['data_head'] = app::load_sys_class('length')->return_length($data['data_body'],$data_head);
		
		//开始输出
		switch ($cond) {
			case   1://异常1
				$this->data->out(2002,[]);
				break;
			default:
				$this->data->out(2001,$data);
			}
	}
	//只返回自己的项目静态列表
	public function returnonlyuserlist()
	{
		/**
		 * ================
		 * @Author:    css
		 * @ver:       
		 * @DataTime:  2018-12-12
		 * @describe:  return_only function
		 * ================
		 */
		$post = $this->data->get_post();//获得post
		$user_id = $this->user->return_user_id($post['token']);
		$data['data_body'] = $this->static->return_only_user($user_id['id'],$post['query_condition']['page_num']['query_data'],$post['query_condition']['page_size']['query_data']);
		$data?$cond = 0:$cond = 1;
		$data['data_head']  = [];
		$data['count'] = $this->static->return_only_user_count($user_id['id']);
		$data['page_num'] = $post['query_condition']['page_num'];
		$data['page_size'] = $post['query_condition']['page_size'];
		//开始输出
		switch ($cond) {
			case   1://异常1
				$this->data->out(2002,[]);
				break;
			default:
				$this->data->out(2001,$data);
			}
	}
	public function returndepartmentlist()
	{
		/**
		 * ================
		 * @Author:    css
		 * @ver:       
		 * @DataTime:  2019-03-26
		 * @describe:   function
		 * ================
		 */
		$post = $this->data->get_post();//获得post
		$data_head = [];
		$post['data_type'] = 'page_json';
		//开始输出
		switch ($post['data_type']) {
			case   'page_json':
				$this->returndepartmentlist_page_json($post,$data_head);
				break;
			// case   'json':
			// 	$this->returndepartmentlist_list_json($post,$data_head);
			// 	break;
			// case   'page_csv':
			// 	$this->returndepartmentlist_list_csv($post,$data_head);
			// 	break;
			default:
				$this->data->out(1003);
			}
	}
	//返回自己部门的项目静态列表
	private function returndepartmentlist_page_json($post,$data_head=[])
	{
		/**
		 * ================
		 * @Author:    css
		 * @ver:       
		 * @DataTime:  2018-12-12
		 * @describe:  return_about_department function
		 * ================
		 */
		// $post['token'] = '654321';
		$user_ids = $this->user->return_user_department_user_id($post['token']);
		$post['query_condition']['page_num']['query_data']&&$post['query_condition']['page_size']['query_data']?
		true:
		$post['query_condition']['page_num']['query_data']=1&&$post['query_condition']['page_size']['query_data']=20;
		$data['data_body'] = $this->static->returndepartmentlist($user_ids,$post['query_condition']['page_num']['query_data'],$post['query_condition']['page_size']['query_data']);
		$data?$cond = 0:$cond = 1;
		$data['page_num'] = $post['query_condition']['page_num']['query_data'];
		$data['page_page'] = $post['query_condition']['page_page']['query_data'];
		$data['count'] = $this->static->returndepartmentlist_count($user_ids);

		//开始输出
		switch ($cond) {
			case   1://异常1
				$this->data->out(2002,$data);
				break;
			default:
				$this->data->out(2001,$data);
			}
	}
	//转换静态数据方法
	public function list2()
	{
		/**
         * ================
         * @Author:    css
         * @ver:       0.1
         * @DataTime:  2018-10-16
         * @describe:  list function
         * ================
		 */
        $post = $this->data->get_post();//获得post
        $cond = 0;//默认成功
        //调用业务层函数
        // example $this->service->function();
		$data = $this->project->listProject();
		foreach($data as $key=>$val){
		//labor_cost  人工成本 计算方式为 讲师费加税的总和 1.0
		$data[$key]['labor_cost'] = $this->lecturer->get_fee($val['id']);
		if(!$data[$key]['labor_cost']){
			$data[$key]['labor_cost'] = 0;
		}
		//implementation_cost 实施成本 计算方式为几个预算的和  还需要加上会场费1.0
		$data[$key]['implementation_cost'] = $this->implement->get_fee($val['id']); 
		if(!$data[$key]['implementation_cost']){
			$data[$key]['implementation_cost'] = 0;
		}
		$data[$key]['stay'] = $this->stay->get_fee($val['id']);//住宿1.0
		if(!$data[$key]['stay']){
			$data[$key]['stay'] = 0;
		}
		$data[$key]['city'] = $this->city->get_fee($val['id']);//市内交通1.0
		if(!$data[$key]['city']){
			$data[$key]['city'] = 0;
		}
		$data[$key]['province'] = $this->province->get_fee($val['id']);//长途交通1.0
		if(!$data[$key]['province']){
			$data[$key]['province'] = 0;
		}
		$data[$key]['meal'] = $this->meal->get_fee($val['id']);//餐费1.0
		if(!$data[$key]['meal']){
			$data[$key]['meal'] = 0;
		}
		//travel_cost 差旅成本 计算方式为长途交通、市内交通、住宿、餐饮相加
		$data[$key]['travel_cost'] = $data[$key]['stay'] + $data[$key]['city'] + $data[$key]['province'] + $data[$key]['meal']; 
		if(!$data[$key]['travel_cost']){
			$data[$key]['travel_cost'] = 0;
		}
		$data[$key]['lecturer'] = $this->project->list_lecturer($val['id']);
		$data[$key]['lecturers'] = $this->project->list_lecturer($val['id']);
		$data[$key]['implement'] = $this->implement->get_one($val['id']);
		$data[$key]['venue'] = $this->room->get_project($val['id']);
		// 咨询成本1.0
		$data[$key]['consulting_cost'] = $data[$key]['institutional_consulting_fees'] + $data[$key]['personal_consulting_fees'];
		if(!$data[$key]['consulting_cost']){
			$data[$key]['consulting_cost'] = 0;
		}
		//成本合计  讲师 + 实施 + 差旅 + 咨询成本 1.0
		$data[$key]['costing'] = $data[$key]['labor_cost'] + $data[$key]['implementation_cost'] + $data[$key]['travel_cost'] + $data[$key]['consulting_cost'];
		if(!$data[$key]['costing']){
			$data[$key]['costing'] = 0;
		}
		//预计收入  1.0
		$data[$key]['expected_income'] = $data[$key]['project_income'];
		if(!$data[$key]['expected_income']){
			$data[$key]['expected_income'] = 0;
		}
		//项目利润 1.0
		$data[$key]['project_profit'] = $data[$key]['project_income'] - $data[$key]['costing'];
		if(!$data[$key]['project_profit']){
			$data[$key]['project_profit'] = 0;
		}
		//毛利率
		if($data[$key]['expected_income']&&$data[$key]['project_profit']){
		$data[$key]['gross_interest_rate'] =round($data[$key]['project_profit']/$data[$key]['expected_income']*100,2).'%';
	}
		
		$data[$key]['examine']['budget']['step'] = $this->examine->examine_notes_list($val['id']);
		// $a = $this->examine->examine_state($val['id']);
		 $data[$key]['examine']['budget']['state'] = '0';//0为未提交 1为审批中 2为审批通过 -1为审批未通过
		// $data[$key]['examine']['finalAccounts']['step'] ? $data[$key]['examine']['finalAccounts']['step']: $data[$key]['examine']['finalAccounts']['step']='0';
		// $data[$key]['examine']['finalAccounts']['state'] ? $data[$key]['examine']['finalAccounts']['state'] :$data[$key]['examine']['finalAccounts']['step'] ='0';
		$data[$key]['examine']['finalAccounts']['step'] = [];//决算详细数据
		$data[$key]['examine']['finalAccounts']['state'] = '0';//决算
		// $data[$key]['examine'] = $key['id'];
	}
		//只用一次 导入老项目至json静态表
	//  $this->static->add_project2($data);
		$data?$cond = 0:$cond = 1;
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2002,[]);
                break;
            default:
                $this->data->out(2001, $data);
            }
	}
	//@todo
	public function delProject(){
		$post = $this->data->get_post();
		// $id = 45;
		$data = $this->project->delProject($post);
		if($data){
			$msg['code'] = 0;
			$msg['msg'] = '删除成功';
		}else{
			$msg['code'] = 1;
			$msg['msg'] = '删除失败';
		}
	}
	/**
	 * ================
	 * @Function:     add
	 * @Parameter:    
	 * @DataTime:     2018-10-10
	 * @Return:       bool
	 * @Notes:        新建项目保存项目模板
	 * @ErrorReason:  null
	 * ================
	 */

	public function add(){
		$post = $this->data->get_post();
		$user_id = $this->user->return_user_id($post['token']);
		$template_id = $post['data']['project_project_template_id']?(int)$post['data']['project_project_template_id']:0;
		
		$template_id = $this->project->add_project($template_id,$user_id);
		$ass = $this->static->add_project($template_id['id']);
		$ass?$cond=0:$cond=1;
		switch ($cond) {
			case 1:
				$this->data->out(2004);
				break;
			
			default:
				$this->data->out(2003,$template_id);
				break;
		}
	}


	//获取一条项目数据
	public function getOneProject(){
		//获取id
		$post = $this->data->get_post();
		// $post['id'] = 88;
		// $post['token'] = 123456;
		$data = $this->project->get_one_project($post);
		if($data){
			$msg['code'] = 0;
			$msg['msg'] = '查询成功';
			$msg['data'] = $data[0];
			echo json_encode($msg);die;
		}else{
			$msg['code'] = 1;
			$msg['msg'] = '查询失败';
			echo json_encode($msg);die;
			}
	}
	//@todo 验证项目
	private function checkproject($parent_id){
		return true;
	}
}