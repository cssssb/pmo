<?php
namespace examine;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       exammine_flow
 * @DataTime:  2018-11-16
 * @describe:  examine_examine_flow service class
 * ================
 */
final class examine_flow_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('exammine_flow', 'examine');
        $this->user = app::load_model_class('staff_user','user');
        $this->notes = app::load_model_class('examine_notes','examine');
        $this->department = app::load_model_class('ding_department','user');
    }
    public function add_config($data){
        return $this->model->insert($data);
    }
    public function edit_config($ass){
        $where['id'] = $ass['id'];
        $state['state'] = 1;
        $data = $this->model->update($state,$where);
        unset($ass['id']);
        return $this->model->insert($ass);
    }
    public function del_config($data){
        $state['state'] = 1;
        return $this->model->update($state,$data);
    }
    public function list(){
        $data = $this->model->select(1);
        return $data['name'];
    }

    //11.20
    public function get_one_mode($id){
        $where['id'] = $id;
        return $this->model->get_one($where,'examine_mode');
    }

    public function examine_mode_manage($examine_mode,$user_id=''){
        // if(!$user_id){
        //     return false;
        // }
        // $user_id = 110;
        // $user_id = 1000;
        $user_id = 2;
        $data = $examine_mode['examine_mode'];
        $number = substr($data,0,1);
        switch ($number) {
            //多级领导
            case 1:
              return  $this->leader_first_mode($data,$user_id);
                break;
            //角色
            case 2:
            return  $this->examine_admin_mode($data,$user_id);
                break;
            //指定用户
            case 3:
            return  $this->examine_user_mode($data,$user_id);
                break;
            default:
                // return false;
                echo 1;
            break;
        }
        return  $admin_user_id;
    }
    private function leader_first_mode($data,$user_id){
        // return 1;die;
        // $data = [
        //     'examine_mode'=>'1,3'
        // ];
        //$number = 3;
        $number = substr($data,2,1);
        //获取user_id的上三级
        switch ($number) {
        //返回此user_id的上级的id
            case 1:
               return $this->return_leader_first_user_id($user_id);
                break;
            
            case 2:
                return $this->return_leader_next_user_id($user_id);
                break;
            
            case 3:
                return $this->return_leader_third_user_id($user_id);
                break;
            default:
                return false;
                break;
        }
    }
    //返回上一级领导
    private function return_leader_first_user_id($user_id){
        //判断是不是总监
        $isinspector = $this->bool_inspector($user_id);
        if($isinspector){
            return $this->return_boss();
        }
        //判断是不是主管
        $isleader = $this->bool_leader($user_id);
        if(!$isleader){
            //查找他所在的部门isleader=1的账号id
          return  $this->return_the_department_isleader_userid($user_id);
        }
        return $this->return_the_in_department_isleader_userid($user_id);
    }


    //返回上两级领导
    private function return_leader_next_user_id($user_id){
        //判断是不是总监
        $isinspector = $this->bool_inspector($user_id);
        if($isinspector){
            return $this->return_boss();
        }
        //判断是不是主管
        $isleader = $this->bool_leader($user_id);
        if($isleader){
            //是主管
           return $this->return_for_leader_two_leader($user_id); 
        }
        //是职员
        return $this->return_for_two_leader($user_id);


    }
    //主管的二级审批  
    private function return_for_leader_two_leader($user_id){
        //首先获取主管的上级 获取总监
        $admin_id = $this->return_the_in_department_isleader_userid($user_id);
        //获取总监的上级 获取boss
        $boss_id = $this->return_boss();
        return $admin_id.','.$boss_id;
    }
    
    //普通职员的二级审批
    private function return_for_two_leader($user_id){
        //首先获取主管id
        $leader_id = $this->return_the_department_isleader_userid($user_id);
        //接着获取总监id
        $admin_id = $this->return_the_in_department_isleader_userid($leader_id);
        return $leader_id.','.$admin_id;
    }
    //返回三级审批
    private function return_leader_third_user_id($user_id){
        //判断是不是总监
        $isinspector = $this->bool_inspector($user_id);
        if($isinspector){
            return $this->return_boss();
        }
    
         //判断是不是主管
         $isleader = $this->bool_leader($user_id);
         if($isleader){
            return $this->return_for_leader_two_leader($user_id); 
         }

         return $this->return_for_three_leader($user_id);
    }

    
    //普通职员的三级审批
    private function return_for_three_leader($user_id){
        //首先获取主管id
        $leader_id = $this->return_the_department_isleader_userid($user_id);
        //接着获取总监id
        $admin_id = $this->return_the_in_department_isleader_userid($leader_id);
        //最后获取bossid
        $boss_id = $this->return_boss();
        return $leader_id.','.$admin_id.','.$boss_id;
    }
 
    //判断是不是主管  是返回true 不是返回false
    private function bool_leader($user_id){
        $where['user_id'] = $user_id;
        $data = $this->user->get_one($where);
        if($data['isLeader']==1){
            return true;
        }else{
            return false;
        }
    }
    //返回此部门主管的账号id 是 职员
    private function return_the_department_isleader_userid($user_id){
        $where['user_id'] = $user_id;
        $data = $this->user->get_one($where);
        $department['department'] = $data['department'];
        $department['isleader'] = 1;
        $leader = $this->user->get_one($department);
        return $leader['user_id'];
    }
    //返回此部门是总监的账号id  是主管
    private function return_the_in_department_isleader_userid($user_id){
        //首先查找部门
        $ass['user_id'] = $user_id;
        $department_id = $this->user->get_one($ass);
        //接着从部门表里查找部门id的父id
        $where['department_id'] = $department_id['department'];
        $f_department_id = $this->department->get_one($where);
        //然后从用户表里查找父id下所在的人
        $leader = $this->user->get_the_leader_department($f_department_id['parentid']);
        return $leader[0]['user_id'];
    }
    //返回是不是总监
    private function bool_inspector($user_id){
        $where['user_id'] = $user_id;
        $data = $this->user->get_one($where);
        if(strlen($data['department'])>8){
            return true;
        }
        return false;
    }
    private function return_boss(){
        //返回宝哥user_id
        return 2000;
    }
}