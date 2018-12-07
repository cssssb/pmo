<?php
namespace json;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2018-11-22
 * @describe:  json_manage controller class
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
       
        //todo 加载相关模块
        $this->json = app::load_service_class('view_json_class', 'json');//
        // $this->common = app::load_service_class('common_class', 'examine');//

    }
    public function add_first()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2018-11-22
         * @describe:  add function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $date = $post['data'];
        foreach($date as $k){
            unset($k['id']);
        $data[] = $this->json->add($k);
        }
        $data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2004);
                break;
            default:
                $this->data->out(2003,$post);
            }
    }
    public function add()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       
         * @DataTime:  2018-11-22
         * @describe:   function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $post['data']['data'] = json_encode($post['data']['data'],JSON_UNESCAPED_UNICODE);
        $data = $this->json->add($post['data']);
        $data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2004);
                break;
            default:
                $this->data->out(2003,$post['data']);
            }
    }

    public function edit()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2018-11-22
         * @describe:  edit function
         * ================
         */
        
        $post = $this->data->get_post();//获得post
        $post['data']['data'] = json_encode($post['data']['data'],JSON_UNESCAPED_UNICODE);
        $data = $this->json->edit($post['data']);
        $data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2006);
                break;
            default:
                $this->data->out(2005,$post['data']);
            }
    }

    public function list()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2018-11-22
         * @describe:  list function
         * ================
         */
        $post = $this->data->get_post();//获得post
       
         //通过用户id获取所在角色
        // $role_id = $this->common->return_role($post['token']);
        // print_r($role_id);die;
        //  通过角色信息返回路由
        // $data = $this->json->return_role_in_view($role_id);
        
        $data = $this->json->list();
        $data?$cond = 0:$cond = 1;
        // foreach($data as $k=>$v){
        //     unset($data[$k]['data']);
        // }
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2002);
                break;
            default:
                $this->data->out(2001,$data);
            }
    }

    public function name()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2018-11-23
         * @describe:  name function
         * ================
         */
        $post = $this->data->get_post();//获得post
       
        $data = $this->json->name($post['name']);
        $data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2002,$data);
                break;
            default:
            // echo json_decode(json_encode($data, JSON_UNESCAPED_UNICODE));die;
                $this->data->out(2001,$data,'','1');
            }
            
    }
}