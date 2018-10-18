<?php
/**
 * 接口列表
 */
namespace user;

use \app;

defined('IN_LION') or exit('No permission resources.');
class route_controller
{
    private $routelist;
    private $host;
    private $base;
    private $finance;
    private $express;
    private $admin;
    private $student;
    public function __construct()
    {
        $this->host = app::load_config('web_path');//加载host配置
        $this->data = app::load_sys_class('protocol');//加载json数据模板
    }

    public function client_route2()
    {
        $this->routelist = array(
    //客户端路由表
    "client_route"    =>$this->r("user", "user", "client_route", ["account"=>"string"], ["session"=>"string"]),
    //project
    "project_manage_add"=>$this->r("project", "manage", "add", ["project_project_template_id"=>"string"], [],'1.0'),       //添加项目
    "project_data_edit"=>$this->r("project", "data", "edit", ["id"=>"string"], [],'1.0'),       //修改项目
    // "delProject"=>$this->r("project", "manage", "delProject", [], []),       //删除项目
    "project_manage_list"=>$this->r("project", "manage", "list", ["id=>string"], [],'1.0'),    //返回项目列表
    // "getProject"=>$this->r("project", "manage", "getProject", [], []),      //点击获取修改本条的项目的数据
    "project_data_getByProjectId"=>$this->r("project", "data", "getByProjectId", ["id"=>"string"], [],'1.0'),   //获取一条数据

    //返回数据库员工信息 8.27
     "staffOfDing"    =>$this->r("user", "ding", "staffOfDing", [], []),
    //  "staffSmallList"    =>$this->r("user", "project", "staffSmallList", [], []),
     "staff_manage_list"    =>$this->r("staff", "manage", "list", [], [],'1.0'),
     "csstDepartmentList"    =>$this->r("user", "project", "csstDepartmentList", [], []),
     "budgetAllList"    =>$this->r("user", "project", "budgetAllList", [], []),
     //返回各部门
     "headerStaff"    =>$this->r("user", "project", "headerStaff", [], []),//管理
     "financeStaff"    =>$this->r("user", "project", "financeStaff", [], []),//财务
     "personnelMattersStaff"    =>$this->r("user", "project", "personnelMattersStaff", [], []),//人事
     "skillStaff"    =>$this->r("user", "project", "skillStaff", [], []),//技术
     "industryTrainingStaff"    =>$this->r("user", "project", "industryTrainingStaff", [], []),//行业培训部
     "publicStaff"    =>$this->r("user", "project", "publicStaff", [], []),//公共培训部
     "publicOneStaff"    =>$this->r("user", "project", "publicOneStaff", [], []),//公共培训一部
     "technicalResourcesStaff"    =>$this->r("user", "project", "technicalResourcesStaff", [], []),//公共资源部
     "marketStaff"    =>$this->r("user", "project", "marketStaff", [], []),//市场部
     "industryOneStaff"    =>$this->r("user", "project", "industryOneStaff", [], []),//行业一部
     "industryTwoStaff"    =>$this->r("user", "project", "industryTwoStaff", [], []),//行业二部
    
     
     //返回表
     "projectHeader"    =>$this->r("user", "project", "projectHeader", [], []),//项目总表
     "program_manage_list"    =>$this->r("program", "manage", "list", [], [],'1.0'),//项目集表
     "program_manage_add"    =>$this->r("program", "manage", "add", [], [],'0.1'),//项目集新增
    //  "contract"    =>$this->r("user","project","contract",[],[]),//合同表
     "contract"    =>$this->r("contract", "contract", "contract", [], []),//合同表/
     
     "project_type_list"    =>$this->r("user", "project", "projectTemplate", [], [],'1.0'),//项目模板表
     "lecturer_manage_list"    =>$this->r("lecturer", "manage", "list", [], [],'1.0'),//讲师表
     "lecturer_duty_list"    =>$this->r("lecturer", "duty", "list", [], [],'1.0'),//职责表
    //  "dutyList"    =>$this->r("lecturer","lecturer_duty","dutyList",[],[]),//职责表
    
    //"projectHeader"    =>$this->r("project","project","projectHeader",[],[]),//项目总表
    

     //page_one
    "budgetIndexAdd"=>$this->r("budget", "budget", "budgetIndexAdd", [], []),

    
    //安排成本
    "lecturer_plan_add"=>$this->r("lecturer", "plan", "add", [], [],'1.0'),               //添加、修改讲师成本安排
    "lecturer_plan_edit"=>$this->r("lecturer", "plan", "edit", [], [],'1.0'),               //添加、修改讲师成本安排
    "lecturer_plan_del"=>$this->r("lecturer", "plan", "del", [], [],'1.0'),                //删除讲师成本状态
    "lecturer_plan_getByProjectId"=>$this->r("lecturer", "plan", "getByProjectId", [], []),       //讲师列表
    // "getOneTeacher"=>$this->r("lecturer", "plan", "getOneTeacher", [], []),       //一条讲师
    // "budgetIndexAdd"=>$this->r("lecturer","budget","budgetIndexAdd",[],[]),
    "sumCost"=>$this->r("lecturer", "fee", "sumCost", [], []),                //讲师成本金额

    "travelMode"=>$this->r("travel", "travel_mode", "listAll", [], []),         //添加/修改差旅方式
    // "addProvince"=>$this->r("travel","plan","addProvince",[],[]),         //添加/修改差旅
    // "listProvince"=>$this->r("travel","plan","listProvince",[],[]),         //差旅列表
    // "delProvince"=>$this->r("travel","plan","delProvince",[],[]),             //删除长途交通
    // "delCity"=>$this->r("travel","plan","delCity",[],[]),                 //删除市内交通
    // "delStay"=>$this->r("travel","plan","delStay",[],[]),                //删除住宿
    "feeTravel"=>$this->r("travel", "travel_fee", "feeTravel", [], []),     //差旅费用总和
    
    "addTraining"=>$this->r("implement", "plan", "addTraining ", [], []),     //添加实施安排
    "implement_plan_getBuProjectId"=>$this->r("implement", "plan", "getBuProjectId", [], [],'1.0'),     //获取实施安排
    "feeTraining"=>$this->r("implement", "implement_fee", "feeTraining", [], []),     //计算实施费用

    
    //市内交通
    "ListCity"=>$this->r("travel", "city", "listCity", [], []),         //返回市内交通列表
    "getOneCity"=>$this->r("travel", "city", "getOneCity", [], []),         //返回一条市内交通
    "addCity"=>$this->r("travel", "city", "addCity", [], []),         //添加一条
    "delCity"=>$this->r("travel", "city", "delCity", [], []),         //删除一条
    "editCity"=>$this->r("travel", "city", "editCity", [], []),         //删除一条

    //长途交通
    "listProvince"=>$this->r("travel", "province", "listProvince", [], []),         //返回长途交通列表
    "getOneProvince"=>$this->r("travel", "province", "getOneProvince", [], []),         //返回一条长途交通
    "addProvince"=>$this->r("travel", "province", "addProvince", [], []),         //添加一条
    "delProvince"=>$this->r("travel", "province", "delProvince", [], []),         //删除一条
    "editProvince"=>$this->r("travel", "province", "editProvince", [], []),         //删除一条
    
    //住宿
    "listStay"=>$this->r("travel", "stay", "listStay", [], []),         //返回住宿列表
    "getOneStay"=>$this->r("travel", "stay", "getOneStay", [], []),         //返回一条住宿
    "addStay"=>$this->r("travel", "stay", "addStay", [], []),         //添加一条
    "delStay"=>$this->r("travel", "stay", "delStay", [], []),         //删除一条
    "editStay"=>$this->r("travel", "stay", "editStay", [], []),         //删除一条


        );
        $this->data->add_data('common_code', $this->data->codelist);
        $this->data->set_code(1001);
        $this->data->add_data('routelist', $this->routelist);
        $this->data->output();
    }

    private function r($c, $b, $a, $request=[], $response=[],$version="0.1")
    {
        return ["url"=>$this->host."/".$c."/".$b. "/".$a,"request"=>$request,"response.data"=>$response,"version"=>$version];
    }

    public function client_route()
    {
        $routelist = app::load_config('route', 'default_routelist');//加载route
        foreach ($routelist as $key => $route) {
            $this->routelist["$key"]=$this->r($route[0], $route[1], $route[2], $route[3], $route[4],$route[5]);
        }
        $this->data->add_data('common_code', $this->data->codelist);
        $this->data->set_code(1001);
        $this->data->add_data('routelist', $this->routelist);
        $this->data->output();
    }
}
