<?php 
namespace certificate;

//namespace 模块名
use \app;
use course\json;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2019-04-09
 * @describe:  certificate_data controller class
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
        // //todo 加载相关模块
        $this->cer = app::load_service_class('cer_class', 'certificate');//
    }
   
    /**
     * ================
     * @Author:        css
     * @Parameter:     
     * @DataTime:      2019-04-15
     * @Return:        
     * @Notes:         发送doc_token获取doc
     * @ErrorReason:   
     * ================
     */
    public function doc(){
        $post = $this->data->get_post();
        $post['doc_token'] = 'asdjkhh51asf';
        $doc = app::load_config('doc_demo')[$post['doc_token']];
        $this->data->out_data($doc);
    }
    
    /**
     * ================
     * @Author:        css
     * @Parameter:     
     * @DataTime:      2019-04-15
     * @Return:        
     * @Notes:         发送用户token获取他个人在项目集成里的所有的信息
     * @ErrorReason:   
     * ================
     */
    public function user_data(){
        $post = $this->data->get_post();
        $post['token'] = '123456';
        $data = $this->cer->doc_user($post['token']);
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
     * @DataTime:      2019-04-15
     * @Return:        
     * @Notes:         发送token + doc_token 返回在xx培训里的培训信息
     * @ErrorReason:   
     * ================
     */
     public function doc_user(){
         $post = $this->data->get_post();
         $post['token'] = '123456';
         $post['doc_token'] = 'asdjkhh51asf';
         $doc_name = app::load_config('doc_demo')[$post['doc_token']]['docname'];
         $data = $this->cer->doc_user($post['token'],$doc_name);
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
    //通过选择的模板返回
    public function getone()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2019-04-09
         * @describe:  getone function
         * ================
         */
        $post = $this->data->get_post();//获得post
        $data = $this->cer->get_cer($post);
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
    
   public function get_one_user_data(){
    //    $post = $this->data->get_post();
       if($_POST['identity']==null){
           $this->data->out(5019);
       }
       if(!$this->isCreditNo($_POST['identity'])){
            $this->data->out(5020);
       }
       $data = $this->cer->get_one_filter($_POST);
        $return['name'] = $data['name'];
        $return['starttime'] = $data['train_starttime'];
        $return['endtime'] = $data['train_endtime'];
        $return['course'] = '系统项目集成';
        $return['teacher'] = $data['teacher'];
        $return['docid'] = '1';
       echo json_encode($return,JSON_UNESCAPED_UNICODE);
   }
   
}