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
 * @describe:  json_menu service class
 * ================
 */
final class menu_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('menu', 'json');
    }
    
}