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
      public function list()
      {
          /**
           * ================
           * @Author:    css
           * @ver:       1.0
           * @DataTime:  2019-01-16
           * @describe:  list function
           * ================
           */
          $post = $this->data->get_post();//获得post
          $data = $this->project->list($post['token']);
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
}