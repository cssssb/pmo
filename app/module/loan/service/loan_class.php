<?php 
namespace loan;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       loan
 * @DataTime:  2019-01-15
 * @describe:  loan_loan service class
 * ================
 */
final class loan_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('loan', 'loan');
        $this->common = app::load_service_class('common_class', 'examine');//
        // $this->token_code();
    }
    // public function token_code(){
    //     $this->data = app::load_sys_class('protocol');
    //     $post = $this->data->get_post();
    //     if(!$post['token']){
    //         $this->data->out();//未发送token
    //     }
    //     if(!$this->common->return_user_id($post['token'])){
    //         $this->data->out();//token有误重新登录
    //     }
    // }
    /**
     * ================
     * @Author:        css
     * @Parameter:     
     * @DataTime:      2019-01-15
     * @Return:        token
     * @Notes:         创建借款 loan/manage/add
     * @ErrorReason:   
     * ================
     */
     public function add($token,$data){
        $data['create_time'] = time();
        $user = $this->common->return_user_id($token);
        $data['loan_user_id'] = $user['id'];
        $data['loan_user_name'] = $user['username'];
        return $this->model->insert($data,true);
    }
   
    /**
     * ================
     * @Author:        css
     * @Parameter:     token
     * @DataTime:      2019-01-15
     * @Return:        
     * @Notes:         查看我的借款 loan/manage/my_list
     * @ErrorReason:   
     * ================
     */
     public function my_list($token){
        $loan_user_id = $this->common->return_user_id($token)['id'];
        $where = "loan_user_id = $loan_user_id and loan_state in (0,1,2)";
        return $this->model->select($where);
     }

     /**
      * ================
      * @Author:        css
      * @Parameter:     
      * @DataTime:      2019-01-15
      * @Return:        
      * @Notes:         查看指定借款id的的借款 loan/manage/by
      * @ErrorReason:   
      * ================
      */
      public function by($token,$id){
        $where['loan_user_id'] = $this->common->return_user_id($token)['id'];
        $where['id'] = $id;
        return $this->model->get_one($where);
      }
      
      
      /**
       * ================
       * @Author:        css
       * @Parameter:     token
       * @DataTime:      2019-01-15
       * @Return:        
       * @Notes:         查看部门借款 loan/manage/my_dep_list
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
        * @Notes:         查看所有借款 loan/manage/list
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
        * @Notes:         修改基础数据 loan/manage/edit
        * @ErrorReason:   
        * ================
        */
        public function edit($list){
            $where['id'] = $list['id'];
            $data = $this->model->get_one($where);
            if($data['loan_state']==="0"){
            return $this->model->update($list,$where);}
            return false;
        }


        /**
         * ================
         * @Author:        css
         * @Parameter:     
         * @DataTime:      2019-01-15
         * @Return:        
         * @Notes:         修改PMO数据 修改基础数据 loan/manage/edit_loan_number
         * @ErrorReason:   
         * ================
         */
        public function edit_loan_number($id,$loan_number,$loan_describe=''){
            $where['id'] = $id;
            $data = $this->model->get_one($where);
            if($data['loan_state']==="2"){
                $data['loan_number'] = $loan_number;
                $data['loan_describe'] = $loan_describe;
                return $this->model->update($data,$where);}
            return false;
        }
        /**
         * ================
         * @Author:        css
         * @Parameter:     
         * @DataTime:      2019-02-20
         * @Return:        
         * @Notes:         查看通过的借款
         * @ErrorReason:   
         * ================
         */
        //  public function list_pass($limit){
        //      $where='loan_state = 2';
        //      return $this->model->select_list_pass($where,$limit);
        //  }
        //  public function list_pass_count(){
        //      return $this->model->list_pass_count();
        //  }
}