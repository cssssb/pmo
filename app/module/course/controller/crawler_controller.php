<?php
namespace course;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2019-03-22
 * @describe:  course_return controller class
 * ================
 */
class crawler_controller
{
    private $data, $return;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        // $this->code = app::load_cont_class('common','user');//加载token
        // $this->operation = app::load_service_class('operation_class','operation');//加载操作
        //todo 加载相关模块
        $this->crawler = app::load_service_class('crawler_class', 'course');//
    }
    public function value()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2019-03-22
         * @describe:  value function
         * ================
         */
        // $post = $this->data->get_post();//获得post
        // echo 1;
        // echo app::load_config('ding_password');die;

         echo $this->ding_demo();
        die;
        $cto = app::load_sys_class('crawler')->get_51cto_title_csv();
        die;

        print_r($_POST);
        die;
        //开始输出
        $_POST['token'] = 'password';
        switch ($_POST['token'] != 'password') {
            case true://异常1
                $this->data->out(1003);
                break;
            default:
                $this->ding_demo();
        }

    }
    function request_by_curl($post_string) {  
        $ch = curl_init();  
        $remote_server = "https://oapi.dingtalk.com/robot/send?access_token=e6d14990020e5041ae278e7c61b51b19199ea4c5e6f4182c5575cf94fb007190";

        curl_setopt($ch, CURLOPT_URL, $remote_server);
        curl_setopt($ch, CURLOPT_POST, 1); 
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array ('Content-Type: application/json;charset=utf-8'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
        // 线下环境不用开启curl证书验证, 未调通情况可尝试添加该代码
        curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0); 
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $data = curl_exec($ch);
        curl_close($ch);                
        echo  $data;  
    }  
    private function ding_demo()
    {
                
        $webhook = "https://oapi.dingtalk.com/robot/send?access_token=e6d14990020e5041ae278e7c61b51b19199ea4c5e6f4182c5575cf94fb007190";
        $list = ['51cto','easthome'];
        foreach($list as $k){
            $this->msg_type($k);
        }
    }
    private function msg_type($type){
        // $data = '{
        //     "actionCard": {
        //         "title": "乔布斯 20 年前想打造一间苹果咖啡厅，而它正是 Apple Store 的前身", 
        //         "text": "![screenshot](serverapi2/@lADOpwk3K80C0M0FoA) 
        //  ### 乔布斯 20 年前想打造的苹果咖啡厅 
        //  Apple Store 的设计正从原来满满的科技感走向生活化，而其生活化的走向其实可以追溯到 20 年前苹果一个建立咖啡馆的计划", 
        //         "hideAvatar": "0", 
        //         "btnOrientation": "0", 
        //         "btns": [
        //             {
        //                 "title": "内容不错", 
        //                 "actionURL": "https://dashboard.csst.com.cn/#/trainingProgram"
        //             }, 
        //             {
        //                 "title": "不感兴趣", 
        //                 "actionURL": "https://dashboard.csst.com.cn/#/trainingProgram"
        //             }
        //         ]
        //     }, 
        //     "msgtype": "actionCard"
        // }';
        // $this->request_by_curl($data);

        // die;
        switch ($type) {
            case '51cto':
            $data['msgtype'] = 'markdown';
            $data['markdown']['title'] = '51cto今日首页课程';
            $data['markdown']['text'] = $this->return_51cto_title();
            $data_string = json_encode($data);
            $this->request_by_curl($data_string);
                break;
            case 'easthome':
                $data['msgtype'] = 'markdown';
                $data['markdown']['title'] = '今日东方瑞通首页课程';
                $data['markdown']['text'] = $this->return_easthome_title();
                $data_string = json_encode($data);
                $this->request_by_curl($data_string);
                    break;
                
            // default:
            // case '51cto':
            //     $data['msgtype'] = 'feedCard';
            //    $data['feedCard']['links']['title'] = '测试';
            //    $data['feedCard']['links']['messageURL'] = 'https://mp.weixin.qq.com/s?__biz=MzA4NjMwMTA2Ng==&mid=2650316842&idx=1&sn=60da3ea2b29f1dcc43a7c8e4a7c97a16&scene=2&srcid=09189AnRJEdIiWVaKltFzNTw&from=timeline&isappinstalled=0&key=&ascene=2&uin=&devicetype=android-23&version=26031933&nettype=WIFI';
            //    $data['feedCard']['links']['picURL'] = 'www.baidu.com';
            //            $data_string = json_encode($data);
            //     $this->request_by_curl($data_string);
                // break;
        }
        
    }
    //51ctotxt
    private function return_51cto_title(){
        $cto = app::load_sys_class('crawler')->get_51cto_title();
        $txt = '# 51cto今日首页课程
';
        foreach($cto as $k){
          $k?  $txt .= '### '.$k.'
':true;
        }
        return $txt;
    }
    //东方瑞通txt
    private function return_easthome_title(){
        $easthome = app::load_sys_class('crawler')->get_easthome_title();
        $txt = '# 今日东方瑞通首页课程
';
        foreach($easthome as $k){
            $k?$txt.='### '.$k.'
':true;
        }
        return $txt;
    }

}