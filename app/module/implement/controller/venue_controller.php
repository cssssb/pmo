<?php
namespace implement;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       0.1
 * @DataTime:  2018-10-23
 * @describe:  implement_venue controller class
 * ================
 */
class venue_controller
{
    private $data,$venue;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        //todo 加载相关模块
        $this->code = \app::load_cont_class('common','user');//加载token
        $this->operation = \app::load_service_class('operation_class','operation');//加载操作
        $this->implement = app::load_service_class('implement_room_class', 'implement');//
        $this->static = \app::load_service_class('static_class','project');//加载列表json

    }
    //增
    public function add()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       0.1
         * @DataTime:  2018-10-23
         * @describe:  add function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $data = $this->implement->add($post['data']);
        $project_new_data =  $this->static->static_service($post['data']['parent_id']);

        $project_new_data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2004);
                break;
            default:
                $this->data->out(2003,$data);
            }
    }
    //删
    public function del()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       
         * @DataTime:  2018-10-24
         * @describe:  del function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $parent_id = $this->implement->model->get_one($where);
        echo json_encode($parent_id);die;
        $data = $this->implement->del($post['id']);
        $where['id'] = $post['id'];
        $project_new_data =  $this->static->static_service($parent_id['parent_id']);

        $project_new_data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2009,[]);
                break;
            default:
                $this->data->out(2008,$post['data']);
            }
    }
    //改
    public function edit()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       0.1
         * @DataTime:  2018-10-24
         * @describe:  edit function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $data = $this->implement->edit($post['data']);
        $project_new_data =  $this->static->static_service($post['data']['parent_id']);

        $project_new_data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2006);
                break;
            default:
                $this->data->out(2005,$data);
            }
    }
}