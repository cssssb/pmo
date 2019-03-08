<?php
namespace lecturer;

defined('IN_LION') or exit('No permission resources.');

final class lecturer_class
{
	public function __construct()
	{
		$this->model = \app::load_model_class('lecturer', 'lecturer');
		$this->coop = \app::load_model_class('coop', 'lecturer');

	}

    public function get_one($id){
        $where['id'] = $id;
        return $this->model->get_one($where);
    }
    public function of_list(){
        return $this->model->of_list();
    }

    public function cooperation_list(){
        return $this->coop->select(1);
    }
    public function list_json(){
       $data = $this->model->list_page_json();
       foreach($data as &$k){
           $k['state_id']=$k['state'];
           switch ($k['state']) {
                case '2':
                   $k['state_name'] = '经常联系';
                    break;
                case '1':
                   # code...
                   $k['state_name'] = '偶尔联系';
                    break;
                case '0':
                $k['state_name'] = '没联系过';
                   # code...
                    break;
           }
           $k['state_id']=$k['state'];
       }
       return $data;
    }
    public function add($data){
        // return $data;
        return $this->model->insert($data);
    }
        
    public function edit($data){
        $where['id'] = $data['id'];
        return $this->model->update($data,$where);
    }
    public function del($data){
        $where['id'] = $data['id'];
        return $this->model->delete($where);
    }
}