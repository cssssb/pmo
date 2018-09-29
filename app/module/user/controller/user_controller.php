<?php
namespace user;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       user
 * @DataTime:  2018-09-26
 * @describe:  V1.0
 * ================
 */
class user_controller
{
    private $view;
    /**
     * 构造函数
     */

    public function __construct()
    {   
        $this->post = json_decode(file_get_contents('php://input'),true);
        $this->user = \app::load_service_class('user_class', 'user');//
        $this->project_header_class = \app::load_service_class('project_header_class', 'user');//项目表
        // $this->travel = \app::load_view_class('travel_plan_class', 'user');//差旅安排

    }
   
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
    //登陆
    public function login(){
        // $username = preg_match("/^[\x{4e00}-\x{9fa5}]{2,30}$/u", $_POST['username']);
            //code_user 登录注册可用
        $post = $this->post;
        // $username = $post['username'];
        // $password = $post['password'];
        $username = '123456';
        $password = '123456';
        $md_username = mb_strlen($username);
        $md_password = mb_strlen($password);
        $data = $this->login_code($username,$password,$md_username,$md_password);
        // echo var_dump($data);die;
        if(!$data){
            $msg['code'] = 1;
            $msg['msg'] = '账号或密码输入不合规范';
            echo var_dump($msg);die;
        }
        $data_have = $this->user->get_one($data);
        $msg['code'] = 1;
        $msg['msg'] = '账号或密码输入有误';
        $token = $data_have ? $css=$this->token($data_have) : json_encode($msg);
        echo var_dump($css);
    }
    private function token($data_have)
    {
        $username = $data_have['username'];
        $str = "QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";
        str_shuffle($str);
        $token = substr(str_shuffle($str), 26, 10);
        $css = $this->user->update_token($username,$token);
        return $css;
    }
        public function test(){
        $msg = [];
        $msg['stat_time'] = $this->getMillisecond();
        $data = $this->ding->of_ding();
        $msg['data'] = $data;
        $msg['code'] = 0;
        $msg['msg'] = "查询成功";
        $msg['end_time'] = $this->getMillisecond();
        $msg['during_time'] =  $msg['end_time'] - $msg['stat_time'];
        echo json_encode($msg);
        // print_r($msg);die;
    }
    private function getMillisecond() {
        list($t1, $t2) = explode(' ', microtime());
        return (float)sprintf('%.0f',(floatval($t1)+floatval($t2))*1000);
    }

    //获取token判断用哪个自定义函数
    public function index(){
        $post = $this->post;
        $token = $post['token'];
        $token = 'vproYbNm0n';
        $data = $this->user->admin($token);
        // echo var_dump($data);die;
        $data == 1?$return = $this->admin_token():$retrun = $this->user_token($data);
        echo var_dump($return);
        
    }
    private function admin_token(){
        return $this->project_header_class->select();
    }
    private function user_token($data){
    }

}
