<?php
namespace user;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       0.1
 * @DataTime:  2018-10-22
 * @describe:  user_common controller class
 * ================
 */
class common_controller
{
    private $data,$common;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        //todo 加载相关模块
        $this->common = app::load_service_class('common', 'user');//
        $this->code();
    }
    public function code()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       
         * @DataTime:  2018-10-22
         * @describe:  code function
         * ================
         */

        $post = $this->data->get_post();//获得post
        $bool = $this->common->code($post['token']);
        
        $bool?$cond = 0:$cond = 1;
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(4002);
                break;
            default:
                return true;
            }

    }
}   