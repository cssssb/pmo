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
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        $this->model = app::load_model_class('payment_project', 'payment');
        $this->payment = app::load_model_class('payment', 'payment');
        $this->common = app::load_service_class('common_class','examine');
    }
    public function edit_surplus_relation_id($relation_id){
        $payment_id = $this->model->get_one('id='.$relation_id)['payment_id'];
        return $this->edit_surplus($payment_id);
    }
    public function edit_surplus($payment_id){
        $relation = $this->model->select('payment_id='.$payment_id);
        foreach($relation as $k){
            $data_money[] = $k['price'];
        }
        $data_money = array_sum($data_money);
        $where['id'] = $payment_id;
        $count_money = $this->payment->get_one($where)['amount'];
        $data['surplus'] = $count_money-$data_money;
        return $this->payment->update($data,$where);
    }
    public function edit($id,$price){
        $where['id'] = $id;
        $price? $data['price'] = $price:true;
        return $this->model->update($data,$where);
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
     public function add($payment_id,$project_id,$price){
        $where['payment_id'] = $payment_id;
        $data['project_id'] = $project_id;
        $data['price'] = $price;
        $a = $this->model->get_one($where);
        
        if($a==true){
            return $this->model->update($data,$where);
        }
        $data['payment_id'] = $payment_id;
        return $this->model->insert($data);
     }
     //关联多个支出到一个项目表
     public function add_ids($payment_ids,$project){
        $data['project_id']=$where['project_id'] = $project;
        //查看支出所剩的余额是否足够
        $this->balance_add_ids_is_reach($payment_ids,$project);
        foreach($payment_ids as $k){
           $data['payment_id'] = $where['payment_id'] = $k['id'];
           $data['price'] = $k['price'];
            $have = $this->model->get_one($where);
            if($have!=true){
                $this->model->insert($data);
            }else{
                $this->model->update($data,$where);
            }
            $this->edit_surplus($data['payment_id']);
        }
        return true;
     }
     //关联多个支出到一个项目 查看余额是否满足要求
     private function balance_add_ids_is_reach($payment_ids,$project){
        foreach($payment_ids as $k){
            $where['id'] = $k['id'];
            $data = $this->payment->get_one($where);
            $money = $data['amount'];
            // $all_payment_data = $this->model->select("payment_id=".$where['id']);
            $all_payment_data = $this->model->select("payment_id=".$where['id']." and !(payment_id=".$where['id']." and project_id=$project)");
            foreach($all_payment_data as $key){
                $all_money[] = $key['price'];
            }
            $all_money = array_sum($all_money);
            if(($money - $all_money) < $k['price']){
            $this->data->out(2014,[]);    
            }
        }
        return true;
     }
     //关联多个项目到一个支出 
     public function add_project_ids($payment_id,$project_ids){
        $data['payment_id']=$where['payment_id'] = $payment_id;
        //查看支出所剩的余额是否足够
        $this->balance_add_project_ids_is_reach($payment_id,$project_ids);
        foreach($project_ids as $k){
           $data['project_id'] = $where['project_id'] = $k['project_id'];
           $data['price'] = $k['price'];
            $have = $this->model->get_one($where);
            if($have!=true){
                $this->model->insert($data);
            }else{
                $this->model->update($data,$where);
            }
        }
        $this->edit_surplus($payment_id);
        return true;
     }
     //一个支出关联多个项目 查看余额是否满足要求
     public function balance_add_project_ids_is_reach($payment_id,$proejct_ids){
         foreach($proejct_ids as $k){
             $add_money[] = $k['price'];
             $project_id[] = $k['project_id'];
         }
         $add_money = array_sum($add_money);
         $where['id'] = $payment_id;
         $final_money = $this->payment->get_one($where)['amount'];
         if($final_money < $add_money){
            $this->data->out(2014,[]);
         }
         //查找此支出的关系表里的金额总和
         $project_id = implode(',',$project_id);
         $data_money = $this->model->select('payment_id = '.$payment_id.' and project_id not in('.$project_id.')'); 
         foreach($data_money as $k){
             $old_money[] = $k['price'];
         }
         $old_money = array_sum($old_money);
         if($final_money-$old_money<$add_money){
             $this->data->out(2014,[]);
         }
         return true;
     }
     //一个项目关联一个支出 查看余额是否足够
     public function balance_a_project_is_associated_with_an_expenditure($id,$price){
        $where['id'] = $id;
        $payment_id = $this->model->get_one($where)['payment_id'];
        $count_money = $this->payment->get_one('id='.$payment_id)['amount'];
        $data = $this->model->select('payment_id='.$payment_id.' and id != '.$id);
        foreach($data as $k){
            $old_money[] = $k['price'];
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
        * @Notes:         查看项目关联的支出
        * @ErrorReason:   
        * ================
        */
        public function list_by_project_id($parent_id){
            $where['project_id'] = $parent_id;
            $data = $this->model->select($where);
            if($data[0]!=null){
            foreach($data as $k){
                $list[] = $k['payment_id'];
            }
            $list = implode(',',$list);
            return $this->payment->select('id in ('.$list.')');}
            return null;
        }

        public function get_project_unicode($parent_id){
            // app::load_model_class('payment', 'payment')->
        }
        
        public function get_project_project_name($parent_id){

        }
}