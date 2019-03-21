<?php
namespace test;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       
 * @DataTime:  2019-03-21
 * @describe:  test_lalala service class
 * ================
 */
final class lalal_class
{
    public function __construct($a)
    {
        echo $a;
    }
    
}