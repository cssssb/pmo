<?php
namespace lecturer;

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
		$this->lecturer = \app::load_service_class('lecturer_class', 'lecturer');//加载项目大表
    }
    public function list()
    {
        //获取一条项目信息
        $post = $this->data->get_post();//获得post
        $cond = 0;//默认成功
        // $post['id'] = 93;
		$data = $this->lecturer->of_list(1);
        $data?$cond = 0:$cond = 1;
        switch ($cond) {
            case   1://异常1
                $this->data->out(2002);
                break;
          
            default:
                $this->data->out(2001, $data);
            }
       
    }
    public function add()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       0.1
         * @DataTime:  2018-10-20
         * @describe:  add function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $data['name'] = $post['data']['teacher_name'];
        $data['unit_price'] = $post['data']['teacher_price'];
        $data['coop_id'] = $post['data']['teacher_cooperation_model_id'];
        if(!$data['name']){
            $this->data->out(2010);
        }
        $ass = $this->lecturer->add($data);
        $ass?$cond = 0:$cond = 1;
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2004);
                break;
            default:
                $this->data->out(2003,$post['data']);
            }
    }
    public function cooperation()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       
         * @DataTime:  2018-10-21
         * @describe:  cooperation function
         * ================
         */
        
        $ass = $this->lecturer->cooperation_list();
        foreach($ass as $k){
            $datas['id'] = $k['teacher_cooperation_model_id'];
            $datas['name'] = $k['teacher_cooperation_model_name'];
            $data[] = $datas;
        }
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2002);
                break;
            default:
                $this->data->out(2001,$data);
            }
    }
   
}