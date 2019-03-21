<?php
namespace course;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       
 * @DataTime:  2019-03-20
 * @describe:  course_ service class
 * ================
 */
final class plan_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('course_plan', 'course');
    }
    public function get_one_data($id){
        $where['id'] = $id;
        return $this->model->get_one($where)['data'];
    }
    public function edit($id,$list){
        $data['id'] = $where['id'] = $id;
        $data['data'] = $list;
        if($this->model->get_one($where)){
            return $this->model->update($data,$where);
        }
        return $this->model->insert($data);
    }
    public function list_course($ids){
        $ids = implode(',',$ids);
        return $this->model->select('id in ('.$ids.')');

    }
}