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
     public function add_admin_ids($parent_id,$user_ids,$mode,$static_id,$examine_type){
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
             $data['static_id'] = $static_id;
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
        public function add($note_id,$parent_id,$examine_type,$admin_id,$note,$pass){

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
            //修改视图数据
      //项目列表更新 静态审批表跟着跟新
      $bool = $this->bool_examine($parent_id,$pass,$examine_type);
      $project_static = \app::load_service_class('static_class','project')->static_service($parent_id);
      $edit_static = \app::load_service_class('examine_static_class','examine')->edit_static($parent_id,$examine_type);
            return $bool;
        }
        public function bool_examine($parent_id,$pass,$examine_type){
            $where['parent_id'] = $parent_id;
            $where['examine_type'] = $examine_type;
            
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
       
}