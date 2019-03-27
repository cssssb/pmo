<?php
namespace course;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2019-03-25
 * @describe:  test_test controller class
 * ================
 */
class test_controller
{
    private $data,$test;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
    }
    public function test(){
        echo json_encode(app::load_sys_class('crawler')->get_ke_qq_title(),JSON_UNESCAPED_UNICODE);die;

    }
    function romanToInt() {
        $s = 'IV';
        $array = ['I'=>1,'V'=>5,'X'=>10,'L'=>50,'C'=>100,'D'=>500,'M'=>1000];
        $length = strlen($s);
        $num = 0;
        for ($i=0; $i < $length; $i++) { 
            $c = $s[$i];
            $d = $s[$i+1];
            $a = $array[$c];
            $b = $array[$d];
            if($a<$b){
                $num -=$array[$c];
            }else{
            $num +=$array[$c];}
        }
        echo  $num;
        }
}