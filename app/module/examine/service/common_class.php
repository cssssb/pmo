<?php
// ini_set('display_startup_errors',1);

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
        $this->department = app::load_model_class('department_table', 'user');
    }
   
    // 通过token返回用户id
    public function return_user_id($token){
        $where['token'] = $token;
       return $this->user->get_one($where);
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
    
    // public function return_user_department_user_id($token){
    //     //用户id
    //     $user_id = $this->return_user_id($token);
    //     //获取部门
    //     $department = $this->staff_user->get_one('user_id='.$user_id['id'])['department'];
    //     //获取子部门
    //     $son_department = $this->return_son_department($department);
        
    //     //获取子部门下的人的数据
    //     $list = $this->staff_user->get_the_leader_department($son_department);
    //     // print_r($list);die;
    //     foreach($list as $k=>$v){
    //         $return = $v['id'];
    //         $array[] = $return;
    //     }
    //      $str =implode(',',$array);
    //      return $str;
    // }

    // //递归查找子部门用逗号连接
    // private function return_son_department($department){
    //    $data = $this->department->select("parentid in ($department)");
    //    foreach($data as $k){
    //        $son_department .= implode(',',$k);
    //    }
    //    if($data){
    //        $this->return_son_department($son_department);
    //    }
    // //    print_r($department);die;
    //    return $department;
    // }
    public function return_user_department_user_id($token){
        //用户id
        $user_id = $this->return_user_id($token)['id'];
        $staff_user_id = $this->staff_user->get_one('user_id='.$user_id)['id'];
        $department_list = $this->staff_user->get_one("id = $staff_user_id")['department'];
         $son_department = $this->return_son_department($department_list);
          //获取子部门下的人的数据
        $list = $this->staff_user->get_the_leader_department($son_department);
        foreach($list as $k=>$v){
            $return = $v['id'];
            $array[] = $return;
        }
        $ids = implode(',',$array);
        return $ids;
    }
    public function test($department_list){
        //获取部门
        // $department = $this->staff_user->get_one('user_id='.$user_id)['department'];
        // foreach($department_list as $k){
        //     $de = explode(',',$k['department']);
        //     $department[] = $de;
        // }
        // $department_list = $this->manage_array($department);
        // $department_list = array_unique($department_list);
        // $delist = implode(',',$department_list);
        //获取子部门
        // if($delist==true){
        // $son_department = $this->return_son_department($delist);}
        
            // return  $ids;
        
    }
    //二维数组转一维数组
    private function manage_array($array){
        foreach($array as $key){
            foreach($key as $k){
                $b[] = $k;
            }
        }
        return $b;
    }
    //递归查找子部门用逗号连接
    private function return_son_department($department,$str=''){
        // if($department==true){
       $data = $this->department->select("parentid in ($department)");
       $son_department = '';
       foreach($data as $k){
           $son_department.= $k['department_id'];
       }
       if($data){
        //判断是否需要进行
        $str==null?$return = $department.','.$son_department:$return = $str.','.$son_department;
        $return .= $str.','.$son_department;
        $this->return_son_department($son_department,$return);
       }
       return $return;
    }
}