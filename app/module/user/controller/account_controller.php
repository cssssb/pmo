<?php
namespace user;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    lion
 * @ver:       
 * @DataTime:  2018-10-18
 * @describe:  user_account controller class
 * ================
 */
class account_controller
{
    private $data,$account;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        //todo 加载相关模块
        $this->user = app::load_service_class('user_class', 'user');//
        
    }
    public function login()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       0.1
         * @DataTime:  2018-10-19
         * @describe:  login function
         * ================
         * 
         */
         $post = $this->data->get_post();//获得post
        //  $post['account'] = '张三';
        //  $post['password'] = '123465456';
         $strlen_username = strlen($post['account']);
         $strlen_password = strlen($post['password']);
         if(!preg_match(
             "/^[a-zA-Z0-9_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]+$/",$post['account'])){
             $cond = 4;
         } elseif (20 < $strlen_username || $strlen_username < 2) {
             $cond = 5;
         }
         if (!preg_match(
            "/^[a-zA-Z\d_]{6,}$/",$post['password']
        )) {
            $cond = 6;           
        } elseif (19 < $strlen_password) {
            $cond = 7;
        }
         $cond = $this->user->login($post['account'],$post['password']);
        //  var_dump($code);die;
        //开始输出
        switch ($cond) {
            case   1://未发送账号
                $this->data->out(3001);
                break;
            case   2://未发送密码
                $this->data->out(3002);
                break;
            case   3://账号密码不符
                $this->data->out(3003);
                break;
            case   4://账号格式不正确
                $this->data->out(3004);
                break;
            case   5://账号长度不符合规范
                $this->data->out(3005);
                break;
            case   6://密码格式不正确
                $this->data->out(3006);
                break;
            case   7://密码长度不符合规范
                $this->data->out(3007);
                break;
            default://登录成功
                $this->data->out(3008,['token'=>$cond]);
            }
    }
} 