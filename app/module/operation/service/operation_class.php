<?php
namespace operation;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       operation
 * @DataTime:  2018-10-23
 * @describe:  operation_operation service class
 * ================
 */
final class operation_class
{
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        $this->model = app::load_model_class('operation', 'operation');
        $this->user = app::load_model_class('user', 'user');
        $this->index();
    }
     /**
     * ================
     * @Author:        css
     * @Parameter:     index
     * @DataTime:      2018-10-22
     * @Return:        BOOL
     * @Notes:         验证这一组里是否有人操作
     * @ErrorReason:   
     * ================
     */         
    public function index(){
        $post = $this->data->get_post();//获得post
        // echo json_encode($post);die;
        $token = $post['token'];
       
        if(isset($post['data'])){
            if(!isset($post['data']['id']) && !isset($post['data']['parent_id'])){
                return true;
            }
            $post['data']['id'] ? $parent_id['parent_id'] = $post['data']['id']:$parent_id['parent_id'] = $post['data']['parent_id'];
        }else{
        if(!isset($post['id']) && !isset($post['parent_id'])){
            return true;
        }
        $post['id'] ? $parent_id['parent_id'] = $post['id']:$parent_id['parent_id'] = $post['parent_id'];}
        
        //把通过token查询变成用户id查询
        $user = $this->user->get_one("token='$token'");
        if(!$user){
       return  $this->data->out(4002,[]);
        }
    
        //如果没有数据就添加
        if(!$project){
            $data['user_id'] = $user['id'];
            $data['parent_id'] = $parent_id['parent_id'];
		    $data['time'] = date('y-m-d H:i:s',time());
            $this->model->insert($data);
            return true;
        }
        //以下是数据表里已有此项目id的操作
        $where['user_id'] = $user['id'];
        $where['parent_id'] = $parent_id['parent_id'];
        // echo json_encode($where);die;

        //如果依旧是原来的id进行操作返回true(1)
        if($this->model->get_one($where)){
            $new['time'] = date('y-m-d H:i:s',time());
            $this->model->update($new,$where);
            return true;
        }
        //通过时间看能否操作
		$time = time()-strtotime($project['time']);
        if($time>180){
            // echo json_encode(1);die;
            $data['user_id'] = $user['id'];
            $data['time'] = date('y-m-d H:i:s',time());
           $this->model->update($data,"parent_id = ".$where['parent_id']);
           return true;
        }
        //所有条件不满足。返回操作人姓名
        $username = $this->user->get_one("id=".$project['user_id']);
       return  $this->data->out(3010,['name'=>$username['username']]);
    }
    public function del(){
        $post = $this->data->get_post();//获得post
        $token = $post['token'];
        $parent_id = $post['data']['parent_id'];
        $user = $this->user->get_one("token='$token'");
        $where['parent_id'] = $parent_id;
        $where['user_id'] = $user['id'];
        return $this->model->delete($where);
    }
}