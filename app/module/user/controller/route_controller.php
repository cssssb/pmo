<?php
/**
 * 接口列表
 */
namespace user;
defined('IN_LION') or exit('No permission resources.');
class route_controller {
    private $routelist,$host,$base,$finance,$express,$admin,$student;
	function __construct() {
        $this->data = \app::load_app_class('protocol','user');//加载json数据模板
        // $this->host = "localhost";
        $this->host = "http://192.168.4.53:666/";
    }

    public function client_route()	{
        $this->routelist = array(
    
    "client_route"    =>$this->r("user","index","check",
                                    ["account"=>"string"],
                                    ["session"=>"string"]),
    //返回数据库员工信息 8.27
     "staff_of_ding"    =>$this->r("user","ding","staff_of_ding",[],[]),
     "staff_small_list"    =>$this->r("user","project","staff_small_list",[],[]),
     "csst_department_list"    =>$this->r("user","project","csst_department_list",[],[]),
     "budget_all_list"    =>$this->r("user","project","budget_all_list",[],[]),
     //返回各部门
     "header_staff"    =>$this->r("user","project","header_staff",[],[]),//管理
     "finance_staff"    =>$this->r("user","project","finance_staff",[],[]),//财务
     "personnel_matters_staff"    =>$this->r("user","project","personnel_matters_staff",[],[]),//人事
     "skill_staff"    =>$this->r("user","project","skill_staff",[],[]),//技术
     "industry_training_staff"    =>$this->r("user","project","industry_training_staff",[],[]),//行业培训部
     "public_staff"    =>$this->r("user","project","public_staff",[],[]),//公共培训部
     "public_one_staff"    =>$this->r("user","project","public_one_staff",[],[]),//公共培训一部
     "technical_resources_staff"    =>$this->r("user","project","technical_resources_staff",[],[]),//公共资源部
     "market_staff"    =>$this->r("user","project","market_staff",[],[]),//市场部
     "industry_one_staff"    =>$this->r("user","project","industry_one_staff",[],[]),//行业一部
     "industry_two_staff"    =>$this->r("user","project","industry_two_staff",[],[]),//行业二部

     //返回表
     "project_header"    =>$this->r("user","project","project_header",[],[]),//项目总表
     "of_project"    =>$this->r("user","project","of_project",[],[]),//项目集表
     "contract"    =>$this->r("user","project","contract",[],[]),//合同表
     "project_template"    =>$this->r("user","project","project_template",[],[]),//项目模板表
     "lecturer"    =>$this->r("user","project","lecturer",[],[]),//讲师表
     "lecturer_duty"    =>$this->r("user","project","lecturer_duty",[],[]),//职责表

                                    


        );
        $this->data->add_data('common_code', $this->data->code);
        $this->data->set_code(10101);
        $this->data->add_data('routelist',$this->routelist);
        $this->data->output();
    }

    private function r($c,$b,$a,$request=[],$response=[]){
        return ["url"=>$this->host."/".$c."/".$b. "/".$a,"request"=>$request,"response.data"=>$response];
    }
}