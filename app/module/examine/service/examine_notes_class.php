<?php
namespace examine;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       0.1
 * @DataTime:  2018-11-02
 * @describe:  examine_examine_notes service class
 * ================
 */
final class examine_notes_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('examine_notes', 'examine');
        $this->header = app::load_model_class('examine_project', 'examine');
        $this->user = app::load_model_class('user', 'user');
        $this->staff_user = app::load_model_class('staff_user', 'user');

    }

        /**
     * ================
     * @Author:        css
     * @Parameter:     is_pass_final/budget
     * @DataTime:      2018-12-27
     * @Return:        bool
     * @Notes:         判断这条项目最后的那条值里的预算信息的最后一条是不是-1的状态
     * @ErrorReason:   
     * ================
     */
     public function is_pass_final($parent_id){
        //通过项目id返回最后一条审批的id
        $where['parent_id'] = $parent_id;
        $where['examine_type'] = 2;
        $examine_id = $this->header->get_one($where);
        if($examine_id){
        //通过审批id获取审批节点的list
        $data = $this->model->select('examine_id='.$examine_id['id'].' and examine_type=2');
        //查看list里是否有状态值为-1的字段 发现有 就返回true
        foreach($data as $k){
            if($k['is_pass']==-1){
                return true;
            }
        }
        return false;
    }
        return false;
     }
     public function is_pass_budget($parent_id){
         //通过项目id返回最后一条审批的id
        $where['parent_id'] = $parent_id;
        $where['examine_type'] = 1;
        $examine_id = $this->header->get_one($where);
        if($examine_id){
        //通过审批id获取审批节点的list
        
        $data = $this->model->select('examine_id='.$examine_id['id'].' and examine_type=1');
        //查看list里是否有状态值为-1的字段 发现有 就返回true
        foreach($data as $k){
            if($k['is_pass']==-1){
                return true;
            }
        }
        return false;
    }
        return false;
     }



    public function del_note($parent_id,$examine_type){
        $where['parent_id'] = $parent_id;
        $where['examine_type'] = $examine_type;
        return $this->model->delete($where);
    }

    public function examine_state($parent_id,$examine_type='1'){
        $where['parent_id'] = $parent_id;
        $where['examine_type'] = $examine_type;
        $data = $this->header->get_one($where,'*','id DESC');
        switch ($data['state']) {
            //0为未提交 1为待审核 2为审批通过 -1为审批未通过
            case null:
                return '0';
                break;
            case 0:
                return '1';
                break;
            case 1:
                return '2';
                break;
            case -1:
                return '-1';
                break;
            default:
                # code...
                break;
        }
    }
     /**
         * ================
         * @Author:        css
         * @Parameter:     examine_notes_list
         * @DataTime:      2018-12-10
         * @Return:        data 
         * @Notes:         通过项目id获取此条项目的审批列表
         * @ErrorReason:   
         * ================
         */
         public function examine_notes_list($parent_id,$examine_type='1'){
             //通过项目id获取数据表里所有的审批
             return  $this->model->select_list($parent_id,$examine_type);
        }
    /**
     * ================
     * @Author:        css
     * @Parameter:     examine_notes_get_unpass
     * @DataTime:      2018-12-27
     * @Return:        data 
     * @Notes:         返回所有is_pass是0的数据
     * @ErrorReason:   
     * ================
     */
        public function examine_notes_get_unpass($parent_id,$examine_type='1'){
            return $this->model->examine_notes_get_unpass($parent_id,$examine_type);
        }
    //决算
    public function final_accounts($parent_id,$token,$pass='0',$process='0',$note=null){
        $admin = $this->user->get_one('token = '.$token);
        $where['type'] = 4;
        $where['admin_user'] = $admin['id'];
        //空一段代码判断此用户是否有审核这条的权限

        //判断能否进入决算
        $bool = $this->bool_final($parent_id);

        $data['admin_user'] = $admin['id'];
        $data['time'] = date('Y-m-d H:i:s',time());
        $data['pass'] = $pass;
        $data['parent_id'] = $parent_id;
        $data['note'] = $note;
        $data['type'] = 4;
        //$this->model->insert($data);
        // $this->header->update('process='.$process,'parent_id='.$parent_id.' and state=0');
    }
    private function bool_final($parent_id){
        $where['parent_id'] = $parent_id;
        $data = $this->model->select($where);
        foreach($data as $key){
            
        }
    }


    //11.26
    /**
     * ================
     * @Author:        css
     * @Parameter:     add_admin_ids
     * @DataTime:      2018-11-26
     * @Return:        ture
     * @Notes:         添加审批节点
     * @ErrorReason:   
     * ================
     */ 
     public function add_admin_ids($parent_id,$user_ids,$mode,$examine_type,$examine_id){
         $data['parent_id'] = $parent_id;
         $user_ids = explode(',',$user_ids);
         $ass = $mode;
         //判断是逐级 还是角色  还是 指定人  还是第几级主管
         if(substr($ass,0,1)==4){
            $ass = 4;
         }elseif(substr($ass,0,1)==1){
             $ass = 1;
         }
         $additional = $this->additional($ass,$mode);
         foreach($user_ids as $k=>$v){
             $data['admin_id'] = $v;
             //通过id 获取姓名
             $data['admin_user'] = $this->staff_user->get_one('user_id = '.$v)['name'];
             $data['mode'] = $ass;
             $data['additional'] = $additional;
             $data['examine_type'] = $examine_type;
             $data['examine_id'] = $examine_id;
             $ass = $this->model->insert($data);
         }
         if($ass){
             return true;
         }
         return false;
     }
     private function additional($ass,$mode){
         switch ($ass) {
             case 1:
                 return '逐级';
                 break;
            case 2:
                 //把角色的名称返回
                return  app::load_model_class('role_route', 'examine')->get_one('id='.substr($mode,2,1))['name'];
                 break;
            case 3:
                 return '指定人';
                 break;
             default:
                 return '第'.substr($mode,2,1).'级主管';
                 break;
         }
     }
     /**
      * ================
      * @Author:        css
      * @Parameter:     have
      * @DataTime:      2018-11-28
      * @Return:        
      * @Notes:         此条项目他有没有审批过
      * @ErrorReason:   
      * ================
      */
      public function have($parent_id,$admin_id){
          $where['parent_id'] = $parent_id;
          $where['admin_id'] = $admin_id;
          $where['is_pass'] = 0;
          $data = $this->model->get_one($where);
          return $data;
      }
      /**
       * ================
       * @Author:        css
       * @Parameter:     reach
       * @DataTime:      2018-11-28
       * @Return:        bool
       * @Notes:         判断这个到没到他审批
       * @ErrorReason:   
       * ================
       */
       public function reach($parent_id,$admin_id){
            $where['parent_id'] = $parent_id;
            $where['admin_id'] = $admin_id;
            $where['is_pass'] = 0;
            $admin = $this->model->get_one($where);
            unset($where['admin_id']);
            $data = $this->model->get_one($where);
            if($admin['id']==$data['id']){
                return $admin['id'];
            }
            return false;
            // return end(array_keys($data));
            // return key(end($data));
       }
       /**
        * ================
        * @Author:        css
        * @Parameter:     add
        * @DataTime:      2018-11-28
        * @Return:        bool
        * @Notes:         填加项目细节 
        * @ErrorReason:   
        * ================
        */
        public function add($note_id,$parent_id,$examine_type,$admin_id,$note,$pass,$unpass_type){

            $where['parent_id'] = $parent_id;
            $where['examine_type'] = $examine_type;
            $where['admin_id'] = $admin_id;
            $where['id'] = $note_id;
            //获取操作人姓名
            $ass = $this->staff_user->get_one('user_id ='.$admin_id);
            $data['admin_user'] = $ass['name'];
            $data['note'] = $note;
            $data['is_pass'] = $pass;
            $data['time'] = date('Y-m-d H:i:s',time());
            $css = $this->model->update($data,$where);
            $examine_id = $this->model->get_one($where)['examine_id'];
            //修改视图数据
      //项目列表更新 静态审批表添加新数据
      $bool = $this->bool_examine($parent_id,$pass,$examine_type,$examine_id);
      $project_static = \app::load_service_class('static_class','project')->static_service($parent_id,$unpass_type);
      $edit_static = \app::load_service_class('examine_static_class','examine')->edit_static($parent_id,$examine_type,$token='',$examine_id);
            return $bool;
        }
        public function bool_examine($parent_id,$pass,$examine_type,$examine_id){
            $where['parent_id'] = $parent_id;
            $where['examine_type'] = $examine_type;
            $where['id'] = $examine_id;
            if($pass==-1){
                $data['state'] = -1;
               return $this->header->update($data,$where);
            }
            $where['is_pass'] = 0;
                //如果全都审批通过 修改examine_project表状态字段表示此项目通过审核
            $bool = $this->model->get_one($where);       
            if(!$bool){
                //如果没有 修改
                $data['state'] = 1;
                unset($where['is_pass']);
                return $this->header->update($data,$where);
            }
           
        }
    /**
     * ================
     * @Author:        css
     * @Parameter:     return_for_examine_id
     * @DataTime:      2018-12-26
     * @Return:        
     * @Notes:         
     * @ErrorReason:   
     * ================
     */
     public function return_for_budget_examine_id($admin_id){
        $list =  $this->model->select_budget_note_will_list($admin_id);
        foreach($list as $k){
            $data[] = json_decode($k['data'],true);
        }
        foreach($data as $k){
            $return[] = $k['project_list_data'];
        }
        return $return;
     }
     public function return_for_final_examine_id($admin_id){
        $list =  $this->model->select_final_note_will_list($admin_id);
        foreach($list as $k){
            $data[] = json_decode($k['data'],true);
        }
        foreach($data as $k){
            $return[] = $k['project_list_data'];
        }
        return $return;
     }
}