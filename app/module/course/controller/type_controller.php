<?php
namespace course;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2019-03-15
 * @describe:  course_type controller class
 * ================
 */
class type_controller
{
    private $data,$type;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        $this->code = app::load_cont_class('common','user');//加载token
        $this->operation = app::load_service_class('operation_class','operation');//加载操作
        //todo 加载相关模块
        $this->type = app::load_service_class('type_class', 'course');//
    }
    private function data_filter($post){
        isset($post['data']['id'])?$data['id'] = $post['data']['id']:true;
        isset($post['data']['parent_id'])?$data['course_id'] = $post['data']['parent_id']:true;
        isset($post['data']['type_id'])?$data['type_id'] = $post['data']['type_id']:true;
        isset($post['data']['type_name'])?$data['type_name'] = $post['data']['type_name']:true;
        return $data;
    }
    public function add()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2019-03-15
         * @describe:  add function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $list = $this->data_filter($post);
        $data = $this->type->add($list);
        $data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2017);
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
         * @DataTime:  2019-03-15
         * @describe:  edit function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $list = $this->data_filter($post);
        $data = $this->type->edit($list);
        $data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2018);
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
         * @DataTime:  2019-03-15
         * @describe:  del function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $data = $this->type->del($post);
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
         * @ver:       1.0
         * @DataTime:  2019-03-15
         * @describe:  getByTypeId function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $data['type'] = $this->type->get_type($post);
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