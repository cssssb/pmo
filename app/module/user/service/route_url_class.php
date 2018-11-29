<?php
namespace user;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       route_url
 * @DataTime:  2018-11-27
 * @describe:  user_route_url service class
 * ================
 */
final class route_url_class
{
    private $host;
    public function __construct()
    {
        $this->model = app::load_model_class('route_url', 'user');
        $this->host = app::load_config('web_path');//加载host配置

    }
    public function return_url(){
        $data = $this->model->select(1);
        $config = $this->host;
        foreach($data as $k=>$v){
            unset($data[$k]['id']);
            $data[$k]['url'] = $config.'/'.$data[$k]['url'];
            $return[$v['url_name']] = $data[$k];
        }
        return $return;
    }
}