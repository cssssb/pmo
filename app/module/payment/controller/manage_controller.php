<?php
namespace payment;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2019-01-15
 * @describe:  payment_manage controller class
 * ================
 */
class manage_controller
{
    private $data,$manage;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        // $this->code = app::load_cont_class('common','user');//加载token
        //todo 加载相关模块
        $this->payment = app::load_service_class('payment_class', 'payment');//
    }
    /**
     * ================
     * @Author:        css
     * @Parameter:     
     * @DataTime:      2019-01-15
     * @Return:        token
     * @Notes:         创建支出 payment/manage/add
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
         $post['data']['item_content']?$data['item_content'] = $post['data']['item_content']:true;//支出内容
         $post['data']['amount']?$data['amount'] = $post['data']['amount']:true;//支出金额
         $data = $this->payment->add($token,$data);
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
      * @Parameter:     token
      * @DataTime:      2019-01-15
      * @Return:        
      * @Notes:         查看我的支出 payment/manage/my_list
      * @ErrorReason:   
      * ================
      */
      public function mylist()
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
          $data = $this->payment->mylist($post['token']);
          $data?$cond = 0:$cond = 1;
          
          //开始输出
          switch ($cond) {
              case   1://异常1
                  $this->data->out(2002);
                  break;
              default:
                  $this->data->out(2001);
              }
      }
      /**
       * ================
       * @Author:        css
       * @Parameter:     
       * @DataTime:      2019-01-15
       * @Return:        
       * @Notes:         查看指定支出id的的支出 payment/manage/by
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
          $data = $this->payment->by($post['token'],$post['id']);
          $data?$cond = 0:$cond = 1;
          
          //开始输出
          switch ($cond) {
              case   1://异常1
                  $this->data->out(2002);
                  break;
              default:
                  $this->data->out(2001);
              }
      }
       
       
       /**
        * ================
        * @Author:        css
        * @Parameter:     token
        * @DataTime:      2019-01-15
        * @Return:        
        * @Notes:         查看部门支出 payment/manage/my_dep_list
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
            $data = $this->payment->my_dep_list($post['token']);
            $data?$cond = 0:$cond = 1;
            
            //开始输出
            switch ($cond) {
                case   1://异常1
                    $this->data->out(2002);
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
         * @Notes:         查看所有支出 payment/manage/list
         * @ErrorReason:   
         * ================
         */
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
            $post = $this->data->get_post();//获得post
            $data = $this->payment->list();
            $data?$cond = 0:$cond = 1;
            
            //开始输出
            switch ($cond) {
                case   1://异常1
                    $this->data->out(2002);
                    break;
                default:
                    $this->data->out(2001);
                }
        }


        /**
         * ================
         * @Author:        css
         * @Parameter:     
         * @DataTime:      2019-01-15
         * @Return:        
         * @Notes:         修改基础数据 payment/manage/edit
         * @ErrorReason:   
         * ================
         */
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
             $post['data']['item_content']?$data['item_content'] = $post['data']['item_content']:true;
             $post['data']['id']?$data['id'] = $post['data']['id']:true;
             $post['data']['amount']?$data['amount'] = $post['data']['amount']:true;
             $data = $this->payment->edit($data);
             $data?$cond = 0:$cond = 1;
             
             //开始输出
             switch ($cond) {
                 case   1://异常1
                     $this->data->out(2003);
                     break;
                 default:
                     $this->data->out(2003);
                 }
         }


         /**
          * ================
          * @Author:        css
          * @Parameter:     
          * @DataTime:      2019-01-15
          * @Return:        
          * @Notes:         修改PMO数据 修改基础数据 payment/manage/edit_financial_number
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
              * @describe:  edit_financial_number function
              * ================
              */
             $post = $this->data->get_post();//获得post
             $data = $this->payment->edit_financial_number($post['id'],$post['financial_number']);
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
}