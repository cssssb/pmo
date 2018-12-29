<?php
namespace examine;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2018-12-27
 * @describe:  examine_record controller class
 * ================
 */
class record_controller
{
    private $data,$record;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        // $this->code = app::load_cont_class('common','user');//加载token
        $this->operation = app::load_service_class('operation_class','operation');//加载操作
        //todo 加载相关模块
        $this->examine = app::load_service_class('examine_project_class', 'examine');//
        $this->common = app::load_service_class('common_class', 'examine');//
    }
    public function list()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2018-12-27
         * @describe:  list function
         * ================
         */
        $post = $this->data->get_post();//获得post
        //获取token 判断是哪个id
        // $id = $this->common->return_user_id($post['token']);
        $id['id'] = 10;
        $data['data_body'] = $this->examine->record_list($id['id']);
        // $data['data_head'] = $this->examine->data_head($id['id']);
        // $data['data_body'] = $this->examine->data_body($id['id']);
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