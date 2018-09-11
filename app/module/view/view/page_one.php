<?php
namespace view;

defined('IN_LION') or exit('No permission resources.');
final class page_one
{
    public function __construct()
    {
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Connection, User-Agent, Cookie');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE');
        header('Content-type: application/json; charset=UTF-8');
        $this->class = \app::load_service_class('view_class', 'view');//加载json数据模板
    }
   //common 递归
   public function common_list(){
       
   }

    //预算page
    public function page_one()
    {
        $where['page_id'] = 1;
        $data = $this->class->view_out($where);
        $page = [
            "data"=>[
                "form-temp-name"=>"预算管理",
                "form-list"=>[$data],

            ]
        ];
        return $page;die;
    }
}