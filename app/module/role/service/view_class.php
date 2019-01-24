<?php
namespace role;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2018-11-30
 * @describe:  role_view service class
 * ================
 */
final class view_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('view', 'role');
        $this->json = app::load_model_class('view_json','json');
    }
    public function add($data){
        $ass = explode(",",$data['view_id']);
        $data_id['role_id'] = $data['role_id'];
        foreach($ass as $k){
            $data_id['view_id'] = $k;
            $have = $this->model->get_one($data_id);
            if(!$have){
            $css = $this->model->insert($data_id);}
        }
        return $css;
    }
    public function del($data){
        $ass = explode(",",$data['view_id']);
        $data_id['role_id'] = $data['role_id'];
        foreach($ass as $k){
            $data_id['view_id'] = $k;
            $css = $this->model->delete($data_id);
        }
        return $css;
    }

    public function return_json($role_id){
        //查找表中所有role_id=$role_id 在表role_view中
        $where['role_id'] = $role_id;
        $data = $this->model->select($role_id);
        //$data是他们的关系
        foreach($data as $key){
            $jsons[] = $key['view_id'];
        }
        foreach($jsons as $key=>$val){
            $one['id'] = $val;
            $return[$key] = $this->json->get_one($one);
            $return[$key]['data'] = json_decode($return[$key]['data']);
        }
        return $return;
        // foreach()
    }
}