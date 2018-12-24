<?php
namespace menu;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2018-11-30
 * @describe:  menu_menu service class
 * ================
 */
final class menu_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('menu', 'menu');
        $this->on = app::load_model_class('on','menu');
        $this->static = app::load_model_class('menustatic','menu');
    }
    // public function add($data){
        
    // }
    public function list(){
        //yaojiagefuwu
        $data = $this->model->select_viewand_type();
        foreach($data as $k){
            $temp = $k['type'];
            $date[$temp]['data'][]=$k;
            $date[$temp]['name']=$k['name'];
        }
        return $date;
    }
    public function static_list(){
        return $this->static->select(1);
    }
    public function get_one_state($id){
        $where['id'] = $id;
        return $this->static->get_one($where);
    }
    public function add_static($data){
        $ass['id'] = $this->static->insert($data,true);
        return $ass;
    }
    public function edit_static($data){
        $where['id'] = $data['id'];
        $data['data'] = json_encode($data['data'],JSON_UNESCAPED_UNICODE); 
        return $this->static->update($data,$where);
    }
    public function del_static($id){
        $where['id'] = $id;
        return $this->static->delete($where);
    }
    public function listmenuleft(){
        return $this->model->select(1);
    }
    public function listmenuright(){
        return $this->on->select(1);
    }
    public function menu_static_list($role_id){
        $where['role_id'] = $role_id;
        return $this->static->get_one($where);
    }
}