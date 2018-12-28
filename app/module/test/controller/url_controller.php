<?php
namespace test;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2018-12-25
 * @describe:  test_url controller class
 * ================
 */
class url_controller
{
    private $data,$url;
    /**
     * 构造函数
     */
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        $this->code = app::load_cont_class('common','user');//加载token
        $this->operation = app::load_service_class('operation_class','operation');//加载操作
        //todo 加载相关模块
        $this->url = app::load_service_class('url_class', 'test');//
        
    }
    public function test()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2018-12-25
         * @describe:  test function
         把路由同步到new_url表
         * ================
         */
        $post = $this->data->get_post();//获得post
        $url = app::load_config('route');
        // echo json_encode($url['default_routelist'],true);
        die;
        foreach($url['default_routelist'] as $k=>$v){
            $a['url_name'] = $k;
            $a['url'] = $v[0].'/'.$v[1].'/'.$v[2];
            $a['request'] = json_encode($v[3],true);
            $a["response"] = json_encode($v[4],true);
            $a['note'] = $v[6];
            $a['version'] = $v[5];
            $have = $this->url->model->insert($a);
        }
        if($have){
            echo 1;die;
        }
        echo 2;die;
        $data = $this->url->add($url);
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
    function unrepeat(){
        $a = ['1','2','3','a'];
        $b = ['2','3','4'];
        print_r(array_flip($a));
        // print_r(array_merge($a,$b));
    //    print_r(array_keys(array_flip($a)+array_flip($b)));
    }
}