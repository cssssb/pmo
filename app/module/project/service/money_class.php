<?php
namespace project;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       0.1
 * @DataTime:  2018-10-25
 * @describe:  project_money service class
 * ================
 */
final class money_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('money', 'project');
    }
    //修改讲师安排项目金额数据
    public function edit_lecturer($parent_id,$fee){
        $where['parent_id'] = $parent_id;
        $data['lecturer_fee'] = $fee;
        return $this->model->update($data,$where);
    }
}