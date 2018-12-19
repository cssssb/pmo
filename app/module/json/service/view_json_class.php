<?php
namespace json;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       view_json
 * @DataTime:  2018-11-22
 * @describe:  json_view_json_class service class
 * ================
 */
final class view_json_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('view_json', 'json');
    }
    public function add($data){
        return $this->model->insert($data);
    }
    public function edit($data){
        $where['id'] = $data['id'];
       return  $this->model->update($data,$where);
    }
    public function list(){
        $data = $this->model->select(1);
        foreach($data as $k=>$v){
        $data[$k]['data'] = json_decode($data[$k]['data']);
    }
    return $data;
    }
    public function name($name){
        $where['name'] = $name;
        $data = $this->model->get_one($where);
        return $data['data'];
    }
    //返回角色下的json
    public function return_role_in_view($data){

    }
}