<?php
namespace examine;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       user
 * @DataTime:  2018-11-19
 * @describe:  examine_common service class
 * ================
 */
final class common_class
{
    public function __construct()
    {
        $this->user = app::load_model_class('user', 'user');
        $this->staff_user = app::load_model_class('staff_user', 'user');
        $this->role_route = app::load_model_class('role_route', 'examine');
    }
   
    // 通过token返回用户id
    public function return_user_id($token){
        $where['token'] = $token;
       return $this->user->get_one($where,'id');
    }
    //通过token获取职工角色详细信息
    public function return_staff_user_id($token){
       $user_id = $this->return_user_id($token);
       $where['user_id'] = $user_id['id'];
        return  $this->staff_user->get_one($where);
    }
    //判断token是不是超级管理员
    public function return_bool_admin($token){
        $data = $this->return_staff_user_id($token);
        if($data['isAdmin']==1){
            return true;
        }else{
            return false;
        }
    }
    //通过token 获取用户角色id
    public function return_role($token){
        //获取职工角色详细信息
        //  $user = $this->return_staff_user_id($token);
         $user = $this->return_user_id($token);
         $data = $this->role_route->get_one_user_ids($user['id']);
         return $data[0]['id'];
    }
    //通过token获取所在部门下的user_ids
    public function return_user_department_user_id($token){
        //用户id
        $user_id = $this->return_user_id($token);
        $data = $this->staff_user->get_one('user_id='.$user_id['id']);
        return $this->staff_user->get_the_leader_department($data['department']);
    }
    
}