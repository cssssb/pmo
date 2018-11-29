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
     * @Parameter:     flow
     * @DataTime:      2018-11-06
     * @Return:        bool
     * @Notes:         xx审批了xx项目 true or false
     * @ErrorReason:   
     * ================
     */
    //讲师安排
    public function lecturer($parent_id,$token,$pass='0',$note=null){
        $admin = $this->user->get_one('token = '.$token);
        $where['type'] = 1;
        $where['admin_user'] = $admin['id'];
        //空一段代码判断此用户是否有审核这条的权限
        $data['admin_user'] = $admin['id'];
        $data['time'] = date('Y-m-d H:i:s',time());
        $data['pass'] = $pass;
        $data['parent_id'] = $parent_id;
        $data['note'] = $note;
        $data['type'] = 1;
        // return $this->model->insert($data);
    }
    //实施安排
    public function implement($parent_id,$token,$pass='0',$note=null){
        $admin = $this->user->get_one('token = '.$token);
        $where['type'] = 2;
        $where['admin_user'] = $admin['id'];
        //空一段代码判断此用户是否有审核这条的权限
        $data['admin_user'] = $admin['id'];
        $data['time'] = date('Y-m-d H:i:s',time());
        $data['pass'] = $pass;
        $data['parent_id'] = $parent_id;
        $data['note'] = $note;
        $data['type'] = 2;
        // return $this->model->insert($data);
    }
    //差旅安排
    public function travel($parent_id,$token,$pass='0',$note=null){
        $admin = $this->user->get_one('token = '.$token);
        $where['type'] = 3;
        $where['admin_user'] = $admin['id'];
        //空一段代码判断此用户是否有审核这条的权限
        $data['admin_user'] = $admin['id'];
        $data['time'] = date('Y-m-d H:i:s',time());
        $data['pass'] = $pass;
        $data['parent_id'] = $parent_id;
        $data['note'] = $note;
        $data['type'] = 3;
        // return $this->model->insert($data);
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
     public function add_admin_ids($parent_id,$user_ids){
         $data['parent_id'] = $parent_id;
         $user_ids = explode(',',$user_ids);
         foreach($user_ids as $k=>$v){
             $data['admin_id'] = $v;
             $ass[] = $this->model->insert($data);
         }
         if($ass){
             return 1;
         }
         return 2;
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
          $where['pass'] = 0;
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
            $where['pass'] = 0;
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
        public function add($note_id,$parent_id,$examine_type,$admin_id,$note,$pass){
            $where['parent_id'] = $parent_id;
            $where['examine_type'] = $examine_type;
            $where['admin_id'] = $admin_id;
            $where['id'] = $note_id;
            //获取操作人姓名
            $ass = $this->staff_user->get_one('user_id ='.$admin_id);
            $data['admin_user'] = $ass['name'];
            $data['note'] = $note;
            $data['pass'] = $pass;
            $css = $this->model->update($data,$where);
            $bool = $this->bool_examine($parent_id,$pass,$examine_type);
            return $bool;
        }
        public function bool_examine($parent_id,$pass,$examine_type){
            $where['parent_id'] = $parent_id;
            $where['examine_type'] = $examine_type;
            
            if($pass==2){
                $data['state'] = 2;
               return $this->header->update($data,$where);
            }
            $where['pass'] = 0;
                //搜索还有没有没有审批通过的 如果没有修改
            $bool = $this->model->get_one($where);       
            if(!$bool){
                //如果没有 修改
                $data['state'] = 1;
                unset($where['pass']);
                return $this->header->update($data,$where);
            }
           
        }
}