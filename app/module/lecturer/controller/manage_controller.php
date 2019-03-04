<?php
namespace lecturer;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css   project_data_getByProjectId;edit;
 * @ver:       0.1
 * @DataTime:  2018-10-16
 * ================
 */
class manage_controller
{
    private $data;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        //todo 加载相关模块
        $this->lecturer = \app::load_service_class('lecturer_class', 'lecturer');//加载项目大表
        $this->code = \app::load_cont_class('common','user');//加载token
       
    }
    // public function list()
    // {
    //     //获取一条项目信息
    //     $post = $this->data->get_post();//获得post
    //     $cond = 0;//默认成功
    //     // $post['id'] = 93;
	// 	$data = $this->lecturer->of_list(1);
    //     $data?$cond = 0:$cond = 1;
    //     switch ($cond) {
    //         case   1://异常1
    //             $this->data->out(2002,[]);
    //             break;
          
    //         default:
    //             $this->data->out(2001, $data);
    //         }
       
    // }
    // public function add()
    // {
    //     /**
    //      * ================
    //      * @Author:    css
    //      * @ver:       0.1
    //      * @DataTime:  2018-10-20
    //      * @describe:  add function
    //      * ================
    //      */
    //     $post = $this->data->get_post();//获得post
    //     $data['name'] = $post['data']['teacher_name'];
    //     $data['unit_price'] = $post['data']['teacher_price'];
    //     $data['coop_id'] = $post['data']['teacher_cooperation_model_id'];
    //     if(!$data['name']){
    //         $this->data->out(2010);
    //     }
    //     $ass = $this->lecturer->add($data);
    //     $ass?$cond = 0:$cond = 1;
    //     //开始输出
    //     switch ($cond) {
    //         case   1://异常1
    //             $this->data->out(2004);
    //             break;
    //         default:
    //             $this->data->out(2003,$post['data']);
    //         }
    // }
    public function cooperation()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       
         * @DataTime:  2018-10-21
         * @describe:  cooperation function
         * ================
         */
        
        $ass = $this->lecturer->cooperation_list();
        foreach($ass as $k){
            $datas['id'] = $k['teacher_cooperation_model_id'];
            $datas['name'] = $k['teacher_cooperation_model_name'];
            $data[] = $datas;
        }
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
    * @DataTime:      2019-02-28
    * @Return:        
    * @Notes:         讲师列表
    * @ErrorReason:   
    * ================
    */
    public function list(){
        $head = [
            ["key"=> "id", "value"=> "讲师id","size"=>"5"],
            ["key"=> "name", "value"=> "讲师姓名","size"=>"5"],
            ["key"=> "describe", "value"=> "讲师描述","size"=>"5"],
            ["key"=> "unit_price", "value"=> "基础课价","size"=>"5"],
            ["key"=> "teaching_direction", "value"=> "讲师授课方向","size"=>"7"],
            ["key"=> "intermediator", "value"=> "联系人","size"=>"4"],
            ["key"=> "contact_information", "value"=> "联系方式","size"=>"5"],
            ["key"=> "state_name", "value"=> "合作状态","size"=>"5"],
            ["key"=> "teaching_record", "value"=> "授课记录","size"=>"5"],
            ["key"=> "pay_record", "value"=> "付款记录","size"=>"5"],
        ];
        $post = $this->data->get_post();
        switch ($post['data_type']) {
            case   'page_json'://
                return $this->list_page_json($post['query_condition'],$head);
                  break;
            case   'page_csv'://
                 return $this->list_csv($post['query_condition'],$head);
                  break;
              }
    }

    private function list_page_json($query_condition,$head){
        
        $data['body'] = $this->lecturer->list_page_json($query_condition);
        $data?$cond = 0:$cond = 1;
        $data['count'] = $this->lectuter->list_page_json_count($query_condition);
        $data['page_num'] = $query_condition['page_num']['query_data'];
        $data['page_size'] = $query_condition['page_size']['query_data'];
        $data['data_head'] = $head;
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