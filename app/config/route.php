<?php
return array(
        //默认消息码
    'default_routelist' => array(
        'client_route' => ["user", "user", "client_route", 
        
        [], [], "1.0"],
        "project_manage_add" => ["project", "manage", "add", ["project_project_template_id" => "string"], [], '1.0'],       //添加项目
        "project_data_edit" => ["project", "data", "edit", ["id" => "string"], [], '1.0'],       //修改项目
        "project_manage_list" => ["project", "manage", "list", ["id=>string"], [], '1.0'],    //返回项目列表
        "project_data_getByProjectId" => ["project", "data", "getByProjectId", ["id" => "string"], [], '1.0'],   //获取一条数据
        "staff_manage_list" => ["staff", "manage", "list", [], [], '1.0'],   //获取实施负责人
        "program_manage_list" => ["program", "manage", "list", [], [], '1.0'],//项目集表
        "program_manage_add" => ["program", "manage", "add", [], [], '0.1'],//项目集新增
        "project_type_list" => ["user", "project", "projectTemplate", [], [], '1.0'],//项目模板表
        "lecturer_plan_getByProjectId" => ["lecturer", "plan", "getByProjectId", [], [], '1.0'],//返回讲师列表
        "lecturer_manage_list" => ["lecturer", "manage", "list", [], [], '1.0'],//讲师表
        "lecturer_duty_list" => ["lecturer", "duty", "list", [], [], '1.0'],//职责表
        "lecturer_plan_add" => ["lecturer", "plan", "add", [], [], '1.0'],               //添加、修改讲师成本安排
        "lecturer_plan_edit" => ["lecturer", "plan", "edit", ["id" => "string"], [], '1.0'],               //添加、修改讲师成本安排
        "lecturer_plan_del" => ["lecturer", "plan", "del", ["id" => "string"], [], '1.0'],                //删除讲师成本状态
        "implement_plan_getByProjectId" => ["implement", "plan", "getByProjectId", [], [], '1.0'],     //获取实施安排
        "implement_plan_edit" => ["implement", "plan", "edit", [], [], '1.0'],     //实施安排修改
        "travel_plan_getByProjectId" => ["travel", "plan", "getByProjectId", [], [], '1.0'],         //差旅安排
        "travel_inCityTraffic_add" => ["travel", "inCityTraffic", "add", [], [], '1.0'],        //市内交通
        "travel_inCityTraffic_edit" => ["travel", "inCityTraffic", "edit", ["id" => "string"], [], '1.0'],        
        "travel_inCityTraffic_del" => ["travel", "inCityTraffic", "del", ["id" => "string"], [], '1.0'],        
        "travel_longTraffic_add" => ["travel", "longTraffic", "add", [], [], '1.0'],        //长途交通
        "travel_longTraffic_edit" => ["travel", "longTraffic", "edit", ["id" => "string"], [], '1.0'],        
        "travel_longTraffic_del" => ["travel", "longTraffic", "del", ["id" => "string"], [], '1.0'],        
        "travel_hotel_add" => ["travel", "hotel", "add", [], [], '1.0'],        //住宿安排
        "travel_hotel_edit" => ["travel", "hotel", "edit", ["id" => "string"], [], '1.0'],        
        "travel_hotel_del" => ["travel", "hotel", "del", ["id" => "string"], [], '1.0'],   
        "travel_longTrafficType_list" => ["travel", "longTrafficType", "list", [], [], '1.0'], //出行方式  

    ),
);
