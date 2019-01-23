<?php
namespace examine;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2019-01-02
 * @describe:  examine_csv service class
 * ================
 */
final class csv_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('examine_project', 'examine');
    }
    public function admin_list_csv($data){
        $body_list = $this->model->new_admin_list($data);
        foreach($body_list as $k){
            $list[] = json_decode($k['data_field'],true);
            
        }
        // foreach($list as $k){
        //     if($k['examine_type']==1){
        //         $k['examine_type']='预算';
        //     }
        //     if($k['examine_type']==2){
        //         $k['examine_type']='决算';
        //     }
        // }
        // ["key"=>"unicode","value"=>"项目编号"],
        // ["key"=>"project_project_template_name","value"=>"部门"],
        // ["key"=>"examine_type","value"=>"预算/决算"],
        // ["key"=>"project_person_in_charge_name","value"=>"项目负责人"],
        // // ["key"=>"#######","value"=>"月份"],
        // ["key"=>"project_customer_name","value"=>"客户名称"],
        // ["key"=>"project_name","value"=>"课程名称"],
        // ["key"=>"project_training_numbers","value"=>"培训人数"],
        // ["key"=>"project_start_date","value"=>"开始日期"],
        // ["key"=>"project_end_date","value"=>"结束日期"],
        // ["key"=>"project_days","value"=>"授课天数"],
        // ["key"=>"project_training_ares_name","value"=>"开课地点"],
        // ["key"=>"travel_cost","value"=>"差旅费"],
        // ["key"=>"labor_cost","value"=>"讲师成本"],
        // ["key"=>"personal_consulting_fees","value"=>"个人咨询费"],
        // ["key"=>"institutional_consulting_fees","value"=>"企业咨询费"],
        // ["key"=>"conference_cost","value"=>"会议费"],
        // ["key"=>"material_cost","value"=>"教材费用"],
        // ["key"=>"equipment_cost","value"=>"设备费用"],
        // ["key"=>"examination_fee","value"=>"考试费"],
        // ["key"=>"tea_break","value"=>"茶歇"],
        // ["key"=>"stationery","value"=>"文具"],
        // ["key"=>"hospitality","value"=>"招待费"],
        // ["key"=>"postage","value"=>"邮寄快递"],
        // ["key"=>"project_tax_rate","value"=>"税"],
        // ["key"=>"costing","value"=>"成本合计"],
        // ["key"=>"expected_income","value"=>"收款"],
        // ["key"=>"project_profit","value"=>"利润"],
        // ["key"=>"gross_interest_rate","value"=>"毛利率"]
        $header_data = array(
            '项目编号',
            '预算/决算',
            '部门',
            '项目负责人',
            '月份',
            '客户名称',
            '课程名称',
            '培训人数',
            '开始日期',
            '结束日期',
            '授课天数',
            '开课地点',
            '差旅费',
            '讲师成本',
            '个人咨询费',
            '企业咨询费',
            '会议费',
            '教材费用',
            '设备费用',
            '考试费',
            '茶歇',
            '文具',
            '招待费',
            '邮寄快递',
            '税',
            '成本合计',
            '收款',
            '利润',
            '毛利率',
        );
        $file_name = date('Y-m-d', time())."导出审批.csv"; 
        return  $this->csv_class($list,$file_name,$header_data);
    }
    public function user_list_csv($id){
        $body_list = $this->model->user_body_list($id);
        foreach($body_list as $k){
            $list[] = json_decode($k['data_field'],true);
        }
        // foreach($list as $k){
        //     if($k['examine_type']==1){
        //         $k['examine_type']='预算';
        //     }
        //     if($k['examine_type']==2){
        //         $k['examine_type']='决算';
        //     }
        // }
        // ["key"=>"unicode","value"=>"项目编号"],
        // ["key"=>"project_project_template_name","value"=>"部门"],
        // ["key"=>"examine_type","value"=>"预算/决算"],
        // ["key"=>"project_person_in_charge_name","value"=>"项目负责人"],
        // // ["key"=>"#######","value"=>"月份"],
        // ["key"=>"project_customer_name","value"=>"客户名称"],
        // ["key"=>"project_name","value"=>"课程名称"],
        // ["key"=>"project_training_numbers","value"=>"培训人数"],
        // ["key"=>"project_start_date","value"=>"开始日期"],
        // ["key"=>"project_end_date","value"=>"结束日期"],
        // ["key"=>"project_days","value"=>"授课天数"],
        // ["key"=>"project_training_ares_name","value"=>"开课地点"],
        // ["key"=>"travel_cost","value"=>"差旅费"],
        // ["key"=>"labor_cost","value"=>"讲师成本"],
        // ["key"=>"personal_consulting_fees","value"=>"个人咨询费"],
        // ["key"=>"institutional_consulting_fees","value"=>"企业咨询费"],
        // ["key"=>"conference_cost","value"=>"会议费"],
        // ["key"=>"material_cost","value"=>"教材费用"],
        // ["key"=>"equipment_cost","value"=>"设备费用"],
        // ["key"=>"examination_fee","value"=>"考试费"],
        // ["key"=>"tea_break","value"=>"茶歇"],
        // ["key"=>"stationery","value"=>"文具"],
        // ["key"=>"hospitality","value"=>"招待费"],
        // ["key"=>"postage","value"=>"邮寄快递"],
        // ["key"=>"project_tax_rate","value"=>"税"],
        // ["key"=>"costing","value"=>"成本合计"],
        // ["key"=>"expected_income","value"=>"收款"],
        // ["key"=>"project_profit","value"=>"利润"],
        // ["key"=>"gross_interest_rate","value"=>"毛利率"]
        $header_data = array(
            '项目编号',
            '预算/决算',
            '部门',
            '项目负责人',
            '月份',
            '客户名称',
            '课程名称',
            '培训人数',
            '开始日期',
            '结束日期',
            '授课天数',
            '开课地点',
            '差旅费',
            '讲师成本',
            '个人咨询费',
            '企业咨询费',
            '会议费',
            '教材费用',
            '设备费用',
            '考试费',
            '茶歇',
            '文具',
            '招待费',
            '邮寄快递',
            '税',
            '成本合计',
            '收款',
            '利润',
            '毛利率',
        );
        $file_name = date('Y-m-d', time())."导出审批.csv"; 
        return  $this->csv_class($list,$file_name,$header_data);
    }
    private function csv_class($data,$file_name,$header_data)
    {    
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename='.$file_name);
        header('Cache-Control: max-age=1000');
        $fp = fopen('php://output', 'a');
        if (!empty($header_data)){
            foreach ($header_data as $key => $value) {
                 $header_data[$key] = iconv('utf-8', 'gbk', $value);
            }
            fputcsv($fp, $header_data);
        }
        $num = 0;
        //每隔$limit行，刷新一下输出buffer，不要太大，也不要太小
        $limit = 1000;
        //逐行取出数据，不浪费内存
        $count = count($data);
             if ($count > 0) {
                 for ($i = 0; $i < $count; $i++) {
                   $num++;
                     //刷新一下输出buffer，防止由于数据过多造成问题
                     if ($limit == $num) {
                         ob_flush();
                         flush();
                         $num = 0;
                     }
                     $row = $data[$i];
                     foreach ($row as $key => $value) {
                         $row[$key] = iconv('utf-8', 'gbk', $value);
                     }
                    fputcsv($fp, $row);
                 }
             }
        fclose($fp);
    }
}