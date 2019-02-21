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
        // $this->code = app::load_cont_class('common','user');//加载token
        // $this->operation = app::load_service_class('operation_class','operation');//加载操作
        //todo 加载相关模块
        $this->project = app::load_service_class('project_class', 'payment');//
        $this->payment = app::load_service_class('payment_class', 'payment');//
        $this->state = app::load_service_class('state_class', 'payment');//
    }
    /**
     * ================
     * @Author:        css
     * @Parameter:     
     * @DataTime:      2019-01-29
     * @Return:        
     * @Notes:         查看项目关联的支出
     * @ErrorReason:   
     * ================
     */
     public function list_by_project_id()
     {
         /**
          * ================
          * @Author:    css
          * @ver:       1.0
          * @DataTime:  2019-01-29
          * @describe:  list_by_project_id function
          * ================
          */
         $post = $this->data->get_post();//获得post
         $data['payment'] = $this->project->list_by_project_id($post['id']);
         $data?$cond = 0:$cond = 1;
         $data['unicode'] = $this->project->get_project_unicode($post['id']);
         $data['project_name'] = $this->project->get_project_project_name($post['id']);
         
         //开始输出
         switch ($cond) {
             case   1://异常1
                 $this->data->out(2002,[]);
                 break;
             default:
                 $this->data->out(2001,$data);
             }
     }
    /**
     * ================
     * @Author:        css
     * @Parameter:     
     * @DataTime:      2019-01-16
     * @Return:        
     * @Notes:         关联多个支出到一个项目表
     * @ErrorReason:   
     * ================
     */
     public function add_ids_by_project()
     {
         /**
          * ================
          * @Author:    css
          * @ver:       
          * @DataTime:  2019-01-24
          * @describe:  add_ids function
          * ================
          */
         $post = $this->data->get_post();//获得post
         //验证状态
         $this->state->payment_is_pass($post['payment_object_list']);
         $data = $this->project->add_ids($post['payment_object_list'],$post['project_id']);
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
     //关联一个支出到多个项目
    public function add_projects_by_id()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       
         * @DataTime:  2019-01-24
         * @describe:   function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $this->state->payment_is_pass($post['id']);
        $data = $this->project->add_project_ids($post['id'],$post['project_object_list']);
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
      * @DataTime:      2019-01-25
      * @Return:        
      * @Notes:         创建支出并关联项目
      * @ErrorReason:   
      * ================
      */
      public function add_by_price()
      {
          /**
           * ================
           * @Author:    css
           * @ver:       
           * @DataTime:  2019-01-25
           * @describe:  add_by_price function
           * ================
           */
          $post = $this->data->get_post();//获得post
          $post['token']?$token = $post['token']:true;
          $post['data']['item_content']?$data['item_content'] = $post['data']['item_content']:true;//支出内容
          $post['data']['amount']?$data['amount'] = $post['data']['amount']:true;//支出金额
          $post['data']['describe']?$data['describe'] = $post['data']['describe']:true;//描述 注释
          $payment_id = $this->payment->add($token,$data);
          $data = $this->project->add($payment_id,$post['data']['parent_id'],$data['amount']);
          $data?$cond = 0:$cond = 1;
          
          //开始输出
          switch ($cond) {
              case   1://异常1
                  $this->data->out(2004,[]);
                  break;
              default:
                  $this->data->out(2003,$data);
              }
      }
      /**
       * ================
       * @Author:        css
       * @Parameter:     
       * @DataTime:      2019-01-25
       * @Return:        
       * @Notes:         修改指定支出到项目的金额   判断金额
       * @ErrorReason:   
       * ================
       */
       public function edit()
       {
           /**
            * ================
            * @Author:    css
            * @ver:       1.0
            * @DataTime:  2019-01-25
            * @describe:  edit function
            * ================
            */
           $post = $this->data->get_post();//获得post
           //判断金额
           $this->project->balance_a_project_is_associated_with_an_expenditure($post['relation_id'],$post['price']);
           $data = $this->project->edit($post['relation_id'],$post['price']);
           $data?$cond = 0:$cond = 1;
           
           //开始输出
           switch ($cond) {
               case   1://异常1
                   $this->data->out(2006,[]);
                   break;
               default:
                   $this->data->out(2005,[]);
               }
       }
       /**
        * ================
        * @Author:        css
        * @Parameter:     
        * @DataTime:      2019-01-25
        * @Return:        
        * @Notes:         取消支出和项目关联
        * @ErrorReason:   
        * ================
        */
        public function cancel()
        {
            /**
             * ================
             * @Author:    css
             * @ver:       1.0
             * @DataTime:  2019-01-25
             * @describe:  cancel function
             * ================
             */
            $post = $this->data->get_post();//获得post
            $data = $this->project->cancel($post['relation_id'],$post['project_id']);
            $data?$cond = 0:$cond = 1;
            
            //开始输出
            switch ($cond) {
                case   1://异常1
                    $this->data->out(2013,[]);
                    break;
                default:
                    $this->data->out(2012,[]);
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
            case   'page_json'://
                return $this->list_page_json($post);
                  break;
            case   'json'://
                 return $this->list_json($post);
                  break;
            case   'page_csv'://
                 return $this->list_csv($post);
                  break;
              default:
                  $this->data->out();
              }
      }
      public function list_pass()
      {
          /**
           * ================
           * @Author:    css
           * @ver:       1.0
           * @DataTime:  2019-02-20
           * @describe:  list_pass function
           * ================
           */
          $post = $this->data->get_post();//获得post
          $offset = $post['query_condition']['page_size']['query_data']*($post['query_condition']['page_num']['query_data']-1);
          $limit = $offset.','.$post['query_condition']['page_size']['query_data'];
          $data['data_body'] = $this->payment->list_pass($limit);

          foreach($data['data_body'] as &$k){
            switch ($k['state']) {
                case '2':
                    $k['state'] = '通过';
                    break;
          }}

          $data['count'] = $this->payment->list_pass_count();
          $data?$cond = 0:$cond = 1;
          $data['page_num'] = $post['query_condition']['page_num']['query_data'];
          $data['page_size'] = $post['query_condition']['page_size']['query_data'];

          $data_head = [
            ["key"=> "id", "value"=> "系统编号","size"=>"5"],
            ["key"=> "financial_number", "value"=> "财务编号","size"=>"5"],
            ["key"=> "item_content", "value"=> "支出内容","size"=>"5"],
            ["key"=> "amount", "value"=> "支出总金额","size"=>"5"],
            ["key"=> "payee_name", "value"=> "领款人","size"=>"4"],
            ["key"=> "describe", "value"=> "备注","size"=>"3"],
            ["key"=> "state", "value"=> "支出状态","size"=>"5"],
            ];
            $data['data_head'] = app::load_sys_class('length')->return_length($data['data_body'],$data_head);
            //开始输出
            switch ($cond) {
                case   1://异常1
                    $this->data->out(2002,[]);
                    break;
                default:
                    $this->data->out(2001,$data);
                }
      }
      private function list_page_json($post,$where=null){
            $data['data_body'] = $this->project->model->list_page_json($post['query_condition']['page_num']['query_data'],$post['query_condition']['page_size']['query_data'],$where);
            foreach($data['data_body'] as &$k){
            switch ($k['state']) {
                case '-2':
                    $k['state'] = '删除';
                    break;
                case '-1':
                    $k['state'] = '作废';
                    break;
                case '0':
                    $k['state'] = '作废';
                    break;
                case '1':
                    $k['state'] = '提交审批中';
                    break;
                case '2':
                    $k['state'] = '通过';
                    break;
                    
                }
            }
            $data['count'] = $this->project->model->list_page_json_count($where);
            $data?$cond = 0:$cond = 1;
            $data['page_num'] = $post['query_condition']['page_num']['query_data'];
            $data['page_size'] = $post['query_condition']['page_size']['query_data'];
            $data_head = [
                ["key"=> "id", "value"=> "系统编号","size"=>"5"],
                ["key"=> "financial_number", "value"=> "财务编号","size"=>"5"],
                ["key"=> "unicode", "value"=> "项目编号","size"=>"5"],
                ["key"=> "project_name", "value"=> "项目名称","size"=>"5"],
                ["key"=> "item_content", "value"=> "支出内容","size"=>"5"],
                ["key"=> "amount", "value"=> "支出总金额","size"=>"5"],
                ["key"=> "price", "value"=> "支出金额","size"=>"5"],
                ["key"=> "payee_name", "value"=> "领款人","size"=>"4"],
                ["key"=> "describe", "value"=> "备注","size"=>"3"],
                ["key"=> "state", "value"=> "支出状态","size"=>"5"],
                ];
            $data['data_head'] = app::load_sys_class('length')->return_length($data['data_body'],$data_head);
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
      public function list_csv($post){
         $data = $this->project->list_csv($post);
        //    $this->data->out(2001,$data);
      }
}