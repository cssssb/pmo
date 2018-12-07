<?php
namespace menu;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2018-11-30
 * @describe:  menu_manage controller class
 * ================
 */
class manage_controller
{
    private $data,$manage;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        // $this->code = app::load_cont_class('common','user');//加载token
        // $this->operation = app::load_service_class('operation_class','operation');//加载操作
        //todo 加载相关模块
        $this->menu = app::load_service_class('menu_class', 'menu');//
    }
    public function add()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2018-11-30
         * @describe:  add function
         * ================
         */
        $post = $this->data->get_post();//获得post
        // $post['data']['data'] = json_encode($post['data']['data']);
        $data = $this->menu->add($post['data']);
        $data?$cond = 0:$cond = 1;
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2004);
                break;
            default:
                $this->data->out(2003,$post['data']);
            }
    }
    public function test(){
        $data = "
        ";
            $ass = json_decode(json_encode($data));
        return  $ass;
    }
    //list需修改
    public function list()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2018-11-30
         * @describe:  list function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $data = $this->menu->list();
        $data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2002);
                break;
            default:
                $this->data->out(2001,$data);
            }
    }
    public function edit()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2018-12-04
         * @describe:  edit function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $data = $this->menu->edit($post['data']['data']);
        
        $data?$cond = 0:$cond = 1;
        
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