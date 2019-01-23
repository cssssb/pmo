<?php
namespace examine;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       
 * @DataTime:  2018-11-02
 * @describe:  examine_examine_project service class
 * ================
 */
final class examine_project_class
{
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        $this->model = app::load_model_class('examine_project', 'examine');
        $this->fee = app::load_model_class('examine_project_fee', 'examine');
        $this->user = app::load_model_class('user', 'user');
    }
    



    public function state_examine($parent_id,$examine_type){
        $where['parent_id'] = $parent_id;
        $where['examine_type'] = $examine_type;
        $data = $this->model->get_one($where,'*','id DESC');
        return $data['state'];
    }
    public function del_examine($parent_id,$examine_type){
        $where['parent_id'] = $parent_id;
        $where['examine_type'] = $examine_type;
        $data = $this->model->get_one($where,'*','id DESC');
        return  $this->model->delete('id='.$data['id']);
         
    }
   
    /**
     * ================
     * @Author:        css
     * @Parameter:     record_list
     * @DataTime:      2018-12-27
     * @Return:        data
     * @Notes:         返回历史审批记录
     * @ErrorReason:   
     * ================
     */
     public function record_list2($id){
         $data = $this->common($id);
         foreach($data as $k){
             $list[] = $k['project_list_data'];
         }
         return $list;
     }
     public function select_user_list2($user_id,$page_num='1',$page_size='100'){
         $data = $this->model->select_user_list($user_id,$page_num,$page_size);
         foreach($data as $k){
             $list[] = json_decode($k['data_field'],true);
         }
         return $list;
     }
     public function record_list3($id,$page_num='1',$page_size='100'){
         $data = $this->model->record_list($id,$page_num,$page_size);
         foreach($data as $k){
             $list[] = json_decode($k['data_field'],true);
         }
         return $list;
     }
     public function data_body($id){
         $data = $this->record_list($id);
     }
    //数据模板
     public function data_hade(){
         $data = [
            ["key"=>"unicode","value"=>"项目编号","size"=>"6"],
            ["key"=>"project_project_template_name","value"=>"项目模板","size"=>"2"],
            ["key"=>"examine_type","value"=>"预算/决算","size"=>"1"],
            ["key"=>"project_person_in_charge_name","value"=>"项目负责人","size"=>"2"],
            ["key"=>"month","value"=>"月份","size"=>"1"],
            ["key"=>"project_customer_name","value"=>"客户名称","size"=>"2"],
            ["key"=>"project_name","value"=>"课程名称","size"=>"20"],
            ["key"=>"project_training_numbers","value"=>"培训人数","size"=>"1"],
            ["key"=>"project_start_date","value"=>"开始日期","size"=>"2"],
            ["key"=>"project_end_date","value"=>"结束日期","size"=>"2"],
            ["key"=>"project_days","value"=>"授课天数","size"=>"1"],
            ["key"=>"project_training_ares_name","value"=>"开课地点","size"=>"3"],
            ["key"=>"travel_cost","value"=>"差旅费","size"=>"1"],
            ["key"=>"labor_cost","value"=>"讲师成本","size"=>"1"],
            ["key"=>"personal_consulting_fees","value"=>"个人咨询费","size"=>"1"],
            ["key"=>"institutional_consulting_fees","value"=>"企业咨询费","size"=>"1"],
            ["key"=>"conference_cost","value"=>"会议费","size"=>"1"],
            ["key"=>"material_cost","value"=>"教材费用","size"=>"1"],
            ["key"=>"equipment_cost","value"=>"设备费用","size"=>"1"],
            ["key"=>"examination_fee","value"=>"考试费","size"=>"1"],
            ["key"=>"tea_break","value"=>"茶歇","size"=>"1"],
            ["key"=>"stationery","value"=>"文具","size"=>"1"],
            ["key"=>"hospitality","value"=>"招待费","size"=>"1"],
            ["key"=>"postage","value"=>"邮寄快递","size"=>"1"],
            ["key"=>"project_tax_rate","value"=>"税","size"=>"1"],
            ["key"=>"costing","value"=>"成本合计","size"=>"1"],
            ["key"=>"expected_income","value"=>"收款","size"=>"1"],
            ["key"=>"project_profit","value"=>"利润","size"=>"1"],
            ["key"=>"gross_interest_rate","value"=>"毛利率","size"=>"1"]
         ];
         return $data;
     }
    /**
     * ================
     * @Author:        css
     * @Parameter:     is_examining
     * @DataTime:      2018-12-21
     * @Return:        int
     * @Notes:         是否已经发送审批 返回审批项目状态字段 如果没有此审批字段返回int值4
     * @ErrorReason:   
     * ================
     */
     public function is_send_examine($parent_id,$examine_type){
         $where ="parent_id = $parent_id and state in(0,1) and examine_type = $examine_type";//存在待审批或已通过
        $data = $this->model->get_one($where);
        if($data){
            return true;
        }else{
        return false;}
     }
     public function is_send_examine_final($parent_id,$examine_type){
        $where ="parent_id = $parent_id and state in(0,1) and examine_type = 1";//存在待审批或已通过
       $data = $this->model->get_one($where);
       if($data){
           return true;
       }else{
       return false;}
    }
     /**
     * ================
     * @Author:        css
     * @Parameter:     commit
     * @DataTime:      2018-11-05
     * @Return:        bool
     * @Notes:         添加项目至examine_project表中
     * @ErrorReason:   null
     * ================
     */
    public function commit($parent_id,$token,$examine_type,$flow_id){
        /*
            提交人并不为点击提交预算者。
            是项目的项目经理
           先不修改
        */
        $where['token'] = $token;
        $username = $this->user->get_one($where);
        $model['apply_user'] = $username['id'];

        //apply_user是项目负责人的id
        // $model['apply_user'] = app::load_model_class('project', 'project')->get_one_project($parent_id)[0]['project_leader_id'];
        $model['time'] = date('Y-m-d H:i:s',time());
        $model['parent_id'] = $parent_id;
        $model['examine_type'] = $examine_type;
        return $this->model->insert($model,true);
    }
  
  
    /**
     * ================
     * @Author:        css
     * @Parameter:     commit
     * @DataTime:      2018-11-05
     * @Return:        bool
     * @Notes:         把钱数添加至静态表
     * @ErrorReason:   null
     * ================
     */
    public function add_fee($data,$parent_id){
        $data['parent_id'] = $parent_id;
        return $this->fee->insert($data);
    }
   
    public function bool($parent_id,$examine_type){
        $where['parent_id'] = $parent_id;
        $where['examine_type'] = $examine_type;
        $data = $this->model->get_one($where,'*','id DESC');
        if($data['state']!=1 && $data['state']!=2){
            return true;
        }
        return false;
    }
    // public function budget_state($id){
    //     $type=1;
    //     $array = [
    //         "0"=>[ "key"=>'0',"value"=>'正在审批中'],
    //         "1"=>[ "key"=>'1',"value"=>'审批通过'],
    //         "-1"=>[ "key"=>'-1',"value"=>'未通过'],
    //         ];
    //     return $array[$this->model->examine_state($id,$type)];
    // }
    // public function final_account_state($id){
    //     $type=2;
    //     return $this->model->examine_state($id,$type);
    // }
    public function is_budget_examining($parent_id,$examine_type=1){
        $where['parent_id'] = $parent_id;
        $where['examine_type'] = $examine_type;
        $data = $this->model->get_one($where);
        if(isset($data['state']) && $data['state']==0 ){
            return true;
        }
        return false;
    }
    public function is_final_account_examining($parent_id,$examine_type=2){
        $where['parent_id'] = $parent_id;
        $where['examine_type'] = $examine_type;
        $data = $this->model->get_one($where);
        if(isset($data['state']) && ($data['state']==0 || $data['state']==1 ) ){
            return true;
        }
        return false;
    }
}