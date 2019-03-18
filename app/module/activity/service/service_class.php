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
        $this->browse = app::load_model_class('enroll_browse', 'activity');//记录浏览用户
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
    $data['form_id'] = $this->page->get_one("page_token='$act_token'")['id'];
    $data['phone'] = $number;
    $data['code'] = rand(1000, 9999);
    $data['code_time'] = time();
    $data['page_id'] = 3;
    $have = $this->signup->get_one('phone ='.$number.' and (state=1 or state=2) and form_id='.$data['form_id']);
    app::load_sys_class('message')->send_mes($number,$data['code']);
    if($have){
       return $this->signup->update('code_time='.time().',code='.$data['code'],'phone='.$number.' and form_id='.$data['form_id']);
    }
    return $this->signup->insert($data);
   }
    //添加到用户表 手机号、姓名、时间、公司名称
    public function  send_data($number,$code,$name,$company_name,$act_token){
        $where_page['page_token'] = $act_token;
        $page_data = $this->page->get_one($where_page);
        $where['form_id'] = $page_data['id'];
        $where['phone'] = $number;
        $where['code'] = $code;
        $code_data = $this->signup->get_one($where);
        //已有此手机号
        if($code_data['state']==2){
            return 1;
        }
         //手机号码不相符
         if($code_data!=true){
             return 2;
         }
         // 时间过长
        $code_time = time() - $code_data['code_time'];
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
            $course = $page_data['name'].'-'.$page_data['head_name'].'-'.$page_data['title1'];
        app::load_sys_class('message')->root_send_mes('18801213590',$course,$name,$number,$company_name);
        app::load_sys_class('message')->root_send_mes('13552323831',$course,$name,$number,$company_name);
            return $this->update_sign_up_number($page_data);
            
        }
        
    }
   private function update_sign_up_number($page_data){
        $where['id'] = $page_data['id'];
        $this->page->update("sign_up_number = sign_up_number+1",$where);
        return 4;
   }

   public function page_list($from_token){
       $where['access_token'] = $from_token;
        $from_id = $this->activity->get_one($where)['id'];
        $number = $this->page->select('f_id='.$from_id,'count(*)')[0]['count(*)']-4;
        $page_data = $this->page->select('f_id='.$from_id,'*',"$number,4");
        return $page_data;
   }
   public function browse($user_token,$act_token){
    $where['user_token'] = $user_token;   
    $where['act_token'] = $act_token;
    $page_id = $this->activity->get_one("access_token='$act_token'")['id'];
    $number = $this->page->select('f_id='.$page_id,'count(*)')[0]['count(*)']-4;
    $act_ids = $this->page->select('f_id'.$from_id,'id',"$number,4");
    foreach($act_ids as $k){
        $ids[] = $k['id'];
    }
    $ids = implode(',',$ids);
    //获取
    $bool = $this->browse->get_one($where);
    if($bool==true){
        // 增加浏览次数
        $this->page->update('page_browse_number=page_browse_number+1 '," id in ($ids)");
        return true;
    }else{
        $this->browse->insert($where);
        //增加浏览次数和用户浏览次数
        $this->page->update('page_browse_number=page_browse_number+1 , user_browse_number=user_browse_number+1'," id in ($ids)");

        return true;
    }
    return false;
   }
}