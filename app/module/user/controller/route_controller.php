<?php
/**
 * 接口列表
 */
namespace user;

use \app;

defined('IN_LION') or exit('No permission resources.');
class route_controller
{
    private $routelist;
    private $host;
    private $base;
    private $finance;
    private $express;
    private $admin;
    private $student;
    public function __construct()
    {
        $this->host = app::load_config('web_path');//加载host配置
        $this->data = app::load_sys_class('protocol');//加载json数据模板
    }

    public function client_route2()
    {
        $this->routelist = array(
   


        );
        $this->data->add_data('common_code', $this->data->codelist);
        $this->data->set_code(1001);
        $this->data->add_data('routelist', $this->routelist);
        $this->data->output();
    }

    private function r($c, $b, $a, $request=[], $response=[],$version="0.1")
    {
        return ["url"=>$this->host."/".$c."/".$b. "/".$a,"request"=>$request,"response.data"=>$response,"version"=>$version];
    }

    public function client_route()
    {
        $routelist = app::load_config('route', 'default_routelist');//加载route
        foreach ($routelist as $key => $route) {
            $this->routelist["$key"]=$this->r($route[0], $route[1], $route[2], $route[3], $route[4],$route[5]);
        }
        $this->data->add_data('common_code', $this->data->codelist);
        $this->data->set_code(1001);
        $this->data->add_data('routelist', $this->routelist);
        // $this->data->add_data('routelist', app::load_service_class('route_class','role')->return_url());
        $this->data->output();
    }
}
