<?php
namespace travel;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       meal
 * @DataTime:  2018-10-29
 * @describe:  travel_meal service class
 * ================
 */
final class meal_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('meal', 'travel');
        $this->people = app::load_model_class('people', 'travel');
    }
    public function list_meal($parent_id){
        return $this->model->list_meal($parent_id);
    }
    public function people(){
        return $this->people->select(1);
    }
    //增/改
    public function add_meal($post){
        return $this->model->insert($post);
    }
     //删
     public function del_meal($post){
        $where['id'] = $post['id'];
        return $this->model->delete($where);
    }
    //改
    public function edit_meal($post){
        $where['id'] = $post['id'];
       return $this->model->update($post,$where);
    }
    public function get_fee($parent_id){
        $where['parent_id'] = $parent_id;
        $data = $this->model->select($where);
        if($data){
        foreach($data as $key){
            $fe[] = $key['meal_fee'];
        }
        return array_sum($fe);}
        return 0;
    }
}