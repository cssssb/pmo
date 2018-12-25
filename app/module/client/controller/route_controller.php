<?php
namespace client;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2018-12-25
 * @describe:  client_route controller class
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
        $this->code = app::load_cont_class('common','user');//加载token
        $this->operation = app::load_service_class('operation_class','operation');//加载操作
        //todo 加载相关模块
        $this->url = app::load_service_class('route_class', 'role');//
    }
    public function list()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2018-12-25
         * @describe:  list function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $data = $this->url->model->select(1);
        foreach($data as $k=>$v){
            $ass[$k]['id'] = $v['id'];
            $ass[$k]['name'] = $v['url_name'];
            $ass[$k]['note'] = $v['note'];
        }
        $data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2002,[]);
                break;
            default:
                $this->data->out(2001,$ass);
            }
    }
}