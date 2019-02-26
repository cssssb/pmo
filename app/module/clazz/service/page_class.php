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
        $this->form = app::load_model_class('enroll_activity', 'activity');

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
    public function list($form_token){
        $where['f_id'] =$this->form->get_one("access_token='$form_token'")['id'];
        return $this->model->select($where);
    }
    public function get_class($where){
        return $this->model->get_one($where);
    }
}