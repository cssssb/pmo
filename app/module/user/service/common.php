<?php
namespace user;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    lion
 * @ver:       01.
 * @DataTime:  2018-10-22
 * @describe:  common service class
 * ================
 */
final class common
{
    public function __construct()
    {
        $this->model = app::load_model_class('user', 'user');
        $this->code();
    }
    public function code($token){
        $where['token'] = $token;
        return $this->model->get_one($where);
    }
}