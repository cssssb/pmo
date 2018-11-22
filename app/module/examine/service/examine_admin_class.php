<?php
namespace examine;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       staff_user
 * userme:  2018-11-14
 * @describe:  examine_examine_admin service class
 * ================
 */
final class examine_admin_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('staff_user', 'user');
    }
    
}