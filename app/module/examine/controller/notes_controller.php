<?php
namespace examine;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2018-12-26
 * @describe:  examine_notes controller class
 * ================
 */
class notes_controller
{
    private $data,$notes;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        $this->code = app::load_cont_class('common','user');//加载token
        $this->operation = app::load_service_class('operation_class','operation');//加载操作
        //todo 加载相关模块
        $this->notes = app::load_service_class('examine_notes_class', 'examine');//
        $this->common = app::load_service_class('common_class', 'examine');//
    }
    public function budget()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2018-12-26
         * @describe:  list function
         * ================
         */
        $post = $this->data->get_post();//获得post
        //获取调用接口人的id
        $userid = $this->common->return_user_id($post['token']);
        //获取在调用接口人的notes表下的项目id
        $data = $this->notes->return_for_budget_examine_id($userid['id']);
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

    public function final()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2018-12-26
         * @describe:  list function
         * ================
         */
        $post = $this->data->get_post();//获得post
        //获取调用接口人的id
        $userid = $this->common->return_user_id($post['token']);
        //获取在调用接口人的notes表下的项目id
        $data = $this->notes->return_for_final_examine_id($userid['id']);
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
