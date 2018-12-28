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
class hotel_controller
{
    /**
     * 构造函数
     */
    public function __construct()
    {   
        $this->data = \app::load_sys_class('protocol');//加载json数据模板
        $this->protocol = \app::load_model_class('protocol','user');//加载公共json
        // $this->view = \app::load_view_class('budget_paper', 'budget');//加载json数据模板
        $this->post = json_decode(file_get_contents('php://input'),true);
        $this->stay = \app::load_service_class('stay_class', 'travel');//加载差旅
        $this->code = \app::load_cont_class('common','user');//加载token
        $this->static = \app::load_service_class('static_class','project');//加载列表json
       
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
        $this->examine = \app::load_service_class("examine_project_class","examine");
            //看此项目是不是在提交预算或决算中
            if($this->examine->is_budget_examining($post['data']['parent_id'])){
                //已提交预算，不可编辑
                $this->data->out(3019,[]);
            }
            if($this->examine->is_final_account_examining($post['data']['parent_id'])){
                //已提交决算,不可编辑
                $this->data->out(3020,[]);
            }
        $ass =  $this->stay->add_stay($post['data']);
       $project_new_data =  $this->static->static_service($post['data']['parent_id']);

        $project_new_data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2004);
                break;
            default:
                $post['data']['id'] = (string)$ass;
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
             $this->examine = \app::load_service_class("examine_project_class","examine");
            //看此项目是不是在提交预算或决算中
            if($this->examine->is_budget_examining($post['data']['parent_id'])){
                //已提交预算，不可编辑
                $this->data->out(3019,[]);
            }
            if($this->examine->is_final_account_examining($post['data']['parent_id'])){
                //已提交决算,不可编辑
                $this->data->out(3020,[]);
            }
            $ass = $this->stay->edit_stay($post['data']);
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
             $parent_id = $this->stay->model->get_one($where);
             $this->examine = \app::load_service_class("examine_project_class","examine");
            //看此项目是不是在提交预算或决算中
            if($this->examine->is_budget_examining($parent_id['parent_id'])){
                //已提交预算，不可编辑
                $this->data->out(3019,[]);
            }
            if($this->examine->is_final_account_examining($parent_id['parent_id'])){
                //已提交决算,不可编辑
                $this->data->out(3020,[]);
            }
             $ass = $this->stay->del_stay($post);
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
}