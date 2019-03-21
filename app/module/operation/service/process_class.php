<?php
namespace operation;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2018-10-31
 * @describe:  operation_process service class
 * ================
 */
final class process_class
{
    // public function __construct()
    // {
    //     $this->data = app::load_sys_class('protocol');//加载json数据模板
    //     $this->model = app::load_model_class('process', 'operation');
    // }
    // /**
    //  * ================
    //  * @Author:        css
    //  * @Parameter:     index
    //  * @DataTime:      2018-10-31
    //  * @Return:        bool
    //  * @Notes:         判断是否提交了预算
    //  * @ErrorReason:   null
    //  * ================
    //  */
    // public function index()
    // {
    //     /**
    //      * ================
    //      * @Author:    css
    //      * @ver:       
    //      * @DataTime:  2018-10-31
    //      * @describe:  index function
    //      * ================
    //      */
    //     $post = $this->data->get_post();//获得post
    //     $where['state'] = 0;
    //     $post['parent_id']?$where['parent_id'] = $post['parent_id']:$where['parent_id'] = $post['id'];
    //     $data = $this->model->get_one($where);
    //     $data?$cond = 0:$cond = 1;
        
    //     //开始输出
    //     switch ($cond) {
    //         case   1://异常1
    //             $this->data->out();
    //             break;
    //         default:
    //             $this->data->out();
    //         }
    // }
}