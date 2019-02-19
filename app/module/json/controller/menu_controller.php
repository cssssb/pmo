<?php
namespace json;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2019-02-18
 * @describe:  json_menu controller class
 * ================
 */
class menu_controller
{
    private $data,$menu;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        // $this->code = app::load_cont_class('common','user');//加载token
        // $this->operation = app::load_service_class('operation_class','operation');//加载操作
        //todo 加载相关模块
        $this->menu = app::load_service_class('menu_class', 'json');//
    }
    //获取本地数据库里的json数据
    public function get_data(){
        
    }
    public function write_data(){

    }
}