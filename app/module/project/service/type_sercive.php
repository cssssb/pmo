<?php
namespace project;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    lion
 * @ver:       0.1
 * @DataTime:  2018-10-15
 * @describe:  project_type service class
 * ================
 */
final class type_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('type', 'project');
    }
    
}