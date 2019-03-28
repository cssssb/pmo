<?php
namespace loan;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       paymen
 * @DataTime:  2019-01-15
 * @describe:  loan_loan_state service class
 * ================
 */
final class loan_state_class
{
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        $this->model = app::load_model_class('loan', 'loan');
    }
    /**
     * ================
     * @Author:        css
     * @Parameter:     
     * @DataTime:      2019-01-15
     * @Return:        
     * @Notes:         通过借款 状态1->2
     * @ErrorReason:   
     * ================
     */
    public function pass_many($id_list){
        $new['loan_state'] = 2;
        $ids = implode(",",$id_list);
        $where = "id in ($ids)";
        $data = $this->model->select($where);
        foreach($data as $k){
            if($k['loan_state']!=="1"){
               $this->data->out(3032,[]);
            }
        }
        // if($data['loan_state']==="1"){
            return $this->model->update($new,$where);
        // }
        // return false;
    }

    public function pass($id){
        $new['loan_state'] = 2;
        $where['id'] = $id;
        $data = $this->model->get_one($where);
        if($data['loan_state']==="1"){
            return $this->model->update($new,$where);
        }
        $this->data->out(3032,[]);
    }
    /**
     * ================
     * @Author:        css
     * @Parameter:     
     * @DataTime:      2019-01-15
     * @Return:        
     * @Notes:         提交借款 状态0->1
     * @ErrorReason:   
     * ================
     */
     public function submit($id){
        $new['loan_state'] = 1;
        $new['submit_time'] = time();
        $where['id'] = $id;
        $data = $this->model->get_one($where);
        if($data['loan_state']==="0"){
            return $this->model->update($new,$where);
        }
        $this->data->out(3032,[]);
     }
     public function submit_many($id_list){
         $new['loan_state'] = 1;
         $ids = implode(',',$id_list);
         $where = "id in ($ids)";
         $data = $this->model->select($where);
         foreach($data as $k){
             if($k['loan_state']!=0){
                $this->data->out(3032,[]);
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
      * @Notes:         作废借款 状态1->-1
      * @ErrorReason:   
      * ================
      */
      public function cancel_many($id_list){
        $new['loan_state'] = -1;
        $ids = implode(",",$id_list);
        $where = "id in ($ids)";
        $data = $this->model->select($where);
        foreach($data as $k){
            if($k['loan_state']!=="1"){
                $this->data->out(3032,[]);
            }
        }
        // if($data['loan_state']==="1"){
            return $this->model->update($new,$where);
        // }
        // return false;
      }
      public function cancel($id){
        $new['loan_state'] = -1;
        $where['id'] = $id;
        $data = $this->model->get_one($where);
        if($data['loan_state']==="1"){
            return $this->model->update($new,$where);
        }
        $this->data->out(3032,[]);
      }
      /**
       * ================
       * @Author:        css
       * @Parameter:     
       * @DataTime:      2019-01-15
       * @Return:        
       * @Notes:         删除借款 状态0->-2
       * @ErrorReason:   
       * ================
       */
       public function del($id){
        $new['loan_state'] = -2;
        $where['id'] = $id;
        $data = $this->model->get_one($where);
        if($data['loan_state']==="0"){
            return $this->model->update($new,$where);
        }
        $this->data->out(3032,[]);
       }
       public function del_many($id_list){
        $new['loan_state'] = -2;
        $ids = implode(',',$id_list);
        $where="in ($ids)";
        $data = $this->model->slelct($where);
        foreach($data as $k){
            if($k['loan_state']!=0){
                $this->data->out(3032,[]);
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
        * @Notes:         撤回借款 状态1->0
        * @ErrorReason:   
        * ================
        */
        public function recall_many($id_list){
        $new['loan_state'] = 0;
        $ids = implode(",",$id_list);
        $where = "id in ($ids)";
        $data = $this->model->select($where);
        foreach($data as $k){
            if($k['loan_state']!=="1"){
                $this->data->out(3032,[]);
            }
        }
        // if($data['loan_state']==="1"){
            return $this->model->update($new,$where);
        // }
        // return false;
        }
        public function recall($id){
            $new['loan_state'] = 0;
            $where['id'] = $id;
            $data = $this->model->get_one($id);
            if($data['loan_state']==="1"){
                return $this->model->update($new,$where);
            }
            $this->data->out(3032,[]);
        }

        //判断借款的状态 如果不为通过 那么返回错误信息
        public function loan_is_pass($id){
            if(is_array($id)){
                foreach($id as $k){
                    $where['id'] = $k['id'];
                    $is_pass = $this->model->get_one($where)['loan_state'];
                    if($is_pass!=2){
                        $this->data->out(3032,[]);
                    }
                }
            }else{
            $where['id'] = $id;
            $is_pass = $this->model->get_one($where)['loan_state'];
            if($is_pass!=2){
                $this->data->out(3032,[]);
            }}
            return true;
        }
}