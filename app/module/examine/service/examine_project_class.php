<?php
namespace examine;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       
 * @DataTime:  2018-11-02
 * @describe:  examine_examine_project service class
 * ================
 */
final class examine_project_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('examine_project', 'examine');
    }
    
    
}