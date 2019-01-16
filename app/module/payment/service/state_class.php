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
    public function pass($id){
        $new['state'] = 2;
        $where['id'] = $id;
        $data = $this->model->get_one($where);
        if($data['state']===1){
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
        $new['submit_time'] = date('Y-m-d H:i:s',time());
        $where['id'] = $id;
        $data = $this->model->get_one($where);
        if($data['state']===0){
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
      * @Notes:         作废支出 状态1->-1
      * @ErrorReason:   
      * ================
      */
      public function cancle(){
        $new['state'] = -1;
        $where['id'] = $id;
        $data = $this->model->get_one($where);
        if($data['state']===1){
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
       public function del(){
        $new['state'] = -2;
        $where['id'] = $id;
        $data = $this->model->get_one($where);
        if($data['state']===0){
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
        * @Notes:         撤回支出 状态1->0
        * @ErrorReason:   
        * ================
        */
        public function recall(){
        $new['state'] = 0;
        $where['id'] = $id;
        $data = $this->model->get_one($where);
        if($data['state']===1){
            return $this->model->update($new,$where);
        }
        return false;
        }
}