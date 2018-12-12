<?php
namespace json;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       type
 * @DataTime:  2018-12-10
 * @describe:  json_type service class
 * ================
 */
final class type_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('type', 'json');
    }
    public function select(){
        return $this->model->select(1);
    }
}