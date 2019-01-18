<?php
namespace payment;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       payment_project
 * @DataTime:  2019-01-16
 * @describe:  payment_project service class
 * ================
 */
final class project_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('payment_project', 'payment');
        $this->common = app::load_service_class('common_class','examine');
    }
    /**
     * ================
     * @Author:        css
     * @Parameter:     
     * @DataTime:      2019-01-16
     * @Return:        
     * @Notes:         add 关联支出到项目
     * @ErrorReason:   
     * ================
     */
     public function add($payment_id,$proejct_id){
        $where['payment_id'] = $payment_id;
        $data['project_id'] = $proejct_id;
        $a = $this->model->get_one($where);
        if($a==true){
            return $this->model->update($data,$where);
        }
        $data['payment_id'] = $payment_id;
        return $this->model->insert($data);
     }

     /**
      * ================
      * @Author:        css
      * @Parameter:     
      * @DataTime:      2019-01-16
      * @Return:        
      * @Notes:         list 查看所有支出和其所属项目
      * @ErrorReason:   
      * ================
      */
      public function list($token,$page_num,$page_size){
          $id = $this->common->return_user_id($token)['id'];
          $data['data_body'] = $this->model->payment_project_list($id,$page_num,$page_size);
          $data['page_num'] = $page_num;
          $data['page_size'] = $page_size;
          $data['count'] = $this->model->payment_project_count($id);
          return $data;
      }
}