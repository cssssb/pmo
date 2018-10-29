<?php
namespace progam;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css   project_data_getByProjectId;edit;
 * @ver:       0.1
 * @DataTime:  2018-10-16
 * ================
 */
class manage_controller
{
    private $data;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        //todo 加载相关模块
        $this->progam = \app::load_service_class('progam_class', 'progam');//加载项目大表
        $this->code = app::load_cont_class('common','user');//加载token
       
    }
    public function list()
    {
        //获取一条项目信息
        $post = $this->data->get_post();//获得post
        $cond = 0;//默认成功
        // $post['id'] = 93;
		$data = $this->progam->select();
        $data?$cond = 0:$cond = 1;
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
        //获取一条项目信息
        $post = $this->data->get_post();//获得post
        $cond = 0;//默认成功
        // $post['id'] = 93;
        if(!$post['data']['add_program_manage_name']){
            $this->data->out(2011);
        }
        unset($post['data']['add_program_manage_sale_name']);
		$data = $this->progam->add($post['data']);
        $data?$cond = 0:$cond = 1;
        switch ($cond) {
            case   1://异常1
                $this->data->out(2004);
                break;
          
            default:
                $this->data->out(2003, $post['data']);
            }
       
    }
}