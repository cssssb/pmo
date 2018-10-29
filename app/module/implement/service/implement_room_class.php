<?php
namespace implement;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       implement_room
 * @DataTime:  2018-10-23
 * @describe:  implement_implemect_room service room
 * ================
 */
final class implement_room_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('implement_room', 'implement');
        $this->address = app::load_model_class('address','implement');
    }
    public function add($data){
		$data['time'] = date('y-m-d H:i:s',time());
        return $this->model->insert($data);
    }
    public function edit($data){
        $state['state'] = 1;
        $where['parent_id'] = $data['parent_id'];
        $this->model->update($state,$where);
        unset($data['id']);
        $data['time'] = date('y-m-d H:i:s',time());
        return $this->model->insert($data);
    }
    public function del($id){
        $data['state'] = 2;
        $where['id'] = $id;
        return $this->model->update($data,$where);
    }
    public function get_project($parent_id){
        $where['parent_id'] = $parent_id;
        $where['state'] = 0;
        return $this->model->select($where);
    }
}