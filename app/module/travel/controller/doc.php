<?php
namespace travel;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       0.1
 * @DataTime:  2018-10-17
 * @describe:  travel_doc controller class
 * ================
 */
class doc
{
    private $data,$doc;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->
        $this->url = app::load_config('web_path');
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        //todo 加载相关控制器
        $this->stay = app::load_cont_class('hotel','travel');//加载住宿
        $this->city = app::load_cont_class('inCityTraffic','travel');//加载市内交通
        $this->province = app::load_cont_class('longTraffic','travel');//加载长途交通
        $this->province_type = app::load_cont_class('longTrafficType','travel');//加载交通工具
        $this->plan = app::load_cont_class('plan','travel');//加载差旅
    }
    public function readme()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       
         * @DataTime:  2018-10-17
         * @describe:  readme function
         * ================
         */
        $url['getByProjectId'] = 'http://localhost:666/travel/plan/getByProjectId';
        $post['getByProjectId']['true'] =  '{"id":"117","token":"tnkGNc"}';
        $post['getByProjectId']['false'] = '{"id":"11","token":"tnkGNc"}';
        $return['true']['getByProjectId'] = $this->post_curls($url['getByProjectId'],$post['getByProjectId']['true']);
        $return['false']['getByProjectId'] = $this->post_curls($url['getByProjectId'],$post['getByProjectId']['false']);
        $return['error']['getByProjectId'] = $this->post_curls($url['getByProjectId']);
        $data['getByProjectId'] = [ 
                    
                                'post_key'=>['id','token'],
                                'post_val'=>$post['getByProjectId'],
                                'return'=>[
                                    'true'=>$return['true']['getByProjectId'],
                                    'false'=>$return['false']['getByProjectId'],
                                    'error'=>$return['error']['getByProjectId'],
                                ],
                                'url'=>['"travel_plan_getByProjectId" => ["travel", "plan", "getByProjectId", [], [], "1.0"],'],
                                'Notes'=>'返回差旅安排列表'

                               
        ];
        $url['City_add'] = 'http://localhost:666/travel/inCityTraffic/add';
        $post['city_add'] = '"data":{"parent_id":"1","short_fee":"1","short_fee_type":"1","short_fee_card_people":"1"},"token":"tokens"';
        $return['true']['inCityTraffic']['add'] = $this->post_curls($url['City_add'],$post['city_add']);
        $data['inCityTraffic']['add'] = [
                'post'=>['data'=>['parent_id','short_fee','short_fee_card_people','short_fee_type'],
                        'token'],
                'return'=>[$return['true']['inCityTraffic']['add'],
                           $return['false']['inCityTraffic']['add']]
        ];
        // echo $return;
        print_r ($data);
            // "travel_plan_getByProjectId" => ["travel", "plan", "getByProjectId", [], [], '1.0'],         //差旅安排

            // "travel_inCityTraffic_add" => ["travel", "inCityTraffic", "add", [], [], '1.0'],        //市内交通
            // "travel_inCityTraffic_edit" => ["travel", "inCityTraffic", "edit", ["id" => "string"], [], '1.0'],        
            // "travel_inCityTraffic_del" => ["travel", "inCityTraffic", "del", ["id" => "string"], [], '1.0'],        
            // "travel_longTraffic_add" => ["travel", "longTraffic", "add", [], [], '1.0'],        //长途交通
            // "travel_longTraffic_edit" => ["travel", "longTraffic", "edit", ["id" => "string"], [], '1.0'],        
            // "travel_longTraffic_del" => ["travel", "longTraffic", "del", ["id" => "string"], [], '1.0'],        
            // "travel_hotel_add" => ["travel", "hotel", "add", [], [], '1.0'],        //住宿安排
            // "travel_hotel_edit" => ["travel", "hotel", "edit", ["id" => "string"], [], '1.0'],        
            // "travel_hotel_del" => ["travel", "hotel", "del", ["id" => "string"], [], '1.0'],   
            // "travel_longTrafficType_list" => ["travel", "longTrafficType", "list", [], [], '1.0'], //出行方式  
    }
    public function post_curls($url='', $post='')
    {
        // $url = 'http://localhost:666/travel/plan/getByProjectId';
 

        $curl = curl_init(); // 启动一个CURL会话
        curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1); // 从证书中检查SSL加密算法是否存在
        curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
        curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer
        curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post); // Post提交的数据包
        curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
        curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
        $res = curl_exec($curl); // 执行操作
        if (curl_errno($curl)) {
            echo 'Errno'.curl_error($curl);//捕抓异常
        }
        curl_close($curl); // 关闭CURL会话
        return  $res; // 返回数据，json格式
 
    }

}