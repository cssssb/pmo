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
 * @describe:  loan_loan_state controller class
 * ================
 */
class loan_state_controller
{
    private $data,$loan_state;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        // $this->code = app::load_cont_class('common','user');//加载token
        //todo 加载相关模块
        $this->loan_state = app::load_service_class('loan_state_class', 'loan');//
    }
    /**
     * ================
     * @Author:        css
     * @Parameter:     
     * @DataTime:      2019-01-16
     * @Return:        
     * @Notes:         通过借款 pass 1>2
     * @ErrorReason:   
     * ================
     */
     public function sql(){
         return $this->loan_state->model->sql();
     }
     public function pass()
     {
         /**
          * ================
          * @Author:    css
          * @ver:       1.0
          * @DataTime:  2019-01-16
          * @describe:  pass function
          * ================
          */
         $post = $this->data->get_post();//获得post
         $data = $this->loan_state->pass($post['id']);
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
     public function pass_many()
     {
         /**
          * ================
          * @Author:    css
          * @ver:       
          * @DataTime:  2019-01-17
          * @describe:  pass_many function
          * ================
          */
         $post = $this->data->get_post();//获得post
         $data = $this->loan_state->pass_many($post['ids']);;
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
      * @Notes:         提交借款 submit 0>1
      * @ErrorReason:   
      * ================
      */
      public function submit()
      {
          /**
           * ================
           * @Author:    css
           * @ver:       1.0
           * @DataTime:  2019-01-16
           * @describe:  submit function
           * ================
           */
          $post = $this->data->get_post();//获得post
          $data = $this->loan_state->submit($post['id']);
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
      public function submit_many()
      {
          /**
           * ================
           * @Author:    css
           * @ver:       1.0
           * @DataTime:  2019-01-16
           * @describe:  submit function
           * ================
           */
          $post = $this->data->get_post();//获得post
          $data = $this->loan_state->submit_many($post['ids']);
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
       * @Notes:         作废借款 cancel 1->-1
       * @ErrorReason:   
       * ================
       */
       public function cancel()
       {
           /**
            * ================
            * @Author:    css
            * @ver:       1.0
            * @DataTime:  2019-01-16
            * @describe:  cancel function
            * ================
            */
           $post = $this->data->get_post();//获得post
           $data = $this->loan_state->cancel($post['id']);
           $data?$cond = 0:$cond = 1;
           
           //开始输出
           switch ($cond) {
               case   1://异常1
                   $this->data->out(2013);
                   break;
               default:
                   $this->data->out(2012);
               }
       }
       public function cancel_many()
       {
           /**
            * ================
            * @Author:    css
            * @ver:       1.0
            * @DataTime:  2019-01-16
            * @describe:  cancel function
            * ================
            */
           $post = $this->data->get_post();//获得post
           $data = $this->loan_state->cancel_many($post['ids']);
           $data?$cond = 0:$cond = 1;
           
           //开始输出
           switch ($cond) {
               case   1://异常1
                   $this->data->out(2013);
                   break;
               default:
                   $this->data->out(2012);
               }
       }
       /**
        * ================
        * @Author:        css
        * @Parameter:     
        * @DataTime:      2019-01-16
        * @Return:        
        * @Notes:         删除借款 del 0>-2
        * @ErrorReason:   
        * ================
        */
        public function del()
        {
            /**
             * ================
             * @Author:    css
             * @ver:       1.0
             * @DataTime:  2019-01-16
             * @describe:  del function
             * ================
             */
            $post = $this->data->get_post();//获得post
            $data = $this->loan_state->del($post['id']);
            $data?$cond = 0:$cond = 1;
            
            //开始输出
            switch ($cond) {
                case   1://异常1
                    $this->data->out(2013);
                    break;
                default:
                    $this->data->out(2012);
                }
        }
        public function del_many()
        {
            /**
             * ================
             * @Author:    css
             * @ver:       1.0
             * @DataTime:  2019-01-16
             * @describe:  del function
             * ================
             */
            $post = $this->data->get_post();//获得post
            $data = $this->loan_state->del_many($post['ids']);
            $data?$cond = 0:$cond = 1;
            
            //开始输出
            switch ($cond) {
                case   1://异常1
                    $this->data->out(2013);
                    break;
                default:
                    $this->data->out(2012);
                }
        }
        /**
         * ================
         * @Author:        css
         * @Parameter:     
         * @DataTime:      2019-01-16
         * @Return:        
         * @Notes:         recall 撤回借款 1>0
         * @ErrorReason:   
         * ================
         */
         public function recall()
         {
             /**
              * ================
              * @Author:    css
              * @ver:       1.0
              * @DataTime:  2019-01-16
              * @describe:  recall function
              * ================
              */
             $post = $this->data->get_post();//获得post
             $data = $this->loan_state->recall($post['id']);
             $data?$cond = 0:$cond = 1;
             
             //开始输出
             switch ($cond) {
                 case   1://异常1
                     $this->data->out(2013);
                     break;
                 default:
                     $this->data->out(2012);
                 }
         }
         public function recall_many()
         {
             /**
              * ================
              * @Author:    css
              * @ver:       1.0
              * @DataTime:  2019-01-16
              * @describe:  recall function
              * ================
              */
             $post = $this->data->get_post();//获得post
             $data = $this->loan_state->recall_many($post['ids']);
             $data?$cond = 0:$cond = 1;
             
             //开始输出
             switch ($cond) {
                 case   1://异常1
                     $this->data->out(2013);
                     break;
                 default:
                     $this->data->out(2012);
                 }
         }
}