<?php
namespace certificate;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2019-04-11
 * @describe:  certificate_user controller class
 * ================
 */
class user_controller
{
    private $data,$user;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        //todo 加载相关模块
        $this->user = app::load_service_class('user_class', 'certificate');//
    }
    /*
    *$post = [
        "user"=>"张三",
        // "password"=>"mima",
        "usercode"=>"142622199710000000",
        "phone"=>"13838383838",
        "course_id"=>"1,2,3"
    *];
     */
     //发送账户token  获取他自己的在数据库里的数据
    public function get_one(){
    if($_POST['token']==null){
        $this->data->out(5019);
    }
    $data = $this->user->user_list($_POST);
    if(!$data){
        $this->data->out(2001);
    }
    $this->data->out_data($data);
    }
    public function login(){
        $post  = $this->data->get_post();
        
    }
    public function create_user(){
        $post = $this->data->get_post();
        $bool = $this->user->create_user($post);
    }
    public function longestCommonPrefix(){
        
    }
}