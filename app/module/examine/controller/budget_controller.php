<?php
namespace examine;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       
 * @DataTime:  2018-12-17
 * @describe:  examine_data controller class
 * ================
 */
 define("EXAMINE_TYPE","1");
class budget_controller
{
    private $data;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        $this->code = app::load_cont_class('common','user');//加载token
        $this->operation = app::load_service_class('operation_class','operation');//加载操作
        //todo 加载相关模块
        $this->static = \app::load_service_class('examine_static_class','examine');//加载审批静态表
        $this->examine = \app::load_service_class('examine_project_class','examine');//加载审批静态表
    }
    public function test(){
        
        print_r(json_decode($this->static->model->get_one('parent_id = 2')['data'],JSON_FORCE_OBJECT));
    }
    public function list()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2018-12-17
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