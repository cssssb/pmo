<?php
namespace examine;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       
 * @DataTime:  2018-11-02
 * @describe:  examine_examine_project service class
 * ================
 */
final class examine_project_class
{
    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        $this->model = app::load_model_class('examine_project', 'examine');
        $this->fee = app::load_model_class('examine_project_fee', 'examine');
        $this->user = app::load_model_class('user', 'user');
    }
    public function del_examine($parent_id,$examine_type){
        $where['parent_id'] = $parent_id;
        $where['examine_id'] = $examine_type;
        $data = $this->model->get_one($where);
        $this->model->delete($where);
        return $data['static_id'];
    }
    /**
     * ================
     * @Author:        css
     * @Parameter:     is_examining
     * @DataTime:      2018-12-21
     * @Return:        int
     * @Notes:         是否已经发送审批 返回审批项目状态字段 如果没有此审批字段返回int值4
     * @ErrorReason:   
     * ================
     */
     public function is_send_examine($parent_id,$examine_type){
         $where ="parent_id = $parent_id and state in(0,1) and examine_type = $examine_type";//存在待审批或已通过
        $data = $this->model->get_one($where);
        if($data){
            return true;
        }else{
        return false;}
     }

     /**
     * ================
     * @Author:        css
     * @Parameter:     commit
     * @DataTime:      2018-11-05
     * @Return:        bool
     * @Notes:         添加项目至examine_project表中
     * @ErrorReason:   null
     * ================
     */
    public function commit($parent_id,$token,$examine_type,$flow_id,$static){
        /*
            提交人并不为点击提交预算者。
            是项目的项目经理
           先不修改
        */
        $where['token'] = $token;
        $username = $this->user->get_one($where);
        $model['apply_user'] = $username['id'];

        //apply_user是项目负责人的id
        // $model['apply_user'] = app::load_model_class('project', 'project')->get_one_project($parent_id)[0]['project_leader_id'];
        $model['time'] = date('Y-m-d H:i:s',time());
        $model['parent_id'] = $parent_id;
        $model['static_id'] = $static;
        $model['examine_type'] = $examine_type;
        return $this->model->insert($model,true);
    }
    /**
     * ================
     * @Author:        css
     * @Parameter:     index
     * @DataTime:      2018-11-05
     * @Return:        bool
     * @Notes:         公共权限 如果此条项目进入预决算则不可修改
     * @ErrorReason:   null
     * ================
     */
    //index方法0.01 欠缺东西很多
    public function index()
    {
        /**
         * ================
         * @Author:    css
         * @ver:       1.0
         * @DataTime:  2018-11-05
         * @describe:  index function
         * ================
         */
        $post = $this->data->get_post();//获得post
        //验证是否表中有parent_id在
        if($post['id']){
        $data = $this->model->get_one("state=0 and parent_id = ".$post['id']);
        $data?$cond = 1:$cond = 0;
        
        //开始输出
        switch ($cond) {
            case   1://异常1
                $this->data->out(3011,$post['id']);
                break;
            default:
                return true;
            }}
            return true;
    }
  
    /**
     * ================
     * @Author:        css
     * @Parameter:     commit
     * @DataTime:      2018-11-05
     * @Return:        bool
     * @Notes:         把钱数添加至静态表
     * @ErrorReason:   null
     * ================
     */
    public function add_fee($data,$parent_id){
        $data['parent_id'] = $parent_id;
        return $this->fee->insert($data);
    }
   
    public function bool($parent_id,$examine_type){
        $where['parent_id'] = $parent_id;
        $where['examine_type'] = $examine_type;
        $data = $this->model->get_one($where);
        if($data['state']!=1 && $data['state']!=2){
            return true;
        }
        return false;
    }
    // public function budget_state($id){
    //     $type=1;
    //     $array = [
    //         "0"=>[ "key"=>'0',"value"=>'正在审批中'],
    //         "1"=>[ "key"=>'1',"value"=>'审批通过'],
    //         "-1"=>[ "key"=>'-1',"value"=>'未通过'],
    //         ];
    //     return $array[$this->model->examine_state($id,$type)];
    // }
    // public function final_account_state($id){
    //     $type=2;
    //     return $this->model->examine_state($id,$type);
    // }
}