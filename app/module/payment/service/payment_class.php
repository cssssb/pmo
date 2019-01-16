<?php 
namespace payment;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       payment
 * @DataTime:  2019-01-15
 * @describe:  payment_payment service class
 * ================
 */
final class payment_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('payment', 'payment');
        $this->common = app::load_service_class('common_class', 'examine');//

    }
    /**
     * ================
     * @Author:        css
     * @Parameter:     
     * @DataTime:      2019-01-15
     * @Return:        token
     * @Notes:         创建支出 payment/manage/add
     * @ErrorReason:   
     * ================
     */
     public function add($token,$data){
        $data['create_time'] = date('Y-m-d H:i:s',time());
        $data['payee'] = $this->common->return_user_id($token)['id'];
        return $this->model->insert($data);
    }
   
    /**
     * ================
     * @Author:        css
     * @Parameter:     token
     * @DataTime:      2019-01-15
     * @Return:        
     * @Notes:         查看我的支出 payment/manage/my_list
     * @ErrorReason:   
     * ================
     */
     public function my_list($token){
        $where['payee'] = $this->common->return_user_id($token)['id'];
        return $this->model->select($where);
     }

     /**
      * ================
      * @Author:        css
      * @Parameter:     
      * @DataTime:      2019-01-15
      * @Return:        
      * @Notes:         查看指定支出id的的支出 payment/manage/by
      * @ErrorReason:   
      * ================
      */
      public function by($token,$id){
        $where['patee'] = $this->common->return_user_id($token)['id'];
        $where['id'] = $id;
        return $this->model->get_one($where);
      }
      
      
      /**
       * ================
       * @Author:        css
       * @Parameter:     token
       * @DataTime:      2019-01-15
       * @Return:        
       * @Notes:         查看部门支出 payment/manage/my_dep_list
       * @ErrorReason:   
       * ================
       */
       public function my_dep_list($token){
        //获取
        $dep_data = $this->common->return_user_department_user_id($token);
        foreach($dep_data as $k){
            $user_ids[] = $k['user_id'];
        }
        $user_ids = implode(',',$user_ids);
        // print_r($user_ids);die;
        return $this->model->my_dep_list($user_ids);
       }


       /**
        * ================
        * @Author:        css
        * @Parameter:     
        * @DataTime:      2019-01-15
        * @Return:        
        * @Notes:         查看所有支出 payment/manage/list
        * @ErrorReason:   
        * ================
        */
       public function list(){
        return $this->model->select(1);
       }


       /**
        * ================
        * @Author:        css
        * @Parameter:     
        * @DataTime:      2019-01-15
        * @Return:        
        * @Notes:         修改基础数据 payment/manage/edit
        * @ErrorReason:   
        * ================
        */
        public function edit($data){
            $where['id'] = $data['id'];
            return $this->model->update($data,$where);
        }


        /**
         * ================
         * @Author:        css
         * @Parameter:     
         * @DataTime:      2019-01-15
         * @Return:        
         * @Notes:         修改PMO数据 修改基础数据 payment/manage/edit_financial_number
         * @ErrorReason:   
         * ================
         */
        public function edit_financial_number($id,$financial_number){
            $where['id'] = $id;
            $data['financial_number'] = $financial_number;
            return $this->model->update($data,$where);
        }
}