<?php
namespace implement;

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
        $this->post = json_decode(file_get_contents('php://input'),true);
        // $this->implement_cost = \app::load_service_class('implement_cost_class', 'budget');//加载实施安排
        $this->implement = \app::load_service_class('implement_plan_class', 'implement');//加载实施安排
    }

        //实施安排
        public function add(){
            $post = $this->data->get_post();
            $data = [
                'id'=>1,
                'meet_fee'=>1,
                'equipment'=>1,
                'test_fee'=>1,
                'arder_fee'=>1,
                'pen_fee'=>1,
                'serve_fee'=>1,
                'mail_fee'=>1,
                'parent_id'=>1,
            ];
            $ass = $this->implement->add($data);
            $msg['code'] = 1;
            $msg['msg'] ='操作成功';
            if($ass){
                $msg['code'] = 0;
                $msg['msg'] = '操作失败';
            }
            echo json_encode($msg);die;
        }
        //实施列表
        public function getByProjectId(){
            $post = $this->data->get_post();
            $data['parent_id'] = $post['id'];
            if(!$post['id']){
                $this->data->out(3901);
            }
            $ass = $this->implement->get_one($data['parent_id']);
            $ass?$cond = 0:$cond = 1;
            switch ($cond) {
                case   1://异常1
                    $this->data->out(2002);
                    break;
              
                default:
                    $this->data->out(2001, $ass);
                }
        }
        public function list()
        {
            /**
             * ================
             * @ver:       0.1
             * @DataTime:  2018-10-16
             * @describe:  list function
             * ================
             */
            $post = $this->data->get_post();
            $cond = 0;
            $code = 1003;
            $data = [];
            //处理post
            //开始输出
            switch ($cond) {
                case   1://异常1
                    $this->data->out($code, $data);
                    break;
                // case   2:
                //     $this->data->out(code, $data);
                //     break;
                default:
                    $this->data->out(1001, $data);
                }
        }
        public function get_one_implement(){
            // $data['id'] = 1;
            $post = $this->data->get_post();
            return print_r($this->implement->get_one($post));
            $ass = $this->implement->get_one($post);
            $msg['code'] = 1;
            $msg['msg'] = '查询失败';
            if($ass){
                $msg['code'] = 0;
                $msg['msg'] = '查询成功';
            }
            echo json_encode($msg);die;
        }
        // public function edit(){
        //     // $data['meet_fee'] = 2;
        //     // $data['equipment'] = 2;
        //     // $data['test_fee'] = 2;
        //     // $data['arder_fee'] = 2;
        //     // $data['pen_fee'] = 2;
        //     // $data['serve_fee'] = 2;
        //     // $data['id'] = 3;
        //     // return var_dump($this->implement->edit_implement($data));
        //     $post = $this->data->get_post();
            
        //     $ass = $this->implement->edit_implement($post);
        //     $msg['code'] = 1;
        //     $msg['msg'] = '操作失败';
        //     if($ass){
        //         $msg['code'] = 0;
        //         $msg['msg'] = '操作成功';
        //     }
        //     echo json_encode($msg);die;
        // }
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
          //example $this->service->function();
          $ass = $this->implement->add($post['data']);
          $ass?$cond=0:$cond=1;          
          //开始输出
          switch ($cond) {
              case   1://异常1
                  $this->data->out(2006);
                  break;
              default:
                  $this->data->out(2005, $post);
              }
      }
      

}