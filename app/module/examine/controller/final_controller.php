<?php
namespace examine;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       
 * @DataTime:  2018-12-25
 * @describe:  examine_final controller class
 * ================
 */
 define("EXAMINE_TYPE","2");
class final_controller
{
    private $data,$final;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        $this->code = app::load_cont_class('common','user');//加载token
        $this->operation = app::load_service_class('operation_class','operation');//加载操作
        //todo 加载相关模块
        $this->static = app::load_service_class('examine_static_class', 'examine');//
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
        
        $data = $this->static->return_list(EXAMINE_TYPE);
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

    public function project()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2018-12-17
         * @describe:  project function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $data = $this->static->project($post['id'],EXAMINE_TYPE);
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
    public function lecturer()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       
         * @DataTime:  2018-12-17
         * @describe:   function
         * ================
         */
        $post = $this->data->get_post();//获得post
        
        $data = $this->static->lecturer($post['id'],EXAMINE_TYPE);
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
    public function implement()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       
         * @DataTime:  2018-12-17
         * @describe:   function
         * ================
         */
        $post = $this->data->get_post();//获得post
        
        $data = $this->static->implement($post['id'],EXAMINE_TYPE);
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
    public function travel()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       
         * @DataTime:  2018-12-17
         * @describe:   function
         * ================
         */
        $post = $this->data->get_post();//获得post
        
        $data = $this->static->travel($post['id'],EXAMINE_TYPE);
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