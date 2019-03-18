<?php
namespace lecturer;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2019-03-15
 * @describe:  lecturer_course controller class
 * ================
 */
class course_controller
{
    private $data,$course;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        $this->code = app::load_cont_class('common','user');//加载token
        $this->operation = app::load_service_class('operation_class','operation');//加载操作
        //todo 加载相关模块
        $this->course = app::load_service_class('course_class', 'lecturer');//
    }
    private function data_fitler($post){
        isset($post['data']['id'])?$data['id'] = $post['data']['id']:true;
        isset($post['data']['parent_id'])?$data['course_id'] = $post['data']['parent_id']:true;
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
         * @DataTime:  2019-03-15
         * @describe:  add function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $list = $this->data_fitler($post);
        $data = $this->course->add($list);
        $data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2015,[]);
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
         * @DataTime:  2019-03-15
         * @describe:  edit function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $list = $this->data_fitler($post);
        $data = $this->course->edit($list);
        $data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2016);
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
         * @ver:       
         * @DataTime:  2019-03-15
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
         * @ver:       1.0
         * @DataTime:  2019-03-15
         * @describe:  getByCourseId function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $data['lecturer'] = $this->course->get_course($post);
        foreach($data['lecturer'] as &$k){
            $k['parent_id'] = $k['course_id'];
            $k['teacher_name_id'] = $k['lecturer_id'];
            $k['teacher_name_name'] = $k['lecturer_name'];
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