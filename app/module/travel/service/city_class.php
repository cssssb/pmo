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
     public function list_city($parent_id){
         
        //  $where['id'] = $post['parent_id'];
        //  $where['state'] = 0;
         $sql = 'parent_id = '.$parent_id.' and state=0';
        return $this->model->select($sql);
    }
    //get_one
    public function get_one_city($post){
      
        $where['parent_id'] = $post['parent_id'];
        return $this->model->get_one($where);
    }
    
    //增/改
    public function add_city($post){
        
        return $this->model->insert($post,1);
    }

    //删
    public function del_city($post){
       
        $where['id'] = $post['id'];
        return $this->model->delete($where);
    }
    //改
    public function edit_city($data){
        
        $where['id'] = $data['id'];
       return $this->model->update($data,$where);
    }
    public function get_fee($parent_id){
        $where['parent_id'] = $parent_id;
        $data = $this->model->select($where);
        if($data){
        foreach($data as $key){
            $fe[] = $key['short_fee'];
        }
        return array_sum($fe);
    }
        return 0;
    }
}