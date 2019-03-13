<?php
namespace import;

//namespace 模块名
use \app;
use menu\data_controller;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2019-03-05
 * @describe:  import_import service class
 * ================
 */
final class import_class
{
    public function __construct()
    {

		$this->project = app::load_service_class('project_class', 'project');//加载项目大表
        $this->model = app::load_model_class('import_execl', 'import');
        $this->project_header = app::load_model_class('project', 'project');
		$this->project_body = app::load_model_class('body', 'project');
		$this->project_static = app::load_model_class('projectstatic', 'project');
        $this->examine_project = app::load_model_class('examine_project', 'examine');
		$this->implement_plan = app::load_model_class('implement_plan', 'implement');
		$this->implement_room = app::load_model_class('implement_room', 'implement');
		$this->lecturer_plan = app::load_model_class('lecturer_plan', 'lecturer');
        $this->travel_city = app::load_model_class('city_cost', 'travel');//差旅表
        $this->travel_meal = app::load_model_class('meal', 'travel');
        $this->travel_province = app::load_model_class('province_cost', 'travel');
		$this->travel_stay = app::load_model_class('stay_cost', 'travel');
        // $this-> = app::load_model_class('staff_user', 'user');
        $this->address = app::load_model_class('address','project');
        $this->static = app::load_service_class('static_class','project');//加载列表json
        $this->user = app::load_model_class('user','user');//加载列表json
        $this->staff_user = \app::load_model_class('staff', 'staff');
        
		$this->implement = app::load_service_class('implement_plan_class', 'implement');//加载实施安排
		$this->room = app::load_service_class('implement_room_class', 'implement');//加载会场
        $this->examine_static = app::load_service_class('examine_static_class', 'examine');//加载会场
        $this->lecturer = app::load_model_class('lecturer','lecturer');//讲师表
        
    }
    public function analysis(){
        $list = $this->model->select(1);
    //    return $list;
        $bool = $this->manage($list);
        return $bool;
    }
    private function manage($data){
        foreach($data as $k){
            if($k['state']=='决算'){
        $project_header = $this->project_header($k);//数据源表
        $project_body = $this->project_body($k,$project_header);//详细数据表
        $implement_plan = $this->implement_plan($k,$project_header);//实施费用表
        $implement_room = $this->implement_room($k,$project_header);//会议室费用表
        $lecturer_plan = $this->lecturer_plan($k,$project_header);//讲师安排表
        $travel_city = $this->travel_city($k,$project_header);//市内交通表
        $travel_meal = $this->travel_meal($k,$project_header);//餐费表
        $travel_province = $this->travel_province($k,$project_header);//长途交通
        $travel_stay = $this->travel_stay($k,$project_header);//住宿表
        $project_state = $this->project_static($project_header);//静态json表
        $examine_project = $this->examine_project($k,$project_header);//审批项目集合表,提交预决算后生成的静态json
    }else{
        $examine_project = $this->examine_project($k);//审批项目集合表,提交预决算后生成的静态json

    }
    }
    return true;
    }
    //通过姓名获取id
    private function staff_user_id($name){
        $where['name'] = $name;
        $id = $this->staff_user->get_one($where)['id'];
        if($id==true){
            return $id;
        }else{
            $data['name'] = $name;
            $data['quit'] = '0';
            $id = $this->staff_user->insert($data,true);
            return $id;
        }
    }
    //通过地址 返回id  或者 添加地址返回id
    private function project_training_ares($ares){
        $where['name'] = $ares;
        $ares_id=$this->address->get_one($where)['id'];
        if($ares_id==true){
            return $ares_id;
        }
        $id = $this->address->insert($where,true);
        return $id;
    }
    private function add_user_id($name){
        $where['username'] = $name;
        $id = $this->user->get_one($where)['id'];
       if($id==true){
        return $id;}
        return 0;
    }
    //数据源表
    private function project_header($list){
    //   id                    项目id       *
    //   progam_id             所属项目集id *
    //   project_leader_id     项目负责人id*
    //   staff_id              实施负责人id*
    //   template_id           项目模板id?
    
    //   budget_id             预算表id?
    //   time                  添加时间*
    //   unicode               项目编号*
    
        switch ($list['department']) {
            case '行业培训部':
                $data['template_id'] = 1;
                break;
            case '公共培训部';
                $data['template_id'] = 2;
                break;
            default:
                $data['template_id'] = 3;
                break;
        }
        $data['project_leader_id'] = $this->staff_user_id($list['project_leader']);
        $data['staff_id'] = $this->staff_user_id($list['project_leader']);
        $data['add_user_id'] = $this->add_user_id($list['project_leader']);
        $data['time'] = date('Y-m-d',time());
        $data['unicode'] = $list['unicode'];
        return $this->project_header->insert($data,true);
    }
    private function project_body($list,$parent_id){
        // project_name            项目名称
        // parent_id               项目id
        // project_customer_name   客户名称
        // project_days            培训天数
        // project_date            培训日期
        // project_start_date      开始时间
        // project_end_date        结束时间
        // project_training_numbers培训人数
        // project_training_ares   培训地点
        // project_income          收入
        // project_tax_rate        税金
        // institutional_consulting_fees   机构咨询费
        // personal_consulting_fees        个人咨询费
        $data['project_name'] = $list['course_name'];
        $data['project_customer_name'] = $list['customer_name']; 
        $data['project_days'] = $list['number_data'];
        $data['project_date'] = $list['start_data'];
        //把9.23改为09.23；
        // strpos($list['end_data'],'.')==2?true:$list['end_data']='0'.$list['end_data'];
        // strpos($list['start_data'],'.')==2?true:$list['start_data']='0'.$list['start_data'];
        // $data['project_end_date'] = substr($list['unicode'],0,4).'-'.preg_replace("/[.]/","-",$list['end_data']);
        // $data['project_start_date'] = substr($list['unicode'],0,4).'-'.preg_replace("/[.]/","-",$list['start_data']);
        $data['project_end_date'] = $list['end_data'];
        $data['project_start_date'] = $list['start_data'];
        
        $data['project_training_numbers'] = $list['number_of_trainees'];
        // $data['project_training_ares'] = $this->project_training_ares($list['class_city']);
        $data['project_income'] = $list['all_income'];
        $data['project_tax_rate'] = $list['tax'];
        $data['institutional_consulting_fees'] = $list['provinces_cooperation_fee'];
        $data['personal_consulting_fees'] = $list['cooperation_fee'];
        $data['parent_id'] = $parent_id;
        return $this->project_body->insert($data);
    }
   

