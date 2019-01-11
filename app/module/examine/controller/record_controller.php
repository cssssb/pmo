<?php
namespace examine;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2018-12-27
 * @describe:  examine_record controller class
 * ================
 */
class record_controller
{
    private $data,$record;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        // $this->code = app::load_cont_class('common','user');//加载token
        $this->operation = app::load_service_class('operation_class','operation');//加载操作
        //todo 加载相关模块
        $this->examine = app::load_service_class('examine_project_class', 'examine');//
        $this->common = app::load_service_class('common_class', 'examine');//
        $this->csv = app::load_service_class('csv_class', 'examine');//
    }
    //普通用户list
    public function userlist()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2019-01-02
         * @describe:  userlist function
         * ================
         */
        $post = $this->data->get_post();//获得post
        //获取token判断是哪个id
        // $id = $this->common->return_user_id($post['token']);

        $id['id'] = 30;
        //搜索条件
        $unicode = $post['unicode'];


        // $unicode = '201901';

        if($post['page_num'] && $post['page_size']){
            $page_num = $post['page_num'];
            $page_size = $post['page_size'];
            $list = $this->examine->model->select_user_list($id['id'],$unicode,$page_num,$page_size);}else{
                // $page_num = 1;
                // $page_size = 5;
                $list = $this->examine->model->select_user_list($id['id'],$unicode);
            }
            $data['data_body'] = $list;
            $data['data_head'] = $this->examine->data_hade();
            $data['page_num'] = $page_num;
            $data['page_size'] = $page_size;
            $data['count'] = $this->examine->model->select_user_count($id['id'])[0]['count(*)'];
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

    //审批者接口
    public function adminlist()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2018-12-27
         * @describe:  list function xx审批过的项目
         * ================
         */
        $post = $this->data->get_post();//获得post
        //获取token 判断是哪个id
        // $id = $this->common->return_user_id($post['token']);
        $id['id'] = 10;
        // $page_num = $post['page_num'];
        // $page_size = $post['page_size'];
        
        $unicode = $post['unicode'];


        if($post['page_num'] && $post['page_size']){
        $page_num = $post['page_num'];
        $page_size = $post['page_size'];
        $admin_list = $this->examine->model->record_list($id['id'],$unicode,$page_num,$page_size);}else{
            $page_num = 1;
            $page_size = 5;
            $admin_list = $this->examine->model->record_list($id['id'],$unicode);
        }
        $data['data_body'] = $admin_list;
        $data['data_head'] = $this->examine->data_hade();
        $data['page_num'] = $page_num;
        $data['page_size'] = $page_size;
        $data['count'] = $this->examine->model->record_count($id['id'])[0]['count(*)'];
        // $data['data_body'] = $this->examine->data_body($id['id']);
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
    public function admincsv()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2019-01-02
         * @describe:  csv function
         * ================
         */
        $post = $this->data->get_post();//获得post
        // $id = $this->common->return_user_id($post['token']);
        $id['id'] = 10;
        $data = $this->csv->admin_list_csv($id['id']);
       
    }
    public function usercsv()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2019-01-03
         * @describe:  usercsv function
         * ================
         */
        $post = $this->data->get_post();//获得post
        // $id = $this->common->return_user_id($post['token']);
        $id['id'] = '30';
        $data = $this->csv->user_list_csv($id['id']);
    }
}