<?php
namespace budget;

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
        $this->protocol = \app::load_app_class('protocol','user');//加载公共json
        // $this->view = \app::load_view_class('budget_paper', 'budget');//加载json数据模板
        $this->post = json_decode(file_get_contents('php://input'),true);
        $post = $this->post;
        $this->lecturer_list = \app::load_service_class('lecturer_plan_class', 'budget');//加载讲师安排
        $this->travel_plan = \app::load_service_class('travel_plan_class', 'budget');//加载差旅
        $this->training_cost = \app::load_service_class('training_cost_class', 'budget');//加载实施安排
    }

    //添加/修改讲师安排
    public function add_teacher(){
        $data = [
            'header_id'=>1,
            'lecturer_id'=>1,
            'tax'=>1,
            'fee'=>1,
            'day'=>1,
            'duty_id'=>1,
        ];
        $this->lecturer_list->have_header($data);
    return $this->lecturer_list->add($data);
    }
    //删除(修改状态)
    public function del_teacher(){
        $data = $post['id'];
        // $data =1;
        return $this->lecturer_list->del($data);
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
        // $data['name'] = 1;
        // $data['go_time'] = 1;
        // $data['go_ares'] = 1;
        // $data['end_time'] = 1;
        // $data['end_ares'] = 1;
        // $data['pid'] = 1;
        // $data['now_time'] = date('y-m-d h:i:s',time());
        $pid['header_id'] = $data['header_id'];
        $state['state'] = 1;
        //判断是否之前有此条数据。如果没有就直接添加，如果有就改变原来的有的数据的状态再添加
        $this->travel_plan->edit_state($pid,$state);
       $data['pid'] = $this->travel_plan->pid($pid);
    //    return $data['pid'];die;
        return var_dump($this->travel_plan->common_add($data));
        }
        //实施安排
        public function add_training(){
            $data = [
                'meet_fee'=>1,
                'equipment'=>1,
                'test_fee'=>1,
                'arder_fee'=>1,
                'pen_fee'=>1,
                'serve_fee'=>1,
                'mail_fee'=>1,
                'header_id'=>1,
            ];
            $this->training_cost->have_header($data);
            return $this->training_cost->add($data);
        }
        //差旅列表
        public function list_province(){
            $data['header_id'] =1;
            return print_r($this->travel_plan->list_travel($data)); 
        }
        


        //讲师列表
        public function list_teacher(){
            $data['header_id'] =1;
            return print_r($this->lecturer_list->list_teacher($data));
        }

        //实施列表
        public function list_training(){
            $data['header_id'] = 1;
            return print_r($this->training_cost->list_training($data));
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
        //讲师金额
        public function fee_teacher($fee='',$day=''){
            $fee = 1;
            $day = 3;
            $money = $fee * $day;
            var_dump($money);
        }
        //实施费用
        public function fee_training($data){
            
        }

}