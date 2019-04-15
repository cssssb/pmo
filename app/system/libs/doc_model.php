<?php
namespace system;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
final class doc_model
{
    /**
     * 构造函数
     */
    public function __construct()
    {
    }
    //获取发送的信息
    public function get_user_data($data=[]){
    //使用过滤器返回需要查询的类
        $this->filter_service($data);
    }
    private function filter_service($data=[]){
        $data['phone'] !== null ? $this->xx($data):true;
        $data['usercode'] !== null ? $this->xx($data):true;
    }
    //系统项目集成model
    private function system_project_integration_model(){

    }
}