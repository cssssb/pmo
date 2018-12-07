<?php
namespace user;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       staff_user
 * @DataTime:  2018-12-04
 * @describe:  user_staff_user service class
 * ================
 */
final class staff_user_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('staff_user', 'user');
    }
    public function select(){
        return $this->model->select(1);
    }
}