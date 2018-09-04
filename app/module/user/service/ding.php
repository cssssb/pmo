<?php
namespace user;
defined('IN_LION') or exit('No permission resources.');
// echo "load ding_service";
// echo  microtime();
// echo "\n";
final class ding{
    public function __construct() {
		$this->model = \app::load_app_class('ding_member','user');
		$this->demt = \app::load_app_class('ding_department','user');
		$this->about = \app::load_app_class('ding_about_staff','user');
	
    }
    public function cssssb(){
        return 1;die;
    }
    public function get_one($where){
        return $this->model->get_one($where);
    }
    public function update($where,$data){
        // return $data;die;
       return  $this->model->update($data,$where);
    }
    public function insert($data){
        return $this->model->insert($data);
    }
    public function not_in($number){
        $where='state != '.$number;
        $data['quit'] = 1;
        return  $this->model->update($data,$where);
    }
    public function select(){
        $where = 1;
        return $this->model->select($where);
    }
    public function of_ding(){
       return $data = $this->demt->of_ding();
    }
    public function small_list(){
        $where['quit'] = 0;
        return  $this->model->select($where,'id,name');
    }
    public function select_staff($department){
        $where = ' quit = 0 and FIND_IN_SET('.$department.',department)';
        return $this->model->select($where);
    }
    public function new_member($department){
        foreach($department as $key){
        $where['department_id'] = $key['department_id'];
        $ass = $this->demt->get_one($where);
        $data = $key;
        if($ass){
        $css = $this->demt->update($data,$where);
        }else{
        $css = $this->demt->insert($data);
        }}
        if($css){
            return true;
        }else{
            return false;
        }
    }
    public function slelct_department(){
        return $this->demt->select();
    }

    public function add_about_staff($de_data){
        return $this->about->insert($de_data);
    }
    public function select_about_staff($department){
        return $this->about->select_about_staff($department);
    }
    public function csst_departent_list(){
        $where = ' parentid != 0';
        return $this->demt->select($where);
    }
}