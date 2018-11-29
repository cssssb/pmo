<?php
namespace examine;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       staff_user
 * userme:  2018-11-14
 * @describe:  examine_examine_admin service class
 * ================
 */
final class examine_admin_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('staff_user', 'user');
        $this->user_flow = app::load_model_class('examine_user_flow', 'examine');
        $this->notes = app::load_model_class('examine_notes','examine');
    }
    /**
     * ================
     * @Author:        css
     * @Parameter:     return_examine_for_me_parent_id
     * @DataTime:      2018-11-26
     * @Return:        
     * @Notes:         查看待我审批的审批单 
     * @ErrorReason:   
     * ================
     */
    public function return_examine_for_me_parent_id($admin_id){
        $where['admin_id'] = $admin_id;
        $data = $this->notes->select($where);
        foreach($data as $k=>$v){
            $ass[] = $v['parent_id'];
        }
        return array_unique($ass);
    }
    /**
     * ================
     * @Author:        css
     * @Parameter:     return_examine_admin_pass
     * @DataTime:      2018-11-28
     * @Return:        bool
     * @Notes:         查看我审批过的审批单
     * @ErrorReason:   
     * ================
     */
     public function return_examine_admin_pass($admin_id){
        $data = $this->notes->select('admin_id = '.$admin_id.' and state <> 0');
        foreach($data as $k=>$v){
            $ass[] = $v['parent_id'];
        }
        return array_unique($ass);
    }
}