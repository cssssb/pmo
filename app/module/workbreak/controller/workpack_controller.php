<?php
namespace workbreak;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    lion
 * @ver:       1.0
 * @DataTime:  2018-12-26
 * @describe:  workbreak_workpack controller class
 * ================
 */
class workpack_controller
{
    private $data,$workpack;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        //todo 加载相关模块
        $this->workpack = app::load_service_class('workpack_class', 'workbreak');//
    }
    public function init_module(){
        echo time();
        echo $this->workpack->install_service();
    }
}