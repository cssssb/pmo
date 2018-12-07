<?php
namespace role;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.
 * @DataTime:  2018-12-05
 * @describe:  role_menu controller class
 * ================
 */
class menu_controller
{
    private $data,$menu;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        // $this->code = app::load_cont_class('common','user');//加载token
        // $this->operation = app::load_service_class('operation_class','operation');//加载操作
        //todo 加载相关模块
        $this->menu = app::load_service_class('menu_class', 'role');//
    }
    public function add()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2018-12-05
         * @describe:  add function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $post = [
            "token"=>'lalal',
            "data"=>[
                "role_id"=>'2',
                "fmenu_id"=>'8,9,9,9',
                "menu_id"=>'7,5',
            ]
        ];
        $data = $this->menu->add_menu($post['data']);
        $data?$cond = 0:$cond = 1;
         var_dump($data);die;
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out();
                break;
            default:
                $this->data->out();
            }
    }
}