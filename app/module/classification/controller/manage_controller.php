<?php
namespace classification;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2019-03-14
 * @describe:  classification_manage controller class
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
        $this->classification = app::load_service_class('classification_class', 'classification');//
    }
    public function course()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2019-03-18
         * @describe:  course function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $data = $this->classification->insert_course_type($post['course_object_list'],$post['type_object_list']);
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
    public function type_filter_list($type=''){
        $data = [
            1=>['id'=>1,'name'=>'等级'],
            2=>['id'=>2,'name'=>'周期'],
            3=>['id'=>3,'name'=>'是否认证'],
        ]; 
        if($type==true){return $data;}
        $this->data->out(2001,$data);
    }
    public function list()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2019-03-14
         * @describe:  1.0 function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $data_head = [
            ["key"=>"id","value"=>"类型id","size"=>"5"],
            ["key"=>"name","value"=>"分类名称","size"=>"5"],
            ["key"=>"type_name","value"=>"所属分类名称","size"=>"7"],
            ["key"=>"is_leaf_name","value"=>"最小分类","size"=>"5"],
            ["key"=>"filter_list_name","value"=>"筛选条件","size"=>"5"],
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
            $this->list_json($post,$data_head);
            // $this->data->out(1003);
            }
    }
    private function list_csv($post,$data_head){
        $condition = $post['query_condition'];
        unset($condition['page_num'],$condition['page_size']);
        $data_body = $this->classification->model->list_page_json($post['query_condition']['page_num']['query_data'],$post['query_condition']['page_size']['query_data'],$condition);
        foreach($data_body as &$k){
            $k['filter_list_name'] = $this->return_filter_list($k['filter_list']);
            $k['type_name'] = $this->classification->return_type_name($k['type_id']);
            switch ($k['is_leaf']) {
                case '1':
                    $k['is_leaf_name'] = '是';
                    break;
                case '0':
                    $k['is_leaf_name'] = '否';
                    break;

                default:
                    $k['is_leaf_name'] = '未知';
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
    private function return_filter_list($number){
        $data = explode(',',$number);
        foreach($data as $k){
            $list .= $this->type_filter_list(1)[$k]['name'].',';
        }
        $list =  substr($list,0,strlen($list)-1); 
        return $list;
    }
    
    private function list_page_json($post,$data_head)
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2019-03-14
         * @describe:  list_page_json function
         * ================
         */
        $condition = $post['query_condition'];
        unset($condition['page_num'],$condition['page_size']);
        $data_body = $this->classification->model->list_page_json($post['query_condition']['page_num']['query_data'],$post['query_condition']['page_size']['query_data'],$condition);
        foreach($data_body as &$k){
            $k['filter_list_id'] = explode(',',$k['filter_list']);
            $k['filter_list_name'] = $this->return_filter_list($k['filter_list']);
            $k['type_name'] = $this->classification->return_parent_name($k['parent_id']);
            $k['is_leaf_id'] = $k['is_leaf'];
            switch ($k['is_leaf']) {
                case '1':
                    $k['is_leaf_name'] = '是';
                    break;
                case '0':
                    $k['is_leaf_name'] = '否';
                    break;

                default:
                    $k['is_leaf_name'] = '未知';
                    break;
            }
        }
        $data?$cond = 0:$cond = 1;
        $data['data_body'] = $data_body;
        $data['count'] = $this->classification->model->list_page_json_count($condition);
        $data['data_head'] = $data_head;
        $data['page_num'] = $post['query_condition']['page_num'];
        $data['page_size'] = $post['query_condition']['page_size'];
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2002,$data);
                break;
            default:
                $this->data->out(2001,$data);
            }
    }
    private function list_json()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       
         * @DataTime:  2019-03-14
         * @describe:  list_json function
         * ================
         */
        $data = $this->classification->list();
        foreach($data as &$k){
            $k['filter_list_name'] = $this->return_filter_list($k['filter_list']);
            $k['type_name'] = $this->classification->return_type_name($k['type_id']);
            switch ($k['is_leaf']) {
                case '1':
                    $k['is_leaf_name'] = '是';
                    break;
                case '0':
                    $k['is_leaf_name'] = '否';
                    break;

                default:
                    $k['is_leaf_name'] = '未知';
                    break;
            }
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
    
    public function data_filter($post){
        isset($post['data']['id'])?$data['id'] = $post['data']['id']:true;
        isset($post['data']['name'])?$data['name'] = $post['data']['name']:true;
        isset($post['data']['type_id'])?$data['type_id'] = $post['data']['type_id']:true;
        isset($post['data']['type_id'])?$data['parent_id'] = $post['data']['type_id']:true;
        isset($post['data']['is_leaf_id'])?$data['is_leaf'] = $post['data']['is_leaf_id']:true;
        isset($post['data']['filter_list_id'])?$data['filter_list'] = implode(',',$post['data']['filter_list_id']):true;
        // if($data['is_short']===''){unset($data['is_short']);}
        // if($data['is_cert']===''){unset($data['is_cert']);}
        if($data['filter_list']===''){unset($data['filter_list']);}
        if($data['is_leaf']===''){unset($data['is_leaf']);}
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
        $data = $this->classification->add($list);
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
        $data = $this->classification->edit($list);
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
        $data = $this->classification->del($post);
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
    public function getByClassificationId()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       
         * @DataTime:  2019-03-14
         * @describe:  getClassification function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $data = $this->classification->get_one($post);
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
    public function is_leaf_list()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2019-03-18
         * @describe:  is_leaf_list function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $data_head = [
            ["key"=>"id","value"=>"类型id","size"=>"5"],
            ["key"=>"name","value"=>"分类名称","size"=>"5"],
            ["key"=>"type_name","value"=>"所属分类名称","size"=>"7"],
            ["key"=>"is_leaf_name","value"=>"最小分类","size"=>"5"],
            ["key"=>"filter_list_name","value"=>"筛选条件","size"=>"5"],
        ];
        $post['query_condition']['is_leaf']['condition'] = 'equal';
        $post['query_condition']['is_leaf']['query_data'] = '1';
        switch ($post['data_type']) {
            case 'page_json':
                
                $this->list_page_json($post, $data_head);
                break;
            case 'page_csv':
                $this->list_csv($post, $data_head);
                break;
            default:
                $data = $this->classification->is_leaf_list();
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