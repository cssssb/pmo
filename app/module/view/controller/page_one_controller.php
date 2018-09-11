<?php
namespace view;

// use system\ding_password;


// echo "load ding_controller";
// echo  microtime();
// echo "\n";

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       ding_user
 * @DataTime:  2018-08-21
 * @describe:  V1.0
 * ================
 */
class page_one_controller
{
    private $view;
    /**
     * 构造函数
     */
    public function __construct()
    {   
        $this->view = \app::load_view_class('page_one', 'view');//加载json数据模板
    }
    //token
   public function one_page(){
       $data = $this->view->page_one();

       echo (json_encode($data));
   }
}