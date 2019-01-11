<?php
namespace examine;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2018-12-14
 * @describe:  examine_examine_static service class
 * ================
 */
final class examine_static_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('examine_project', 'examine');
    }

    // public function add_static($parent_id,$examine_type,$token){
    //     $json['parent_id'] = $parent_id;
    //     
    //     $json['examine_type'] = $examine_type;
        
    //     return $this->model->update($json,true);
    // }
    
    public function edit_static($parent_id,$examine_type,$token='',$examine_id){
        //获取项目信息
        $unicode=app::load_service_class('project_class','project')->get_one($parent_id)['unicode'];
        $project_name = app::load_service_class('project_class','project')->project_name($parent_id);
        $data['project_list_data'] = json_decode(app::load_model_class('projectstatic','project')->get_one('parent_id ='.$parent_id)['data'],true);
        $data['project_get_one'] =app::load_service_class('project_class', 'project')->get_one_project($parent_id)[0];
            // $data[0]['project_training_ares_name'] = $this->address->connect($data[0]['project_training_ares_id']);
        if($data['project_get_one']['project_training_ares_id']!=null){
            $data['project_get_one']['project_training_ares_name'] = app::load_service_class('address_class', 'project')->connect($data['project_get_one']['project_training_ares_id']);
        }
            $data['lecturer_get_project']['lecturer'] = app::load_service_class('lecturer_plan_class', 'lecturer')
        ->model
        ->select_lecturer_get_project($parent_id);
        $data['lecturer_get_project']['project_name']=$project_name;
        $data['lecturer_get_project']['unicode']=$unicode;
        $data['implement_get_project']['project_name'] = $project_name;
        $data['implement_get_project']['unicode'] = $unicode;
        $implement = app::load_service_class('implement_plan_class', 'implement')
        ->model
        ->select('state=0 and parent_id='.$parent_id);
        $data['implement_get_project']['implement'] = $implement;
        $data['implement_get_project']['venue'] = app::load_service_class('implement_room_class','implement')
                                                  ->model       
                                                  ->select('parent_id='.$parent_id.' and state=0');
        $data['travel_get_project']['project_name'] = $project_name;
        $data['travel_get_project']['unicode'] = $unicode;
        $data['travel_get_project']['city'] = app::load_service_class('city_class', 'travel')->list_city($parent_id);
        $data['travel_get_project']['meal'] = app::load_service_class('meal_class', 'travel')->list_meal($parent_id);
        $data['travel_get_project']['province'] = app::load_service_class('province_class', 'travel')->list_province($parent_id);
        $data['travel_get_project']['stay'] = app::load_service_class('stay_class', 'travel')->list_stay($parent_id);
        $where['parent_id'] = $parent_id;
        $where['examine_type'] = $examine_type;
        $where['id'] = $examine_id;
        $json['version'] = $this->version($parent_id,$examine_type);
        if($token!=''){
        $json['user_name'] = app::load_service_class('common_class', 'examine')->return_staff_user_id($token)['name'];}
        
        $project_list_data = $data['project_list_data'];

        $month = substr($project_list_data['project_start_date'],5,2);
        $json['unicode'] = $data_field['unicode'] = $unicode;//项目编号
        if($examine_type==1){
            $json['examine_type_name'] = '预算';
        }
        if($examine_type==2){
            $json['examine_type_name'] = '决算';
        }
         $data_field['examine_type'] = $json['examine_type_name'];//预算决算
        $json['project_project_template_name'] = $data_field['project_project_template_name'] = $data['project_get_one']['project_project_template_name'];//部门
        $json['project_person_in_charge_name'] = $data_field['project_person_in_charge_name'] = $project_list_data['project_person_in_charge_name'];//项目负责人
        $json['month'] = $data_field['month'] = $month;//月份
        $json['project_customer_name'] = $data_field['project_customer_name'] = $project_list_data['project_customer_name'];//客户名称
        $json['project_name'] = $data_field['project_name'] = $project_list_data['project_name'];//课程名称
        $json['project_training_numbers'] = $data_field['project_training_numbers'] = $project_list_data['project_training_numbers'];//培训人数
        $json['project_start_date'] = $data_field['project_start_date'] = $project_list_data['project_start_date'];//开始日期
        $json['project_end_date'] = $data_field['project_end_date'] = $project_list_data['project_end_date'];//结束日期
        $json['project_days'] = $data_field['project_days'] = $project_list_data['project_days'];//授课天数
        $json['project_training_ares_name'] = $data_field['project_training_ares_name'] = $project_list_data['project_training_ares_name'];//开课地点
        $json['travel_cost'] = $data_field['travel_cost'] = $project_list_data['travel_cost'];//差旅费
        $json['labor_cost'] = $data_field['labor_cost'] = $project_list_data['labor_cost'];//讲师成本
        $json['personal_consulting_fees'] = $data_field['personal_consulting_fees'] = $project_list_data['personal_consulting_fees'];//个人咨询费
        $json['institutional_consulting_fees'] = $data_field['institutional_consulting_fees'] = $project_list_data['institutional_consulting_fees'];//企业咨询费
        $json['conference_cost'] = $data_field['conference_cost'] = $project_list_data['conference_cost'];//会议费
        $json['material_cost'] = $data_field['material_cost'] = $implement[0]['material_cost'];//教材费用
        $json['equipment_cost'] = $data_field['equipment_cost'] = $implement[0]['equipment_cost'];//设备费用
        $json['examination_fee'] = $data_field['examination_fee'] = $implement[0]['examination_fee'];//考试费
        $json['tea_break'] = $data_field['tea_break'] = $implement[0]['tea_break'];//茶歇
        $json['stationery'] = $data_field['stationery'] = $implement[0]['stationery'];//文具implement
        $json['hospitality'] = $data_field['hospitality'] = $implement[0]['hospitality'];//招待费
        $json['postage'] = $data_field['postage'] = $implement[0]['postage'];//邮寄快递
        $json['project_tax_rate'] = $data_field['project_tax_rate'] = $project_list_data['project_tax_rate'];//税
        $json['costing'] = $data_field['costing'] = $project_list_data['costing'];//成本合计
        $json['expected_income'] = $data_field['expected_income'] = $project_list_data['expected_income'];//收款
        $json['project_profit'] = $data_field['project_profit'] = $project_list_data['project_profit'];//利润
        $json['gross_interest_rate'] = $data_field['gross_interest_rate'] = $project_list_data['gross_interest_rate'];//毛利率
        
        $json['data_field'] = json_encode($data_field,JSON_UNESCAPED_UNICODE);
        $json['data'] = json_encode($data,JSON_UNESCAPED_UNICODE);

        return $this->model->update($json,$where);
    }

    //公共获取
    private function common_list($examine_type){
        $where['examine_type'] = $examine_type;
        $data = $this->model->select($where);
        foreach($data as $k=>$v){
              $list[] = json_decode($v['data'],JSON_FORCE_OBJECT);
        }
        return $list;
    }

    public function return_list($examine_type){
        $data = $this->common_list($examine_type);
        foreach($data as $k=>$v){
            $list[] = $v['project_list_data'];
        }
        //获取后来的
        $id_list= array();
        foreach($list as $key=> $val)
        {
            if(in_array($val['id'],$id_list))
            {
                unset($list[$k]);
            }else
            {
                $id_list[]=$val['id'];
            }
        }

        return $list;
    }

    private function common_one($parent_id,$examine_type){
        $where['parent_id'] = $parent_id;
        $where['examine_type'] = $examine_type;
        $data = $this->model->get_one($where,'*','id DESC');
        return json_decode($data['data'],JSON_FORCE_OBJECT);
    }
    public function project($parent_id,$examine_type){
        return $this->common_one($parent_id,$examine_type)['project_get_one'];
    }
    public function lecturer($parent_id,$examine_type){
        return $this->common_one($parent_id,$examine_type)['lecturer_get_project'];
        
    }
    public function implement($parent_id,$examine_type){
        return $this->common_one($parent_id,$examine_type)['implement_get_project'];
    }
    public function travel($parent_id,$examine_type){
        return $this->common_one($parent_id,$examine_type)['travel_get_project'];
    }
    private function version($parent_id,$examine_type){
        //查看提交的项目在数据库里有几个
        $where['parent_id'] = $parent_id;
        $where['examine_type'] = $examine_type;
        $number = $this->model->count($where);
        return ($number+1).'.0';
    }
    
}