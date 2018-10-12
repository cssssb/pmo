<?php
/**
 * 接口列表
 */
namespace user;
defined('IN_LION') or exit('No permission resources.');
class route_controller {
    private $routelist,$host,$base,$finance,$express,$admin,$student;
	function __construct() {
        // header("Access-Control-Allow-Origin: *");
        // header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Connection, User-Agent, Cookie');
        // header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE');
        // header('Content-type: application/json; charset=UTF-8');
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
    //  "contract"    =>$this->r("user","project","contract",[],[]),//合同表
     "contract"    =>$this->r("contract","contract","contract",[],[]),//合同表/
     
     "projectTemplate"    =>$this->r("user","project","projectTemplate",[],[]),//项目模板表
     "lecturer"    =>$this->r("user","project","lecturer",[],[]),//讲师表
     "lecturerDuty"    =>$this->r("user","project","lecturerDuty",[],[]),//职责表
    //  "dutyList"    =>$this->r("lecturer","lecturer_duty","dutyList",[],[]),//职责表
    
    //"projectHeader"    =>$this->r("project","project","projectHeader",[],[]),//项目总表
    

     //page_one
    "budgetIndexAdd"=>$this->r("budget","budget","budgetIndexAdd",[],[]),                

    
    //安排成本 
    "lecturerAdd"=>$this->r("lecturer","plan","add",[],[]),               //添加、修改讲师成本安排 
    "lecturerEdit"=>$this->r("lecturer","plan","edit",[],[]),               //添加、修改讲师成本安排 
    "lecturerDel"=>$this->r("lecturer","plan","del",[],[]),                //删除讲师成本状态
    "listLecturer"=>$this->r("lecturer","plan","listLecturer",[],[]),       //讲师列表
    "getOneTeacher"=>$this->r("lecturer","plan","getOneTeacher",[],[]),       //一条讲师
    // "budgetIndexAdd"=>$this->r("lecturer","budget","budgetIndexAdd",[],[]),                
    "sumCost"=>$this->r("lecturer","fee","sumCost",[],[]),                //讲师成本金额

    "travelMode"=>$this->r("travel","travel_mode","listAll",[],[]),         //添加/修改差旅方式
    // "addProvince"=>$this->r("travel","plan","addProvince",[],[]),         //添加/修改差旅
    // "listProvince"=>$this->r("travel","plan","listProvince",[],[]),         //差旅列表        
    // "delProvince"=>$this->r("travel","plan","delProvince",[],[]),             //删除长途交通   
    // "delCity"=>$this->r("travel","plan","delCity",[],[]),                 //删除市内交通
    // "delStay"=>$this->r("travel","plan","delStay",[],[]),                //删除住宿
    "feeTravel"=>$this->r("travel","travel_fee","feeTravel",[],[]),     //差旅费用总和
    
    "addTraining"=>$this->r("implement","plan","addTraining ",[],[]),     //添加实施安排
    "listTraining"=>$this->r("implement","plan","listTraining",[],[]),     //实施安排列表
    "feeTraining"=>$this->r("implement","implement_fee","feeTraining",[],[]),     //计算实施费用
    
    //project
    "addProject"=>$this->r("project","manage","addnewproject",[],[]),       //添加||修改         
    "listProject"=>$this->r("project","manage","listProject",[],[]),    //返回项目列表            
    "getProject"=>$this->r("project","manage","getProject",[],[]),      //点击获取修改本条的项目的数据          
    "getOneProject"=>$this->r("project","manage","getOneProject",[],[]),   //获取一条数据
    
    //市内交通
    "ListCity"=>$this->r("travel","city","listCity",[],[]),         //返回市内交通列表
    "getOneCity"=>$this->r("travel","city","getOneCity",[],[]),         //返回一条市内交通
    "addCity"=>$this->r("travel","city","addCity",[],[]),         //添加一条
    "delCity"=>$this->r("travel","city","delCity",[],[]),         //删除一条
    "editCity"=>$this->r("travel","city","editCity",[],[]),         //删除一条

    //长途交通
    "listProvince"=>$this->r("travel","province","listProvince",[],[]),         //返回长途交通列表
    "getOneProvince"=>$this->r("travel","province","getOneProvince",[],[]),         //返回一条长途交通
    "addProvince"=>$this->r("travel","province","addProvince",[],[]),         //添加一条
    "delProvince"=>$this->r("travel","province","delProvince",[],[]),         //删除一条
    "editProvince"=>$this->r("travel","province","editProvince",[],[]),         //删除一条
    
    //住宿
    "listStay"=>$this->r("travel","stay","listStay",[],[]),         //返回住宿列表
    "getOneStay"=>$this->r("travel","stay","getOneStay",[],[]),         //返回一条住宿
    "addStay"=>$this->r("travel","stay","addStay",[],[]),         //添加一条
    "delStay"=>$this->r("travel","stay","delStay",[],[]),         //删除一条
    "editStay"=>$this->r("travel","stay","editStay",[],[]),         //删除一条


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