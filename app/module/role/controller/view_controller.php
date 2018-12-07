<?php
namespace role;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2018-11-30
 * @describe:  role_view controller class
 * ================
 */
class view_controller
{
    private $data,$view;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        // $this->code = app::load_cont_class('common','user');//加载token
        // $this->operation = app::load_service_class('operation_class','operation');//加载操作
        //todo 加载相关模块
        $this->view = app::load_service_class('view_class', 'role');//
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
        $post = [
            "token"=>"llal",
            "data"=>[
                "role_id"=>"2",
                "view_id"=>"1,2,3,4,5,6"
            ]
        ];
        $data = $this->view->add($post['data']);
        $data?$cond = 0:$cond = 1;
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2006);
                break;
            default:
                $this->data->out(3803,$post['data']);
            }
    }
    public function del()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2018-11-30
         * @describe:  del function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $post = [
            "token"=>"llal",
            "data"=>[
                "role_id"=>"2",
                "view_id"=>"1,2,3,4,5,6"
            ]
        ];
        $data = $this->view->del($post['data']);
        $data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2009);
                break;
            default:
                $this->data->out(2008,$post['data']);
            }
    }
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
        $data = $this->view->list();
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
    public function test(){
        print_r($this->view->return_json());
    }
    
}