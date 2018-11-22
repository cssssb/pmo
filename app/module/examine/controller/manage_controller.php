<?php
namespace examine;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2018-11-02
 * @describe:  examine_examine controller class
 * ================
 */
class manage_controller
{
    private $data,$examine;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        // $this->code = app::load_cont_class('common','user');//加载token
        // $this->operation = app::load_service_class('operation_class','operation');//加载操作
        //todo 加载相关模块
        $this->notes = app::load_service_class('examine_notes_class', 'examine');//加载进程表
        $this->examine = app::load_service_class('examine_project_class', 'examine');//加载审批项目
        $this->flow = app::load_service_class('examine_flow_class', 'examine');//加载审批项目

        $this->project = \app::load_service_class('project_class', 'project');//加载项目大表
        $this->implement = \app::load_service_class('implement_plan_class', 'implement');//加载实施安排
		$this->room = \app::load_service_class('implement_room_class','implement');//加载会场
        $this->stay = \app::load_service_class('stay_class', 'travel');//加载差旅
        $this->city = \app::load_service_class('city_class', 'travel');//加载室内交通
        $this->meal = \app::load_service_class('meal_class', 'travel');//加载餐费
        $this->province = \app::load_service_class('province_class', 'travel');//加载长途交通
        $this->lecturer = \app::load_service_class('lecturer_plan_class', 'lecturer');//加载讲师安排
    }
    //examine_mode_manage_test 
    public function examine_mode_manage_test(){
        $data1 = [
            'examine_mode'=>'1,3'
        ];
        $data2 = [
            'examine_mode'=>'2,3'
        ];
        $data3 = [
            'examine_mode'=>'3,1,2'
        ];
        //获取到  pmo_staff_user表中的user_id字段的数据
        return print_r($this->flow->examine_mode_manage($data1));
    }
    /**
     * ================
     * @Author:        css
     * @Parameter:     
     * @DataTime:      2018-11-02
     * @Return:        bool
     * @Notes:         提交审批+创建审批流
     * @ErrorReason:   null
     * ================
     */ 
    public function commit()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       0.1
         * @DataTime:  2018-11-02
         * @describe:  commit function
         * ================
         */
        $post = $this->data->get_post();//获得post
        //审批项目  如果没有发审批流id out
        // $post['id'] = 2;
        // $post['token'] = 'wtXl4Wvg0o';
        // $post = [
        //     'token'=>'lalal',
        //     'id' = 1,
        //     'examine_type'=>'1',//1为预算 2为决算
        //     'flow_id'=>1,//审批流id
        // ];
        $notes = $this->examine->commit($post['id'],$post['token'],$post['examine_type'],$post['flow_id']);
        // $notes = $this->examine->commit($parent_id,$token,$examine_tyoe,$flow_id);
        if(!$notes){
            $this->data->out(2004,$post['id']);
        }
        //添加金额
        $data['labor_cost'] = $this->lecturer->get_fee($post['id']);//人工成本总和
        
        if(!$data['labor_cost']){
            $data['labor_cost'] = 0;
        }
        $data['implementation_cost'] = $this->implement->get_fee($post['id']);//实施成本总和
        if(!$data['implementation_cost']){
            $data['implementation_cost'] = 0;
        }
        $data['stay'] = $this->stay->get_fee($post['id']);//住宿成本
        if(!$data['stay']){
            $data['stay'] = 0;
        }
        $data['city'] = $this->city->get_fee($post['id']);//市内交通
        if(!$data['city']){
            $data['city'] = 0;
        }
        $data['province'] = $this->province->get_fee($post['id']);//长途交通
        if(!$data['province']){
            $data['province'] = 0;
        }
        $data['meal'] = $this->meal->get_fee($post['id']);//餐费
        if(!$data['meal']){
            $data['meal'] = 0;
        }
        //travel_cost 差旅成本 计算方式为长途交通、市内交通、住宿、餐饮相加
        $data['travel_cost'] = $data['stay']+$data['city']+$data['province']+$data['meal'];
        if(!$data['travel_cost']){
            $data['travel_cost'] = 0;
        }
        $project = $this->project->get_body($post['id']);
        //咨询成本 consulting_cost
        $data['consulting_cost'] = $project['institutional_consulting_fees'] + $project['personal_consulting_fees'];
        if(!$data['consulting_cost']){
            $data['consulting_cost'] = 0;
        }
        //成本合计 
        $data['costing'] = $data['labor_cost'] + $data['implementation_cost'] + $data['travel_cost'] + $data['consulting_cost'];
        if(!$data['costing']){
            $data['costing'] = 0;
        }
        //预计收入
        $data['expected_income'] = $project['project_income'];
        if(!$data['expected_income']){
            $data['expected_income'] = 0;
        }
        //项目利润    
        $data['project_profit'] = $project['project_income'] - $project['costing'];
        if(!$data['project_profit']){
            $data['project_profit'] = 0;
        }
        //毛利率
        $data['gross_interest_rate'] = round($data['project_profit']/$data['expected_income']*100,2).'%';
        if(!$data['gross_interest_rate']){
            $data['gross_interest_rate'] = 0;
        }
       
        $fee = $this->examine->add_fee($data,$post['id']);
        if(!$fee){
            $this->data->out(3012,$post['id']);
        }

        //一、创建审批节点
        //1、获取审批流
        // $flow = $this->flow->get_one($flow_id);
        //获取审批流方式
        $examine_mode = $this->flow->get_one_mode($post['flow_id']);
        //提交审批者的pmo_staff_user中的id，用来获取上级
        $user_id = $this->common->return_user_id($post['token']);
        //通过审批流服务获取pmo_staff_user中的审批者的账号
        $admin_user_id = $this->flow->examine_mode_manage($examine_mode,$user_id['id']);
        //开始输出
        // switch ($cond) {
        //     case   2://异常1
        //         $this->data->out(3012,$post['id']);
        //         break;
                
        //     default:
        //         $this->data->out(3013,$post['id']);
        //     }
    }
    //审批讲师安排
    public function lecturer()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2018-11-06
         * @describe:  flow function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $data = $this->notes->lecturer($post['id'],$post['token']);
        $data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(3015,[]);
                break;
            default:
                $this->data->out(3014,[]);
            }
    }
     //审批实施安排
     public function implement()
     {
         /**
          * ================
          * @Author:    css
          * @ver:       1.0
          * @DataTime:  2018-11-06
          * @describe:  flow function
          * ================
          */
         $post = $this->data->get_post();//获得post
         $data = $this->notes->lecturer($post['id'],$post['token']);
         $data?$cond = 0:$cond = 1;
         
         //开始输出
         switch ($cond) {
             case   1://异常1
                 $this->data->out(3015,[]);
                 break;
             default:
                 $this->data->out(3014,[]);
             }
     }
      //审批差旅安排
    public function travel()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2018-11-06
         * @describe:  flow function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $data = $this->notes->lecturer($post['id'],$post['token']);
        $data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(3015,[]);
                break;
            default:
                $this->data->out(3014,[]);
            }
    }
    //决算
    public function final_accounts()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       
         * @DataTime:  2018-11-06
         * @describe:  Final accounts function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $data = $this->notes->final_accounts($post['id'],$post['token']);
        $data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(3015,[]);
                break;
            default:
                $this->data->out(3014,[]);
            }
    }
}