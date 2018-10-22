<?php
namespace project;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       0.1
 * @DataTime:  2018-10-22
 * @describe:  project_operation service class
 * ================
 */
final class operation_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('operation_project', 'project');
        $this->user = app::load_model_class('user', 'user');
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
    public function index($token,$parent_id){
        //把通过token查询变成用户id查询
        $user = $this->user->get_one("token='$token'");
        if(!$user){
            return 'token';
        }
        //查看操作表里有无此数据
        $project = $this->model->get_one('parent_id='.$parent_id);
    
        //如果没有数据就添加
        if(!$project){
            $data['user_id'] = $user['id'];
            $data['parent_id'] = $parent_id;
		    $data['time'] = date('y-m-d H:i:s',time());
            $this->model->insert($data);
       
        }
        //以下是数据表里已有此项目id的操作
        $where['user_id'] = $user['id'];
        $where['parent_id'] = $parent_id;
        //如果依旧是原来的id进行操作返回true(1)
        if($this->model->get_one($where)){
            return false;
        }
        //通过时间看能否操作
		$time = time()-strtotime($project['time']);
        if($time>180){
            $data['user_id'] = $user['id'];
            $data['time'] = date('y-m-d H:i:s',time());
           $this->model->update($data,$where['prent_id']);
           return false;
        }
        //所有条件不满足。返回操作人姓名
        return $user['name'];
    }
    public function del($token='',$parent_id=''){
        $user = $this->user->get_one("token='$token'");
        $where['parent_id'] = $parent_id;
        $where['user_id'] = $user['id'];
        return $this->model->delete($where);
    }
}