    private function implement_plan($list,$parent_id){
        // id
        // venue_fee                           会场费
        // material_and_equipment_cost         教材与设备费用
        // examination_fee                     考试费
        // tea_break                           茶歇
        // stationery                          文具
        // hospitality                         招待费
        // postage                             快递费
        // parent_id                           项目id
        // state
        // time
        // material_cost                       教材费
        // equipment_cost                      设备费用
        $data['parent_id'] = $parent_id;
        $data['examination_fee'] = $list['examination_fee'];
        $data['tea_break'] = $list['tea_break'];
        $data['stationery'] = $list['stationery'];
        $data['material_cost'] = $list['rental_fee'];
        $data['postage'] = $list['entertainment_expenses'];
        // $data['equipment_cost'] = $list['meeting_fee'];
        return $this->implement_plan->insert($data);

    }
    private function implement_room($list,$parent_id){
        // id
        // room_number                 会议室编号
        // unit_price                  单价
        // days                        天数
        // total_price                 总价
        // meetingplace_name
        // meetingplace_address        会场地址
        // time
        // state
        // parent_id                   项目id
        $data['parent_id'] = $parent_id;
        $data['total_price'] = $list['meeting_fee'];
        return $this->implement_room->insert($data);
    }
    // private function lecturer_plan($list,$parent_id){
    //     // id
    //     // parent_id               项目id
    //     // lecturer_id             讲师表id（暂时没用）
    //     // tax                     税
    //     // fee                     讲课费
    //     // day                     讲课天数
    //     // duty_id                 职责id
    //     // state
    //     // time

