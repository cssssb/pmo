<?php
namespace test;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       url
 * @DataTime:  2018-12-25
 * @describe:  test_url service class
 * ================
 */
final class url_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('url', 'test');
    }
    
}