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
        $this->model = app::load_model_class('classification', 'classification');
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
    
}