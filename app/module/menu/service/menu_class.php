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
    }
    public function add($data){
        // foreach($data as $k=>$v){
        //     $css['type'] = $data[$k];
        //     $css['name'] = $data[$k]['name'];
        //     $menu_id = $this->model->insert($css,1);
        //     $acc = $data[$k]['data'];
        //     foreach($acc as $key=>$val){
        //     $ass['fid'] = $menu_id;
        //     $ass['path'] = $acc[$key]['path'];
        //     $ass['component'] = $acc[$key]['component'];
        //     $ass['title'] = $acc[$key]['title'];
        //     $c = $this->on->insert($ass);                
        //     }
        // }
        // if($c){
        //     return true;
        // }else{
        //     return false;
        // }
    }
    // public function list(){
    //     $data = $this->model->select(1);
    //     foreach($data as $k){
    //         $temp = $this->on->select('fid ='.$k['id']);
    //         $date[$k['type']]['data']=$temp;
    //         $date[$k['type']]['name']=$k['name'];
    //     }
    //     return $date;
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
     
}