    //     $data['parent_id'] = $parent_id;
    //     if($list['full_time_lecturer_name']!=='无'){
    //         $lecturer_name = $list['full_time_lecturer_name'];}else{
    //             if(strstr($list['part_time_lecturer_name'],'、')==true){
    //         $lecturer_name = substr($list['part_time_lecturer_name'],0,strrpos($a,'、'));}else{
    //             $lecturer_name  = $list['part_time_lecturer_name'];
    //         }}
    //     $lecturer_id = $this->get_lecturer_id($lecturer_name);
    //     $data['lecturer_id'] = $lecturer_id;
    //     $data['duty_id'] = 1;
    //     $data['tax'] = $list['part_time_lecturer_tax'];
    //     $data['day'] = $list['number_data'];
    //     $data['fee'] = $list['all_lecturer_fee'];
    //     return $this->lecturer_plan->insert($data);
        
    // }
    private function lecturer_plan($list,$parent_id){
        // id
        // parent_id               项目id
        // lecturer_id             讲师表id（暂时没用）
        // tax                     税
        // fee                     讲课费
        // day                     讲课天数
        // duty_id                 职责id
        // state
        // time

        $data['parent_id'] = $parent_id;
        if($list['full_time_lecturer_name']==true){
            $this->add_full_time_lecturer_name($parent_id,$list['part_time_lecturer_tax'],$list['number_data'],$list['all_lecturer_fee'],$list['full_time_lecturer_name']);
        }
        if($list['part_time_lecturer_name']==true){
            $this->add_part_time_lecturer_name($parent_id,$list['part_time_lecturer_name']);
        }
        return true;
    }
    private function add_part_time_lecturer_name($parent_id,$part_time_lecturer_name){
        strstr($part_time_lecturer_name,',')?$data = explode(',',$part_time_lecturer_name):$data[0]=$part_time_lecturer_name;
        $project_data['parent_id'] = $parent_id;
        foreach($data as $k){
            $project_data['lecturer_id'] = $this->get_lecturer_id($k);
            $this->lecturer_plan->insert($project_data);
        }
        return true;
    }
    private function add_full_time_lecturer_name($parent_id,$tax,$number_data,$fee,$lecturer_name){
        $data['parent_id'] = $parent_id;
        $data['tax'] = $tax;
        $data['day'] = $number_data;
        $fee == '无'?$data['fee'] = 0:$data['fee']=$fee;
        // $data['fee'] = $fee;
        $data['lecturer_id'] = $this->get_lecturer_id($lecturer_name);
        return $this->lecturer_plan->insert($data);
    }
    private function get_lecturer_id($lecturer_name){
        $where['name'] = $lecturer_name;
        $id = $this->lecturer->get_one($where)['id'];
        if($id!=true){
            $id = $this->lecturer->insert($where,true);
        }
        return $id;
    }
    private function travel_city($list,$parent_id){
        // id                      
        // short_fee_card_people       人员
        // short_fee_type              费用名称
        // short_fee                   费用
        // parent_id                   项目id
        // now_time
        // state
        $data['short_fee'] = $list['intra_city_transportation_charges'];
        $data['parent_id'] = $parent_id;
        return $this->travel_city->insert($data);
    }
    
    private function travel_meal($list,$parent_id){
        // id
        // meal_fee            金额
        // meal_fee_days       天数
        // meal_fee_people_id
        // meal_fee_remarks    备注
        // parent_id           项目id
        // state
        $data['parent_id'] = $parent_id;
        $data['meal_fee'] = $list['entertainment_expenses'];
        return $this->travel_meal->insert($data);
    }
    private function travel_province($list,$parent_id){
        // id
        // long_fee_card_people            人员姓名
        // long_fee_card_start_time        出发时间
        // long_fee_card_start_place       出发地点
        // long_fee_card_end_time          结束时间
        // long_fee_card_end_place         结束地点
        // state
        // parent_id
        // now_time
        // long_fee_card_fee               费用
        // long_fee_card_vehicle_name
        // long_fee_card_vehicle_id
        // mail_fee                        邮寄费用
        $data['parent_id'] = $parent_id;
        $data['long_fee_card_fee'] = $list['travel_expenses'];
        return $this->travel_province->insert($data);
    }
    private function travel_stay($list,$parent_id){
        // id
        // hotel_expense_people        住宿费人姓名
        // hotel_expense_days          天数
        // hotel_expense_total         总价
        // parent_id                   项目id
        // state
        // now_time
        $data['parent_id'] = $parent_id;
        $data['hotel_expense_total'] = $list['entertainment_expenses'];
        return $this->travel_stay->insert($data);
    }

