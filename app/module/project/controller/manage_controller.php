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
		// $this->view = \app::load_view_class('budget_paper', 'budget');//加载json数据模板
		$this->post = json_decode(file_get_contents('php://input'), true);
		$this->project = \app::load_service_class('project_class', 'project');//加载项目大表
		$this->progam = \app::load_service_class('progam_class', 'progam');//加载所属项目
		$this->staff = \app::load_service_class('staff_class', 'staff');//加载负责人id
		$this->template = \app::load_service_class('template_class', 'template');//加载项目模板id
		$this->lecturer = \app::load_service_class('lecturer_plan_class', 'lecturer');//加载讲师安排预算
		$this->implement = \app::load_service_class('implement_plan_class', 'implement');//加载安排预算
		$this->travel = \app::load_service_class('travel_plan_class', 'travel');//加载差旅预算
		// $this->code = app::load_cont_class('common','user');//加载token
	}
	public function test(){
		return $this->project->test();
	}

	public function list()
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
		$data?$cond = 0:$cond = 1;
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2002,[]);
                break;
            // case   2:
            //     $this->data->out(code, $data);
            //     break;
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
		
		$template_id = $post['data']['project_project_template_id']?(int)$post['data']['project_project_template_id']:0;
		
		// $template_id = 1;
		$ass = $this->project->add_project($template_id);
		$cond = 0;
		$ass?$cond=0:$cond=1;
		switch ($cond) {
			case 1:
				$this->data->out(2004);
				break;
			
			default:
			//10/24  乌龙
				// $data = [
				// 	'venue_fee'=>'100',
				// 	'examination_fee'=>'100',
				// 	'tea_break'=>'100',
				// 	'stationery'=>'100',
				// 	'hospitality'=>'100',
				// 	'postage'=>'100',
				// 	'material_cost'=>'100',
				// 	'equipment_cost'=>'100',
				// 	'parent_id'=>$ass['id']
				// ];
				// $this->implement->add($data);
				$this->data->out(2003,$ass);
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