<?php
namespace project;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css   project_data_getByProjectId;edit;
 * @ver:       0.1
 * @DataTime:  2018-10-16
 * ================
 */
class data_controller
{
    private $data;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        //todo 加载相关模块
        // $this->type = app::load_service_class('type', 'project');//
        $this->project = \app::load_service_class('project_class', 'project');//加载项目大表
        $this->address = \app::load_service_class('address_class', 'project');//加载地址
        $this->code = app::load_cont_class('common','user');//加载token
        $this->operation = app::load_service_class('operation_class','operation');//加载操作

        // die;
    }
    public function getByProjectId()
    {

        //获取一条项目信息
        $post = $this->data->get_post();//获得post
        $cond = 0;//默认成功
        // $post['id'] = 93;
		$data = $this->project->get_one_project($post['id']);
        $data?$cond = 0:$cond = 1;
        if($data){
        $data[0]['project_training_ares_name'] = $this->address->connect($data[0]['project_training_ares_id']);}
        switch ($cond) {
            case   1://异常1
                $this->data->out(2002,[]);
                break;
          
            default:
                $this->data->out(2001, $data[0]);
            }
       
    }
    public function edit(){
        //项目修改
        $post = $this->data->get_post();
        $cond = 0;
        $post['data']['parent_id'] ? $data['id'] = $post['data']['parent_id'] : true;
		$post['data']['project_name'] ? $pro['project_name'] = $post['data']['project_name'] : true;
		$post['data']['project_gather'] ? $data['progam_id'] = $post['data']['project_gather'] : true;
		$post['data']['project_person_in_charge_id'] ? $data['staff_id'] = $post['data']['project_person_in_charge_id'] : true;
		$post['data']['project_customer_name'] ? $pro['project_customer_name'] = $post['data']['project_customer_name'] : true;
		$post['data']['project_days'] ? $pro['project_days'] = $post['data']['project_days'] : true;
		$post['data']['project_start_date'] ? $pro['project_start_date'] = $post['data']['project_start_date'] : true;
		$post['data']['project_end_date'] ? $pro['project_end_date'] = $post['data']['project_end_date'] : true;
		$post['data']['project_income'] ? $pro['project_income'] = $post['data']['project_income'] : true;
		$post['data']['project_tax_rate'] ? $pro['project_tax_rate'] = $post['data']['project_tax_rate'] : true;
		$post['data']['project_gather_id'] ? $data['progam_id'] = $post['data']['project_gather_id'] : true;
		$post['data']['project_training_numbers'] ? $pro['project_training_numbers'] = $post['data']['project_training_numbers'] : true;
		$post['data']['project_training_ares_id'] ? $pro['project_training_ares'] = $post['data']['project_training_ares_id'] : true;
		$post['data']['project_leader_id'] ? $data['project_leader_id'] = $post['data']['project_leader_id'] : true;
		$post['data']['institutional_consulting_fees'] ? $pro['institutional_consulting_fees'] = $post['data']['institutional_consulting_fees'] : true;
		$post['data']['personal_consulting_fees'] ? $pro['personal_consulting_fees'] = $post['data']['personal_consulting_fees'] : true;
        if(!$data['id']){
            $this->data->out(3901);
        }
        $ass = $this->project->edit_project($data,$pro);
        $ass?$cond=0:$cond=1;
        
        switch($cond){
            case 1:
            $this->data->out(2006);
            break;
            
        default:
            $this->data->out(2005,$ass);
        }
    }
}