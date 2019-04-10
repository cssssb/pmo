<?php
namespace system;
use \app;
defined('IN_LION') or exit('No permission resources.');
final class protocol
{
    public $codelist;
    private $post;
    private $body;
    //测试计数
    public function __construct()
    {
        //设置 http head
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Connection, User-Agent, Cookie');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE');
        header('Content-type: application/json; charset=UTF-8');
        $this->codelist = app::load_config('code', 'default_ch');//加载host配置
        //option请求相应处理
        if ($_SERVER['REQUEST_METHOD']=="OPTIONS") {
            exit();
        }
        $this->post = json_decode(file_get_contents('php://input'), true);//获取post数据
        $this->set_code(1001);
        $this->body["data"]=[];
    }
    
    //获取post值
    final public function get_post($key='')
    {
        if (!empty($key)&&is_string($key)) {
            return $this->post[$key];
        } else {
            return $this->post;
        }
    } 
    //设置消息码code
    final public function set_code($code, $codelist = "")
    {
        if ($codelist == "") {
            $codelist = $this->codelist;
        }
        $this->body['code'] =(int)$code;
         if (isset($codelist[$code])) {
            $this->body['msg'] =  $codelist[$code][0];
            $this->body['error'] = $codelist[$code][1];
        }else{
            $this->body['msg'] ="未注册code" ;
            $this->body['error'] ="1" ;
        }
        return $this->body;
    }
    final public function add_data($key, $value='')
    {
        if(is_array($key)){
        //     if(count($key) == count($key,1)){
        //         $this->body['data'] = $key;
        //         return $this->body;
        //    }else{
            $this->body['data'] = array_merge_recursive($this->body['data'], $key);
            return $this->body;
        //    }
            
        }else{
            $this->body["data"]["$key"]= $value;
            return $this->body;
        }
    }

    final public function output()
    {
        echo $this->json_out($this->body);
    }

    //简单输出
    final public function out($code,$data="",$codelist = "",$json="")
    {
        $this->set_code($code,$codelist);
        $this->add_data($data);
        echo $this->json_out($this->body);
    }
    
    final private function json_out($data){
        echo json_encode($data, JSON_UNESCAPED_UNICODE);exit;
    }
    
     
}
