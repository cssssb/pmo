<?php
namespace course;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       type
 * @DataTime:  2019-03-15
 * @describe:  course_ service class
 * ================
 */
final class type_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('course_group_type', 'course');
    }
    public function add($data){
        if($this->model->get_one($data)){
            return false;
        }
        return $this->model->insert($data);
    }
    public function edit($data){
        $a = $this->model->get_one($data);
        if($a){
            return false;
        }
        $where['id'] = $data['id'];
        return $this->model->update($data,$where);
    }
    public function del($data){
        $where['id'] = $data['id'];
        return $this->model->delete($where);
    }
    public function get_type($data){
        $where['course_id'] = $data['id'];
        return $this->model->select($where);
    }
}