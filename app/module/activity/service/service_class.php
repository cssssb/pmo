<?php
namespace activity;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       enroll_user
 * @DataTime:  2019-02-22
 * @describe:  activity_code service class
 * ================
 */
final class service_class
{
    public function __construct()
    {
        $this->user = app::load_model_class('enroll_user', 'activity');//admin用户
        $this->signup = app::load_model_class('enroll_signup', 'activity');//报名用户
        $this->page = app::load_model_class('enroll_page', 'activity');//页面详细信息
        $this->visitor = app::load_model_class('enroll_visitor', 'activity');//记录浏览用户
        $this->activity = app::load_model_class('enroll_activity', 'activity');//活动列表
    }
    private function token()
    {
        $str = "QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";
        str_shuffle($str);
        $name = substr(str_shuffle($str), 26, 10);
        return $name;
    }
    //发送验证码
   public function commit_code($number,$act_token){
    $where['page_token'] = $act_token;
    $data['form_id'] = $this->page->get_one($where)['id'];
    $data['phone'] = $number;
    $data['code'] = rand(1000, 9999);
    $data['code_time'] = time();
    $have = $this->signup->get_one('phone ='.$number.' and state=1 and form_id='.$data['from_id']);
    if($have){
       return $this->signup->update('code='.$data['code'],'phone='.$number.' and form_id='.$data['from_id']);
    }
    return $this->signup->insert($data);
   }
    //添加到用户表 手机号、姓名、时间、公司名称
    public function  send_data($number,$code,$name,$company_name,$act_token){
        $where['phone'] = $number;
        $code_data = $this->signup->get_one($where);
        $is_have = $code_data['state'];
        //已有此手机号
        if($is_have==2){
            return 1;
        }
         //手机号码不相符
         $where['code'] = $code;
         $bool = $this->signup->get_one($where);
         if($bool!=true){
             return 2;
         }
         // 时间过长
        $code_time = time() - $bool['code_time'];
        if($code_time>3600){
            return 3;
        }
        $data['token_user'] = $this->token();
        $data['time'] = time();
        $data['state'] = 2;
        $data['name'] = $name;
        $data['company_name'] = $company_name;
        //通过验证 将数据添加到表signup 状态字段改为2
        if($this->signup->update($data,$where)){
            return $this->update_sign_up_number($act_token);
            
        }
        return 5;
    }
   private function update_sign_up_number($act_token){
       $where['page_token'] = $act_token;
        $data = $this->page->get_one($where);
        $data['sign_up_number'] = $data['sign_up_number']++;
        $this->page->update($data,$where);
        return 4;
   }

   public function page_list($from_token){
       $where['access_token'] = $from_token;
        $from_id = $this->activity->get_one($where)['id'];
        $page_data = $this->page->select('f_id='.$from_id);
        return $page_data;
   }
}