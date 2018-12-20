<?php
namespace menu;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2018-12-20
 * @describe:  menu_data controller class
 * ================
 */
class data_controller
{
    private $data;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        $this->code = app::load_cont_class('common','user');//加载token
        $this->operation = app::load_service_class('operation_class','operation');//加载操作
        //todo 加载相关模块
        $this->menu = app::load_service_class('menu_class', 'menu');//
    }
    
    public function list()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2018-12-20
         * @describe:  data function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $data = $this->menu->static_list();
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
    public function getone()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2018-12-20
         * @describe:  getone function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $data = $this->menu->get_one_state($post['id']);
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
   public function listmenuleft()
   {
       /**
        * ================
        * @Author:    css
        * @ver:       1.0
        * @DataTime:  2018-12-20
        * @describe:  listmenuleft function
        * ================
        */
       $post = $this->data->get_post();//获得post
       $data = $this->menu->listmenuleft();
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

   public function listmenuright()
   {
       /**
        * ================
        * @Author:    css
        * @ver:       1.0
        * @DataTime:  2018-12-20
        * @describe:  listmenuright function
        * ================
        */
       $post = $this->data->get_post();//获得post
       $data = $this->menu->listmenuright();
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
}