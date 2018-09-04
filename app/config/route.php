<?php
/**
 * 接口列表
 */
namespace user;
defined('IN_LION') or exit('No permission resources.');
class route {
    private $routelist,$host,$base,$finance,$express,$admin,$student;
	function __construct() {
        $this->data = \app::load_app_class('protocol','protocol');//加载json数据模板
        $this->host = "localhost/";
        
    }

    public function client_route()	{
        $this->routelist = array(
    
    "client_route"    =>$this->r("user","index","check",
                                    ["account"=>"string","code"=>"string:4"],
                                    ["session"=>"string"]),


        );
        $this->data->add_data('common_code', $this->data->code);
        $this->data->set_code(10101);
        $this->data->add_data('routelist',$this->routelist);
        $this->data->output();
    }

    private function r($c,$b,$a,$request=[],$response=[]){
        return ["url"=>$this->host."/".$c."/".$b,"/".$a,"request"=>$request,"response.data"=>$response];
    }
}