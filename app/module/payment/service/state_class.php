<?php
namespace payment;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       paymen
 * @DataTime:  2019-01-15
 * @describe:  payment_state service class
 * ================
 */
final class state_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('payment', 'payment');
    }
    /**
     * ================
     * @Author:        css
     * @Parameter:     
     * @DataTime:      2019-01-15
     * @Return:        
     * @Notes:         通过支出 状态1->2
     * @ErrorReason:   
     * ================
     */
    public function pass_many($id_list){
        $new['state'] = 2;
        $ids = implode(",",$id_list);
        $where = "id in ($ids)";
        $data = $this->model->select($where);
        foreach($data as $k){
            if($k['state']!=="1"){
                return false;
            }
        }
        // if($data['state']==="1"){
            return $this->model->update($new,$where);
        // }
        // return false;
    }

    public function pass($id){
        $new['state'] = 2;
        $where['id'] = $id;
        $data = $this->model->get_one($where);
        if($data['state']==="1"){
            return $this->model->update($new,$where);
        }
        return false;
    }
    /**
     * ================
     * @Author:        css
     * @Parameter:     
     * @DataTime:      2019-01-15
     * @Return:        
     * @Notes:         提交支出 状态0->1
     * @ErrorReason:   
     * ================
     */
     public function submit($id){
        $new['state'] = 1;
        $new['submit_time'] = time();
        $where['id'] = $id;
        $data = $this->model->get_one($where);
        if($data['state']==="0"){
            return $this->model->update($new,$where);
        }
        return false;
     }
     public function submit_many($id_list){
         $new['state'] = 1;
         $ids = implode(',',$id_list);
         $where = "id in ($ids)";
         $data = $this->model->select($where);
         foreach($data as $k){
             if($k['state']!=0){
                 return false;
             }
         }
         return  $this->model->update($new,$where);
     }
     /**
      * ================
      * @Author:        css
      * @Parameter:     
      * @DataTime:      2019-01-15
      * @Return:        
      * @Notes:         作废支出 状态1->-1
      * @ErrorReason:   
      * ================
      */
      public function cancel_many($id_list){
        $new['state'] = -1;
        $ids = implode(",",$id_list);
        $where = "id in ($ids)";
        $data = $this->model->select($where);
        foreach($data as $k){
            if($k['state']!=="1"){
                return false;
            }
        }
        // if($data['state']==="1"){
            return $this->model->update($new,$where);
        // }
        // return false;
      }
      public function cancel($id){
        $new['state'] = -1;
        $where['id'] = $id;
        $data = $this->model->get_one($where);
        if($data['state']==="1"){
            return $this->model->update($new,$where);
        }
        return false;
      }
      /**
       * ================
       * @Author:        css
       * @Parameter:     
       * @DataTime:      2019-01-15
       * @Return:        
       * @Notes:         删除支出 状态0->-2
       * @ErrorReason:   
       * ================
       */
       public function del($id){
        $new['state'] = -2;
        $where['id'] = $id;
        $data = $this->model->get_one($where);
        if($data['state']==="0"){
            return $this->model->update($new,$where);
        }
        return false;
       }
       public function del_many($id_list){
        $new['state'] = -2;
        $ids = implode(',',$id_list);
        $where="in ($ids)";
        $data = $this->model->slelct($where);
        foreach($data as $k){
            if($k['state']!=0){
                return false;
            }
        }
        return $this->model->update($new,$where);
       }
       /**
        * ================
        * @Author:        css
        * @Parameter:     
        * @DataTime:      2019-01-15
        * @Return:        
        * @Notes:         撤回支出 状态1->0
        * @ErrorReason:   
        * ================
        */
        public function recall_many($id_list){
        $new['state'] = 0;
        $ids = implode(",",$id_list);
        $where = "id in ($ids)";
        $data = $this->model->select($where);
        foreach($data as $k){
            if($k['state']!=="1"){
                return false;
            }
        }
        // if($data['state']==="1"){
            return $this->model->update($new,$where);
        // }
        // return false;
        }
        public function recall($id){
            $new['state'] = 0;
            $where['id'] = $id;
            $data = $this->model->get_one($id);
            if($data['state']==="1"){
                return $this->model->update($new,$where);
            }
            return false;
        }
}