<?php
namespace user;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       ding_user
 * @DataTime:  2018-08-21
 * @describe:  V1.0
 * ================
 */
class project_controller
{
    private $view;
    /**
     * 构造函数
     */
    public function __construct()
    {   
    $this->data = \app::load_sys_class('protocol');//加载json数据模板
        $this->protocol = \app::load_model_class('protocol','user');//加载公共json
        $this->ding = \app::load_service_class('ding', 'user');//部门 || 
        $this->project_header_class = \app::load_service_class('project_header_class', 'user');//项目表
        $this->of_project_class = \app::load_service_class('of_project_class', 'user');//项目集表
        $this->contract_class = \app::load_service_class('contract_class', 'user');//合同表
        $this->project_template_class = \app::load_service_class('project_template_class', 'user');//项目模板表
        $this->lecturer_class = \app::load_service_class('lecturer_class', 'user');//讲师安排表
        $this->lecturer_duty_class = \app::load_service_class('lecturer_duty_class', 'user');//职责表
        $this->view = \app::load_view_class('budget_paper', 'user');//加载json数据模板
        $this->code = \app::load_cont_class('common','user');//加载token
       

    }
    //返回部门
    public function csstDepartmentList(){
        $msg = [];
        $msg['stat_time'] = $this->getMillisecond();
        $data = $this->ding->csst_departent_list();
        $msg['data'] = $data;
        $msg['code'] = 0;
        $msg['msg'] = "查询成功";
        $msg['end_time'] = $this->getMillisecond();
        $msg['during_time'] =  $msg['end_time'] - $msg['stat_time'];
        echo json_encode($msg);
    }
    //获取所有人信息
    public function staffSmallList(){
        $msg = [];
        $msg['stat_time'] = $this->getMillisecond();
        $data = $this->ding->small_list();
        $msg['data'] = $data;
        $msg['code'] = 0;
        $msg['msg'] = "查询成功";
        $msg['end_time'] = $this->getMillisecond();
        $msg['during_time'] =  $msg['end_time'] - $msg['stat_time'];
        echo json_encode($msg);
        // print_r($msg);die;
    }
    /**
     * ================
     * @Author:    css
     * @ver:       V1.0
     * @DataTime:  2018-08-30
     * @describe:  budget_all_list 预算管理json列表大表
     * ================
     */
    public function budgetAllList(){
        $msg = [];
        $msg['stat_time'] = $this->getMillisecond();
        $data = $this->view->budget_json();
        $msg['data'] = $data;
        $msg['code'] = 0;
        $msg['msg'] = "查询成功";
        $msg['end_time'] = $this->getMillisecond();
        $msg['during_time'] =  $msg['end_time'] - $msg['stat_time'];
        echo json_encode($msg);
    }

