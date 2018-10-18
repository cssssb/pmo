<?php
namespace travel;

// use system\ding_password;


// echo "load ding_controller";
// echo  microtime();
// echo "\n";

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       ding_user
 * @DataTime:  2018-08-21
 * @describe:  V1.0
 * ================
 */
class longTrafficType_controller
{
    /**
     * 构造函数
     */
    public function __construct()
    {   
        $this->data = \app::load_sys_class('protocol');//加载json数据模板
        $this->protocol = \app::load_model_class('protocol','user');//加载公共json
        // $this->view = \app::load_view_class('budget_paper', 'budget');//加载json数据模板
        $this->travel_mode = \app::load_model_class('travel_mode', 'travel');//加载差旅
    }

  
   public function list()
   {
       /**
        * ================
        * @Author:    css
        * @ver:       1.0
        * @DataTime:  2018-10-17
        * @describe:  list function
        * ================
        */
       $post = $this->data->get_post();//获得post
       $ass = $this->travel_mode->select(1);

       $ass?$cond = 0:$cond = 1;
       //开始输出
       switch ($cond) {
           case   1://异常1
               $this->data->out(2002);
               break;
           default:
               $this->data->out(2001,$ass);
           }
   }
}