    /**
     * ================
     * @Author:        css
     * @Parameter:     
     * @DataTime:      2019-03-06
     * @Return:        
     * @Notes:         生成静态页面的json数据
     * @ErrorReason:   
     * ================
     */
    private function project_static($parent_id=null){
    //id 
    // parent_id           项目id
    // data                项目json
    // user_id             项目创建人的id
    if($parent_id==true){
        return $this->static->add_project_final($parent_id);
    }else{
        return true;
    }
}
   
    /**
     * ================
     * @Author:        css
     * @Parameter:     
     * @DataTime:      2019-03-06
     * @Return:        
     * @Notes:         生成审批静态页面的json数据
     * @ErrorReason:   
     * ================
     */
private function examine_project($list,$parent_id=null){
    // id
    // parent_id                                项目id
    // examine_type                             审批类型
    // apply_user                               申请人
    // apply_time                              提交申请时间
    // state                                   是否作废0为在审批1为已通过 -1为未通过
    // time
    // data_field['']                              静态数据字段
    // data                                    静态数据
    // version                                 版本号
    // user_name                               提交人姓名
    // unicode                                 项目编号
    // examine_type_name                       预算或决算
    // project_project_template_name           部门
    // project_person_in_charge_name           项目负责人
    // month                                   月份
    // project_customer_name                   客户名称
    // project_name                            课程名称
    // project_training_numbers                培训人数
    // project_start_date                      开始日期
    // project_end_date                        结束日期
    // project_days                            授课天数
    // project_training_ares_name              开课地点
    // travel_cost                             差旅费
    // labor_cost                              讲师成本
    // personal_consulting_fees                个人咨询费
    // institutional_consulting_fees           企业咨询费
    // conference_cost                         会议费
    // material_cost                           教材费用
    // equipment_cost                          设备费用
    // examination_fee                         考试费
    // tea_break                               茶歇
    // stationery                              文具
    // hospitality                             招待费
    // postage                                 邮寄快递
    // project_tax_rate                        税金
    // costing                                 成本合计
    // expected_income                         收款
    // project_profit                          利润
    // gross_interest_rate                     毛利率
    if($parent_id==true){
        $data['parent_id'] = $parent_id;
        $data['time'] = date('Y-m-d H:i:s',time());
        $data['examine_type'] = 2;

        $examine_id = $this->examine_static->model->insert($data,true);
        $data = $this->examine_static->edit_static($parent_id,2,'',$examine_id);
    }else{
        return $this->budget_json_2($list);
    }
    
}
private function budget_json($list){
    $final_data['parent_id'] = $this->project_header->select(1,'*','id desc','0,1')[0]['id']+1;
    $data['id'] = $final_data['parent_id'];
    $data['project_name'] = $list[''];//
    $data['project_gather_id'] = $list[''];//
    $data['project_person_in_charge_id'] = $list[''];//
    $data['project_project_template_id'] = $list[''];//
    $data['project_training_ares_id'] = $list[''];//
    $data['project_customer_name'] = $list[''];//
    $data['project_days'] = $list[''];//
    $data['project_start_date'] = $list[''];//
    $data['project_end_date'] = $list[''];//
    $data['project_training_numbers'] = $list[''];//
    $data['project_leader_name'] = $list[''];//
    $data['project_leader_id'] = $list[''];//
    $data['project_person_in_charge_name'] = $list[''];//
    $data['project_gather_name'] = $list[''];//
    $data['project_project_template_name'] = $list[''];//
    $data['province'] = $list[''];//
    $data['city'] = $list[''];//
    $data['address'] = $list[''];//
    $data['project_income'] = $list[''];//
    $data['project_tax_rate'] = $list[''];//
    $data['institutional_consulting_fees'] = $list[''];//
    $data['personal_consulting_fees'] = $list[''];//
    $data['unicode'] = $list[''];//
    $data['project_traing_ares']['province'] =null;
    $data['project_traing_ares']['city'] = null;
    $data['project_traing_ares']['address'] = $list[''];//
    $data['project_date']['start'] = $list[''];//
    $data['project_date']['end'] = $list[''];//
    $data['labor_cost'] = $list[''];//
    $data['implementation_cost'] = $list[''];//
    $data['conference_cost'] = $list[''];//
    $data['stay'] = $list[''];//
    $data['meal'] = $list[''];//
    $data['travel_cost'] = $list[''];//
    $data['lecturer'] = $this->project->list_lecturer($final_data['parent_id']);
    $data['lecturers'] = $this->project->list_lecturer($final_data['parent_id']);
    $data['implement'] = $this->implement->get_one($final_data['parent_id']);
    $data['venue'] = $this->room->get_project($final_data['parent_id']);
    $data['consulting_cost'] = $list[''];//
    $data['costing'] = $list[''];//
    $data['expected_income'] = $list[''];//
    $data['examine']['budget']['step'] = $list[''];//
    $data['project_profit'] = $list[''];//
    $data['project_profit'] = $list[''];//
    $data['project_profit'] = $list[''];//
    $data['project_profit'] = $list[''];//
    $data['project_profit'] = $list[''];//
    $data['project_profit'] = $list[''];//
    $data['project_profit'] = $list[''];//
    $data['project_profit'] = $list[''];//
}
    public function budget_json_2($list){
         //获取项目信息
         $unicode=$list['unicode'];
         $project_name =$list['course_name'];
         $data['project_list_data'] = $this->project_list_data($list);
         $data['project_get_one'] = null;
         $data['lecturer_get_project'] = $this->lecturer_get_project($list);
         $data['implement_get_project'] = $this->implement_get_project($list);
         $data['travel_get_project'] = $this->travel_get_project($list);
         $json['version'] = 'v1.0';
         $json['unicode']=$data_field['unicode'] = $list['unicode'];//项目编号
         $json['examine_type_name'] = '预算';
         $json['project_project_template_name'] = $list['department'];
         $json['project_person_in_charge_name'] = $list['project_leader'];
         $json['month'] = $list['month'];//月份

         $json['project_customer_name']=$data_field['project_customer_name'] = $list['customer_name'];//客户名称
         $json['project_name']=$data_field['project_name'] = $list['course_name'];//课程名称
         $json['project_training_numbers']=$data_field['project_training_numbers'] = 0;//培训人数
         $json['project_start_date'] =$data_field['project_start_date']= $list['start_data'];//开始日期
         $json['project_end_date'] =$data_field['project_end_date']= $list['end_data'];//结束日期
         $json['project_days']=$data_field['project_days'] = '0';//授课天数
         $json['project_training_ares_name']=$data_field['project_training_ares_name'] = $list['class_city'];//开课地点
         $json['travel_cost'] =$data_field['travel_cost']= $list['travel_expenses'];//差旅费
         $json['labor_cost'] =$data_field['labor_cost']= $list['all_lecturer_fee'];//讲师成本
         $json['personal_consulting_fees'] =$data_field['personal_consulting_fees']= $list['cooperation_fee'];//个人咨询费
         $json['institutional_consulting_fees'] =$data_field['institutional_consulting_fees']= $list['provinces_cooperation_fee'];//企业咨询费
         $json['conference_cost'] =$data_field['conference_cost']= $list['meeting_fee'];//会议费
         $json['material_cost']=$data_field['material_cost']= $list['rental_fee'];//教材费用
         $json['equipment_cost'] =$data_field['equipment_cost']= $list['rental_fee'];//设备费用
         $json['examination_fee'] =$data_field['examination_fee']= $list['examination_fee'];//考试费
         $json['tea_break'] =$data_field['tea_break']= $list['tea_break'];//茶歇
         $json['stationery'] =$data_field['stationery']= $list['office_expenses'];//文具implement
         $json['hospitality'] =$data_field['hospitality']= $list['entertainment_expenses'];//招待费
         $json['postage']=$data_field['postage'] = $list['other'];//邮寄快递
         $json['project_tax_rate'] =$data_field['project_tax_rate']= $list['tax'];//税
         $json['costing'] =$data_field['costing']= $list['all_cost'];//成本合计
         $json['expected_income'] =$data_field['expected_income']= $list['all_income'];//收款
         $json['project_profit'] =$data_field['project_profit']= $list['profit'];//利润
         $json['gross_interest_rate'] =$data_field['gross_interest_rate']= $list['profit'];//毛利率
         
         $json['data_field'] = json_encode($data_field,JSON_UNESCAPED_UNICODE);
         $json['data'] = json_encode($data,JSON_UNESCAPED_UNICODE);
        return $this->examine_project->insert($json);
    }
    private function project_list_data($list){
        $data['id'] = '0';
        $data['project_name'] = $list['course_name'];
        $data['project_gather_id'] = '0';
        $data['project_person_in_charge_id'] = '0';
        $data['project_project_template_id'] = '0';
        $data['project_training_ares_id'] = '0';
        $data['project_customer_name'] = $list['customer_name'];
        $data['project_days'] = '0';
        $data['project_start_date'] = $list['start_data'];
        $data['project_end_date'] = $list['end_data'];
        $data['project_training_numbers'] = '0';
        $data['project_leader_name'] = $list['project_leader'];
        $data['project_leader_id'] = '0';
        $data['project_person_in_charge_name'] = $list['project_leader'];
        $data['project_gather_name'] = $list['customer_name'];
        $data['project_project_template_name'] = $list['department'];
        $data['province'] = 0;
        $data['city'] = 0;
        $data['address'] = $list['class_city'];
        $data['project_income'] = $list['all_income'];
        $data['project_tax_rate'] = $list['tax'];
        $data['institutional_consulting_fees'] = $list['provinces_cooperation_fee'];
        $data['personal_consulting_fees'] = $list['cooperation_fee'];
        $data['unicode'] = $list['unicode'];
        $data['project_training_ares_name'] = $list['class_city'];
        $data['project_traing_ares']['province'] = '';
        $data['project_traing_ares']['city'] = '';
        $data['project_traing_ares']['address'] = $list['class_city'];
        $data['project_date']['start'] = $list['start_data'];
        $data['project_date']['ebd'] = $list['end_data'];
        $data['labor_cost'] = 0;
        $data['implementation_cost'] = 0;
        $data['conference_cost'] = 0;
        $data['stay'] = 0;
        $data['meal'] = 0;
        $data['travel_cost'] = 0;
        $data['lecturer'] = [];
        $data['implement'] = null;
        $data['venue'] = [];
        $data['consulting_cost'] = 0;
        $data['costing'] = 0;
        $data['expected_income'] = '';
        $data['project_profit'] = 0;
        $data['gross_interest_rate'] = '';
        $data['examine']['budget']['step'] = [];
        $data['examine']['budget']['state'] = "0";
        $data['examine']['finalAccounts']['step'] = [];
        $data['examine']['finalAccounts']['state'] = "0";
        return $data;
    }
    private function lecturer_get_project($list){
        $data['lecturer'] =[];
        $data['project_name'] =$list['course_name'];
        $data['unicode'] =$list['unicode'];
        return $data;
    }
    private function implement_get_project($list){
        $data['implement']['id'] = null;
        $data['implement']['examination_fee'] = null;
        $data['implement']['tea_break'] = null;
        $data['implement']['stationery'] = null;
        $data['implement']['hospitality'] = null;
        $data['implement']['postage'] = null;
        $data['implement']['parent_id'] = null;
        $data['implement']['state'] = null;
        $data['implement']['time'] = null;
        $data['implement']['material_cost'] = null;
        $data['implement']['equipment_cost'] = null;
        $data['venue'] = [];
        $data['project_name'] =$list['course_name'];
        $data['unicode'] =$list['unicode'];
        return $data;
    }
    private function travel_get_project($list){
        $data['travel_get_project']['project_name'] = $list['course_name'];
        $data['travel_get_project']['unicode'] = $list['unicode'];
        $data['travel_get_project']['city'] = [];
        $data['travel_get_project']['meal'] = [];
        $data['travel_get_project']['province'] = [];
        $data['travel_get_project']['stay'] = [];
        return $data;
    }

   
}