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
class province_controller
{
    /**
     * 构造函数
     */
    public function __construct()
    {   
        $this->protocol = \app::load_model_class('protocol','user');//加载公共json
        // $this->view = \app::load_view_class('budget_paper', 'budget');//加载json数据模板
        $this->post = json_decode(file_get_contents('php://input'),true);
        $this->city = \app::load_service_class('city_class', 'travel');//加载差旅
        $this->stay = \app::load_service_class('stay_class', 'travel');//加载差旅
        $this->province = \app::load_service_class('province_class', 'travel');//加载差旅
        
    }

    //list
    public function listProvince(){
        $post = $this->post;
        // return var_dump($this->province->list_province($post));
        $id = $post['project_id'];
        $province = $this->province->list_province($post);
        $city = $this->city->list_city($post);
        $stay = $this->stay->list_stay($post);
        
        $msg['code'] = 1;
        $msg['msg'] = '查询失败';
        if($city && $stay && $province){
            foreach($city as $key){
                $city_a['short_fee_card_people'] = $key['short_fee_card_people'];
                $city_a['short_fee_type'] = $key['short_fee_type'];
                $city_a['short_fee'] = $key['short_fee'];
                $city_a['id'] = $key['id'];
                $city_a['header_id'] = $key['header_id'];
                $city_b[] =$city_a; 
            }
            foreach($stay as $key){
                $stay_a['hotel_expense_people'] = $key['hotel_expense_people'];
                $stay_a['hotel_expense_days'] = $key['hotel_expense_days'];
                $stay_a['hotel_expense_total'] = $key['hotel_expense_total'];
                $stay_a['id'] = $key['id'];
                $stay_a['header_id'] = $key['header_id'];
                $stay_b[] = $stay_a;
            }
            foreach($province as $key){
                $province_a['long_fee_card_people'] = $key['long_fee_card_people'];
                $province_a['long_fee_card_start_time'] = $key['long_fee_card_start_time'];//出发时间
                $province_a['long_fee_card_start_place'] = $key['long_fee_card_start_place'];//出发地点
                $province_a['long_fee_card_end_time'] = $key['long_fee_card_end_time'];//结束时间
                $province_a['long_fee_card_end_place'] = $key['long_fee_card_end_place'];//结束地点
                // $province_a['long_fee_card_start_place'] = $key['fee'];
                $province_a['id'] = $key['id'];
                $province_a['header_id'] = $key['header_id'];
                $province_b[] = $province_a;
            }
        $msg['data']['stay'] = $stay_b;
        $msg['data']['city'] = $city_b;
        $msg['data']['province'] = $province_b;
        $msg['code'] = 0;
        $msg['msg'] = '查询成功';
    }
        echo json_encode($msg);die;
    }
    //get_one
    public function getOneProvince(){
        $post = $this->post;
        return $this->province->get_one_province($post);
        
    }
    
    //增/改
    public function addProvince(){
        $post = $this->post;
        $ass = $this->province->add_province($post);

        $msg['code'] = 1;
        $msg['msg'] = '添加失败';
        if($ass){
            $msg['code'] = 0;
            $msg['msg'] = '添加成功';
        }
        echo json_encode($msg);die;
    }
    public function editProvince(){
        $post = $this->post;
        
        return $this->province->edit_province($post['data']);
    }

    //删
    public function delProvince(){
        $post = $this->post;
        $ass =  $this->province->del_province($post);

        $msg['code'] = 1;
        $msg['msg'] = '删除失败';
        if($ass){
            $msg['code'] = 0;
            $msg['msg'] = '删除成功';
        }
        echo json_encode($msg);die;
    }
}