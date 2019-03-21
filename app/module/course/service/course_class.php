<?php
namespace course;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       course
 * @DataTime:  2019-03-13
 * @describe:  course_course service class
 * ================
 */
final class course_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('course', 'course');
        $this->course_lecturer = app::load_model_class('course_lecturer','course');
        $this->type = app::load_model_class('course_type','classification');
    }
    public function get_one_type($id){
        $where['id'] = $id;
        return $this->type->get_one($where)['name'];
    }
    public function add($data){
         $course_id = $this->model->insert($data,true);
         $list['course_id'] = $course_id;
         $list['lecturer_id'] = $data['lecturer_id'];
         $list['lecturer_name'] = $data['lecturer_name'];
         return $this->course_lecturer->insert($list);
    }
    public function edit($data){
        $requirement['course_id'] = $where['id'] = $data['id'];
        $this->model->update($data,$where);
        //判断关联表里是否有这个讲师和此课程的关联 如果没有就添加
        $requirement['lecturer_id'] = $data['lecturer_id'];
        $requirement['lecturer_name'] = $data['lecturer_name'];
        $this->course_lecturer->get_one($requirement)!=true ?
        $this->course_lecturer->insert($requirement):
        true;
        return true;
    }
    public function del($data){
        $where['id'] = $data['id'];
         $this->model->delete($where);
         return $this->course_lecturer->delete('course_id='.$where['id']);
    }
    public function get_one($data){
        $where['id'] = $data['id'];
        return $this->model->get_one($where);
    }
    public function list(){
        return $this->model->slelct(1);
    }
    
}