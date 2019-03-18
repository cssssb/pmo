<?php
namespace lecturer;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       
 * @DataTime:  2019-03-15
 * @describe:  lecturer_course service class
 * ================
 */
final class course_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('course_lecturer', 'course');
    }
    public function add($data){
        if($this->model->get_one($data)){
            return false;
        }
        return $this->model->insert($data);
    }
    public function edit($data){
        $where['id'] = $data['id'];
        if($this->model->get_one($data)){
            return false;
        }
        return $this->model->update($data,$where);
    }
    public function del($data){
        $where['id'] = $data['id'];
        return $this->model->delete($where);
    }
    public function get_course($data){
        $where['course_id'] = $data['id'];
        return $this->model->select($where);
    }
}