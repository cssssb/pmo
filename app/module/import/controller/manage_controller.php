<?php
namespace import;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2019-03-05
 * @describe:  import_import controller class
 * ================
 */
class manage_controller
{
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        //todo 加载相关模块
        $this->import = app::load_service_class('import_class', 'import');//
    }
    public function analysis()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       
         * @DataTime:  2019-03-05
         * @describe:  manage function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $data = $this->import->analysis();
        $data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(2002,$data);
                break;
            default:
                $this->data->out(2002,$data);
            }
    }   
    public function test(){
        echo json_encode($this->import->examine_static->model->get_one('parent_id=1'));
    }
    public function text(){
        $a = "欢迎光临http://www.jb51.net/"; //给http开头的加上超链接
        echo preg_replace("/http:\/\/(.*)\//","<a href=\"\${0}\">\${0}</a>","$a").'</br>';
        $b = "01.02";
        echo preg_replace("/[.]/","-",$b);
        // echo preg_replace("/{0-9}./","-",$b);
    }
}