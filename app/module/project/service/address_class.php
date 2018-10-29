<?php
namespace project;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       address
 * @DataTime:  2018-10-24
 * @describe:  address_address service class
 * ================
 */
final class address_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('address', 'project');
        $this->ares = app::load_model_class('ares', 'project');
    }
    //需要修改
    public function list(){
        $where['state'] = 0;
        $data = $this->model->list($where);
        foreach($data as $key){
            $name['name'] = $key['province_name'].'--'.$key['city_name'].'--'.$key['name'];
            $return[] = $name;
        }
        return $return;
    }
    public function list_province(){
        $where['type'] = 1;
        return $this->ares->select($where);
    }
    public function list_city($id=''){
        if(!$id){
            $where['type'] = 2;
        }else{
            $where['fid'] = $id;
        }
        return $this->ares->select($where);
    }
    public function add($province_id,$city_id,$name){
        $data['province_id'] = $province_id;
        $data['city_id'] = $city_id;
        $data['name'] = $name;
        return $this->model->insert($data);
    }
    public function edit($data){
        $where['id'] = $data['id'];
        $state['state'] = 1;
        $this->model->update($state,$where);
        unset($data['id']);
        return $this->model->insert($data);
    }
    public function del($id){
        $where['id'] = $id;
        $data['state'] = 2;
        return $this->model->update($data,$where);
    }
    //拼接
    public function connect($id){
        $where['id'] = $id;
        $data = $this->model->get_one($where);
        $one = $this->ares->get_one('id = '.$data['province_id'],'name');
        $two = $this->ares->get_one('id = '.$data['city_id'],'name');
        $return = $one['name'].'--'.$two['name'].'--'.$data['name'];
        return $return;
    }
}