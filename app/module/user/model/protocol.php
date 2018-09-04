<?php
namespace user;
defined('IN_LION') or exit('No permission resources.');
final class protocol{
    public $code = array(
        1 => ["测试函数",0],
        10102 => ["服务区维护中...",1],
        10101 => ["返回所有接口",0],
        10100 => ["未定义接口代码",1],
        10099 => ["未登录",1],
        10098 => ["不支持该项查重",1],
        10097 => ["企业与企业管理员不一致",1],
        10096 => ["用户名不存在",1],
        10095 => ["发送数据异常",1],

        10046 => ["身份证输入正确",0],
        10045 => ["身份证输入有误",1],
        10044 => ["报名失败-分班后取消报名则3个月内不能再报名",1],
        10043 => ["报名失败-不能重复报名",1],
        10042 => ["该学员已在班级中，无法取消",1],
        10041 => ["验证码正确",0],
        10040 => ["发送失败-手机号码不正确",1],
        10039 => ["操作失败",1],
        10038 => ["操作成功",0],
        10037 => ["创建文档操作记录失败",1],
        10036 => ["邮件格式不正确",1],
        10035 => ["删除班级失败，班级当中有学生",1],
        10034 => ["删除班级成功",0],
        10033 => ["密码不能小于六位",1],
        10032 => ["该名称已存在",1],
        10031 => ["导出失败-班级不存在",1],
        10030 => ["导出成功",0],
        10029 => ["发送失败-未留手机号码",1],
        10028 => ["发送成功，请查收短信",0],
        10027 => ["修改状态成功",0],
        10026 => ["修改状态失败",1],
        10025 => ["报名失败-已经报名",1],
        10024 => ["创建班级失败",1],
        10023 => ["创建班级成功",0],
        10022 => ["查询成功",0],
        10021 => ["查询失败",1],
        10020 => ["取消报名",0],
        10019 => ["取消失败",1],
        10018 => ["报名成功",0],
        10017 => ["报名失败",1],
        10016 => ["删除数据失败",1],
        10015 => ["删除数据成功",0],
        10014 => ["添加数据失败",1],
        10013 => ["添加数据成功",0],
        10012 => ["更新数据失败",1],
        10011 => ["更新数据成功",0],
        10010 => ["初始化数据",0],
        10009 => ["验证码错误",1],
        10008 => ["获取验证码",0],
        10007 => ["密码错误",1],
        10006 => ["登录成功",0],
        10004 => ["注册失败",1],
        10003 => ["注册成功",0],
        10002 => ["该名称尚未注册",0],
        10001 => ["该名称已存在",1]
    );
    private $post,$body;
    public $count;
    function __construct() {

		header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Connection, User-Agent, Cookie');
		header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE');	
        header('Content-type: application/json; charset=UTF-8');
        
        if($_SERVER['REQUEST_METHOD']=="OPTIONS"){
            exit();
        }
        $this->post = json_decode(file_get_contents('php://input'),true);//获取post数据
        // $this->post['session'] = 'tnkGNc';//免登陆测试
        $this->set_code(10100);
        $this->body["data"]=[];
        $this->count=0;
        //服务区维护
        if(0){
            $this->set_code(10102);
            $this->output();
            exit();
        }
    }
    final public function get_post($key=''){
        if(!empty($key)&&is_string($key)){
            return $this->post[$key];
        }else{
            return $this->post;
        }
    }
    final public function set_code($code){
        if($this->code[$code][1]==0){
            $this->body['code'] = $this->code[$code][1];}
        else{
            $this->body['code'] = $code;
        }
        $this->body['msg'] =  $this->code[$code][0];
        $this->body['msg_code'] =(int)$code;
        return $this->body;
    }
    final public function add_data($key,$value){
        $this->body["data"]["$key"]= $value;
        return $this->body;
    }
    final public function set_body($body){
        $this->body = $body;
        return $this->body;
    }
    final public function merge_body($body){
        $this->body = array_merge_recursive($this->body,$body);
        return $this->body;
    }
    final public function merge_data($data){
        $this->body['data'] = array_merge_recursive($this->body['data'],$data);
        return $this->body;
    }
    final public function output(){
        echo json_encode($this->body,JSON_UNESCAPED_UNICODE);
    }
    final public function output_not_number_check(){
        echo json_encode($this->body,JSON_UNESCAPED_UNICODE);
    }
    //简单输出
    final public function out($code,$data){
        $this->set_code($code);
        $this->merge_data($data);
        echo json_encode($this->body,JSON_UNESCAPED_UNICODE);
    }

    //增加测试
    final public function add_test($name,$is){
        if($is){
            $this->add_data($this->count." - V - 测试 $name 成功",$is);
        }else{
            $this->add_data($this->count." - X - 测试 $name 失败",$is);
        }
        $this->count++;
    }//输出测试
    final public function out_test(){
        $this->set_code(1);
        $this->output();
    }
}