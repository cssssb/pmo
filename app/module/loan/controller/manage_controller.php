<?php
namespace loan;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2019-01-15
 * @describe:  loan_manage controller class
 * ================
 */
class manage_controller
{
    private $data;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        // $this->code = app::load_cont_class('common','user');//加载token
        //todo 加载相关模块

        $this->loan = app::load_service_class('loan_class', 'loan');//
    }
    /**
     * ================
     * @Author:        css
     * @Parameter:     
     * @DataTime:      2019-01-15
     * @Return:        token
     * @Notes:         创建借款 loan/manage/add
     * @ErrorReason:   
     * ================
     */
     public function add()
     {
         /**
          * ================
          * @Author:    css
          * @ver:       
          * @DataTime:  2019-01-15
          * @describe:   function
          * ================
          */
         $post = $this->data->get_post();//获得post
         $post['token']?$token = $post['token']:true;
         $post['data']['loan_content']?$data['loan_content'] = $post['data']['loan_content']:true;//借款内容
         $post['data']['loan_fee']?$data['loan_fee'] = $post['data']['loan_fee']:true;//借款金额
         $post['data']['loan_describe']?$data['loan_describe'] = $post['data']['loan_describe']:true;//描述 注释
         $data = $this->loan->add($token,$data);
         $data?$cond = 0:$cond = 1;
         
         //开始输出
         switch ($cond) {
             case   1://异常1
                 $this->data->out(2004,[]);
                 break;
             default:
                 $this->data->out(2003,[]);
             }
     }
     
    
     /**
      * ================
      * @Author:        css
      * @Parameter:     token
      * @DataTime:      2019-01-15
      * @Return:        
      * @Notes:         查看我的借款 loan/manage/my_list
      * @ErrorReason:   
      * ================
      */
      public function my_list()
      {
          /**
           * ================
           * @Author:    css
           * @ver:       
           * @DataTime:  2019-01-15
           * @describe:  mylist function
           * ================
           */

          $post = $this->data->get_post();//获得post
          $data = $this->loan->my_list($post['token']);
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
      /**
       * ================
       * @Author:        css
       * @Parameter:     
       * @DataTime:      2019-01-15
       * @Return:        
       * @Notes:         查看指定借款id的的借款 loan/manage/by
       * @ErrorReason:   
       * ================
       */
      public function by()
      {
          /**
           * ================
           * @Author:    css
           * @ver:       
           * @DataTime:  2019-01-15
           * @describe:  by function
           * ================
           */
          $post = $this->data->get_post();//获得post
          $data = $this->loan->by($post['token'],$post['id']);
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
       
       
       /**
        * ================
        * @Author:        css
        * @Parameter:     token
        * @DataTime:      2019-01-15
        * @Return:        
        * @Notes:         查看部门借款 loan/manage/my_dep_list
        * @ErrorReason:   
        * ================
        */
        public function my_dep_list()
        {
            /**
             * ================
             * @Author:    css
             * @ver:       
             * @DataTime:  2019-01-15
             * @describe:  my_dep_list function
             * ================
             */
            $post = $this->data->get_post();//获得post
            $data = $this->loan->my_dep_list($post['token']);
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
             * @ver:       
             * @DataTime:  2019-01-15
             * @describe:  list function
             * ================
             */
            $data = $this->loan->list();
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


        /**
         * ================
         * @Author:        css
         * @Parameter:     
         * @DataTime:      2019-01-15
         * @Return:        
         * @Notes:         修改基础数据 loan/manage/edit
         * @ErrorReason:   
         * ================
         */
        //  public function test_utf8(){
        //      $a = '中文';
        //      $b = 'china';
        //      $c = ',';
        //      echo strlen($a);
        //      echo '</br>'.strlen($b);
        //      echo '</br>'.strlen($c);
        //  }
         public function edit()
         {
             /**
              * ================
              * @Author:    css
              * @ver:       
              * @DataTime:  2019-01-15
              * @describe:  edit function
              * ================
              */
             $post = $this->data->get_post();//获得post
             $post['data']['loan_content']?$data['loan_content'] = $post['data']['loan_content']:true;
             $post['data']['id']?$data['id'] = $post['data']['id']:true;
             $post['data']['loan_fee']?$data['loan_fee'] = $post['data']['loan_fee']:true;
             $post['data']['loan_describe']?$data['loan_describe'] = $post['data']['loan_describe']:true;
             $data = $this->loan->edit($data);
             $data?$cond = 0:$cond = 1;
             
             //开始输出
             switch ($cond) {
                 case   1://异常1
                     $this->data->out(2006,[]);
                     break;
                 default:
                     $this->data->out(2005,$data);
                 }
         }


         /**
          * ================
          * @Author:        css
          * @Parameter:     
          * @DataTime:      2019-01-15
          * @Return:        
          * @Notes:         修改PMO数据 修改基础数据 loan/manage/edit_loan_number
          * @ErrorReason:   
          * ================
          */
         public function edit_financial_number()
         {
             /**
              * ================
              * @Author:    css
              * @ver:       
              * @DataTime:  2019-01-15
              * @describe:  edit_loan_number function
              * ================
              */
             $post = $this->data->get_post();//获得post
             $data = $this->loan->edit_loan_number($post['id'],$post['loan_number'],$post['loan_describe']);
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
}