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
 * @describe:  payment_state controller class
 * ================
 */
class state_controller
{
    private $data,$state;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        // $this->code = app::load_cont_class('common','user');//加载token
        //todo 加载相关模块
        $this->state = app::load_service_class('state_class', 'payment');//
    }
    /**
     * ================
     * @Author:        css
     * @Parameter:     
     * @DataTime:      2019-01-16
     * @Return:        
     * @Notes:         通过支出 pass 1>2
     * @ErrorReason:   
     * ================
     */
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
         $data = $this->state->pass($post['id']);
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
      * @Notes:         提交支出 submit 0>1
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
          $data = $this->state->submit($post['id']);
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
       * @Notes:         作废支出 cancel 1->-1
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
           $data = $this->state->cancel($post['id']);
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
        * @Notes:         删除支出 del 0>-2
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
            $data = $this->state->del($post['id']);
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
         * @Notes:         recall 撤回支出 1>0
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
             $data = $this->state->recall($post['id']);
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