<?php
namespace activity;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       
 * @DataTime:  2019-02-22
 * @describe:  activity_enroll controller class
 * ================
 */
class enroll_controller
{
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        $this->enroll = app::load_service_class('service_class', 'activity');//
    }
    //发送验证码
    public function commit(){
        $post = $this->data->get_post();
        $number = $post['number'];
        $act_token = $post['act_token'];
        $ip = ip();
        $data = $this->enroll->commit_code($number,$act_token,$ip);
        if($data==true){
            $this->data->out(5005);
        }
        $this->data->out(5006);
    }
    //发送详细数据
    public function send_data(){
        $post = $this->data->get_post();
        $number = $post['number'];
        $code = $post['code'];
        $name = $post['name'];
        $company_name = $post['company_name'];
        $act_token = $post['act_token'];
        (int)$data = $this->enroll->send_data($number,$code,$name,$company_name,$act_token);
        switch ($data) {
            case 1:
                # code...已有此手机号
                $this->data->out(5007);
                break;
            case 2:
                # code...手机号验证码不相符
                $this->data->out(5008);
                break;
            case 3:
                # code...验证码时间过长
                $this->data->out(5009);
                break;
            case 4:
                # code...报名成功
                $this->data->out(5010);
                break;
            case 5:
                # code...报名失败
                $this->data->out(5011);
                break;
            default:
                # code...
                break;
        }
    }
    //验证登录 V0.1
    public function send_tel(){
        $post = $this->data->get_post();
    }
    //验证页面
    public function page(){
        $post = $this->data->get_post();
        $act_token = $post['act_token'];
        $act_token = 'afuxnsd524d';
        isset($act_token)?true:$this->data->out(5004);
        $data = $this->enroll->page_list($act_token);
        
        if($data==true){
            $return = $this->data_format($data);
            $this->data->out(5003,$return);
        }
        $this->data->out(5004,[]);
    }
    private function data_format($data){
        foreach($data as $k){
        $list['id'] = $k['id'];
        $list['name'] = $k['name'];
        $list['time'] = $k['time'];
        $list['page_token'] = $k['page_token'];
        $list['sign_up_number'] = $k['sign_up_number'];
        $list['f_id'] = $k['f_id'];
        $list['max_number'] = $k['max_number'];
        $list['activity_content'] = 
        ['head_name'=>$k['head_name'],
        'class_name'=>$k['class_name'],
        'title1'=>$k['title1'],
        'title2'=>$k['title2'],
        'title3'=>$k['title3'],
        'title4'=>$k['title4'],
        'content1'=>$k['content1'],
        'content2'=>$k['content2'],
        'content3'=>$k['content3'],
        'content4'=>$k['content4'],
    ];
    $return[] = $list;
}
    return $return;
    }
}