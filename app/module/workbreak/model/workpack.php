<?php
namespace workbreak;

defined('IN_LION') or exit('No permission resources.');

\app::load_sys_class('model', false);
class workpack extends \system\model
{
    private $is_init = false;
    private $data_model =[
        ["varchar","workpack_name","工作包名称","0"],
        ["varchar","workpack_code","工作包编码","1"],
        ["int","workpack_accountable","工作包负责人","2"],
        ["int","workpack_plan_start_time","工作包计划开始时间","3"],
        ["int","workpack_plan_end_time","工作包计划结束时间","4"],
        ["int","workpack_plan_value","工作包计划值","5"],
        ["int","workpack_add_time","工作包添加时间","6"],
        ["int","workpack_state","工作包状态","7"],
        ["int","workpack_add_user_id","工作包创建人","8"]
    ];
    public $state = [
        "doing" => "0",
        "done" => "1",
        "cancel" => "-1"
    ] ;
    //键名 类型 非空
    public function __construct()
    {
        $this->db_config = \app::load_config('database');
        $this->db_setting = 'default';
        $this->table_name = 'workpack';
        parent::__construct();
    }
    //        CREATE TABLE `pmo_workpack`(          `id` int NOT NULL AUTO_INCREMENT,          `workpack_name` varchar(255) COMMENT '工作包名称',`workpack_code` varchar(255) COMMENT '工作包编码',`workpack_accountable` int(11) COMMENT '工作包负责人',`workpack_responsible` int(11) COMMENT '工作包执行人',`workpack_plan_start_ime` int(11) COMMENT '工作包计划开始时间',`workpack_plan_end_time` int(11) COMMENT '工作包计划结束时间',`workpack_plan_value` varchar(255) COMMENT '工作包计划值',`add_time` int(11) COMMENT '工作包添加时间', PRIMARY KEY (`id`));
    public function init_table(){
        if (!$this->is_init) {
            $model_init = \app::load_sys_class('model_init');
            $this->query("DROP TABLE IF EXISTS `$this->table_name`;");
            $sql = $model_init->init_table_create_sql($this->data_model, $this->table_name);
            return $this->query($sql);
        }else {
            return false;
        }
    }
    public function add_workpack($name,$code,$user_id){
        $data["$this->data_model[0][1]"] = $name;
        $data["$this->data_model[1][1]"] = $code;
        $data["$this->data_model[2][1]"] = $user_id;//默认负责人自己
        $data["$this->data_model[3][1]"] = time();//默认开始时间
        $data["$this->data_model[4][1]"] = time() + 604800;//默认结束时间一周之后
        $data["$this->data_model[5][1]"] = 10;//默认计划值 10
        $data["$this->data_model[6][1]"] = time();
        $data["$this->data_model[7][1]"] = 0;//默认工作状态为 doing
        $data["$this->data_model[8][1]"] = $user_id;//创建人为自己
        $id = $this->insert($data,true);
        return $id;
    }
    public function set_workpack_state($id,$state){
        //doing done cancel
        $data["$this->data_model[7][1]"] = $this->state["$state"];//默认工作状态为 doing $state;
        return $this->update($data,'id='.$id);
    }
    public function set_workpack_plan_value($id,$pv){
        $data["$this->data_model[5][1]"] = $pv;//设置计划值
        return $this->update($data,'id='.$id);
    }
    public function set_workpack_accountable($id,$user_id){
        $data["$this->data_model[2][1]"] = $user_id;//负责人自己
        return $this->update($data,'id='.$id);
    }
    public function set_workpack_start_time($id,$start_time){
        $data["$this->data_model[5][1]"] = $start_time;//设置开始时间
        return $this->update($data,'id='.$id);
    }
    public function set_workpack_end_time($id,$end_time){
        $data["$this->data_model[5][1]"] = $start_time;//设置结束时间
        return $this->update($data,'id='.$id);
    }
}
?>