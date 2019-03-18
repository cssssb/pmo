<?php
namespace clazz;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       page
 * @DataTime:  2019-02-25
 * @describe:  clazz_clazz service class
 * ================
 */
final class page_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('page', 'clazz');
        $this->signup = app::load_model_class('enroll_signup', 'activity');
        $this->form = app::load_model_class('enroll_activity', 'activity');

    }
    public function get_one_page_name($id){
        $where['id'] = $id;
        return $this->form->get_one($where)['name'];
    }
    public function page_list(){
        $list = $this->form->select('id>2');
        // foreach($list as $k){
        //     $data['name'] = $k['name'];
        //     $return[] = $data;
        // }
        return $list;
    }
    public function add($data){
        $data['page_token'] = $this->token();
        return $this->model->insert($data);
    }
    public function edit($data){
        $where['id'] = $data['id'];
        return $this->model->update($data,$where);
    }
    private function token()
    {
        $str = "QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";
        str_shuffle($str);
        $name = substr(str_shuffle($str), 26, 10);
        return $name;
    }
    public function del($where){
        return $this->model->delete($where);
    }
    public function list(){
        return $this->model->select('f_id>2');
    }
    public function get_class($where){
        return $this->model->get_one($where);
    }
    public function enroll_manage_list($id){
        return $this->signup->select('form_id='.$id.' and state!=1');
    }

    /**
     * ================
     * @Author:        css
     * @Parameter:     
     * @DataTime:      2019-02-27
     * @Return:        
     * @Notes:         修改状态为通过
     * @ErrorReason:   
     * ================
     */
     public function enroll_is_agree($where){
         $data['state'] = 3;
         return $this->signup->update($data,$where);
     }
     /**
      * ================
      * @Author:        css
      * @Parameter:     
      * @DataTime:      2019-02-27
      * @Return:        
      * @Notes:         删除此条报名信息
      * @ErrorReason:   
      * ================
      */
      public function enroll_is_refuse($where){
          return $this->signup->delete($where);
      }
}