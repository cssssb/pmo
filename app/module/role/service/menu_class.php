<?php
namespace role;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       menu
 * @DataTime:  2018-12-05
 * @describe:  role_menu service class
 * ================
 */
final class menu_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('menu', 'role');
        $this->menu_static = app::load_model_class('menustatic','role');
    }
    public function add_menu($data){
        $role_id = $data['role_id'];
        //判断长度 
        if(strlen($data['fmenu_id'])>=strlen($data['menu_id'])){
            return $this->fmenu($data);
        }
        return $this->menu($data);
       
    }
    private function fmenu($data){
        $fmenu = explode(',',$data['fmenu_id']);
        $menu = explode(',',$data['menu_id']);
        foreach($fmenu as $k=>$v){
            $data['fmenu_id'] = $v;
            $data['menu_id'] = $menu[$k];
            $have = $this->model->get_one($data);
            if(!$have){
            $return = $this->model->insert($data);}
        }
        return $return;
    }
    private function menu($data){
        $fmenu = explode(',',$data['fmenu_id']);
        $menu = explode(',',$data['menu_id']);
        foreach($menu as $k=>$v){
            $data['menu_id'] = $v;
            $data['fmenu_id'] = $fmenu[$k];
            $have = $this->model->get_one($data);
            if(!$have){
            $return = $this->model->insert($data);}
        }
        return $return;
    }
    public function return_menu($role_id){
        $data = $this->model->retrun_menu($role_id);
        foreach($data as $k){
            $tema = $k['type'];
            $return[$tema]['data'][] = $k;
            $return[$tema]['name'] = $k['name'];
        }
        return $return;
    }
    public function return_menu_static($role_id){
        $where['role_id'] = $role_id;
        $data = $this->menu_static->get_one($where);
        $data['data'] = json_decode($data['data']);
        return $data;
    }
    //生成静态json  12/6
    public function add_v_menu($data){
        $temo['data'] = json_encode($data,JSON_UNESCAPED_UNICODE);
        return $this->menu_static->insert($temo);
    }
}