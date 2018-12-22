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
        $this->code = app::load_cont_class('common','user');//加载token
        $this->operation = app::load_service_class('operation_class','operation');//加载操作
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
        $this->common = \app::load_service_class('common_class', 'examine');//
        $this->admin = \app::load_service_class('examine_admin_class', 'examine');//
        $this->static = \app::load_service_class('examine_static_class','examine');//加载审批静态表
    }
    public function exmianecommittest(){
        $parent_id = 2;
        $examine_type = 1;
        $token = '9r8YWo1Sqd';
        echo json_encode($this->static->add_static($parent_id,$examine_type,$token));
    }
    //examine_mode_flow_role_test
    public function examine_mode_flow_role_test(){
         $post['flow_id'] = 5;
       print_r($this->flow->get_one_mode($post['flow_id']));
    }
    //examine_mode_flow_add_test
    public function examine_mode_flow_add_test(){
        return $this->flow->add_config();
    }

    //examine_mode_manage_test 
    public function examine_mode_manage_test(){
        $data1 = [
            'examine_mode'=>'1,3'
        ];
        $data2 = [
            'examine_mode'=>'2,3,1'
        ];
        $data3 = [
            'examine_mode'=>'3,1,2'
        ];
        //获取到  pmo_staff_user表中的user_id字段的数据
        
        return print_r($this->flow->examine_mode_manage($data3));
    }
    /**
     * ================
     * @Author:        css
     * @Parameter:     
     * @DataTime:      2018-11-02
     * @Return:        bool
     * @Notes:         提交预算审批+创建审批流
     * @ErrorReason:   null
     * ================
     */ 
    public function commitbudget()
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
            

        //首先判断此条项目状态是否已经在审批中 在审批中不添加                           12/21新增
        if( $this->examine->is_send_examine($post['id'])){
            $this->data->out(3022,[]);
        }
        $examine_type=1;//审批类型为预算 1：预算 2：决算
        $flow_id = 1;//暂时用1号审批流 //@todo 审批流 审批类型配置时完善
        
        //将项目状态切换为已提交
        
        //更新项目静态数据
        
        //点击提交预算生成静态数据
        $examine_static = $this->static->add_static($post['id'],1,$post['token']);
        //添加预算审批项目
        $commit = $this->examine->commit($post['id'],$post['token'],$examine_type,$flow_id,$examine_static);

        // $notes = $this->examine->commit($parent_id,$token,$examine_tyoe,$flow_id);
        if(!$commit){
            //添加失败
            $this->data->out(2004,$post['id']);
        }

        // //添加金额
        // $static_fee = $this->static_fee($post['id']);
        // if(!$static_fee){
        //     //如果静态金额添加失败
        //     $this->data->out(3012,$parent_id);
        // }

        //生成审批项目
        $ass = $this->examine_add_flow_mode($post['id'],$post['token'],$flow_id,$examine_static,$examine_type);
        // if($ass){
            //添加至不可操作表
            //添加至静态表
            // $static = $this->static->model->insert($data);
        // }
        //更新静态项目数据表
        $project_static = \app::load_service_class('static_class','project')->static_service($post['id']);
        //开始输出
        switch ($project_static) {
            case   false://异常1
                $this->data->out(3021,$post['id']);
                break;
            default:
                $this->data->out(3013,$post['id']);
             }
    }


        //添加至静态金额表
        // private function static_fee($parent_id){
        //     $data['labor_cost'] = $this->lecturer->get_fee($parent_id);//人工成本总和
        
        // if(!$data['labor_cost']){
        //     $data['labor_cost'] = 0;
        // }
        // $data['implementation_cost'] = $this->implement->get_fee($parent_id);//实施成本总和
        // if(!$data['implementation_cost']){
        //     $data['implementation_cost'] = 0;
        // }
        // $data['stay'] = $this->stay->get_fee($parent_id);//住宿成本
        // if(!$data['stay']){
        //     $data['stay'] = 0;
        // }
        // $data['city'] = $this->city->get_fee($parent_id);//市内交通
        // if(!$data['city']){
        //     $data['city'] = 0;
        // }
        // $data['province'] = $this->province->get_fee($parent_id);//长途交通
        // if(!$data['province']){
        //     $data['province'] = 0;
        // }
        // $data['meal'] = $this->meal->get_fee($parent_id);//餐费
        // if(!$data['meal']){
        //     $data['meal'] = 0;
        // }
        // //travel_cost 差旅成本 计算方式为长途交通、市内交通、住宿、餐饮相加
        // $data['travel_cost'] = $data['stay']+$data['city']+$data['province']+$data['meal'];
        // if(!$data['travel_cost']){
        //     $data['travel_cost'] = 0;
        // }
        // $project = $this->project->get_body($parent_id);
        // //咨询成本 consulting_cost
        // $data['consulting_cost'] = $project['institutional_consulting_fees'] + $project['personal_consulting_fees'];
        // if(!$data['consulting_cost']){
        //     $data['consulting_cost'] = 0;
        // }
        // //成本合计 
        // $data['costing'] = $data['labor_cost'] + $data['implementation_cost'] + $data['travel_cost'] + $data['consulting_cost'];
        // if(!$data['costing']){
        //     $data['costing'] = 0;
        // }
        // //预计收入
        // $data['expected_income'] = $project['project_income'];
        // if(!$data['expected_income']){
        //     $data['expected_income'] = 0;
        // }
        // //项目利润    
        // $data['project_profit'] = $project['project_income'] - $data['costing'];
        // if(!$data['project_profit']){
        //     $data['project_profit'] = 0;
        // }
        // //毛利率
        // $data['gross_interest_rate'] = round($data['project_profit']/$data['expected_income']*100,2).'%';
        // if(!$data['gross_interest_rate']){
        //     $data['gross_interest_rate'] = 0;
        // }
       
        // return $this->examine->add_fee($data,$parent_id);
        
        // }
        // private  function examine_add_flow_mode(){
        // private  function examine_add_flow_mode($post){
        /**
         * ================
         * @Author:        css
         * @Parameter:     添加审批节点
         * @DataTime:      2018-12-21
         * @Return:        boolen
         * @Notes:         添加审批节点
         * @ErrorReason:   
         * ================
         */
        private  function examine_add_flow_mode($project_id,$token,$flow_id,$static_id,$examine_type){

        // $post['id'] = 2;
        // $post['token'] = 'wtXl4Wvg0o';
        // $post = [
        //     'token'=>'qevQh36mj2',
        //     'id' => 1,
        //     'flow_id'=>5,//审批流id
        // //     'examine_type'=>'1',//1为预算 2为决算
        // ];

        //一、创建审批节点
        //1、获取审批流
        //获取审批流方式
       $examine_mode = $this->flow->get_one_mode($flow_id);

                                //        Array
                                //         (
                                //     [0] => Array
                                //         (
                                //             [id] => 5
                                //             [name] => 请假审批
                                //             [examine_mode] => 1,3
                                //             [pass_mode] => 1
                                //             [state] => 0
                                //             [fid] => 5
                                //         )

                                //     [1] => Array
                                //         (
                                //             [id] => 6
                                //             [name] => 请假审批
                                //             [examine_mode] => 1,3
                                //             [pass_mode] => 1
                                //             [state] => 0
                                //             [fid] => 5
                                //         )

                                //     [2] => Array
                                //         (
                                //             [id] => 7
                                //             [name] => 请假审批
                                //             [examine_mode] => 2,3
                                //             [pass_mode] => 1
                                //             [state] => 0
                                //             [fid] => 5
                                //         )

                                // )
        // $examine_mode = 
        //提交审批者的pmo_staff_user中的id，用来获取上级
        $user_id = $this->common->return_user_id($token);

        
        foreach ($examine_mode as $key => $val) {
        $admin_user_id[$key]['user_id'] = $this->flow->examine_mode_manage($examine_mode[$key]['examine_mode'],$user_id['id'])['user_ids'];
        $admin_user_id[$key]['mode'] = $this->flow->examine_mode_manage($examine_mode[$key]['examine_mode'],$user_id['id'])['mode'];
        }
        //去重
       
        // echo json_encode($ass);die;
        // echo json_encode(array_unique($ass));die;
        foreach($admin_user_id as $k=>$v){
            //添加到表pmo_examine_user_flow
            // $user_ids_flow[] = $this->flow->add_user_ids_flow($v['user_id'],$flow_id,$project_id);
            //根据id按顺序添加至表notes  需要添加的数据有  项目id  user_id 
            $notes_add[] = $this->notes->add_admin_ids($project_id,$v['user_id'],$v['mode'],$static_id,$examine_type);
            //1 100,1000,2000
        }
        // print_r($user_ids_flow);
        // if($user_ids_flow && $notes_add){
        if($notes_add){    
            //提交审批成功
            return true;
        }else{
            //提交审批失败
            return false;
        }

    }
    
    // //决算
    // public function final_accounts()
    // {
    //     /**
    //      * ================
    //      * @Author:    css
    //      * @ver:       
    //      * @DataTime:  2018-11-06
    //      * @describe:  Final accounts function
    //      * ================
    //      */
    //     $post = $this->data->get_post();//获得post
    //     $data = $this->notes->final_accounts($post['id'],$post['token']);
    //     $data?$cond = 0:$cond = 1;
        
    //     //开始输出
    //     switch ($cond) {
    //         case   1://异常1
    //             $this->data->out(3015,[]);
    //             break;
    //         default:
    //             $this->data->out(3014,[]);
    //         }
    // }

   
    //查看需要我审批的审批单 (审批单的详细的数据)
    public function will()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       
         * @DataTime:  2018-11-26
         * @describe:  examine_ function
         * ================
         */
        $post = $this->data->get_post();//获得post
        // $post = [
        //     'token'=>'BHzUAkcjux'
        // ];
        $admin_id = $this->common->return_user_id($post['token']);
        //查看待我审批的审批项目的id 并去重
        /*
            返回的不应该是项目id 应该是静态数据的id
        */
        $parent_id = $this->admin->return_examine_for_me_parent_id($admin_id['id']);
        //获取审批的项目的详细数据
        // $data = $this->project->return_project_data($parent_id);
        $parent_id?$cond = 0:$cond = 1;
        // print_r($parent_id);die;
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2002);
                break;
            default:
                $this->data->out(2001,$parent_id);
            }
    }
    //查看我通过的审批单
    public function ipassed()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       
         * @DataTime:  2018-11-28
         * @describe:  examine_ function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $post = [
            'token'=>'qevQh36mj2'
        ];
        $admin_id = $this->common->return_user_id($post['token']);
        //查看我审批过的项目的id 并去重
        $data = $this->admin->return_examine_admin_pass($admin_id['id']);
        $data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2002);
                break;
            default:
                $this->data->out(2001,$data);
            }
    }

    //审批审批单 shenpidan id12/21
    public function bool()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2018-11-28
         * @describe:  do function
         * ================
         */
        $post = $this->data->get_post();//获得post
        // $post = [
        //     'parent_id'=>'1',
        //     'examine_type'=>'1',
        //     'token'=>'qevQh36mj2',
        //     'note'=>'2333',
        //     'is_pass'=>'1'.
        
        // ];
        $post['examine_type'] = 1;
        //首先判断此条项目是不是已经被否决或者通过了
        $bool = $this->examine->bool($post['parent_id'],$post['examine_type']);

        if(!$bool){
            $this->data->out(3018);
        }
        //判断此人能不能审批这个
        $admin_id = $this->common->return_user_id($post['token']);

        $notes_id = $this->notes->have($post['parent_id'],$admin_id['id']);

        if(!$notes_id){
            $this->data->out(3016);
        }
        //判断是不是这个顺序到没到他审批
        $reach = $this->notes->reach($post['parent_id'],$admin_id['id']);
        if(!$reach){
            $this->data->out(3017);
        }
        // return var_dump($reach);die;
      
        //发送审批处理结果 记录至notes表
        $data = $this->notes->add($reach,$post['parent_id'],$post['examine_type'],$admin_id['id'],$post['note'],$post['pass']);
        $data?$cond = 0:$cond = 1;
        return var_dump($data);die;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out();
                break;
            default:
                $this->data->out();
            }
    }
}