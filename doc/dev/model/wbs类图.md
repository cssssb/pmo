@startuml

package "ORM 对象关系映射" <<Database>>{
    interface dao{
        +sql_cache;
        +hasone($table_name,$key);
        +hasmany($table_name,$connect_table_name,$key1,$key2);
        +belongsto($table_name,$key);
        +save();
    }
}

package "模型层" <<Folder>> {
    abstract class workpack工作包{
        -workpack_id 工作包id
        -workpack_name 工作包名称
        -workpack_code 工作包编码
        -workpack_accountable 工作包负责人
        -workpack_responsible 工作包执行人
        -workpack_plan_start_time 工作包计划开始时间
        -workpack_plan_end_time 工作包计划结束时间
        -workpack_plan_value 工作包计划值
        -add_time 工作包添加时间
        
        +__construct($id="null",$data=[])
        +create_workpack创建工作包($data);
        +del_workpack删除工作包($id);
        +set_workpack设置工作包($data);
        +accountable(){
            return $this->belongsto($table_name,$key);
        };
        +responsible();
        +save();
    }
    abstract class activity活动{
        -activity_id 活动id
        -activity_name 活动名称
        -activity_code 活动编码
        -activity_responsible_user_id 活动执行人
        -activity_start_time 活动创建时间
        -activity_end_time 活动完成时间
        +__construct($id="null",$data=[])
        +set_workpack_plan_cost设置活动工作量();
        +finish_activity活动;
    }
    abstract class control_account控制账户{
        -control_account_budget_cost 基线预算
        -control_account_earned_value 活动挣值
        +abstract function get_control_account_budget_cost();
        +__construct($id="null",$data=[]);
        +function save();
    }
}

package "service服务层" <<Folder>> {
    abstract class workpack_class工作包服务{
        +getlist();
        +
    }
  
    abstract class activity_list_class活动列表服务{
        +getlist();
    }
  
    abstract class control_account_class控制账户{
        +getlist();
    }
}
package "control控制器层" <<Folder>> {
}
@enduml