<?php
namespace payment;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2019-01-16
 * @describe:  payment_project controller class
 * ================
 */
class project_controller
{
    private $data,$project;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        $this->code = app::load_cont_class('common','user');//加载token
        $this->operation = app::load_service_class('operation_class','operation');//加载操作
        //todo 加载相关模块
        $this->project = app::load_service_class('project_class', 'payment');//
    }
    /**
     * ================
     * @Author:        css
     * @Parameter:     
     * @DataTime:      2019-01-16
     * @Return:        
     * @Notes:         关联支出到项目表
     * @ErrorReason:   
     * ================
     */
     public function add()
     {
         /**
          * ================
          * @Author:    css
          * @ver:       1.0
          * @DataTime:  2019-01-16
          * @describe:  add function
          * ================
          */
         $post = $this->data->get_post();//获得post
         $data = $this->project->add($post['id'],$post['project_id']);
         $data?$cond = 0:$cond = 1;
         
         //开始输出
         switch ($cond) {
             case   1://异常1
                 $this->data->out(2004);
                 break;
             default:
                 $this->data->out(2003);
             }
     }

     /**
      * ================
      * @Author:        css
      * @Parameter:     
      * @DataTime:      2019-01-16
      * @Return:        
      * @Notes:         查看所有支出和其所属项目
      * @ErrorReason:   
      * ================
      */
      public function list2()
      {
          /**
           * ================
           * @Author:    css
           * @ver:       1.0
           * @DataTime:  2019-01-16
           * @describe:  list function
           * ================
           */
        //    $post['query_condition']['unicode']?$unicode = $post['query_condition']['unicode']:$unicode=null;
        //    $post['query_condition']['project_person_in_charge_name']?$project_person_in_charge_name = $post['query_condition']['project_person_in_charge_name']:$project_person_in_charge_name=null;
        //    $post['query_condition']['project_project_template_name']?$project_project_template_name = $post['query_condition']['project_project_template_name']:$project_project_template_name=null;
        //    $post['query_condition']['page_num']?$page_num = $post['query_condition']['page_num']:$page_num=1;
        //    $post['query_condition']['page_size']?$page_size = $post['query_condition']['page_size']:$page_size=100;
   
        //    $admin_list = $this->examine->model->record_list($unicode,$project_person_in_charge_name,$project_project_template_name,$page_num,$page_size);
        //    $data['data_body'] = $admin_list;
        //    $data['data_head'] = $this->examine->data_hade();
        //    $data['page_num'] = $page_num;
        //    $data['page_size'] = $page_size;
        //    $data['count'] = $this->examine->model->record_count()[0]['count(*)'];
        //    // $data['data_body'] = $this->examine->data_body($id['id']);
        //    $data?$cond = 0:$cond = 1;


            $post = $this->data->get_post();//获得post
            $post['query_condition']['page_num']?$page_num = $post['query_condition']['page_num']:$page_num=1;
            $post['query_condition']['page_size']?$page_size = $post['query_condition']['page_size']:$page_size=20;
            $data = $this->project->list($post['token'],$page_num,$page_size);
            $data['data_head'] = [
                ["key"=> "id", "value"=> "系统编号"],
                ["key"=> "financial_number", "value"=> "财务编号"],
                ["key"=> "unicode", "value"=> "项目编号"],
                ["key"=> "project_name", "value"=> "项目名称"],
                ["key"=> "item_content", "value"=> "支出内容"],
                ["key"=> "amount", "value"=> "支出金额"],
                ["key"=> "payee_name", "value"=> "领款人"]
                ];
            // $data['page_num'] = 1;
            // $data['page_size'] = 20;
            // $data['count'] = 20;
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
      public function list()
      {
          /**
           * ================
           * @Author:    css
           * @ver:       1.0
           * @DataTime:  2019-01-21
           * @describe:  list function
           * ================
           */
          $post = $this->data->get_post();//获得post
          
          //开始输出
          switch ($post['data_type']) {
            case   'page_json'://异常1
                  $this->list_page_json($post);
                  break;
            case   'json'://异常1
                  $this->list_json($post);
                  break;
            case   'csv'://异常1
                  $this->list_csv($post);
                  break;
              default:
                  $this->data->out();
              }
      }
      private function list_page_json($post){
            $data['data_body'] = $this->project->model->list_page_json($post);
            $data['count'] = $this->project->model->list_page_json($post,1)[0]['count(*)'];
            $data?$cond = 0:$cond = 1;
            $data['page_num'] = $post['query_condition']['page_num']['query_data'];
            $data['page_size'] = $post['query_condition']['page_size']['query_data'];
            $data['data_head'] = [
                ["key"=> "id", "value"=> "系统编号","size"=>"5"],
                ["key"=> "financial_number", "value"=> "财务编号","size"=>"5"],
                ["key"=> "unicode", "value"=> "项目编号","size"=>"5"],
                ["key"=> "project_name", "value"=> "项目名称","size"=>"5"],
                ["key"=> "item_content", "value"=> "支出内容","size"=>"5"],
                ["key"=> "amount", "value"=> "支出金额","size"=>"5"],
                ["key"=> "payee_name", "value"=> "领款人","size"=>"5"]
                ];
          //开始输出
          switch ($cond) {
              case   1://异常1
                  $this->data->out(2002,[]);
                  break;
              default:
                  $this->data->out(2001,$data);
              }
      }
      private function list_json($post){
        $post['query_condition']['page_num']?$page_num = $post['query_condition']['page_num']['query_data']:$page_num=1;
            $post['query_condition']['page_size']?$page_size = $post['query_condition']['page_size']['query_data']:$page_size=20;
            $data['body'] = $this->project->list($post['token'],$page_num,$page_size);
            $data['data_head'] = [
                ["key"=> "id", "value"=> "系统编号"],
                ["key"=> "financial_number", "value"=> "财务编号"],
                ["key"=> "unicode", "value"=> "项目编号"],
                ["key"=> "project_name", "value"=> "项目名称"],
                ["key"=> "item_content", "value"=> "支出内容"],
                ["key"=> "amount", "value"=> "支出金额"],
                ["key"=> "payee_name", "value"=> "领款人"]
                ];
            // $data['page_num'] = 1;
            // $data['page_size'] = 20;
            // $data['count'] = 20;
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
      private function list_csv($post){

      }
}