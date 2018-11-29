<?php
namespace examine;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2018-11-16
 * @describe:  examine_type controller class
 * ================
 */
class config_controller
{
    private $data,$type;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        // $this->code = app::load_cont_class('common','user');//加载token
        // $this->operation = app::load_service_class('operation_class','operation');//加载操作
        //todo 加载相关模块
        $this->config = app::load_service_class('examine_flow_class', 'examine');//
        $this->common = app::load_service_class('common_class', 'examine');//
    }
    public function add()
    { 
        /**
         * ================
         * @Author:    css
         * @ver:       0.1
         * @DataTime:  2018-11-16
         * @describe:  config function
         * ================
         */
        //  $post = [
        //     'token'=>'lalala',
        // 'data'=>[
        //     'examine_mode'=>'2,3',   //审批模式
        //     'pass_mode'=>'1'         //通过方式
        // ]
       
        //  ];

        
        $post = $this->data->get_post();//获得post
        //11.23修改后
        $post = [
            'token'=>'qevQh36mj2',
            // 'token'=>'DGc82sqEJ4',
            'data'=>[
                'name'=>'请假审批',
                'data'=>[
                    0=>[
                    'examine_mode'=>'1,3',
                    'pass_mode'=>'1'
                ],
                    1=>[
                    'examine_mode'=>'1,3',
                    'pass_mode'=>'1'
                ],
                    2=>[
                    'examine_mode'=>'2,3',
                    'pass_mode'=>'1'
                ]
                 ],
            ]
        ];

        //首先获得token看有没有权限(is_Admin)
        $bool_admin = $this->common->return_bool_admin($post['token']);
        if(!$bool_admin){
            $this->data->out(3016,[]);
        }
        // var_dump($bool_admin);die;
        //将创建的流程添加至审批流表pmo_examine_flow
        $data = $this->config->add_config($post['data']);
        $data?$cond = 0:$cond = 1;
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2004,[]);
                break;
            default:
                $this->data->out(2003,[]);
            }
    }
    public function edit_config()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       0.1
         * @DataTime:  2018-11-19
         * @describe:  edit_config function
         * ================
         */
        $post = $this->data->get_post();//获得post
        //  $post = [
        //     'token'=>'lalala',
        // 'data'=>[
        //     'id'=>1,
        //     'examine_mode'=>'2,3',   //审批模式
        //     'pass_mode'=>'1'         //通过方式
        // ]
        //  ];
         //首先获得token看有没有权限(is_Admin)
         $bool_admin = $this->common->return_bool_admin($post['token']);
         if(!$bool_admin){
             $this->data->out(3016,[]);
         }

        //将创建的流程添加至审批流表pmo_examine_flow
        $data = $this->config->edit_config($post['data']);
        $data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2006,[]);
                break;
            default:
                $this->data->out(2005,[]);
            }
    }
    public function del_config()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       0.1
         * @DataTime:  2018-11-19
         * @describe:  del_config function
         * ================
         */
        $post = $this->data->get_post();//获得post

        //  $post = [
        //     'token'=>'lalala',
        // 'data'=>[
        //     'id'=>1,
        //     'examine_mode'=>'2,3',   //审批模式
        //     'pass_mode'=>'1'         //通过方式
        // ]
        //  ];
        
        //首先获得token看有没有权限(is_Admin)
         $bool_admin = $this->common->return_bool_admin($post['token']);
         if(!$bool_admin){
             $this->data->out(3016,[]);
         }

       //将创建的流程添加至审批流表pmo_examine_flow
       $data = $this->config->del_config($post['data']);
        $data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2009,[]);
                break;
            default:
                $this->data->out(2008,[]);
            }
    }
    public function list()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       0.1
         * @DataTime:  2018-11-19
         * @describe:  list function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $data = $this->config->list();
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
    public function test(){
        $data = $this->common->return_staff_user_id('B1YIZLkHKO');
        var_dump($data);
    }
}