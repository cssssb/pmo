<?php
namespace lecturer;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css   project_data_getByProjectId;edit;
 * @ver:       0.1
 * @DataTime:  2018-10-16
 * ================
 */
class manage_controller
{
    private $data;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        //todo 加载相关模块
        $this->lecturer = \app::load_service_class('lecturer_class', 'lecturer');//加载项目大表
        // $this->code = \app::load_cont_class('common','user');//加载token
       
    }

    public function cooperation()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       
         * @DataTime:  2018-10-21
         * @describe:  cooperation function
         * ================
         */
        
        $ass = $this->lecturer->cooperation_list();
        foreach($ass as $k){
            $datas['id'] = $k['teacher_cooperation_model_id'];
            $datas['name'] = $k['teacher_cooperation_model_name'];
            $data[] = $datas;
        }
        $data?$cond = 0:$cond = 1;

        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2002,[]);
                break;
            default:
                $this->data->out(2001,$data);
            }
    }
   /**
    * ================
    * @Author:        css
    * @Parameter:     
    * @DataTime:      2019-02-28
    * @Return:        
    * @Notes:         讲师列表
    * @ErrorReason:   
    * ================
    */
    public function list(){
        $head = [
            ["key"=> "id", "value"=> "讲师id","size"=>"5"],
            ["key"=> "name", "value"=> "讲师姓名","size"=>"5"],
            ["key"=> "describe", "value"=> "讲师描述","size"=>"5"],
            ["key"=> "unit_price", "value"=> "基础课价","size"=>"5"],
            ["key"=> "teaching_direction", "value"=> "讲师授课方向","size"=>"7"],
            ["key"=> "intermediator", "value"=> "联系人","size"=>"4"],
            ["key"=> "contact_information", "value"=> "联系方式","size"=>"5"],
            ["key"=> "state_name", "value"=> "合作状态","size"=>"5"],
            ["key"=> "teaching_record", "value"=> "授课记录","size"=>"5"],
            ["key"=> "pay_record", "value"=> "付款记录","size"=>"5"],
        ];
        $post = $this->data->get_post();
        // $post['data_type'] = 'page_json';
        switch ($post['data_type']) {
            case   'page_json'://
                return $this->list_page_json($post['query_condition'],$head);
                  break;
            case   'page_csv'://
                 return $this->list_csv($post['query_condition'],$head);
                  break;
            default:
                return $this->list_json();
              }
    }
    private function list_csv($condition,$data_head){
        unset($condition['page_num'],$condition['page_size']);
        // $list = $this->payment->list_pass($condition);
        $list = $this->lecturer->model->list_page_json($post['query_condition']['page_num']['query_data'],$post['query_condition']['page_size']['query_data'],$condition);

        foreach($data_head as $k){
            $head[] = $k['value'];
            $data[] = $k['key'];
        }
         //只取出以一维数组的值为键值的二维数组的值
         foreach($list as $key=>$val){
            $a = array_keys($val);
            foreach($data as $k){
            if(in_array($k,$a)){
                $ass[$key][$k] = $val[$k];
            }
        }}
        $name = time();

        return  app::load_sys_class('csv_out')->csv_class($ass,$name.'.csv',$head);
    }
    private function list_page_json($query_condition,$head){
        $query = $query_condition;
        unset($query['page_num'],$query['page_size']);
        $data['data_body'] = $this->lecturer->model->list_page_json($query_condition['page_num'],$query_condition['page_size'],$query);
        $data?$cond = 0:$cond = 1;
        $data['count'] = $this->lecturer->model->list_page_json_count($query_condition);
        $data['page_num'] = $query_condition['page_num']['query_data'];
        $data['page_size'] = $query_condition['page_size']['query_data'];
        $data['data_head'] = $head;
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2002,[]);
                break;
            default:
                $this->data->out(2001,$data);
            }
    }
    private function list_json(){
      $data = $this->lecturer->list_json();
      $data?$cond=0:$cond=1;
      //开始输出
      switch($cond){
          case 1://异常1
          $this->data->out(2002,[]);
          break;
          default:
            $this->data->out(2001,$data);
      }
    }
    private function data_filter($post){
        isset($post['data']['id'])?$data['id'] = $post['data']['id']:true;
        isset($post['data']['parent_id'])?$data['id'] = $post['data']['parent_id']:true;
        isset($post['data']['contact_information'])?$data['contact_information'] = $post['data']['contact_information']:true;//联系方式
        isset($post['data']['describe'])?$data['describe'] = $post['data']['describe']:true;//讲师描述
        isset($post['data']['intermediator'])?$data['intermediator'] = $post['data']['intermediator']:true;//联系人
        isset($post['data']['name'])?$data['name'] = $post['data']['name']:true;//讲师姓名
        isset($post['data']['pay_record'])?$data['pay_record'] = $post['data']['pay_record']:true;//支付记录
        isset($post['data']['state_id'])?$data['state'] = $post['data']['state_id']:true;//讲师状态
        isset($post['data']['teaching_direction'])?$data['teaching_direction'] = $post['data']['teaching_direction']:true;//讲师授课方向
        isset($post['data']['teaching_record'])?$data['teaching_record'] = $post['data']['teaching_record']:true;//教学记录
        isset($post['data']['unit_price'])?$data['unit_price'] = $post['data']['unit_price']:true;//基础课价
        return $data;
    }
    public function add()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2019-03-04
         * @describe:  add function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $list = $this->data_filter($post);
        $data = $this->lecturer->add($list);
        $data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2002,[]);
                break;
            default:
                $this->data->out(2001,$data);
            }
    }
    public function edit()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2019-03-04
         * @describe:  edit function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $list = $this->data_filter($post);
        $data = $this->lecturer->edit($list);
        $data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2006);
                break;
            default:
                $this->data->out(2005);
            }
    }
    public function del()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2019-03-04
         * @describe:  del function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $data = $this->lecturer->del($post);
        $data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2009);
                break;
            default:
                $this->data->out(2008);
            }
    }
    // public function getByLeturerId(){
    //     echo 1;
    // }
    public function getByLeturerId()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       
         * @DataTime:  2019-03-04
         * @describe:   function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $data = $this->lecturer->get_one($post['id']);
            $data['state_id'] = $data['state'];
            switch ($data['state']) {
                case '0':
                    $data['state_name'] = '没联系过';
                    break;
                case '1':
                    # code...
                    $data['state_name'] = '偶尔联系';
                    break;
                case '2':
                    # code...
                    $data['state_name'] = '经常联系';
                    break;
            }
        $data?$cond = 0:$cond = 1;
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2002,[]);
                break;
            default:
                $this->data->out(2001,$data);
            }
    }
}