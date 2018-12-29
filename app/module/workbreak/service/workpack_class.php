<?php
namespace workbreak;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    lion
 * @ver:       workpack
 * @DataTime:  2018-12-26
 * @describe:  workbreak_workpack service class
 * ================
 */
final class workpack_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('workpack', 'workbreak');
    }
    public function install_service(){
        return $this->model->init_table();
    }
    
    /**
     * create_workpack
     *
     * @param  mixed $name 姓名
     * @param  mixed $code 编码
     * @param  mixed $user_id 用户
     *
     * @return void
     */
    public function create_workpack(string $name,$code,$user_id){
        return $this->model->add_workpack($name,$code,$user_id);
    }
    /**
     * complete_workpack
     *
     * @param  mixed $id
     *
     * @return void
     */
    public function complete_workpack(int $id){
        return $this->model->set_workpack_state($id,"done");
    }
    public function cancel_workpack(int $id){
        return $this->model->set_workpack_state($id,"cancel");
    }
    public function continue_workpack(int $id){
        return $this->model->set_workpack_state($id,"doing");
    }
}