<?php
namespace classification;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2019-03-14
 * @describe:  classification_manage controller class
 * ================
 */
class manage_controller
{
    private $data,$manage;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        $this->code = app::load_cont_class('common','user');//加载token
        $this->operation = app::load_service_class('operation_class','operation');//加载操作
        //todo 加载相关模块
        $this->classification = app::load_service_class('classification_class', 'classification');//
    }
    public function list()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2019-03-14
         * @describe:  1.0 function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $data_head = [
        
        ];
        
        //开始输出
        switch ($post['data_type']) {
            case   'page_json':
                $this->list_page_json($post,$data_head);
                break;
            case   'json':
                $this->list_json($post,$data_head);
                break;
            case   'page_csv':
                $this->list_csv($post,$data_head);
                break;
            default:
                $this->data->out(1003);
            }
    }
    private function list_page_json($post,$head){

    }
    private function list_json($post,$head){

    }
    private function list_csv($post,$head){

    }
    public function data_filter($post){
        isset($post['data']['id'])?$data['id'] = $post['data']['id']:true;
        return $data;
    }
    public function add()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2019-03-14
         * @describe:  add function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $list = $this->data_filter($post);
        $data = $this->classification->add($list);
        $data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2004);
                break;
            default:
                $this->data->out(2003);
            }
    }
    public function edit()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2019-03-14
         * @describe:  edit function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $list = $this->data_filter($post);
        $data = $this->classification->edit($list);
        $data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2005);
                break;
            default:
                $this->data->out(2006);
            }
    }
    public function del()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2019-03-14
         * @describe:  del function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $data = $this->classification->del($post);
        $data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2009);
                break;
            default:
                $this->data->out(2008);
            }
    }
    public function getByClassificationId()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       
         * @DataTime:  2019-03-14
         * @describe:  getClassification function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $data = $this->classification->get_one($post);
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