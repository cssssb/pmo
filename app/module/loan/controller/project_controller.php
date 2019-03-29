<?php
namespace loan;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2019-01-16
 * @describe:  loan_project controller class
 * ================
 */
class project_controller
{
    private $data;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        // $this->code = app::load_cont_class('common','user');//加载token
        // $this->operation = app::load_service_class('operation_class','operation');//加载操作
        //todo 加载相关模块
        $this->project = app::load_service_class('project_class', 'loan');//
        $this->loan = app::load_service_class('loan_class', 'loan');//
        $this->loan_state = app::load_service_class('loan_state_class', 'loan');//
    }
    /**
     * ================
     * @Author:        css
     * @Parameter:     
     * @DataTime:      2019-01-29
     * @Return:        
     * @Notes:         查看项目关联的借款
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
         $data['loan'] = $this->project->list_by_project_id($post['id']);
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
     * @Notes:         关联多个借款到一个项目表
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
         $this->loan_state->loan_is_pass($post['loan_object_list']);
         $data = $this->project->add_ids($post['loan_object_list'],$post['project_id']);
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
     //关联一个借款到多个项目
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
        $this->loan_state->loan_is_pass($post['id']);
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
      * @Notes:         创建借款并关联项目
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
          $post['data']['loan_content']?$data['loan_content'] = $post['data']['loan_content']:true;//借款内容
          $post['data']['loan_price']?$data['loan_price'] = $post['data']['loan_price']:true;//借款金额
          $post['data']['loan_describe']?$data['loan_describe'] = $post['data']['loan_describe']:true;//描述 注释
          $loan_id = $this->loan->add($token,$data);
          $data = $this->project->add($loan_id,$post['data']['parent_id'],$data['loan_price']);
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
       * @Notes:         修改指定借款到项目的金额   判断金额
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
           $this->project->balance_a_project_is_associated_with_an_expenditure($post['relation_id'],$post['loan_price']);
           $data = $this->project->edit($post['relation_id'],$post['loan_price']);
           $this->project->edit_loan_surplus_relation_id($post['relation_id']);
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
        * @Notes:         取消借款和项目关联
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
          $data_head = [
            ["key"=> "id", "value"=> "借款ID","size"=>"5"],
            ["key"=> "loan_content", "value"=> "借款单内容","size"=>"5"],
            ["key"=> "loan_fee", "value"=> "借款单金额","size"=>"5"],
            ["key"=> "loan_number", "value"=> "借款财务编号","size"=>"6"],
            ["key"=> "unicode", "value"=> "关联项目编号","size"=>"6"],
            ["key"=> "project_name", "value"=> "关联项目名称","size"=>"6"],
            ["key"=> "loan_price", "value"=> "关联项目金额","size"=>"6"],
            ["key"=> "loan_user_name", "value"=> "领款人","size"=>"4"],
            ["key"=> "loan_describe", "value"=> "备注","size"=>"3"],
            ["key"=> "loan_state", "value"=> "借款状态","size"=>"5"],
            ];
        //    $post['query_condition']['loan_state'] = ['condition'=>'equal','query_data'=>'2'];

          //开始输出
          switch ($post['data_type']) {
            case   'page_json'://
                return $this->list_page_json($post,$data_head);
                  break;
            case   'json'://
                 return $this->list_json($post,$data_head);
                  break;
            case   'page_csv'://
                 return $this->list_csv($post,$data_head);
                  break;
             
              }
      }
      private function list_page_json($post,$data_head){
        $condition = $post['query_condition'];
        unset($condition['page_num'],$condition['page_size']);
        $condition['loan_state']['condition'] = 'more';
        $condition['loan_state']['query_data'] = 1;
        $data['data_body'] = $this->project->model->list_page_json($post['query_condition']['page_num']['query_data'],$post['query_condition']['page_size']['query_data'],$condition);
        foreach($data['data_body'] as &$k){
        switch ($k['loan_state']) {
            case '-2':
                $k['loan_state'] = '删除';
                break;
            case '-1':
                $k['loan_state'] = '作废';
                break;
            case '0':
                $k['loan_state'] = '未提交';
                break;
            case '1':
                $k['loan_state'] = '提交审批中';
                break;
            case '2':
                $k['loan_state'] = '通过';
                break;
                
            }
        }
        $data['count'] = $this->project->model->list_page_json_count($condition);
        $data?$cond = 0:$cond = 1;
        $data['page_num'] = $post['query_condition']['page_num']['query_data'];
        $data['page_size'] = $post['query_condition']['page_size']['query_data'];
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
       //!!!!!
       private function list_csv($post,$data_head){
        $condition = $post['query_condition'];
        unset($condition['page_num'],$condition['page_size']);
        $condition['loan_state']['condition'] = 'more';
        $condition['loan_state']['query_data'] = 1;
        $list = $this->project->model->list_page_json($post['query_condition']['page_num']['query_data'],$post['query_condition']['page_size']['query_data'],$condition);
        
        foreach($list as $k){
        switch ($k['loan_state']) {
            case '-2':
                $k['loan_state'] = '删除';
                break;
            case '-1':
                $k['loan_state'] = '作废';
                break;
            case '0':
                $k['loan_state'] = '未提交';
                break;
            case '1':
                $k['loan_state'] = '提交审批中';
                break;
            case '2':
                $k['loan_state'] = '通过';
                break;
                
            }
        }
        foreach($data_head as $k){
            $head[] = $k['value'];
            $data[] = $k['key'];
        }
        //只取出以一维数组的值为键值的二维数组的值
        foreach($list as $key=>$val){
            $a = array_keys($val);
            foreach($data as $k){
            if(in_array($k,$a)){
                $ass[$key][$k] = $val[$k];
            }
        }
    }
        $name = time();

       return  app::load_sys_class('csv_out')->csv_class($ass,$name,$head);
    }


      public function list_pass(){
        $post = $this->data->get_post();//获得post
        $data_head = [
            ["key"=> "id", "value"=> "借款ID","size"=>"5"],
            ["key"=> "loan_content", "value"=> "借款单内容","size"=>"5"],
            ["key"=> "loan_fee", "value"=> "借款单金额","size"=>"5"],
            ["key"=> "loan_number", "value"=> "借款财务编号","size"=>"6"],
            // ["key"=> "unicode", "value"=> "关联项目编号","size"=>"5"],
            // ["key"=> "project_name", "value"=> "关联项目名称","size"=>"5"],
            // ["key"=> "price", "value"=> "关联项目金额","size"=>"6"],
            ["key"=> "loan_user_name", "value"=> "领款人","size"=>"4"],
            ["key"=> "loan_describe", "value"=> "备注","size"=>"3"],
            ["key"=> "loan_state", "value"=> "借款状态","size"=>"5"],
            ];
        //开始输出
        switch ($post['data_type']) {
          case   'page_json'://
              return $this->list_page_pass($post,$data_head);
                break;
          case   'json'://
               return $this->list_pass_json($post,$data_head);
                break;
          case   'page_csv'://
               return $this->list_pass_csv($post,$data_head);
                break;
            default:
                $this->data->out();
            }
      }
     private function list_pass_csv($post,$data_head){
        $condition = $post['query_condition'];
        unset($condition['page_num'],$condition['page_size']);
        // $list = $this->loan->list_pass($condition);
        $condition['loan_state'] = ['condition'=>'equal','query_data'=>'2'];
        $list = $this->loan->model->select_list_pass($post['query_condition']['page_num']['query_data'],$post['query_condition']['page_size']['query_data'],$condition);
        
        foreach($list as &$k){
            if($k['loan_state']=='2'){
                $k['loan_state']='通过';
            }
        }
        foreach($data_head as $k){
            $head[] = $k['value'];
            $data[] = $k['key'];
        }
         //只取出以一维数组的值为键值的二维数组的值
         foreach($list as $key=>$val){
            $a = array_keys($val);
            foreach($data as $k){
            if(in_array($k,$a)){
                $ass[$key][$k] = $val[$k];
            }
        }}
        $name = time();

        return  app::load_sys_class('csv_out')->csv_class($ass,$name,$head);
    }
      private function list_page_pass($post,$data_head)
      {
          /**
           * ================
           * @Author:    css
           * @ver:       1.0
           * @DataTime:  2019-02-20
           * @describe:  list_pass function
           * ================
           */
           $condition = $post['query_condition'];
           $condition['loan_state'] = ['condition'=>'equal','query_data'=>'2'];
        unset($condition['page_num'],$condition['page_size']);
        $data['data_body'] = $this->loan->model->select_list_pass($post['query_condition']['page_num']['query_data'],$post['query_condition']['page_size']['query_data'],$condition);

          foreach($data['data_body'] as &$k){
            switch ($k['loan_state']) {
                case '2':
                    $k['loan_state'] = '通过';
                    break;
          }}

          $data['count'] = $this->loan->model->list_pass_count($condition);
          $data?$cond = 0:$cond = 1;
          $data['page_num'] = $post['query_condition']['page_num']['query_data'];
          $data['page_size'] = $post['query_condition']['page_size']['query_data'];

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

      private function list_json($post,$data_head){
        $post['query_condition']['page_num']?$page_num = $post['query_condition']['page_num']['query_data']:$page_num=1;
            $post['query_condition']['page_size']?$page_size = $post['query_condition']['page_size']['query_data']:$page_size=20;
            $data['body'] = $this->project->list($post['token'],$page_num,$page_size);
            $data['data_head'] = $data_head;
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
     
}