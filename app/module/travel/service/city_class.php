<?php
namespace travel;

defined('IN_LION') or exit('No permission resources.');

final class city_class
{
	public function __construct()
	{
		$this->model = \app::load_model_class('city_cost', 'travel');//差旅表
		$this->operation = \app::load_model_class('operation_project', 'project');
    }
     //list
     public function list_city($post){
         $project_id = $post['id'];
         $token = $post['token'];
         $bool = $this->operation->get_one_operation($project_id,$token);
         if(!$bool){
             return false;
         }
        //  $where['id'] = $post['project_id'];
        //  $where['state'] = 0;
        //  $sql = 'project_id = '.$project_id['id'].' and state=0';
        return $this->model->select(1);
    }
    //get_one
    public function get_one_city($post){
        $project_id = $post['id'];
        $token = $post['token'];
        $bool = $this->operation->get_one_operation($project_id,$token);
        if(!$bool){
            return false;
        }
        $where['project_id'] = $post['project_id'];
        return $this->model->get_one($where);
    }
    
    //增/改
    public function add_city($post){
        
        return $this->model->insert($post);
    }

    //删
    public function del_city($post){
        $project_id = $post['id'];
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
    public function edit_city($post){
        $project_id = $post['id'];
        $token = $post['token'];
        $bool = $this->operation->del_operation($project_id,$token);
        if(!$bool){
            return false;
        }
        $where['id'] = $post['id'];
        $data['state'] = 1;
        $this->model->update($data,$where);
        unset($post['id']);
        return $this->model->insert($post);
    }
    public function test(){
        echo 1;
    }
}