        /**
     * ================
     * @Author:    css
     * @ver:       V1.0
     * @DataTime:  2018-08-28
     * @describe:  各部门人员函数封装
     * ================
     */
    //管理
    public function headerStaff(){
        $department = 26509419;
        $data = $this->ding->select_staff($department);
        // $ass = $this->view->header_staff($data);
        // echo json_encode($data);
        return print_r($data);die;
    }
    //财务
    public function financeStaff(){
        $department = 26509420;
        $data = $this->ding->select_staff($department);
        // $ass = $this->view->finance_staff($data);

        return var_dump($data);die;
    }
    //人事
    public function personnelMattersStaff(){
        $department = 26509421;
        $data = $this->ding->select_staff($department);
        // $ass = $this->view->personnel_matters_staff($data);
        return var_dump($data);die;
    }
    //技术
    public function skillStaff(){
        $department = 26509422;
        $data = $this->ding->select_staff($department);
        // $ass = $this->view->skill_staff($data);
        return var_dump($data);die;
    }
    //行业培训部
    public function industryTrainingStaff(){
        $department = 26509424;
        $data = $this->ding->select_staff($department);
        // $ass = $this->view->skill_staff($data);
        return var_dump($data);die;
    } 
    //公共培训部
    public function publicStaff(){
        $department = 26509425;
        $data = $this->ding->select_staff($department);
        // $ass = $this->view->skill_staff($data);
        return var_dump($data);die;
    }
    //公共培训一部
    public function publicOneStaff(){
        $department = 26429951;
        $data = $this->ding->select_staff($department);
        // $ass = $this->view->skill_staff($data);
        return var_dump($data);die;
    }
    //技术资源部
    public function technicalResourcesStaff(){
        $department = 26436766;
        $data = $this->ding->select_staff($department);
        // $ass = $this->view->skill_staff($data);
        return var_dump($data);die;
    }
    //市场部
    public function marketStaff(){
        $department = 26456742;
        $data = $this->ding->select_staff($department);
        // $ass = $this->view->skill_staff($data);
        return var_dump($data);die;
    }
    //行业一部
    public function industryOneStaff(){
        $department = 30316407;
        $data = $this->ding->select_staff($department);
        // $ass = $this->view->skill_staff($data);
        return var_dump($data);die;
    }
    //行业二部
    public function industryTwoStaff(){
        $department = 30318368;
        $data = $this->ding->select_staff($department);
        // $ass = $this->view->skill_staff($data);
        return var_dump($data);die;
    }
    //返回项目表
    public function projectHeader(){
        $msg = [];
        $msg['stat_time'] = $this->getMillisecond();
        $data = $this->project_header_class->select("id,name,money");
        // var_dump($data);die;
        // $data = $this->ding->cssssb();
        // var_dump($data);die;


        $msg['data'] = $data;
        $msg['code'] = 0;
        $msg['msg'] = "查询成功";
        $msg['end_time'] = $this->getMillisecond();
        $msg['during_time'] =  $msg['end_time'] - $msg['stat_time'];
        echo json_encode($msg);
    }
    //返回项目集表
    public function ofProject(){
        $msg = [];
        $msg['stat_time'] = $this->getMillisecond();
        
        $data = $this->of_project_class->select('id,name');
        $msg['data'] = $data;
        $msg['code'] = 0;
        $msg['msg'] = "查询成功";
        $msg['end_time'] = $this->getMillisecond();
        $msg['during_time'] =  $msg['end_time'] - $msg['stat_time'];
        echo json_encode($msg);
    }
    //返回合同表
    public function contract(){
        $msg = [];
        $msg['stat_time'] = $this->getMillisecond();
        $data = $this->contract_class->select('id,name');
        $msg['data'] = $data;
        $msg['code'] = 0;
        $msg['msg'] = "查询成功";
        $msg['end_time'] = $this->getMillisecond();
        $msg['during_time'] =  $msg['end_time'] - $msg['stat_time'];
        echo json_encode($msg);
    }
    //返回项目模板表
    public function projectTemplate(){
        $msg = [];
        $msg['stat_time'] = $this->getMillisecond();
        $data = $this->project_template_class->select('id,name');
        // $msg['data'] = $data;
        // $msg['code'] = 0;
        // $msg['msg'] = "查询成功";
        // $msg['end_time'] = $this->getMillisecond();
        // $msg['during_time'] =  $msg['end_time'] - $msg['stat_time'];
        // echo json_encode($msg);
        $this->data->out(2001,$data);
    }
    //返回讲师表
    public function lecturer(){
        $msg = [];
        $msg['stat_time'] = $this->getMillisecond();
        $data = $this->lecturer_class->select('id,name');
        $msg['data'] = $data;
        $msg['code'] = 0;
        $msg['msg'] = "查询成功";
        $msg['end_time'] = $this->getMillisecond();
        $msg['during_time'] =  $msg['end_time'] - $msg['stat_time'];
        echo json_encode($msg);
    }
    //返回职责表
    public function lecturerDuty(){
        $msg = [];
        $msg['stat_time'] = $this->getMillisecond();
        $data = $this->lecturer_duty_class->select('id,name');
        $msg['data'] = $data;
        $msg['code'] = 0;
        $msg['msg'] = "查询成功";
        $msg['end_time'] = $this->getMillisecond();
        $msg['during_time'] =  $msg['end_time'] - $msg['stat_time'];
        echo json_encode($msg);
        // return $msg;
    }
    //运行时间
    private function getMillisecond() {
        list($t1, $t2) = explode(' ', microtime());
        return (float)sprintf('%.0f',(floatval($t1)+floatval($t2))*1000);
    }

    /**
     * ================
     * @Author:    css
     * @ver:       V1.0
     * @DataTime:  2018-09-04
     * @describe:  安排差旅
     * ================
     */
    //长途交通
    public function long_traffic_card_list(){
        
    } 
    
}