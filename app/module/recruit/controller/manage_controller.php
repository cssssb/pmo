<?php
namespace recruit;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2019-03-28
 * @describe:  recruit_manage controller class
 * ================
 */
class manage_controller
{
    private $data;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        // $this->code = app::load_cont_class('common','user');//加载token
        // $this->operation = app::load_service_class('operation_class','operation');//加载操作
        //todo 加载相关模块
        // $this->manage = app::load_service_class('manage_class', 'recruit');//
    }
    public function open_file(){
        // echo TEXT_PATH.'list.txt';
    //    $file =  fopen(TEXT_PATH.'list.txt','r') or die('没找到呢');
       echo file_get_contents(TEXT_PATH."ETC模板.xls");
    }
}