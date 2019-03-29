<?php
namespace loan;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       loan_project
 * @DataTime:  2019-01-16
 * @describe:  loan_project service class
 * ================
 */
final class project_class
{
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        $this->model = app::load_model_class('loan_project', 'loan');
        $this->loan = app::load_model_class('loan', 'loan');
        $this->common = app::load_service_class('common_class','examine');
    }
    public function edit_loan_surplus_relation_id($relation_id){
        $loan_id = $this->model->get_one('id='.$relation_id)['loan_id'];
        return $this->edit_loan_surplus($loan_id);
    }
    public function edit_loan_surplus($loan_id){
        $relation = $this->model->select('loan_id='.$loan_id);
        foreach($relation as $k){
            $data_money[] = $k['loan_price'];
        }
        $data_money = array_sum($data_money);
        $where['id'] = $loan_id;
        $count_money = $this->loan->get_one($where)['loan_fee'];
        $data['loan_surplus'] = $count_money-$data_money;
        return $this->loan->update($data,$where);
    }
    public function edit($id,$price){
        $where['id'] = $id;
        $price? $data['loan_price'] = $price:true;
        return $this->model->update($data,$where);
    }
   
     
    
    /**
     * ================
     * @Author:        css
     * @Parameter:     
     * @DataTime:      2019-01-16
     * @Return:        
     * @Notes:         add 关联借款到项目
     * @ErrorReason:   
     * ================
     */
     public function add($loan_id,$project_id,$price){
        $where['loan_id'] = $loan_id;
        $data['project_id'] = $project_id;
        $data['loan_price'] = $price;
        $a = $this->model->get_one($where);
        
        if($a==true){
            return $this->model->update($data,$where);
        }
        $data['loan_id'] = $loan_id;
        return $this->model->insert($data);
     }
     //关联多个借款到一个项目表
     public function add_ids($loan_ids,$project){
        $data['project_id']=$where['project_id'] = $project;
        //查看借款所剩的余额是否足够
        $this->balance_add_ids_is_reach($loan_ids,$project);
        foreach($loan_ids as $k){
           $data['loan_id'] = $where['loan_id'] = $k['id'];
           $data['loan_price'] = $k['loan_price'];
            $have = $this->model->get_one($where);
            if($have!=true){
                $this->model->insert($data);
            }else{
                $this->model->update($data,$where);
            }
            $this->edit_loan_surplus($data['loan_id']);
        }
        return true;
     }
     //关联多个借款到一个项目 查看余额是否满足要求
     private function balance_add_ids_is_reach($loan_ids,$project){
        foreach($loan_ids as $k){
            $where['id'] = $k['id'];
            $data = $this->loan->get_one($where);
            $money = $data['loan_fee'];
            // $all_loan_data = $this->model->select("loan_id=".$where['id']);
            $all_loan_data = $this->model->select("loan_id=".$where['id']." and !(loan_id=".$where['id']." and project_id=$project)");
            foreach($all_loan_data as $key){
                $all_money[] = $key['loan_price'];
            }
            $all_money = array_sum($all_money);
            if(($money - $all_money) < $k['loan_price']){
            $this->data->out(2014,[]);    
            }
        }
        return true;
     }
     //关联多个项目到一个借款 
     public function add_project_ids($loan_id,$project_ids){
        $data['loan_id']=$where['loan_id'] = $loan_id;
        //查看借款所剩的余额是否足够
        $this->balance_add_project_ids_is_reach($loan_id,$project_ids);
        foreach($project_ids as $k){
           $data['project_id'] = $where['project_id'] = $k['project_id'];
           $data['loan_price'] = $k['loan_price'];
            $have = $this->model->get_one($where);
            if($have!=true){
                $this->model->insert($data);
            }else{
                $this->model->update($data,$where);
            }
        }
        $this->edit_loan_surplus($loan_id);
        return true;
     }
     //一个借款关联多个项目 查看余额是否满足要求
     public function balance_add_project_ids_is_reach($loan_id,$proejct_ids){
         foreach($proejct_ids as $k){
             $add_money[] = $k['loan_price'];
             $project_id[] = $k['project_id'];
         }
         $add_money = array_sum($add_money);
         $where['id'] = $loan_id;
         $final_money = $this->loan->get_one($where)['loan_fee'];
         if($final_money < $add_money){
            $this->data->out(2014,[]);
         }
         //查找此借款的关系表里的金额总和
         $project_id = implode(',',$project_id);
         $data_money = $this->model->select('loan_id = '.$loan_id.' and project_id not in('.$project_id.')'); 
         foreach($data_money as $k){
             $old_money[] = $k['loan_price'];
         }
         $old_money = array_sum($old_money);
         if($final_money-$old_money<$add_money){
             $this->data->out(2014,[]);
         }
         return true;
     }
     //一个项目关联一个借款 查看余额是否足够
     public function balance_a_project_is_associated_with_an_expenditure($id,$price){
        $where['id'] = $id;
        $loan_id = $this->model->get_one($where)['loan_id'];
        $count_money = $this->loan->get_one('id='.$loan_id)['amount'];
        $data = $this->model->select('loan_id='.$loan_id.' and id != '.$id);
        foreach($data as $k){
            $old_money[] = $k['loan_price'];
        }
        $old_money = array_sum($old_money);
        if($count_money-$old_money<$price){
            $this->data->out(2014,[]);
        }
        return true;
     }
     /**
      * ================
      * @Author:        css
      * @Parameter:     
      * @DataTime:      2019-01-16
      * @Return:        
      * @Notes:         list 查看所有借款和其所属项目
      * @ErrorReason:   
      * ================
      */
      public function list($token,$page_num,$page_size){
          $id = $this->common->return_user_id($token)['id'];
          $data['data_body'] = $this->model->loan_project_list($id,$page_num,$page_size);
          $data['page_num'] = $page_num;
          $data['page_size'] = $page_size;
          $data['count'] = $this->model->loan_project_count($id);
          return $data;
      }
      /**
       * ================
       * @Author:        css
       * @Parameter:     
       * @DataTime:      2019-01-29
       * @Return:        
       * @Notes:         取消和项目关联
       * @ErrorReason:   
       * ================
       */
       public function cancel($id,$project){
        $where['id'] = $id;
        return $this->model->delete($where);
       }
       /**
        * ================
        * @Author:        css
        * @Parameter:     
        * @DataTime:      2019-01-29
        * @Return:        
        * @Notes:         查看项目关联的借款
        * @ErrorReason:   
        * ================
        */
        public function list_by_project_id($parent_id){
            $where['project_id'] = $parent_id;
            $data = $this->model->select($where);
            if($data[0]!=null){
            foreach($data as $k){
                $list[] = $k['loan_id'];
            }
            $list = implode(',',$list);
            return $this->loan->select('id in ('.$list.')');}
            return null;
        }

        public function get_project_unicode($parent_id){
            // app::load_model_class('loan', 'loan')->
        }
        
        public function get_project_project_name($parent_id){

        }
}