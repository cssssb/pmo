<?php
namespace course;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2019-03-20
 * @describe:  plan_plan controller class
 * ================
 */
class plan_controller
{
    private $data,$plan;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        // $this->code = app::load_cont_class('common','user');//加载token
        //todo 加载相关模块
        $this->plan = app::load_service_class('plan_class', 'course');//
    }
    public function getListCourseId()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2019-03-21
         * @describe:  getListCourseId function
         * ================
         */
        $post = $this->data->get_post();//获得post
        // $post['ids'] = [1,4,5,6,7,8];
        $data = $this->plan->list_course($post['ids']);
        foreach($data as &$k){
            $list['course_plan'] = json_decode($k['data'],true);
            $list['id'] = $k['id'];
            $return[] = $list;
        }
        $data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2002,[]);
                break;
            default:
                $this->data->out(2001,$return);
            }
    }
    public function getByCourseId()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2019-03-20
         * @describe:  getByCourseId function
         * ================
         */
        $post = $this->data->get_post();//获得post
        // $post['id'] = 1;
        $data['id'] = $post['id'];
        $data['course_plan'] = json_decode($this->plan->get_one_data($post['id']),true);
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
    public function edit()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2019-03-20
         * @describe:  edit function
         * ================
         */
        $post = $this->data->get_post();//获得post
        // $post['id'] = 1;
        // $post['data'] = ['a'=>[1,2,3],
        //                     'b'=>[5,6,7]];
        $data = $this->plan->edit($post['data']['id'],json_encode($post['data']['course_plan'],JSON_UNESCAPED_UNICODE));
        $data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2006);
                break;
            default:
                $this->data->out(2005);
            }
    }
}