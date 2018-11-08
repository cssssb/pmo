<?php
namespace project;

defined('IN_LION') or exit('No permission resources.');

final class project_class
{
	public function __construct()
	{
		$this->model = \app::load_model_class('project', 'project');
		$this->operation = \app::load_model_class('operation_project', 'project');
		$this->lecturer = \app::load_model_class('lecturer_plan', 'lecturer');
		$this->implement = \app::load_model_class('implement_plan', 'implement');
		$this->body = \app::load_model_class('body', 'project');
		// $this->city = \app::load_model_class('city_class', 'travel');
		// $this->stay = \app::load_model_class('stay_class', 'travel');
		// $this->province = \app::load_model_class('province_class', 'travel');

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
	public function edit_project($data,$pro){
		$header = $this->model->update($data,'id='.$data['id']);
		$have = $this->body->get_one('parent_id = '.$data['id']);
		if($have){
		$body = $this->body->update($pro,'parent_id='.$data['id']);}else{
			$pro['parent_id'] = $data['id'];
			$body = $this->body->insert($pro);
		}
		if($header&&$body){
			return [$data,$pro];
		}
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
		$data = $this->model->listProject();
		foreach($data as $key=>$val){
			$data[$key]['project_traing_ares']['province'] = $val['province'];
			$data[$key]['project_traing_ares']['city'] = $val['city'];
			$data[$key]['project_traing_ares']['address'] = $val['address'];
			$data[$key]['project_date']['start'] = $val['project_start_date'];
			$data[$key]['project_date']['end'] = $val['project_end_date'];
		}
		return $data;
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
		
			return $this->new_addproject($data);
		
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
	
	public function get_one_project($id){
		
			return $this->model->get_one_project($id);
		
			
		}
	
	//返回项目编号
	private function set_project_unicode(){
	// 	 $str = null;
    //   $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";//大小写字母以及数字
    //   $max = strlen($strPol)-1;
      
    //   for($i=0;$i<$length;$i++){
    //      $str.=$strPol[rand(0,$max)];
    //   }
    //   return $str;
	$date = date('Ym',time());
	$like = date('Y-m',time());
	$where = "time like '$like%'";
	$number = $this->model->count($where);
	if(strlen($number)<10){
		$numbers = '00'.$number;
	}elseif(strlen($number)<100){
		$numbers = '0'.$number;
	}
	$str = $date.$numbers;
	return $str;
	}
	//10/25获取项目的课程名称
	public function project_name($parent_id){
		$where['parent_id'] = $parent_id;
		$return = $this->body->get_one($where,'project_name');
		return $return['project_name'];
	}
	public function test(){
		$date = date('Ym',time());
		$number = $this->model->count();
		if(strlen($number)<10){
			$numbers = '00'.$number;
		}elseif(strlen($number)<100){
			$numbers = '0'.$number;
		}
		$str = $date.$numbers;
		return var_dump($str);
	}
	public function list_lecturer($parent_id){
		return $this->model->list_lecturer($parent_id);
	}
	/**
	 * ================
	 * @Author:        css
	 * @Parameter:     examine_fee
	 * @DataTime:      2018-11-05
	 * @Return:        data
	 * @Notes:         返回项目收入
	 * @ErrorReason:   null
	 * ================
	 */
	public function get_body($parent_id){
		$where['parent_id'] = $parent_id;
		$where['state'] = 0;
		return $this->body->get_one($where);
	}
}