<?php
namespace user;
defined('IN_LION') or exit('No permission resources.');

final class user_class{
    public function __construct() {
		$this->model = \app::load_model_class('user','user');
	
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
    public function login($username='',$password=''){
        if(!$username){
            return  1;
        }
        if(!$password){
            return  2;
        }
        $where['username'] = $username;
        $where['password'] = $password;
        $token = $this->token();
        $data['token'] = $token;
        $data['time'] = date('Y-m-d H:i:s',time());
        $return = $this->model->get_one($where);
        $this->model->update($data,$where);
        if(!$return){
            return 3;
        }
        
            return $token;
    }

    
    private function token(){
        $str = "QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";
        str_shuffle($str);
        $name = substr(str_shuffle($str), 26, 10);
        return $name;
    }

}
