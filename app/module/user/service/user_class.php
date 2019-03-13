<?php
namespace user;
defined('IN_LION') or exit('No permission resources.');

final class user_class{
    public function __construct() {
		$this->model = \app::load_model_class('user','user');
	
    }
    public function edit_password($token,$new_password){
        $data['password'] = $new_password;
        $where['token'] = $token;
        return $this->model->update($data,$where);
    }
    /**
     * ================
     * @Author:        lion
     * @Parameter:     login
     * @DataTime:      2018-10-19
     * @Return:        bool
     * @Notes:         账号登录
     * @ErrorReason:   
     * ================
     */
    public function login($username,$password){
        
        $where['username'] = $username;
        $where['password'] = $password;
        $token = $this->token();
        $data['token'] = $token;
        $data['time'] = date('Y-m-d H:i:s',time());
        $return = $this->model->get_one($where);
        if($return!=true){
            return 3;
        }
        $this->model->update($data,$where);
        
            return $token;
    }

    
    private function token(){
        $str = "QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";
        str_shuffle($str);
        $name = substr(str_shuffle($str), 26, 10);
        return $name;
    }

}
