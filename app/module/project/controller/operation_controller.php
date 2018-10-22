<?php
namespace project;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       0.1
 * @DataTime:  2018-10-22
 * @describe:  project_operatiopn controller class
 * ================
 */
class operation_controller
{
    private $data,$operatiopn;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        //todo 加载相关模块
        $this->operation = app::load_service_class('operation_class','project');//
        $this->index();
    }
    public function index()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2018-10-22
         * @describe:  group function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $post['token'] = 'Nid0LUFXx8';
        $post['id'] = 93;
        $data = $this->operation->index($post['token'],$post['id']);
        
        //开始输出
        switch ($data) {
            case   false://成功
            //通过验证，进行下一步操作
                return true;
                // $this->data->out(2001);

                break;
                case   'token'://成功
                // return true;
                $this->data->out(4002);

                break;
            default:
                $this->data->out(3010,$data);
            }
    }
    public function del()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2018-10-22
         * @describe:  del function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $post['token'] = 'Nid0LUFXx8';
        $post['id'] = 93;

        $cond = $this->operation->del($post['token'],$post['id']);
        //开始输出
        switch ($cond) {
            case   false://异常1
                $this->data->out(2009);
                break;
            default:
            return true;
            }
    }
  
}