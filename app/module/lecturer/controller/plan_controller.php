<?php
namespace lecturer;

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
        $this->lecturer_list = \app::load_service_class('lecturer_plan_class', 'lecturer');//加载讲师安排
        $this->travel_plan = \app::load_service_class('travel_plan_class', 'budget');//加载差旅
        $this->training_cost = \app::load_service_class('training_cost_class', 'budget');//加载实施安排
        $this->lecturer = \app::load_service_class('lecturer_class', 'lecturer');//加载老师姓名
        $this->lecturer_duty = \app::load_service_class('lecturer_duty_class', 'lecturer');//加载职责
    }

    //添加讲师安排
    public function add(){
        $post = $this->post;
        $post['data']['id']?$data["header_id"]=$post['data']["id"]:true;
        // $post['project_id']?$data["project_id"]=$post["project_id"]:true;
        $post['data']['teacher_name_id']?$data["lecturer_id"]=$post['data']["teacher_name_id"]:true;
        $post['data']['teacher_income_tax']?$data["tax"]=$post['data']["teacher_income_tax"]:true;
        $post['data']['teacher_lecture_fee']?$data["fee"]=$post['data']["teacher_lecture_fee"]:true;
        $post['data']['teacher_lecture_days']?$data["day"]=$post['data']["teacher_lecture_days"]:true;
        $post['data']['teacher_duty_id']?$data["duty_id"]=$post['data']["teacher_duty_id"]:true;
        $post['data']['token']?$data['token'] = $post['data']['token']:true;
        
         $ass = $this->lecturer_list->add($data);
         if($ass){
             $msg['code'] = 0;
             $msg['msg'] = '操作成功';
         }else{
             $msg['code'] = 1;
             $msg['msg'] = '操作失败';
         }
         echo json_encode($msg);exit;
    }
    //9.29修改讲师安排
    public function edit(){
        $post = $this->post;
        $post['data']['id']?$data["id"]=$post['data']["id"]:true;
        // $post['project_id']?$data["project_id"]=$post["project_id"]:true;
        $post['data']['teacher_name_id']?$data["lecturer_id"]=$post['data']["teacher_name_id"]:true;
        $post['data']['teacher_income_tax']?$data["tax"]=$post['data']["teacher_income_tax"]:true;
        $post['data']['teacher_lecture_fee']?$data["fee"]=$post['data']["teacher_lecture_fee"]:true;
        $post['data']['teacher_lecture_days']?$data["day"]=$post['data']["teacher_lecture_days"]:true;
        $post['data']['teacher_duty_id']?$data["duty_id"]=$post['data']["teacher_duty_id"]:true;
        $post['data']['token']?$data['token'] = $post['data']['token']:true;
        $ass = $this->lecturer_list->edit($data);
        if($ass){
            $msg['code'] = 0;
            $msg['msg'] = '操作成功';
        }else{
            $msg['code'] = 1;
            $msg['msg'] = '操作失败';
        }
        echo json_encode($msg);die;
    }
    //删除(修改状态)
    public function del(){
        // $data = $post['id'];
        // $data =2;
        $post = $this->post();
        $data = $post['id'];
        $ass =  $this->lecturer_list->del($data);
        if($ass){
            $msg['code'] = 0;
            $msg['msg'] = '操作成功';
        }else{
            $msg['code'] = 1;
            $msg['msg'] = '操作失败';
        }
        echo json_encode($msg);exit;

    }
   

        //讲师列表
        public function listLecturer(){
            // $data['header_id'] =1;
                //             teacher_arrange 讲师安排
                //             teacher_name_name  讲师姓名
                //             teacher_name_id  讲师姓名
            $post = $this->post;
            $data['header_id'] = $post['id'];
            $ass = $this->lecturer_list->list_teacher($data);
         
            if($ass){
                foreach($ass as $key=>$val){
                    $duty = $this->lecturer_duty->get_one($val['duty_id']);
                    $lecturer_name = $this->lecturer->get_one($val['lecturer_id']);
                $rng[$key]['id'] = $val['id'];
                $rng[$key]['teacher_lecture_days'] = $val['day'];
                $rng[$key]['teacher_duty_id'] = $val['duty_id'];
                $rng[$key]['teacher_duty_name'] = $duty['name'];
                $rng[$key]['teacher_lecture_fee'] = $val['fee'];
                $rng[$key]['teacher_income_tax'] = $val['tax'];
                $rng[$key]['teacher_name_id'] = $val['lecturer_id'];
                $rng[$key]['teacher_name_name'] = $lecturer_name['name'];
                $rng[$key]['teacher_arrange'] = $val['header_id'];
            }
                $msg['data']['lecturer'] = $rng;
                $msg['code'] = 0;
                $msg['msg'] = '查询成功';
            }else{
                $msg['code'] = 0;
                $msg['msg'] = '查询无数据';
            }
            echo json_encode($msg);exit;
        }
        public function getOneTeacher(){
            //获取教师id
            $post = $this->post;
            $post['data']['id']?$data['id'] = $post['data']['id']:true;
            $ass = $this->lecturer_list->get_one_teacher($data);
            $msg['code'] = 1;
            $msg['msg'] = '操作失败';
            if($ass){
                $msg['data'] = $ass;
                $msg['code'] = 0;
                $msg['msg'] = '操作成功';
            }
            echo json_encode($msg);die;
        }

}