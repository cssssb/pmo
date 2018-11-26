<?php
return array(
        //默认消息码
    'default_routelist' => array(
        //10.8
        'client_route' => ["user", "user", "client_route", 
        
        [], [], "1.0"],
        "project_manage_add" => ["project", "manage", "add", ["project_project_template_id" => "string"], [], '1.0'],       //添加项目
        "project_data_edit" => ["project", "data", "edit", ["id" => "string"], [], '1.0'],       //修改项目
        "project_manage_list" => ["project", "manage", "list", [], [], '2.0'],    //返回项目列表
        "project_data_getByProjectId" => ["project", "data", "getByProjectId", ["id" => "string"], [], '1.0'],   //获取一条数据
        "staff_manage_list" => ["staff", "manage", "list", [], [], '1.0'],   //获取实施负责人
        "program_manage_list" => ["progam", "manage", "list", [], [], '1.0'],//项目集表
        "program_manage_add" => ["progam", "manage", "add", [], [], '1.0'],//项目集新增
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

        "user_account_login"=>["user","account","login",["account"=>"string","password"=>"string"],[],'1.0'],//用户登录
        "lecturer_manage_add"=>["lecturer","manage","add",
        [
        // "teacher_cooperation_model_id"=>"string",
        // "add_a_teacher_cooperation_model_name"=>"string",
        // "add_a_teacher_message"=>"string",
        // "add_a_teacher_price"=>"string",
        "teacher_name"=>"string",
        "teacher_price"=>"string",
        "teacher_cooperation_model_id"=>"string",
        ]
        ,[
            "id"=>"string",
            "name"=>"string",
        ],'1.0'],//新增讲师
        "lecturer_manage_cooperation"=>["lecturer","manage","cooperation",[],[],'1.0'],//讲师长期短期接口
        "implement_venue_add"=>["implement","venue","add",[],[],'1.0'],//添加会场安排
        "implement_venue_del"=>["implement","venue","del",[],[],'1.0'],//删除会场安排
        "implement_venue_edit"=>["implement","venue","edit",[],[],'1.0'],//修改会场安排

        //10/26
        "project_address_list"=>["project","address","list",[],[],'1.0'],//获取城市列表
        "project_address_province"=>["project","address","province",[],[],'1.0'],//获取省列表
        "project_address_city"=>["project","address","city",[],[],'1.0'],//获取市列表
        "project_address_add"=>["project","address","add",[],[],'1.0'],//添加
        "project_address_edit"=>["project","address","edit",[],[],'1.0'],//修改
        "project_address_del"=>["project","address","del",[],[],'1.0'],//删除

        //10.29
        "travel_meal_people" => ["travel", "meal", "people", [], [], '1.0'],        //人员列表
        "travel_meal_add" => ["travel", "meal", "add", [], [], '1.0'],        //添加餐费
        "travel_meal_edit" => ["travel", "meal", "edit", [], [], '1.0'],        //修改餐费
        "travel_meal_del" => ["travel", "meal", "del", [], [], '1.0'],        //删除餐费
        //11.1
        "examine_manage_commit" => ["examine", "manage", "commit", [], [], '0.1'],        //提交项目审批
        "examine_manage_lecturer" => ["examine", "manage", "lecturer", [], [], '0.1'],        //审批讲师安排
        "examine_manage_implement" => ["examine", "manage", "implement", [], [], '0.1'],        //审批讲师安排
        "examine_manage_travel" => ["examine", "manage", "travel", [], [], '0.1'],        //审批讲师安排
        //11.7
        "project_role_addproject" => ["project", "role", "addproject", [], [], '0.1'],        //接受json
        "project_role_model" => ["project", "role", "add", [], [], '0.1'],        //接受json
        //11.19
        "examine_config_add" => ["examine", "config", "add", [], [], '0.1'],        //添加配置的审批单类型
        "examine_config_edit" => ["examine", "config", "edit", [], [], '0.1'],        //修改配置的审批单类型
        "examine_config_del" => ["examine", "config", "del", [], [], '0.1'],        //删除配置的审批单类型

        //临时
        "view_json_add"=>["json","manage","add",[],[],'1.0'],
        "view_json_edit"=>["json","manage","edit",[],[],'1.0'],
        "view_json_list"=>["json","manage","list",[],[],'1.0'],
        "view_json_name"=>["json","manage","name",[],[],'1.0'],
    ),
);
