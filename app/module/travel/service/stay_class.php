<?php
namespace travel;

defined('IN_LION') or exit('No permission resources.');

final class stay_class
{
	public function __construct()
	{
		$this->model = \app::load_app_class('stay_cost', 'travel');//差旅表
		$this->operation = \app::load_app_class('operation_project', 'project');
    }
     //list
     public function list_stay($post){
         $project_id = $post['project_id'];
         $token = $post['token'];
         $bool = $this->operation->get_one_operation($project_id,$token);
         if(!$bool){
             return false;
         }
         $where['project_id'] = $post['project_id'];
         $where['state'] = 0;
        return $this->model->select($where);
    }
    //get_one
    public function get_one_stay($post){
        $project_id = $post['project_id'];
        $token = $post['token'];
        $bool = $this->operation->get_one_operation($project_id,$token);
        if(!$bool){
            return false;
        }
        $where['project_id'] = $post['project_id'];
        return $this->model->get_one($where);
    }
    
    //增/改
    public function add_stay($post){
        if($post['id']){
            return $this->edit_stay($post);
        }
        return $this->model->insert($post);
    }

    //删
    public function del_stay($post){
        $project_id = $post['project_id'];
        $token = $post['token'];
        $bool = $this->operation->del_operation($project_id,$token);
        if(!$bool){
            return false;
        }
        $where['id'] = $post['id'];
        $data['state'] = 1;
        return $this->model->update($data,$where);
    }
    //改
    public function edit_stay($post){
        $project_id = $post['project_id'];
        $token = $post['token'];
        $bool = $this->operation->del_operation($project_id,$token);
        if(!$bool){
            return false;
        }
        $where['id'] = $post['id'];
        $data['state'] = 1;
        $this->update($data,$where);
        unser($post['id']);
        return $this->model->insert($post);
    }
}