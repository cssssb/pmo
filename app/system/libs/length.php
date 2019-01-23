<?php
namespace system;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       
 * @DataTime:  2019-01-17
 * @describe:  system_request controller class
 * ================
 */
 final class length
{
    private $data,$request;
    /**
     * 构造函数
     */
    public function __construct()
    {
    }
    public function return_length($data_body,$data_heade){
        foreach($data_body as $k){
            foreach($k as $a=>$b){
            foreach($data_heade as &$key){
                if($key['key']==$a){
                    $size = $this->define_type($b);
                    if($key['size']<$size){
                        $key['size'] = $size;
                    }
                }
            }
        }
        }
        return $data_heade;
    }

    //判断传过来的是否是汉字
    public function define_type($string){
       $is_chinese = preg_match("/[\x7f-\xff]/", $string);
       $length = strlen($string);
       //如果有汉字 使用汉字的处理字符串长度的方法
       if($is_chinese==true){
        return  $this->em_length_chinese($length);
       }
        return $this->em_length_not_chinese($length);
       //没有 使用非汉字的处理字符串长度的方法
    }
    //返回em
    private function em_length_chinese($length){
        ceil($length/3)>20 ?$number = 20:$number = ceil($length/3)+1;
        return $number;
    }
    private function em_length_not_chinese($length){
        ceil($length*0.625)>20 ?$number = 20:$number = ceil($length*0.625);
        return $number;
    }
    
}