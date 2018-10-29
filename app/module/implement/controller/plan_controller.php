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
        $this->post = json_decode(file_get_contents('php://input'),true);
        // $this->implement_cost = \app::load_service_class('implement_cost_class', 'budget');//加载实施安排
        $this->implement = \app::load_service_class('implement_plan_class', 'implement');//加载实施安排
        $this->code = \app::load_cont_class('common','user');//加载token
        $this->operation = \app::load_service_class('operation_class','operation');//加载操作
        $this->room = \app::load_service_class('implement_room_class','implement');//加载会场
        $this->project = \app::load_service_class('project_class','project');//加载项目
       
    }

        //实施列表
        public function getByProjectId(){
            $post = $this->data->get_post();
            $parent_id = $post['id'];
            if(!$post['id']){
                $this->data->out(3901);
            }
            $css = $this->implement->get_one($parent_id);
            if($css){
                $ass['implement'][] = $css;
            }else{
                $ass['implement'][] = ['parent_id'=>$parent_id];
            }
            $data = $this->room->get_project($parent_id);
            if($data){
                $ass['venue'] = $data;
            }else{
                $return = [
					// 'venue_fee'=>'',
					// 'examination_fee'=>'',
					// 'tea_break'=>'',
					// 'stationery'=>'',
					// 'hospitality'=>'',
					// 'postage'=>'',
					// 'material_cost'=>'',
					// 'equipment_cost'=>'',
					// 'parent_id'=>$parent_id
				];
                $ass['venue'] = [];

            }
            $ass?$cond = 0:$cond = 1;
            $project_name = $this->project->get_one($parent_id);
            $ass['unicode'] = $project_name['unicode'];
            $ass['project_name'] = $this->project->project_name($parent_id);
            switch ($cond) {
                case   1://异常1
                    $this->data->out(2002,$ass);
                    break;
              
                default:
                    $this->data->out(2001,$ass);
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