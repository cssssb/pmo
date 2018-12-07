<?php
namespace role;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       
 * @DataTime:  2018-11-30
 * @describe:  role_route controller class
 * ================
 */
class route_controller
{
    private $data,$route;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        // $this->code = app::load_cont_class('common','user');//加载token
        // $this->operation = app::load_service_class('operation_class','operation');//加载操作
        //todo 加载相关模块
        $this->route = app::load_service_class('route_class', 'role');//
    }
    public function add()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2018-11-29
         * @describe:  add function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $post = [
            "token"=>'lalal',
            "data"=>[
                "role_id"=>'2',
                "route_id"=>'1,2,3,4,5'
            ]
        ];
        $data = $this->route->add_route($post['data']);
        $data?$cond = 3:$cond = 2;
        
        //开始输出
        switch ($cond) {
            case   0://异常1
                $this->data->out(3801,$post);
                break;
            case   1://异常2
                $this->data->out(2006,$post);
                break;
            default:
                $this->data->out(3802,$post);
            }
    }
    public function del()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2018-11-29
         * @describe:  del function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $post = [
            "token"=>'lalal',
            "data"=>[
                "role_id"=>'2',
                "route_id"=>'1,2,3,2,4,123'
            ]
        ];
        $data = $this->route->del_route($post['data']);
        $data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(3801,$post);
                break;
            default:
                $this->data->out(3802,$post);
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
        //谁下有什么数据
        $data = $this->route->list_route();
        $data?$cond = 0:$cond = 1;
        print_r($data);die;
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