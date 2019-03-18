<?php
namespace clazz;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       
 * @DataTime:  2019-02-25
 * @describe:  class_manage controller class
 * ================
 */
class manage_controller
{
    private $data, $manage;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        // $this->code = app::load_cont_class('common','user');//加载token
        //todo 加载相关模块
        $this->page = app::load_service_class('page_class', 'clazz');//
    }
    public function page_list()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2019-03-15
         * @describe:  page_list function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $data = $this->page->page_list();
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
    /**
     * ================
     * @Author:        css
     * @Parameter:     
     * @DataTime:      2019-02-25
     * @Return:        
     * @Notes:         数据器
     * @ErrorReason:   
     * ================
     */
    private function data_filter($post)
    {
        isset($post['parent_id']) ? $data['id'] = $post['parent_id'] : true;
        isset($post['id']) ? $data['id'] = $post['id'] : true;
        isset($post['name']) ? $data['name'] = $post['name'] : true;
        isset($post['time']) ? $data['time'] = $post['time'] : true;
        isset($post['page_token']) ? $data['page_token'] = $post['page_token'] : true;
        isset($post['f_id']) ? $data['f_id'] = $post['f_id'] : true;
        isset($post['max_number']) ? $data['max_number'] = $post['max_number'] : true;
        isset($post['head_name']) ? $data['head_name'] = $post['head_name'] : true;
        isset($post['class_name']) ? $data['class_name'] = $post['class_name'] : true;
        isset($post['title1']) ? $data['title1'] = $post['title1'] : true;
        isset($post['title2']) ? $data['title2'] = $post['title2'] : true;
        isset($post['title3']) ? $data['title3'] = $post['title3'] : true;
        isset($post['title4']) ? $data['title4'] = $post['title4'] : true;
        isset($post['content1']) ? $data['content1'] = $post['content1'] : true;
        isset($post['content2']) ? $data['content2'] = $post['content2'] : true;
        isset($post['content3']) ? $data['content3'] = $post['content3'] : true;
        isset($post['content4']) ? $data['content4'] = $post['content4'] : true;
        isset($post['f_id'])?$data['f_id'] = $post['f_id']:$data['f_id']=3;
        return $data;
    }
    public function add()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2019-02-25
         * @describe:  add function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $list = $this->data_filter($post['data']);
        $list['time'] = date('Y-m-d', time());
        $data = $this->page->add($list);
        $data ? $cond = 0 : $cond = 1;
        
        //开始输出
        switch ($cond) {
            case 1://异常1
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
         * @DataTime:  2019-02-25
         * @describe:  edit function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $list = $this->data_filter($post['data']);
        $data = $this->page->edit($list);
        $data ? $cond = 0 : $cond = 1;
        
        //开始输出
        switch ($cond) {
            case 1://异常1
                $this->data->out(2006);
                break;
            default:
                $this->data->out(2005);
        }
    }
    public function del()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2019-02-25
         * @describe:  del function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $list = $this->data_filter($post);
        $data = $this->page->del($list);
        $data ? $cond = 0 : $cond = 1;
        
        //开始输出
        switch ($cond) {
            case 1://异常1
                $this->data->out(2009);
                break;
            default:
                $this->data->out(2008);
        }
    }
    public function list()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2019-02-25
         * @describe:  list function
         * ================
         */
        $post = $this->data->get_post();//获得post
        // $form_token = 'afuxnsd524d';
        $data = $this->page->list();
        foreach ($data as &$k) {
            $enroll_manage = $this->page->enroll_manage_list($k['id']);
            foreach($enroll_manage as &$key){
                if($key['state']==2){
                    $key['state']='申请中';
                } elseif($key['state']==3){
                    $key['state'] = '通过';
                }
                $key ? $k['enroll_manage'][] = $key : $k['enroll_manage'][] = [];
            }
            $k['f_name'] = $this->page->get_one_page_name($k['f_id']);
        }
        $data ? $cond = 0 : $cond = 1;
        
        //开始输出
        switch ($cond) {
            case 1://异常1
                $this->data->out(2002, []);
                break;
            default:
                $this->data->out(2001, $data);
        }
    }
    public function getByClassId()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       
         * @DataTime:  2019-02-25
         * @describe:  grtByClassId function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $list = $this->data_filter($post);
        $data = $this->page->get_class($list);
        $data ? $cond = 0 : $cond = 1;
        
        //开始输出
        switch ($cond) {
            case 1://异常1
                $this->data->out(2002, []);
                break;
            default:
                $this->data->out(2001, $data);
        }
    }
    /**
     * ================
     * @Author:        css
     * @Parameter:     
     * @DataTime:      2019-02-27
     * @Return:        
     * @Notes:         修改报名人状态为通过
     * @ErrorReason:   
     * ================
     */
    public function enroll_is_agree()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2019-02-27
         * @describe:  enroll_is_agree function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $list = $this->data_filter($post);
        unset($list['f_id']);
        $data = $this->page->enroll_is_agree($list);
        $data ? $cond = 0 : $cond = 1;
        
        //开始输出
        switch ($cond) {
            case 1://异常1
                $this->data->out(2006);
                break;
            default:
                $this->data->out(2005);
        }
    }
    /**
     * ================
     * @Author:        css
     * @Parameter:     
     * @DataTime:      2019-02-27
     * @Return:        
     * @Notes:         删除报名人数据
     * @ErrorReason:   
     * ================
     */
     public function enroll_is_refuse()
     {
         /**
          * ================
          * @Author:    css
          * @ver:       
          * @DataTime:  2019-02-27
          * @describe:  enroll_is_ function
          * ================
          */
         $post = $this->data->get_post();//获得post
         $list = $this->data_filter($post);
         unset($list['f_id']);
         $data = $this->page->enroll_is_refuse($list);
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
}