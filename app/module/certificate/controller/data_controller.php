<?php 
namespace certificate;

//namespace 模块名
use \app;

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
    public function text(){
        $data = [
            "data"=>[
                "project_manager"=>[
                    "name"=>"崔思思",
                    "usercode"=>"142622000000000000",
                    "achievement"=>"通过",
                ],
                "Software_test"=>[
                    "name"=>"崔思思",
                    "usercode"=>"142622000000000000",
                    "achievement"=>"通过",
                ],
                "PMP"=>[
                    "name"=>"崔思思",
                    "usercode"=>"142622000000000000",
                    "achievement"=>"通过",
                ],
            ]
        ];
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
    }
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
    public function info(){
        phpinfo();
    }
    public function redis_test(){
        //连接本地的 Redis 服务
   $redis = new \Redis();
   $redis->connect('127.0.0.1', 6379);
//    echo "Connection to server sucessfully";
//          //查看服务是否运行
//    echo "Server is running: " . $redis->ping();
    $redis->setex('db0',10, 'predis');
    $retval = $redis->get('db0');
    $ttl = $redis->ttl('db0');
    echo $retval; //显示 ‘predis’
    echo $ttl; //显示 ‘predis’
    }
    public function array_insert_test(){
        $data = [
            0=>['phone'=>1,'usercode'=>2,'name'=>3],
            1=>['phone'=>1,'usercode'=>2,'name'=>3],
            2=>['phone'=>1,'usercode'=>2,'name'=>3],
            3=>['phone'=>1,'usercode'=>2,'name'=>3],
            4=>['phone'=>1,'usercode'=>'','name'=>3],
        ];
        // // $list = '';
        // foreach($data as $k){
        //     foreach($k as $key){
        //         $list[] = $key;
        //     }
        // $count = count($k);

        // }
        // $list = '\''.implode('\',\'',$list).'\'';
        // $list = explode(',',$list);
        // echo '<pre>';
        // print_r($list);
        // print_r($count);
        // for ($i=0; $i < $count; $i++) { 
        //     $as[] = array_slice($list, $i * $count ,$count);
        // }
        // foreach($as as $k){
        //     $ass[]  = implode(',',$k);
        // }
        // $ass = '('.implode('),(',$ass).')';
        // print_r($as);
        // print_r($ass);

        // print_r($count);
        // echo "('1','2','3'),('1','2','3')";
        // die;
        // $this->cer->model->insert($data);
        print_r($this->cer->array_insert($data));
        // foreach($data as $k){
        //     $list = array_keys($k);
        //     // $return[] = $list;
        // }
        // print_r($list);
        //应该返回的数据格式
    }
}