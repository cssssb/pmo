<?php
namespace course;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2019-03-13
 * @describe:  course_manage controller class
 * ================
 */
class manage_controller
{
    private $data,$manage;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        // $this->code = app::load_cont_class('common','user');//加载token
        // $this->operation = app::load_service_class('operation_class','operation');//加载操作
        //todo 加载相关模块
        $this->course = app::load_service_class('course_class', 'course');//
    }
    /**
     * ================
     * @Author:        css
     * @Parameter:     
     * @DataTime:      2019-03-13
     * @Return:        
     * @Notes:         课程列表  json/page_json/csv_json
     * @ErrorReason:   
     * ================
     */
     public function list()
     {
         /**
          * ================
          * @Author:    css
          * @ver:       
          * @DataTime:  2019-03-13
          * @describe:  list function
          * ================
          */
         $post = $this->data->get_post();//获得post
        //  $post['data_type'] = 'page_csv';
         $data_head = [
            ["key"=>"id","value"=>"课程id","size"=>"5"],
            ["key"=>"name","value"=>"课程名称","size"=>"5"],
            ["key"=>"is_short_name","value"=>"周期","size"=>"3"],
            ["key"=>"is_cert_name","value"=>"是否认证","size"=>"5"],
            ["key"=>"level_name","value"=>"级别","size"=>"3"],
            ["key"=>"course_plan","value"=>"课程计划","size"=>"5"],
            ["key"=>"type_name","value"=>"所属分类","size"=>"5"],
            ["key"=>"lecturer_name","value"=>"授课讲师","size"=>"5"],
         ];
         
         //开始输出
         switch ($post['data_type']) {
             case   'page_json':
                 $this->list_page_json($post,$data_head);
                 break;
             case   'json':
                 $this->list_json($post,$data_head);
                 break;
             case   'page_csv':
                 $this->list_csv($post,$data_head);
                 break;
             default:
                 $this->data->out(1003);
             }
     }
     private function list_csv($post,$data_head){
        $condition = $post['query_condition'];
        unset($condition['page_num'],$condition['page_size']);
        $data_body = $this->course->model->list_page_json($post['query_condition']['page_num']['query_data'],$post['query_condition']['page_size']['query_data'],$condition);
        foreach($data_body as &$k){
            if($k['type_name']!=true){
                $k['type_name'] = $this->course->get_one_type($k['type_id']);
            }
            switch ($k['is_short']) {
                case '0':
                    $k['is_short_name'] = '长期三天以上';
                    break;
                case '1':
                    $k['is_short_name'] = '短期1-3天';
                    break;
            }
            switch ($k['is_cert']) {
                case '0':
                $k['is_cert_name'] = '认证';
                    break;
                case '1':
                $k['is_cert_name'] = '非认证';    
                    break;
            }
            switch ($k['level']) {
                case '1':
                    $k['level_name'] = '初级';
                    break;
                case '2':
                    $k['level_name'] = '中级';
                    break;
                case '3':
                    $k['level_name'] = '高级';
                    break;
            }
        }
        foreach($data_head as $k){
            $head[] = $k['value'];
            $data[] = $k['key'];
        }
         //只取出以一维数组的值为键值的二维数组的值
         foreach($data_body as $key=>$val){
            $a = array_keys($val);
            foreach($data as $k){
            if(in_array($k,$a)){
                $ass[$key][$k] = $val[$k];
            }
        }}
        $name = time();
        // $data['1'] = $ass;
        // $data['2'] = $name;
        // $data['head'] = $head;
        // $this->data->out(2001,$data);
        return  app::load_sys_class('csv_out')->csv_class($ass,$name.'.csv',$head);
    }
     private function list_page_json($post,$data_head){
        $condition = $post['query_condition'];
        unset($condition['page_num'],$condition['page_size']);
        $data_body = $this->course->model->list_page_json($post['query_condition']['page_num']['query_data'],$post['query_condition']['page_size']['query_data'],$condition);
        foreach($data_body as &$k){
            if($k['type_name']!=true){
                $k['type_name'] = $this->course->get_one_type($k['type_id']);
            }
            switch ($k['is_short']) {
                case '0':
                    $k['is_short_id'] = '0';
                    $k['is_short_name'] = '长期三天以上';
                    break;
                case '1':
                    $k['is_short_id'] = '1';
                    $k['is_short_name'] = '短期1-3天';
                    break;
            }
            switch ($k['is_cert']) {
                case '0':
                $k['is_cert_id'] = '0';
                $k['is_cert_name'] = '认证';
                    break;
                case '1':
                $k['is_cert_id'] = '1';    
                $k['is_cert_name'] = '非认证';    
                    break;
            }
            switch ($k['level']) {
                case '1':
                    $k['level_id'] = '1';
                    $k['level_name'] = '初级';
                    break;
                case '2':
                    $k['level_id'] = '2';
                    $k['level_name'] = '中级';
                    break;
                case '3':
                    $k['level_id'] = '3';
                    $k['level_name'] = '高级';
                    break;
            }
        }
        $data['data_body'] = $data_body;
        $data['count'] = $this->course->model->list_page_json_count($condition);
        $data['data_head'] = $data_head;
        $data['page_num'] = $post['query_condition']['page_num'];
        $data['page_size'] = $post['query_condition']['page_size'];
        $this->data->out(2001,$data);
     }
     private function list_json($post,$data_head){
        return $this->course->list();
     }
 
     private function data_filter($post){
        isset($post['data']['id'])?$data['id'] = $post['data']['id']:true;
        isset($post['data']['name'])?$data['name'] = $post['data']['name']:true;
        isset($post['data']['type_id'])?$data['type_id'] = $post['data']['type_id']:true;
        isset($post['data']['type_name'])?$data['type_name'] = $post['data']['type_name']:true;
        isset($post['data']['depth'])?$data['depth'] = $post['data']['depth']:true;
        isset($post['data']['is_leaf_id'])?$data['is_leaf'] = $post['data']['is_leaf_id']:true;
        isset($post['data']['parent_id'])?$data['parent_id'] = $post['data']['parent_id']:true;
        isset($post['data']['priority'])?$data['priority'] = $post['data']['priority']:true;
        isset($post['data']['is_short_id'])?$data['is_short'] = $post['data']['is_short_id']:true;
        isset($post['data']['is_cert_id'])?$data['is_cert'] = $post['data']['is_cert_id']:true;
        isset($post['data']['level_id'])?$data['level'] = $post['data']['level_id']:true;
        isset($post['data']['lecturer_id'])?$data['lecturer_id'] = $post['data']['lecturer_id']:true;
        isset($post['data']['lecturer_name'])?$data['lecturer_name'] = $post['data']['lecturer_name']:true;
        return $data;
     }
     public function add()
     {
         /**
          * ================
          * @Author:    css
          * @ver:       1.0
          * @DataTime:  2019-03-14
          * @describe:  add function
          * ================
          */
         $post = $this->data->get_post();//获得post
         $list = $this->data_filter($post);
         $data = $this->course->add($list);
         $data?$cond = 0:$cond = 1;
         
         //开始输出
         switch ($cond) {
             case   1://异常1
                 $this->data->out(2004);
                 break;
             default:
                 $this->data->out(2003);
             }
     }
     public function edit()
     {
         /**
          * ================
          * @Author:    css
          * @ver:       1.0
          * @DataTime:  2019-03-14
          * @describe:  edit function
          * ================
          */
         $post = $this->data->get_post();//获得post
         $list = $this->data_filter($post);
         $data = $this->course->edit($list);
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
          * @DataTime:  2019-03-14
          * @describe:  del function
          * ================
          */
         $post = $this->data->get_post();//获得post
         $data = $this->course->del($post);
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
     public function getByCourseId()
     {
         /**
          * ================
          * @Author:    css
          * @ver:       
          * @DataTime:  2019-03-14
          * @describe:  getBy function
          * ================
          */
         $post = $this->data->get_post();//获得post
         $data = $this->course->get_one($post);
         $data?$cond = 0:$cond = 1;
         
         //开始输出
         switch ($cond) {
             case   1://异常1
                 $this->data->out(2002,[]);
                 break;
             default:
                 $this->data->out(2003,$data);
             }
     }
}