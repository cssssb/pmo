<?php
namespace recruit;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2019-04-02
 * @describe:  recruit_data controller class
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
        // $this->code = app::load_cont_class('common','user');//加载token
        // $this->operation = app::load_service_class('operation_class','operation');//加载操作
        //todo 加载相关模块
        $this->job = app::load_service_class('job_class', 'recruit');//
    }
    public function test(){
        $post = $this->data->get_post();
        echo json_encode($post,JSON_UNESCAPED_UNICODE);die;
    }
    public function where_out(){
        $post = $this->data->get_post();
        // echo json_encode($post,JSON_UNESCAPED_UNICODE);die;
        // $post = 'a,b,c';
        
        // var_dump($_GET);
        $str = implode(',',$post);
        echo json_encode($this->job->where_out($str),JSON_UNESCAPED_UNICODE);
    }
    public function ver(){
        $ver_list = $this->job->get_ver_list();
        echo json_encode($ver_list,JSON_UNESCAPED_UNICODE);
    }
    public function list(){
        // $str = ['abc','acc','and'];
        // $number = count($str);
        // $str_len = 0;
        // for ($i=0; $i < $number; $i++) { 
        //     echo $str[$i][0];
        //     if($str)
        // }
    }
    public function all_out(){
        echo json_encode($this->job->all_out(),JSON_UNESCAPED_UNICODE);
    }
    public function out1()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2019-04-02
         * @describe:  out1 function
         * ================
         */
        $post = $this->data->get_post();//获得post
        // echo '成功';die;
        // $post_data =  json_decode($post,true);die;
        $data = $this->job->out_zhilian($post);
        $data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                echo '导入智联失败';
                break;
            default:
                echo '导入智联成功'.time();
//                 echo '
//                 <script type="text/javascript">
//                 alert("成功");
                
// </script>
//                 ';
                // print_r(json_decode($post,true));
            }
    }
    public function out2()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2019-04-02
         * @describe:  out2 function
         * ================
         */
        $post = $this->data->get_post();//获得post
        // echo json_decode($post,true);die;
        // $post_data =  json_decode($post,true);
        $data = $this->job->out_51($post);
        $data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                echo '导入51失败';
                break;
            default:
                echo '导入51成功'.time();
                // print_r(json_decode($post,true));
            }
    }
    public function export()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2019-04-02
         * @describe:  export function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $data = $this->job->export();
   
        // $as = json_decode($data,true);
        // print_r($as);
        echo json_encode($data,JSON_UNESCAPED_UNICODE); die;


        
        $data?$cond = 0:$cond = 1;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out();
                break;
            default:
                $this->data->out();
            }
    }


    }