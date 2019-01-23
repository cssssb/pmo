<?php
namespace examine;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2018-12-27
 * @describe:  examine_record controller class
 * ================
 */
class record_controller
{
    private $data,$record;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        // $this->code = app::load_cont_class('common','user');//加载token
        $this->operation = app::load_service_class('operation_class','operation');//加载操作
        //todo 加载相关模块
        $this->examine = app::load_service_class('examine_project_class', 'examine');//
        $this->common = app::load_service_class('common_class', 'examine');//
        $this->csv = app::load_service_class('csv_class', 'examine');//
    }
    //普通用户list
    public function userlist()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2019-01-02
         * @describe:  userlist function
         * ================
         */
        $post = $this->data->get_post();//获得post
        //获取token判断是哪个id
        $id = $this->common->return_user_id($post['token']);

        // $id['id'] = 10;
        //搜索条件
        $post['query_condition']['unicode']?$unicode = $post['query_condition']['unicode']:$unicode=null;
        $post['query_condition']['project_person_in_charge_name']?$project_person_in_charge_name = $post['query_condition']['project_person_in_charge_name']:$project_person_in_charge_name=null;
        $post['query_condition']['project_project_template_name']?$project_project_template_name = $post['query_condition']['project_project_template_name']:$project_project_template_name=null;
        $post['query_condition']['page_num']?$page_num = $post['query_condition']['page_num']:$page_num=1;
        $post['query_condition']['page_size']?$page_size = $post['query_condition']['page_size']:$page_size=100;
        // $unicode = '201901';

            $list = $this->examine->model->select_user_list($id['id'],$unicode,$project_person_in_charge_name,$project_project_template_name,$page_num,$page_size);
            $data['data_body'] = $list;
            $data_head = $this->data_hade();
        $data['data_head'] = app::load_sys_class('length')->return_length($data['data_body'],$data_head);
            $data['page_num'] = $page_num;
            $data['page_size'] = $page_size;
            $data['count'] = $this->examine->model->select_user_count($id['id'])[0]['count(*)'];
        $data?$cond = 0:$cond = 1;
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2002,[]);
                break;
            default:
                $this->data->out(2001,$data);
            }
    }

    //审批者接口
    public function adminlist()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       
         * @DataTime:  2019-01-21
         * @describe:  adminlist function
         * ================
         */
        $post = $this->data->get_post();//获得post
        
        switch ($post['data_type']){
            case 'page_json'://
                $this->adminlist_page_json($post);
                break;
            case 'json'://
                $this->adminlist_json($post);
                break;
            case 'page_csv':
            $this->admincsv($post);
            break;
            default:
                $this->data->out(2001);
            }
    }
    public function adminlist_page_json($post)
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2019-01-21
         * @describe:  adminlist function
         * ================
         */
        $data['data_body'] = $this->examine->model->new_admin_list($post);
        $data_head = $this->data_hade();
        $data['data_head'] = app::load_sys_class('length')->return_length($data['data_body'],$data_head);
        $data['page_num'] = $post['query_condition']['page_num']['query_data'];
        $data['page_size'] = $post['query_condition']['page_size']['query_data'];
        $data['count'] = $this->examine->model->new_admin_list($post,1)[0]['count(*)'];
        $data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2002,[]);
                break;
            default:
                $this->data->out(2001,$data);
            }
    }
    public function adminlist_json($post)
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2018-12-27
         * @describe:  list function xx审批过的项目
         * ================
         */
        //获取token 判断是哪个id
        // $id = $this->common->return_user_id($post['token']);
        // $id['id'] = 10;
        // $page_num = $post['page_num'];
        // $page_size = $post['page_size'];
        $post['query_condition']['unicode']?$unicode = $post['query_condition']['unicode']:$unicode=null;
        $post['query_condition']['project_person_in_charge_name']?$project_person_in_charge_name = $post['query_condition']['project_person_in_charge_name']:$project_person_in_charge_name=null;
        $post['query_condition']['project_project_template_name']?$project_project_template_name = $post['query_condition']['project_project_template_name']:$project_project_template_name=null;
        $post['query_condition']['page_num']?$page_num = $post['query_condition']['page_num']:$page_num=1;
        $post['query_condition']['page_size']?$page_size = $post['query_condition']['page_size']:$page_size=100;

        $admin_list = $this->examine->model->record_list($unicode,$project_person_in_charge_name,$project_project_template_name,$page_num,$page_size);
        $data['data_body'] = $admin_list;
        $data_head = $this->data_hade();
        $data['data_head'] = app::load_sys_class('length')->return_length($data['data_body'],$data_head);
        $data['page_num'] = $page_num;
        $data['page_size'] = $page_size;
        $data['count'] = $this->examine->model->record_count()[0]['count(*)'];
        // $data['data_body'] = $this->examine->data_body($id['id']);
        $data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2002,[]);
                break;
            default:
                $this->data->out(2001,$data);
            }
    }
    public function admincsv()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2019-01-02
         * @describe:  csv function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $id = $this->common->return_user_id($post['token']);
        // $id['id'] = 10;
         $this->csv->admin_list_csv($post);
       
    }
    public function usercsv()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2019-01-03
         * @describe:  usercsv function
         * ================
         */
        $post = $this->data->get_post();//获得post
        // $id = $this->common->return_user_id($post['token']);
        $id['id'] = '30';
        $data = $this->csv->user_list_csv($id['id']);
    }
    public function data_hade(){
        $data = [
           ["key"=>"unicode","value"=>"项目编号","size"=>"5"],
           ["key"=>"project_project_template_name","value"=>"项目模板","size"=>"5"],
           ["key"=>"examine_type","value"=>"预算/决算","size"=>"5"],
           ["key"=>"project_person_in_charge_name","value"=>"项目负责人","size"=>"6"],
           ["key"=>"month","value"=>"月份","size"=>"3"],
           ["key"=>"project_customer_name","value"=>"客户名称","size"=>"5"],
           ["key"=>"project_name","value"=>"课程名称","size"=>"5"],
           ["key"=>"project_training_numbers","value"=>"培训人数","size"=>"5"],
           ["key"=>"project_start_date","value"=>"开始日期","size"=>"5"],
           ["key"=>"project_end_date","value"=>"结束日期","size"=>"5"],
           ["key"=>"project_days","value"=>"授课天数","size"=>"5"],
           ["key"=>"project_training_ares_name","value"=>"开课地点","size"=>"5"],
           ["key"=>"travel_cost","value"=>"差旅费","size"=>"4"],
           ["key"=>"labor_cost","value"=>"讲师成本","size"=>"5"],
           ["key"=>"personal_consulting_fees","value"=>"个人咨询费","size"=>"5"],
           ["key"=>"institutional_consulting_fees","value"=>"企业咨询费","size"=>"6"],
           ["key"=>"conference_cost","value"=>"会议费","size"=>"4"],
           ["key"=>"material_cost","value"=>"教材费用","size"=>"5"],
           ["key"=>"equipment_cost","value"=>"设备费用","size"=>"5"],
           ["key"=>"examination_fee","value"=>"考试费","size"=>"4"],
           ["key"=>"tea_break","value"=>"茶歇","size"=>"3"],
           ["key"=>"stationery","value"=>"文具","size"=>"3"],
           ["key"=>"hospitality","value"=>"招待费","size"=>"4"],
           ["key"=>"postage","value"=>"邮寄快递","size"=>"5"],
           ["key"=>"project_tax_rate","value"=>"税","size"=>"2"],
           ["key"=>"costing","value"=>"成本合计","size"=>"5"],
           ["key"=>"expected_income","value"=>"收款","size"=>"3"],
           ["key"=>"project_profit","value"=>"利润","size"=>"3"],
           ["key"=>"gross_interest_rate","value"=>"毛利率","size"=>"4"]
        ];
        return $data;
    }
}