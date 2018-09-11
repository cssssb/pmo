<?php
namespace user;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       ding_user
 * @DataTime:  2018-08-21
 * @describe:  V1.0
 * ================
 */
class ding_one_controller
{
    private $view;
    /**
     * 构造函数
     */
    public function __construct()
    {   
        $this->ding = \app::load_service_class('view_class', 'user');//加载json数据模板
        // $this->view = \app::load_view_class('budget_paper', 'user');//加载json数据模板
       
    }
    public function text(){
        // print_r($this->ding->view_out());die;
        $where['page_id'] = 1;
        $data = $this->ding->view_out($where);
        // $data = 1;
        echo '<pre>';
        print_r($data);die;
    }
   
}