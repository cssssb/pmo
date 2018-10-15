<?php
namespace user;
defined('IN_LION') or exit('No permission resources.');

final class user_class{
    public function __construct() {
		$this->model = \app::load_model_class('user','user');
	
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

    /**
     * ================
     * @Function:     
     * @Parameter:    
     * @DataTime:     2018-09-19
     * @Return:       
     * @Notes:        验证发送过来的账号密码是否合法
     * @ErrorReason:  null
     * ================
     */   
    private function login_code($username,$password,$md_username,$md_password){
        if (!preg_match(
            "/^[a-zA-Z0-9_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]+$/",
            $username
        )) {
            return false;
        } elseif (20 < $md_username || $md_username < 2) {
            return false;
        }
        if (!preg_match(
            "/^[a-zA-Z\d_]{6,}$/",
            $password
        )) {
            return false;
        } elseif (19 < $md_password) {
            return false;
        }
        $data['username'] = $username;
        $data['password'] = $password;
        return $data;
    }
    public function login($username,$password){
        $md_username = mb_strlen($username);
        $md_password = mb_strlen($password);
        $data = $this->login_code($username,$password,$md_username,$md_password);
    }
}