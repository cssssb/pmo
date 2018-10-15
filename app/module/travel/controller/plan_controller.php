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
        $this->protocol = \app::load_model_class('protocol','user');//加载公共json
        // $this->view = \app::load_view_class('budget_paper', 'budget');//加载json数据模板
        $this->post = json_decode(file_get_contents('php://input'),true);
        $post = $this->post;
        $this->travel_plan = \app::load_service_class('travel_plan_class', 'travel');//加载差旅
    }

   
    //差旅
    public function addPovince(){
        // $data=[
        //     'province'=>[
        //         '0'=>[
        //             'name'=>'1',
        //             'go_time'=>'1',
        //             'go_ares'=>'1',
        //             'end_time'=>'1',
        //             'end_ares'=>'1',
        //             'pid'=>'1',
        //             'now_time'=>date('y-m-d h:i:s',time()),
        //         ],
        //         '2'=>[
        //             'name'=>'2',
        //             'go_time'=>'2',
        //             'go_ares'=>'2',
        //             'end_time'=>'2',
        //             'end_ares'=>'2',
        //             'pid'=>'2',
        //             'now_time'=>date('y-m-d h:i:s',time()),
        //         ],
        //     ],
        //     'city'=>[
        //         '0'=>[
        //             'name'=>'1',
        //             'fee_type'=>'1',
        //             'fee'=>'1',
        //             'pid'=>'1',
        //             'now_time'=>date('y-m-d h:i:s',time()),
        //         ],
        //         '1'=>[
        //             'name'=>'2',
        //             'fee_type'=>'2',
        //             'fee'=>'2',
        //             'pid'=>'2',
        //             'now_time'=>date('y-m-d h:i:s',time()),
        //         ],
        //     ],
        //     'stay'=>[
        //         '0'=>[
        //             'name'=>'1',
        //             'day'=>'1',
        //             'fee'=>'1',
        //             'pid'=>'1',
        //             'now_time'=>date('y-m-d h:i:s',time()),
        //         ],
        //         '1'=>[
        //             'name'=>'2',
        //             'day'=>'2',
        //             'fee'=>'2',
        //             'pid'=>'2',
        //             'now_time'=>date('y-m-d h:i:s',time()),
        //         ],
        //     ],
        //     'header_id'=>1,
        // ];
        $data = $this->post;
        $pid['header_id'] = $data['project_id'];
        //判断是否之前有此条数据。如果没有就直接添加，如果有就改变原来的有的数据的状态再添加
        $this->travel_plan->edit_state($pid);
       $data['pid'] = $this->travel_plan->pid($pid);
    //    return $data['pid'];die;
        return var_dump($this->travel_plan->common_add($data));
        }
       
        //差旅列表
        public function listProvince(){
            // $data['header_id'] =1;
            $post = $this->post;
            $data['header_id'] = $post['project_id'];
            $ass = $this->travel_plan->list_travel($data);
            if($ass){
                foreach($ass['city'] as $key=>$val){
                    $city[$key]['short_fee_type'] =  $val['fee_type'];
                    $city[$key]['short_fee_card_people'] =  $val['name'];
                    $city[$key]['short_fee'] =  $val['fee'];
                }
                foreach($ass['stay'] as $key=>$val){
                    $stay[$key]['hotel_expense_people'] =  $val['name'];
                    $stay[$key]['hotel_expense_days'] =  $val['day'];
                    $stay[$key]['hotel_expense_total'] =  $val['fee'];
                }
                foreach($ass['province'] as $key=>$val){
                    $province[$key]['long_fee_card_people'] =  $val['name'];
                    $province[$key]['long_fee_card_start_time'] =  $val['go_time'];
                    $province[$key]['long_fee_card_start_place'] =  $val['go_ares'];
                    $province[$key]['long_fee_card_end_time'] =  $val['end_time'];
                    $province[$key]['long_fee_card_end_place'] =  $val['end_ares'];
                    $province[$key]['long_fee_card_vehicle_name'] = '火车' ;
                    $province[$key]['long_fee_card_vehicle_id'] =  '1';
                }
                // $msg['data'] = $ass;
                $msg['code'] = 0;
                $msg['msg'] = '返回数据成功';
                $msg['data']['city'] = $city;
                $msg['data']['stay'] = $stay;
                $msg['data']['province'] = $province;
            }else{
                $msg['code'] = 1;
                $msg['msg'] = '无此数据';
            }
            echo json_encode($msg);exit;
        }
        

        
        //长途交通删除
        public function delProvince(){
            // $data['id'] = 1;
            $post = $this->post;
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
            $post = $this->post;
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
            $post = $this->post;
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