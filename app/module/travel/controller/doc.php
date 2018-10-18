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
        $this->url = app::load_config();
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
        $gbpi = $this->plan->getByProjectId();
        $data = [
                    'getByProjectId' => [
                                'post'=>['id','token'],
                                'return'=>[
                                    'true'=>[],
                                    'false'=>[],
                                ],
                                'url'=>['"travel_plan_getByProjectId" => ["travel", "plan", "getByProjectId", [], [], "1.0"],'],
                                'Notes'=>'返回差旅安排列表'
                ],
        ];
        return var_dump($data);
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
    private function url(){
      
        $ch = curl_init();
        $file = 'ding_password';
        
        $url = "";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);

         return json_decode($data, true)["access_token"];

        if ($data === false) {
            return "CURL Error:" . curl_error($ch);
        }

    }
}