<?php
namespace classification;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       classification
 * @DataTime:  2019-03-14
 * @describe:  classification_classification service class
 * ================
 */
final class classification_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('course_type', 'classification');
        $this->course_group_type = app::load_model_class('course_group_type','course');
    }
    /**
     * ================
     * @Author:        css
     * @Parameter:     
     * @DataTime:      2019-03-18
     * @Return:        
     * @Notes:         分类和课程的关联
     * @ErrorReason:   
     * ================
     */
    public function insert_course_type($course_list,$type_list){
        foreach($course_list as $key){
            foreach($type_list as $k){
                $data['course_id'] = $key;
                $data['type_id'] = $k;
                $data['type_name'] = $this->model->get_one('id = '.$k)['name'];
                if($this->course_group_type->get_one($data)==false){
                $this->course_group_type->insert($data);}
            }
        }
        return true;
    }
    public function add($data){
        return $this->model->insert($data);
    }
    public function edit($data){
        $where['id'] = $data['id'];
        return $this->model->update($data,$where);
    }
    public function del($data){
        $where['id'] = $data['id'];
        return $this->model->delete($where);
    }
    public function get_one($data){
        $where['id'] = $data['id'];
        return $this->model->get_one($where);
    }
    public function list(){
        return $this->model->select(1);
    }
    public function return_type_name($id){
        $where['id'] = $id;
        return $this->model->get_one($where)['name'];
    }
    public function is_leaf_list(){
        return $this->model->select('is_leaf=1');
    }
    public function return_parent_name($id){
        $where['id'] = $id;
        return $this->model->get_one($where)['name'];
    }
}