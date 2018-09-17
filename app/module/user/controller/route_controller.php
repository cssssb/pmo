<?php
/**
 * 接口列表
 */
namespace user;
defined('IN_LION') or exit('No permission resources.');
class route_controller {
    private $routelist,$host,$base,$finance,$express,$admin,$student;
	function __construct() {
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Connection, User-Agent, Cookie');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE');
        header('Content-type: application/json; charset=UTF-8');
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
     "staffOfDing"    =>$this->r("user","ding","staffOfDing",[],[]),
     "staffSmallList"    =>$this->r("user","project","staffSmallList",[],[]),
     "csstDepartmentList"    =>$this->r("user","project","csstDepartmentList",[],[]),
     "budgetAllList"    =>$this->r("user","project","budgetAllList",[],[]),
     //返回各部门
     "headerStaff"    =>$this->r("user","project","headerStaff",[],[]),//管理
     "financeStaff"    =>$this->r("user","project","financeStaff",[],[]),//财务
     "personnelMattersStaff"    =>$this->r("user","project","personnelMattersStaff",[],[]),//人事
     "skillStaff"    =>$this->r("user","project","skillStaff",[],[]),//技术
     "industryTrainingStaff"    =>$this->r("user","project","industryTrainingStaff",[],[]),//行业培训部
     "publicStaff"    =>$this->r("user","project","publicStaff",[],[]),//公共培训部
     "publicOneStaff"    =>$this->r("user","project","publicOneStaff",[],[]),//公共培训一部
     "technicalResourcesStaff"    =>$this->r("user","project","technicalResourcesStaff",[],[]),//公共资源部
     "marketStaff"    =>$this->r("user","project","marketStaff",[],[]),//市场部
     "industryOneStaff"    =>$this->r("user","project","industryOneStaff",[],[]),//行业一部
     "industryTwoStaff"    =>$this->r("user","project","industryTwoStaff",[],[]),//行业二部

     //返回表
     "projectHeader"    =>$this->r("user","project","projectHeader",[],[]),//项目总表
     "ofProject"    =>$this->r("user","project","ofProject",[],[]),//项目集表
     "contract"    =>$this->r("user","project","contract",[],[]),//合同表
     "projectTemplate"    =>$this->r("user","project","projectTemplate",[],[]),//项目模板表
     "lecturer"    =>$this->r("user","project","lecturer",[],[]),//讲师表
     "lecturerDuty"    =>$this->r("user","project","lecturerDuty",[],[]),//职责表
    
     //page_one
    "budgetIndexAdd"=>$this->r("budget","budget","budgetIndexAdd",[],[]),                

    
    //安排成本
    "lecturerAdd"=>$this->r("lecturer","plan","add",[],[]),               //添加、修改讲师成本安排 
    "lecturerEdit"=>$this->r("lecturer","plan","edit",[],[]),               //添加、修改讲师成本安排 
    "lecturerDel"=>$this->r("lecturer","plan","del",[],[]),                //删除讲师成本状态
    "listLecturer"=>$this->r("lecturer","plan","listLecturer",[],[]),       //讲师列表
    // "budgetIndexAdd"=>$this->r("lecturer","budget","budgetIndexAdd",[],[]),                
    "budgetIndexAdd"=>$this->r("lecturer","fee","sumCost",[],[]),                //讲师成本金额
    "budgetIndexAdd"=>$this->r("budget","budget","budgetIndexAdd",[],[]),  
    "budgetIndexAdd"=>$this->r("budget","budget","budgetIndexAdd",[],[]),                
    "budgetIndexAdd"=>$this->r("budget","budget","budgetIndexAdd",[],[]),                
    "budgetIndexAdd"=>$this->r("budget","budget","budgetIndexAdd",[],[]),                
    "budgetIndexAdd"=>$this->r("budget","budget","budgetIndexAdd",[],[]),                
    "budgetIndexAdd"=>$this->r("budget","budget","budgetIndexAdd",[],[]),     
    
    
    //project
    "addProject"=>$this->r("project","project","addProject",[],[]),                



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