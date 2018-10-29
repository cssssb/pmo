<?php
namespace project;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2018-10-24
 * @describe:  project_address controller class
 * ================
 */
class address_controller
{
    private $data,$address;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        //todo 加载相关模块
        // $this->code = \app::load_cont_class('common','user');//加载token
        // $this->operation = \app::load_service_class('operation_class','operation');//加载操作
        $this->address = app::load_service_class('address_class', 'project');//
    }
    public function list()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2018-10-24
         * @describe:  list function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $post['id'] = 1;
        $data = $this->address->list($post['id']);
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
    public function province()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       
         * @DataTime:  2018-10-26
         * @describe:  add function
         * ================
         */
        $post = $this->data->get_post();//获得post

        $data = $this->address->list_province();
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
    public function city()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       
         * @DataTime:  2018-10-26
         * @describe:  city function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $data = $this->address->list_city($post['province_id']);
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
    public function add()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       0.1
         * @DataTime:  2018-10-26
         * @describe:  add function
         * ================
         */
       
        $post = $this->data->get_post();//获得post
        $province_id = $post['data']['province_id'];
        $city_id = $post['data']['city_id'];
        $name = $post['data']['detailed_address'];
        $bool = $this->address->add($province_id,$city_id,$name);
        $bool?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2004,[]);
                break;
            default:
                $this->data->out(2003,'true');
            }
    }
    public function edit()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       0.1
         * @DataTime:  2018-10-26
         * @describe:  edit function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $data = $this->address->edit($post['data']);
        $data?$cond = 0:$cond = 1;
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2006,$post['data']);
                break;
            default:
                $this->data->out(2005,$post['data']);
            }
    }
    public function del()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       0.1
         * @DataTime:  2018-10-26
         * @describe:  del function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $data = $this->address->del($post['data']);
        $data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2009,$post);
                break;
            default:
                $this->data->out(2008,$post);
            }
    }
}