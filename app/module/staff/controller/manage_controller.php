<?php
namespace staff;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       0.1
 * @DataTime:  2018-10-16
 * @describe:  getBYProjectzd;edit;
 * ================
 */
class manage_controller
{
    private $data;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        //todo 加载相关模块
        // $this->type = app::load_service_class('type', 'project');//
		$this->staff = \app::load_service_class('staff_class', 'staff');//加载项目大表
    }
    public function list()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       0.1
         * @DataTime:  2018-10-16
         * @describe:  list function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $cond = 0;//默认成功
        $code = 1003;//错误码默认使用
        $data = [];//返回数据
        //处理post
        //调用业务层函数
        // example $this->service->function();
        $data = $this->staff->small_list();
        $data?$cond = 0:$cond = 1;
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2002);
                break;
            // case   2:
            //     $this->data->out(code, $data);
            //     break;
            default:
                $this->data->out(2001, $data);
            }
    }
}