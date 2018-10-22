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
        $this->protocol = \app::load_model_class('protocol','user');//加载公共json
        // $this->view = \app::load_view_class('budget_paper', 'budget');//加载json数据模板
        $this->post = json_decode(file_get_contents('php://input'),true);
        $post = $this->data->get_post();
        $this->city = \app::load_service_class('city_class', 'travel');//加载差旅
        $this->province = \app::load_service_class('province_class', 'travel');//加载差旅
        $this->stay = \app::load_service_class('stay_class', 'travel');//加载差旅
        $this->travel_plan = \app::load_service_class('travel_plan_class', 'travel');//加载差旅
        $this->code = \app::load_cont_class('common','user');//加载token
       
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
      
            foreach($city as $key){
                $city_a['short_fee_card_people'] = $key['short_fee_card_people'];
                $city_a['short_fee_type'] = $key['short_fee_type'];
                $city_a['short_fee'] = $key['short_fee'];
                $city_a['id'] = $key['id'];
                $city_a['parent_id'] = $key['parent_id'];
                $city_b[] =$city_a; 
            }
            foreach($stay as $key){
                $stay_a['hotel_expense_people'] = $key['hotel_expense_people'];
                $stay_a['hotel_expense_days'] = $key['hotel_expense_days'];
                $stay_a['hotel_expense_total'] = $key['hotel_expense_total'];
                $stay_a['id'] = $key['id'];
                $stay_a['parent_id'] = $key['parent_id'];
                $stay_b[] = $stay_a;
            }
            foreach($province as $key){
                $province_a['long_fee_card_people'] = $key['long_fee_card_people'];
                $province_a['long_fee_card_start_time'] = $key['long_fee_card_start_time'];//出发时间
                $province_a['long_fee_card_start_place'] = $key['long_fee_card_start_place'];//出发地点
                $province_a['long_fee_card_end_time'] = $key['long_fee_card_end_time'];//结束时间
                $province_a['long_fee_card_end_place'] = $key['long_fee_card_end_place'];//结束地点
                $province_a['long_fee_card_vehicle_name'] = $key['long_fee_card_vehicle_name'];//结束地点
                // $province_a['long_fee_card_start_place'] = $key['fee'];
                $province_a['id'] = $key['id'];
                $province_a['parent_id'] = $key['parent_id'];
                $province_b[] = $province_a;
            }
            $data['stay'] = $stay_b;
            $data['city'] = $city_b;
            $data['province'] = $province_b;
            //开始输出
            $data?$cond = 0:$cond = 1;
            switch ($cond) {
                case   1://异常1
                    $this->data->out(2002);
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