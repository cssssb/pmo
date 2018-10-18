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
class inCityTraffic_controller
{
    /**
     * 构造函数
     */
    public function __construct()
    {   
        $this->data = \app::load_sys_class('protocol');//加载json数据模板
        $this->protocol = \app::load_model_class('protocol','user');//加载公共json
        $this->post = json_decode(file_get_contents('php://input'),true);
        $post = $this->data->get_post();
        $this->city = \app::load_service_class('city_class', 'travel');//加载差旅
    }
   
   public function add()
   {
       /**
        * ================
        * @Author:    css
        * @ver:       1.0
        * @DataTime:  2018-10-17
        * @describe:  add function
        * ================
        */
       $post = $this->data->get_post();//获得post
       
       $ass =  $this->city->add_city($post['data']);
       $ass?$cond = 0:$cond = 1;
       
       //开始输出
       switch ($cond) {
           case   1://异常1
               $this->data->out(2004);
               break;
           default:
               $this->data->out(2003,$post['data']);
           }
   }
    public function edit()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       
         * @DataTime:  2018-10-17
         * @describe:  edit function
         * ================
         */
        $post = $this->data->get_post();//获得post
        if(!$post['data']['id']){
            $this->data->out(3901);}
           $ass = $this->city->edit_city($post['data']);
           $ass?$cond = 0:$cond = 1;
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2006);
                break;
            default:
                $this->data->out(2005,$post['data']);
            }
    }
    public function del()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2018-10-17
         * @describe:  del function
         * ================
         */
        $post = $this->data->get_post();//获得post
        if(!$post['id']){
            $this->data->out(3901);}
        $ass = $this->city->del_city($post);
        $ass?$cond = 0:$cond = 1;
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2009);
                break;
            default:
                $this->data->out(2008,$post['id']);
            }
    }
    

    
}