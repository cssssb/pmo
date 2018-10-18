<?php
namespace travel;

defined('IN_LION') or exit('No permission resources.');

final class stay_class
{
	public function __construct()
	{
		$this->model = \app::load_model_class('stay_cost', 'travel');//差旅表
		$this->operation = \app::load_model_class('operation_project', 'project');
    }
     //list
     public function list_stay($parent_id){
       
        //  $where['id'] = $post['parent_id'];
        //  $where['state'] = 0;
        $sql = 'parent_id = '.$parent_id.' and state=0';
        return $this->model->select($sql);
    }
    //get_one
    public function get_one_stay($post){
        
        $where['parent_id'] = $post['parent_id'];
        return $this->model->get_one($where);
    }
    
    //增/改
    public function add_stay($post){
       
        return $this->model->insert($post);
    }

    //删
    public function del_stay($post){
       
        $where['id'] = $post['id'];
        $data['state'] = 1;
        return $this->model->update($data,$where);
    }
    //改
    public function edit_stay($post){
       
        $where['id'] = $post['id'];
        $data['state'] = 1;
        $this->model->update($data,$where);
        unset($post['id']);
        return $this->model->insert($post);
    }
}