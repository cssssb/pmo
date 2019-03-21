<?php
namespace test;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       
 * @DataTime:  2019-03-20
 * @describe:  test_leetconde controller class
 * ================
 */
class leetcode_controller
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
        // //todo 加载相关模块
        // $this->leetconde = app::load_service_class('leetconde_class', 'test');//
    }
    public function rob(){
        $nums = [2,1,1,2];
        $number = count($nums);
        $i = $a = 0;
        for ($code=2; $code < $number; $code++) { 
            foreach($nums as $k=>$v){
                switch($k%$code!=0){
                    case true:
                        $i += $v;
                        break;
                            case false:
                        $a +=$v;

                        }
                
            }
            $n1[] = $i;
            $n2[] = $a;
            unset($i,$a);
        }
        print_r($n1);
        echo '-------';
        print_r($n2);
        print_r(max(max($n2),max($n1)));
        // return 
    }
    public function rob2(){
        $nums = [1,2,3,1];
        $number = count($nums);
        $i = $a = 0;
        //算出除以2的余数的关系 

        for ($code=2; $code < $number; $code++) { 
            if($number>2){
            foreach($nums as $k=>$v){
                switch($k%$code){
                    case $code-1:
                        $i += $v;
                        break;
                    case $code-2:
                        $a +=$v;
                        break;
                        }
                
            }
            $n1[] = $i;
            $n2[] = $a;
            unset($i,$a);}
            print_r($nums[0]);
        }
        if(!max(max($n2),max($n1))){print_r(0);}
        print_r(max(max($n2),max($n1)));
        
    }
    // 如果4个数组 假如除以2 余的应该是不等于0或者说 余的应该是1
    //除以三 余的 不等于  余的应该是1或者2
}