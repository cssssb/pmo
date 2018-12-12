<?php
namespace json;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       
 * @DataTime:  2018-12-10
 * @describe:  json_type controller class
 * ================
 */
class type_controller
{
    private $data,$type;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        // $this->code = app::load_cont_class('common','user');//加载token
        // $this->operation = app::load_service_class('operation_class','operation');//加载操作
        //todo 加载相关模块
        $this->type = app::load_service_class('type_class', 'json');//
    }
    public function list()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2018-12-10
         * @describe:  list function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $data = $this->type->select();
        $data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2002,[]);
                break;
            default:
                $this->data->out(2001,$data);
            }
    }
}