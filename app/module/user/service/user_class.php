<?php
namespace user;
defined('IN_LION') or exit('No permission resources.');

final class user_class{
    public function __construct() {
		$this->model = \app::load_app_class('user','user');
	
    }
   public function get_one($where){
   return $this->model->get_one($where);
   }
   public function update($username,$token){
    $where['username'] = $username;
    $data['token'] = $token;
    $css = $this->model->update($data,$where);
    if($css){
        return $token;
    }else{
        return false;
    }
   }
   public function admin($token){
    $where['token'] = $token;
    $data = $this->model->get_one($where);
    // return $data;
    if($data['state'] == 1){
        return 1;
    }else{
        return $token;
    }
   }
}