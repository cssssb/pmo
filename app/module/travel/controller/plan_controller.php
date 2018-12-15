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
class plan_controller
{
    /**
     * 构造函数
     */
    public function __construct()
    {   
        $this->data = \app::load_sys_class('protocol');//加载json数据模板
        // $this->view = \app::load_view_class('budget_paper', 'budget');//加载json数据模板
        $this->post = json_decode(file_get_contents('php://input'),true);
        $post = $this->data->get_post();
        $this->city = \app::load_service_class('city_class', 'travel');//加载差旅
        $this->province = \app::load_service_class('province_class', 'travel');//加载差旅
        $this->stay = \app::load_service_class('stay_class', 'travel');//加载差旅
        $this->meal = \app::load_service_class('meal_class', 'travel');//加载餐费
        $this->travel_plan = \app::load_service_class('travel_plan_class', 'travel');//加载差旅
        $this->code = \app::load_cont_class('common','user');//加载token
        $this->operation = \app::load_service_class('operation_class','operation');//加载操作
        $this->project = \app::load_service_class('project_class','project');//加载项目
        
       
    }
        public function getByProjectId()
        {
            /**
             * ================
             * @Author:    css
             * @ver:       0.1
             * @DataTime:  2018-10-17
             * @describe:  getByProjectId function
             * ================
             */
            $post = $this->data->get_post();//获得post
            //处理post
            //调用业务层函数
            //example $this->service->function();
            // return var_dump($post);
            // $post = $_POST;
            if(!$post['id']){
                $this->data->out(3901);}
        $province = $this->province->list_province($post['id']);
        $city = $this->city->list_city($post['id']);
        $stay = $this->stay->list_stay($post['id']);
        $meal = $this->meal->list_meal($post['id']);
            
            foreach($city as $key){
                $city_b[] =$key; 
            }
            foreach($stay as $key){
                $stay_b[] = $key;
            }
            foreach($province as $key){
                $province_b[] = $key;
            }
            $data['stay'] = $stay_b;
            $data['city'] = $city_b;
            $data['province'] = $province_b;
            $data['meal'] = $meal;
            //开始输出
            $data?$cond = 0:$cond = 1;
            $project_name = $this->project->get_one($post['id']);
            $data['unicode'] = $project_name['unicode'];
            $data['project_name'] = $this->project->project_name($post['id']);
            switch ($cond) {
                case   1://异常1
                    $this->data->out(2002,$data);
                    break;
                default:
                    $this->data->out(2001,$data);
                }
        }
        
        //长途交通删除
        public function delProvince(){
            // $data['id'] = 1;
            $post = $this->data->get_post();
            $data = $this->travel_plan->del_province($post);
            if($data){
                $msg['code'] = 0;
                $msg['msg'] = '删除成功';
            }else{
                $msg['code'] = 0;
                $msg['msg'] = '删除失败';
            }
            echo json_encode($msg);exit;
        }
        //市内交通删除
        public function delCity(){
            $post = $this->data->get_post();
            $data = $this->travel_plan->del_city($post);
            if($data){
                $msg['code'] = 0;
                $msg['msg'] = '删除成功';
            }else{
                $msg['code'] = 0;
                $msg['msg'] = '删除失败';
            }
            echo json_encode($msg);exit;
        }
        //住宿删除
        public function delStay(){
            $post = $this->data->get_post();
            $data = $this->travel_plan->del_stay($post);
            if($data){
                $msg['code'] = 0;
                $msg['msg'] = '删除成功';
            }else{
                $msg['code'] = 0;
                $msg['msg'] = '删除失败';
            }
            echo json_encode($msg);exit;
        }
       
        public function edit_province(){
            $id = 37;
            $data['fee'] = 100;
            return var_dump($this->travel_plan->edit_province($id,$data));
        }       
        public function edit_city(){
            $id = 1;
            $data['fee'] = 100;
            return $this->travel_plan->edit_city($id,$data);
        }       
        public function edit_stay(){
            $id = 1;
            $data['fee'] = 100;
            return $this->travel_plan->edit_stay($id,$data);
        }
}