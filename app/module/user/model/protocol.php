<?php
namespace user;
defined('IN_LION') or exit('No permission resources.');
final class protocol{
    public $code = array(
        1 => ["测试函数",0],
        10102 => ["服务区维护中...",1],
        10101 => ["返回所有接口",0],
        
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