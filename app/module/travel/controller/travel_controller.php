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
class travel_controller
{
    /**
     * 构造函数
     */
    public function __construct()
    {   
        $this->protocol = \app::load_app_class('protocol','user');//加载公共json
        // $this->view = \app::load_view_class('budget_paper', 'budget');//加载json数据模板
        $this->post = json_decode(file_get_contents('php://input'),true);
        $post = $this->post;
        $this->travel_plan = \app::load_service_class('travel_plan_class', 'travel');//加载差旅
    }

   
    //差旅
    public function add_province(){
        $data=[
            'province'=>[
                '0'=>[
                    'name'=>'1',
                    'go_time'=>'1',
                    'go_ares'=>'1',
                    'end_time'=>'1',
                    'end_ares'=>'1',
                    'pid'=>'1',
                    'now_time'=>date('y-m-d h:i:s',time()),
                ],
                '2'=>[
                    'name'=>'2',
                    'go_time'=>'2',
                    'go_ares'=>'2',
                    'end_time'=>'2',
                    'end_ares'=>'2',
                    'pid'=>'2',
                    'now_time'=>date('y-m-d h:i:s',time()),
                ],
            ],
            'city'=>[
                '0'=>[
                    'name'=>'1',
                    'fee_type'=>'1',
                    'fee'=>'1',
                    'pid'=>'1',
                    'now_time'=>date('y-m-d h:i:s',time()),
                ],
                '1'=>[
                    'name'=>'2',
                    'fee_type'=>'2',
                    'fee'=>'2',
                    'pid'=>'2',
                    'now_time'=>date('y-m-d h:i:s',time()),
                ],
            ],
            'stay'=>[
                '0'=>[
                    'name'=>'1',
                    'day'=>'1',
                    'fee'=>'1',
                    'pid'=>'1',
                    'now_time'=>date('y-m-d h:i:s',time()),
                ],
                '1'=>[
                    'name'=>'2',
                    'day'=>'2',
                    'fee'=>'2',
                    'pid'=>'2',
                    'now_time'=>date('y-m-d h:i:s',time()),
                ],
            ],
            'header_id'=>1,
        ];
        $pid['header_id'] = $data['header_id'];
        $state['state'] = 1;
        //判断是否之前有此条数据。如果没有就直接添加，如果有就改变原来的有的数据的状态再添加
        $this->travel_plan->edit_state($pid,$state);
       $data['pid'] = $this->travel_plan->pid($pid);
    //    return $data['pid'];die;
        return var_dump($this->travel_plan->common_add($data));
        }
       
        //差旅列表
        public function list_province(){
            $data['header_id'] =1;
            return print_r($this->travel_plan->list_travel($data)); 
        }
        

        
        //长途交通删除
        public function del_province(){
            $data['id'] = 1;
            return $this->travel_plan->del_province($data);
        }
        //市内交通删除
        public function del_city(){
            $data['id'] = 1;
            return $this->travel_plan->del_city($data);
        }
        //住宿删除
        public function del_stay(){
            $data['id'] = 1;
            return $this->travel_plan->del_stay($data);
        }
       
        public function get_one_province(){
            $data = 1;
            return $this->travel_plan->get_one_province($data);
        }       
        public function get_one_city(){
            $data = 1;
            return $this->travel_plan->get_one_city($data);
        }       
        public function get_one_stay(){
            $data = 1;
            return $this->travel_plan->get_one_stay($data);
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