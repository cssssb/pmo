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
    
    public function list(){
        $data = $this->model->list();
        foreach($data as $key){
            $name['name'] = $key['province_name'].'--'.$key['city_name'].'--'.$key['name'];
            $name['id'] = $key['id'];
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
        return $this->model->update($data,$where);
    }
    public function del($id){
        $where['id'] = $id;
        return $this->model->update($where);
    }
    //拼接
    public function connect($id=0){
        $where['id'] = $id;
        $data = $this->model->get_one($where);
        $data==true ?$one = $this->ares->get_one('id = '.$data['province_id'],'name'):true;
        $data==true?$two = $this->ares->get_one('id = '.$data['city_id'],'name'):true;
        $data==true?$return = $one['name'].'--'.$two['name'].'--'.$data['name']:$return = true;
        return $return;
    }
}