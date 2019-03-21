<?php
namespace test;

//namespace 模块名
use \app;
use activity\service_class;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2019-03-21
 * @describe:  test_demo_sql controller class
 * ================
 */
class demo_sql_controller
{
    private $data,$demo_sql;
    /**
     * 构造函数
     */
    public function __construct()
    {
        // $this->data = app::load_sys_class('protocol');//加载json数据模板
         
        // $this->code = app::load_cont_class('common','user');//加载token
        // //todo 加载相关模块
        // $this->demo_sql = app::load_service_class('demo_sql_class', 'test');//
    }
    // public function 
    public function a(){
        // $this->operation = app::load_service_class('operation_class','operation');//加载操作
        // new lalal(1);
        // new \operation\operation_class;
        // echo 1;die;
        // $this->lalal = app::load_service_class('lalal_class', 'test');//
        // new lalal_class(12);
        app::load_sys_class('crawler');
        $regex = "/alt=\"([【2019a-zA-z]|[\x{4e00}-\x{9fa5}]{1,4}).*\n/u";
        $head = 'alt="';
        $tail = '"></a>';
        $this->pl = new \system\crawler($regex,$head,$tail);
        $this->pl->get_web_content();
    }
    public function b(){
        $arr = ['1','2',3];
        foreach($arr as $key=>$v)
            {
            $a[$key][]=$v;
            }
        print_r($a);
    }
}