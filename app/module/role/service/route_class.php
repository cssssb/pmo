<?php
namespace role;

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
final class route_class
{
    private $host;
    public function __construct()
    {
        $this->model = app::load_model_class('route_url', 'user');
        $this->role_in_route = app::load_model_class('role_in_route', 'examine');
        $this->host = app::load_config('web_path');//加载host配置

    }
   
    //返回所有路由
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
    //返回角色下的路由
    public function return_role_in_route($role_id){
        //获取关系表中role_id的role_id值=$role_id的值的字段
        $where['role_id'] = $role_id;
        $in_route = $this->role_in_route->select($where);
        // return $in_route;die;
        //遍历 in_route中的route_id
        foreach($in_route as $k){
            $route_ids[] = $k['route_id'];
        }
        // $route_ids = $in_route['route_id'];
        // $route_ids = explode(",",$route_ids);
        $config = $this->host;

        foreach($route_ids as $k=>$v){
            $ass['id'] = $v;
            $data[] = $this->model->get_one($ass);
            $url_name = $data[$k]['url_name'];
            $return[$url_name] = $data[$k];
            
        }
        return $return;

    }
    //add role_in_route
    public function add_route($role_id,$route_id){
        $ass = explode(",",$route_id);
        $data_id['role_id'] = $role_id;
        $have_role_id = $this->role_in_route->select($data_id);
        foreach($have_role_id as $k){
            $route_ids[] = $k['route_id'];
        }
        //array_diff 返回在数组1中不在其他数组中的值
        $insert_route_id = array_diff($ass,$route_ids);
       foreach($insert_route_id as $k){
           $data['route_id'] = $k;
           $data['role_id'] = $role_id;
           $ass = $this->role_in_route->insert($data);
       }
       if(isset($ass)){
       return true;}
       return false;
    }
    
    //del
    public function del_route($role_id,$route_id){
        $ass = explode(",",$route_id);
        $data_id['role_id'] = $role_id;
        foreach($ass as $k){
            $data_id['route_id'] = $k;
            $css = $this->role_in_route->delete($data_id);
        }
        return $css;
    }
    public function list_route(){
        //表下xxx有哪些数据
        $data_all = $this->role_in_route->select(1);
        //遍历每一个的每一个名称和具体的路由
        foreach($data_all as $k=>$v){
            $data['roule'] = $k;
        }
        return $data_all;
    }
    
}