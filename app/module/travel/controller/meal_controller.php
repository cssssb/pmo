<?php
namespace travel;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2018-10-29
 * @describe:  travel_meal controller class
 * ================
 */
class meal_controller
{
    private $data,$meal;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        $this->code = app::load_cont_class('common','user');//加载token
        $this->operation = app::load_service_class('operation_class','operation');//加载操作
        //todo 加载相关模块
        $this->meal = app::load_service_class('meal_class', 'travel');//
        $this->static = \app::load_service_class('static_class','project');//加载列表json

    }
    public function add()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2018-10-29
         * @describe:  add function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $this->examine = \app::load_service_class("examine_project_class","examine");
            //看此项目是不是在提交预算或决算中
            if($this->examine->bool_budget($post['data']['parent_id'])){
                //已提交预算，不可编辑
                $this->data->out(3019,[]);
            }
            if($this->examine->bool_final_account($post['data']['parent_id'])){
                //已提交决算,不可编辑
                $this->data->out(3020,[]);
            }
        unset($post['data']['meal_fee_people_name']);
        $data = $this->meal->add_meal($post['data']);
        $project_new_data =  $this->static->static_service($post['data']['parent_id']);

        $project_new_data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2004,$post['data']);
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
          * @DataTime:  2018-10-29
          * @describe:  edit function
          * ================
          */
         $post = $this->data->get_post();//获得post

         if(!$post['data']['id']){
             $this->data->out(3901);}
             $this->examine = \app::load_service_class("examine_project_class","examine");
            //看此项目是不是在提交预算或决算中
            if($this->examine->bool_budget($post['data']['parent_id'])){
                //已提交预算，不可编辑
                $this->data->out(3019,[]);
            }
            if($this->examine->bool_final_account($post['data']['parent_id'])){
                //已提交决算,不可编辑
                $this->data->out(3020,[]);
            }
        unset($post['data']['meal_fee_people_name']);
            $ass = $this->meal->edit_meal($post['data']);
         $project_new_data =  $this->static->static_service($post['data']['parent_id']);

            $project_new_data?$cond = 0:$cond = 1;
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
             $where['id'] = $post['id'];
             $parent_id = $this->meal->model->get_one($where);
             $this->examine = \app::load_service_class("examine_project_class","examine");
            //看此项目是不是在提交预算或决算中
            if($this->examine->bool_budget($parent_id['parent_id'])){
                //已提交预算，不可编辑
                $this->data->out(3019,[]);
            }
            if($this->examine->bool_final_account($parent_id['parent_id'])){
                //已提交决算,不可编辑
                $this->data->out(3020,[]);
            }
             $ass = $this->meal->del_meal($post);
             $project_new_data =  $this->static->static_service($parent_id['parent_id']);
        $project_new_data?$cond = 0:$cond = 1;
         //开始输出
         switch ($cond) {
             case   1://异常1
                 $this->data->out(2009);
                 break;
             default:
                 $this->data->out(2008,$post['id']);
             }
            }
    public function people()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2018-10-29
         * @describe:  people function
         * ================
         */
        // echo 1;die;

        $post = $this->data->get_post();//获得post
        $data = $this->meal->people();
        
        $data?$cond = 0:$cond = 1;
        foreach($data as $key){
            $return['id'] = $key['meal_fee_people_id']; 
            $return['name'] = $key['meal_fee_people_name']; 
            $returns[] = $return; 
        }
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2002,[]);
                break;
            default:
                $this->data->out(2001,$returns);
            }
    }
}