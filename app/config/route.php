<?php
return array(
        //默认消息码
    'default_routelist' => array(
        //10.8
        'client_route' => ["user", "user", "client_route", [1], [], "1.0","目录"],
        "project_manage_add" => ["project", "manage", "add", ["project_project_template_id" => "string"], [], '1.0',"添加项目"],       //添加项目
        "project_data_edit" => ["project", "data", "edit", ["id" => "string"], [], '1.0',"修改项目"],       //修改项目
        "project_manage_list" => ["project", "manage", "list", [], [], '2.0',"返回项目列表"],    //返回项目列表
        "project_data_getByProjectId" => ["project", "data", "getByProjectId", ["id" => "string"], [], '1.0',"获取一条项目数据"],   //获取一条数据
        "staff_manage_list" => ["staff", "manage", "list", [], [], '1.0',"获取实施负责人"],   //获取实施负责人
        "program_manage_list" => ["progam", "manage", "list", [], [], '1.0',"项目集列表"],//项目集表
        "program_manage_add" => ["progam", "manage", "add", [], [], '1.0',"新增项目"],//项目集新增
        "project_type_list" => ["user", "project", "projectTemplate", [], [], '1.0',"项目模板列表"],//项目模板表
        "lecturer_plan_getByProjectId" => ["lecturer", "plan", "getByProjectId", [], [], '1.0',"实施安排数据"],//返回讲师列表
        "lecturer_duty_list" => ["lecturer", "duty", "list", [], [], '1.0',"职责列表"],//职责表
        "lecturer_plan_add" => ["lecturer", "plan", "add", [], [], '1.0',"添加讲师安排"],               //添加、修改讲师成本安排
        "lecturer_plan_edit" => ["lecturer", "plan", "edit", ["id" => "string"], [], '1.0',"修改讲师安排"],               //添加、修改讲师成本安排
        "lecturer_plan_del" => ["lecturer", "plan", "del", ["id" => "string"], [], '1.0',"删除讲师安排"],                //删除讲师成本状态
        "implement_plan_getByProjectId" => ["implement", "plan", "getByProjectId", [], [], '1.0',"获取实施安排"],     //获取实施安排
        "implement_plan_edit" => ["implement", "plan", "edit", [], [], '1.0',"修改实施安排"],     //实施安排修改
        "travel_plan_getByProjectId" => ["travel", "plan", "getByProjectId", [], [], '1.0',"获取差旅安排"],         //差旅安排
        "travel_inCityTraffic_add" => ["travel", "inCityTraffic", "add", [], [], '1.0',"添加市内交通"],        //市内交通
        "travel_inCityTraffic_edit" => ["travel", "inCityTraffic", "edit", ["id" => "string"], [], '1.0',"修改市内交通"],        
        "travel_inCityTraffic_del" => ["travel", "inCityTraffic", "del", ["id" => "string"], [], '1.0',"删除室内交通"],        
        "travel_longTraffic_add" => ["travel", "longTraffic", "add", [], [], '1.0',"添加长途交通"],        //长途交通
        "travel_longTraffic_edit" => ["travel", "longTraffic", "edit", ["id" => "string"], [], '1.0',"修改长途交通"],        
        "travel_longTraffic_del" => ["travel", "longTraffic", "del", ["id" => "string"], [], '1.0',"删除长途交通"],        
        "travel_hotel_add" => ["travel", "hotel", "add", [], [], '1.0',"增加住宿安排"],        //住宿安排
        "travel_hotel_edit" => ["travel", "hotel", "edit", ["id" => "string"], [], '1.0',"修改住宿安排"],        
        "travel_hotel_del" => ["travel", "hotel", "del", ["id" => "string"], [], '1.0',"删除住宿安排"],   
        "travel_longTrafficType_list" => ["travel", "longTrafficType", "list", [], [], '1.0',"出行方式列表"], //出行方式  

        "user_account_login"=>["user","account","login",["account"=>"string","password"=>"string"],[],'1.0',"登陆"],//用户登录

        "implement_venue_add"=>["implement","venue","add",[],[],'1.0',"添加会场安排"],//添加会场安排
        "implement_venue_del"=>["implement","venue","del",[],[],'1.0',"删除会场安排"],//删除会场安排
        "implement_venue_edit"=>["implement","venue","edit",[],[],'1.0',"修改会场安排"],//修改会场安排

        //10/26
        "project_address_list"=>["project","address","list",[],[],'1.0',"获取城市列表"],//获取城市列表
        "project_address_province"=>["project","address","province",[],[],'1.0',"获取省列表"],//获取省列表
        "project_address_city"=>["project","address","city",[],[],'1.0',"获取市列表"],//获取市列表
        "project_address_add"=>["project","address","add",[],[],'1.0',"添加地址"],//添加
        "project_address_edit"=>["project","address","edit",[],[],'1.0',"修改地址"],//修改
        "project_address_del"=>["project","address","del",[],[],'1.0',"删除地址"],//删除

        //10.29
        "travel_meal_people" => ["travel", "meal", "people", [], [], '1.0',"人员列表"],        //人员列表
        "travel_meal_add" => ["travel", "meal", "add", [], [], '1.0',"添加餐费"],        //添加餐费
        "travel_meal_edit" => ["travel", "meal", "edit", [], [], '1.0',"修改餐费"],        //修改餐费
        "travel_meal_del" => ["travel", "meal", "del", [], [], '1.0',"删除餐费"],        //删除餐费
        //11.1
        // "examine_manage_commit" => ["examine", "manage", "commit", [], [], '1.0',""],        //提交项目审批
        // "examine_manage_lecturer" => ["examine", "manage", "lecturer", [], [], '0.1',""],        //审批讲师安排
        // "examine_manage_implement" => ["examine", "manage", "implement", [], [], '0.1',""],        //审批讲师安排
        // "examine_manage_travel" => ["examine", "manage", "travel", [], [], '0.1',""],        //审批讲师安排
        
        //11.7
        // "project_role_addproject" => ["project", "role", "addproject", [], [], '0.1',""],        //接受json
        // "project_role_model" => ["project", "role", "add", [], [], '0.1',""],        //接受json
        //11.19
        "examine_config_add" => ["examine", "config", "add", [], [], '1.0',"添加审批的审批单类型"],        //添加配置的审批单类型
        "examine_config_edit" => ["examine", "config", "edit", [], [], '1.0',"修改配置的审批单类型"],        //修改配置的审批单类型
        "examine_config_del" => ["examine", "config", "del", [], [], '1.0',"删除配置的审批单类型"],        //删除配置的审批单类型
        "examine_config_list" => ["examine","config","list",[],[],'1.0',"审批列表"],

        //临时
        "json_manage_add"=>["json","manage","add",[],[],'1.0',"添加json数据"],
        "json_manage_edit"=>["json","manage","edit",[],[],'1.0',"修改json数据"],
        "json_manage_list"=>["json","manage","list",[],[],'1.0',"json数据列表"],
        "json_manage_name"=>["json","manage","name",[],[],'1.0',"json列表名称"],
        //角色下的路由
        "role_route_add"=>["role","route","add",[],[],'1.0',"为角色添加路由"],
        "role_route_del"=>["role","route","del",[],[],'1.0',"为角色删除路由"],
        // "role_route_list"=>["role","route","list",[],[],'0.1',""],//角色下路由列表改名 get_route_by_role_id
        //角色下的视图
        "role_view_add"=>["role","view","add",[],[],'0.1',"为角色添加试图"],
        "role_view_del"=>["role","view","del",[],[],'0.1',"为角色删除试图"],
        "role_view_list"=>["role","view","list",[],[],'0.1',"角色下的试图列表"],
        //菜单管理
        "menu_manage_add"=>["menu","manage","add",[],[],'1.0',"静态菜单数据的添加"],   //静态菜单数据的添加
        "menu_manage_edit"=>["menu","manage","edit",[],[],'1.0',"静态菜单数据的修改"],//静态菜单数据的修改
        "menu_manage_del"=>["menu","manage","del",[],[],'1.0',"静态菜单数据的删除"],//静态菜单数据的删除
        "menu_manage_list"=>["menu","manage","list",[],[],'1.0',"菜单的列表（非静态）"],//菜单的列表（非静态）
       

        //12.10审批接口名字
        "examine_manage_commitbudget" => ["examine", "manage", "commitbudget", [], [], '1.0',"提交预算审批"],        //提交项目审批
        "examine_manage_will" => ["examine", "manage", "will", [], [], '1.0',"查看需要我审批的审批单"],        //查看需要我审批的审批单
        "examine_manage_ipassed" => ["examine", "manage", "ipassed", [], [], '1.0',"查看我通过的审批单"],        //查看我通过的审批单
        "examine_manage_agree" => ["examine", "manage", "budgetagree", [], [], '1.0',"通过预算审批单"],        //通过预算
        "examine_manage_finalagree" => ["examine", "manage", "finalagree", [], [], '1.0',"通过决算审批单"],        //通过决算
        "examine_manage_refuse" => ["examine", "manage", "budgetrefuse", [], [], '1.0',"不通过预算审批单"],        //不通过预算
        "examine_manage_finalrefuse" => ["examine", "manage", "finalrefuse", [], [], '1.0',"不通过决算审批单"],        //不通过决算
        //数据名称list
        "json_type_list"=>["json","type","list",[],[],'1.0',"json数据列表"],                               //数据列表
        "project_manage_returnonlyuserlist" => ["project", "manage", "returnonlyuserlist", [], [], '1.0',"返回我自己的项目列表"],    //返回项目列表
        "project_manage_returndepartmentlist" => ["project", "manage", "returndepartmentlist", [], [], '1.0',"返回我部门的项目列表"],    //返回项目列表

        // //12.17预算视图json
        "examine_budget_list" => ["examine", "notes", "budget", [], [], '1.0',"预算审批列表"],    //预算列表
        "examine_final_list" => ["examine", "notes", "final", [], [], '1.0',"决算审批列表"],    //决算算列表
        "examine_budget_project" => ["examine", "budget", "project", [], [], '1.0',"获取预算项目信息"],    //获取项目信息
        "examine_budget_lecturer" => ["examine", "budget", "lecturer", [], [], '1.0',"获取预算讲师信息"],    //获取讲师信息
        "examine_budget_implement" => ["examine", "budget", "implement", [], [], '1.0',"获取预算实施信息"],    //获取实施信息
        "examine_budget_travel" => ["examine", "budget", "travel", [], [], '1.0',"获取预算差旅信息"],    //获取差旅信息
        
        //12.20 
        "menu_data_list"=>["menu","data","list",[],[],'1.0',"菜单的静态列表"],                   //菜单的静态列表
        "menu_data_listmenuleft"=>["menu","data","listmenuleft",[],[],'1.0',"左侧菜单的列表"],//左侧菜单的列表
        "menu_data_listmenuright"=>["menu","data","listmenuright",[],[],'1.0',"偏右左侧菜单的列表"],//偏右左侧菜单的列表
        "menu_data_getone"=>["menu","data","getone",[],[],'1.0',"获取一条菜单的静态列表"],//获取一条菜单的静态列表

        //12.24
        "examine_manage_cancelbudget"=>["examine","manage","cancelbudget",[],[],'1.0',"撤销预算"],//撤销预算
        "examine_manage_cancelfinal"=>["examine","manage","cancelfinal",[],[],'1.0',"撤销决算"],//撤销决算
        "examine_manage_commitfinal"=>["examine","manage","commitfinal",[],[],'1.0',"提交决算"],//提交决算
        //12.25
        "examine_final_project" => ["examine", "final", "project", [], [], '1.0',"获取决算项目信息"],    //获取项目信息
        "examine_final_lecturer" => ["examine", "final", "lecturer", [], [], '1.0',"获取决算讲师信息"],    //获取讲师信息
        "examine_final_implement" => ["examine", "final", "implement", [], [], '1.0',"获取决算实施信息"],    //获取实施信息
        "examine_final_travel" => ["examine", "final", "travel", [], [], '1.0',"获取决算差旅信息"],    //获取差旅信息

         //路由
         "client_route_list"=>["client","route","list",[],[],'1.0',"返回所有的路由列表"], //所有的路由列表
         "get_route_by_role_id"=>["role","route","byid",[],[],'1.0',"角色下的路由列表"], //角色下的路由列表
         "role_route_list"=>["role","route","list",[],[],'1.0',"角色列表"], //角色列表
         //12.27
         "examine_record_list"=>["examine","record","adminlist",[],[],'1.0',"审批者历史记录列表"], //审批历史记录列表
         "examine_record_admincsv"=>["examine","record","admincsv",[],[],'1.0',"审批者历史记录列表导出csv"], //审批历史记录列表
         "examine_record_userlist"=>["examine","record","userlist",[],[],"1.0","用户提交数据列表"],
         "examine_record_usercsv"=>["examine","record","usercsv",[],[],"1.0","用户历史记录列表导出csv"],

         //2019/1/15  
         "payment_manage_add"=>["payment","manage","add",[],[],"1.0","创建支出"],
         "payment_manage_my_list"=>["payment","manage","my_list",[],[],"1.0","查看我的支出"],
         "payment_manage_by"=>["payment","manage","by",[],[],"1.0","查看指定支出id的支出"],
         "payment_manage_my_dep_list"=>["payment","manage","my_dep_list",[],[],"1.0","查看部门支出"],
         "payment_manage_list"=>["payment","manage","list",[],[],"1.0","查看所有支出"],
         "payment_manage_edit"=>["payment","manage","edit",[],[],"1.0","修改支出数据"],
         "payment_manage_edit_financial_number"=>["payment","manage","edit_financial_number",[],[],"1.0","创建支出unicode"],
         "payment_project_add"=>["payment","project","add",[],[],"1.0","关联支出到项目"],
         "payment_project_list"=>["payment","project","list",[],[],"1.1","查看所有支出及其所属项目"],
         "payment_project_list_pass"=>["payment","project","list_pass",[],[],"1.0","查看已通过的支出"],
         "payment_state_pass"=>["payment","state","pass",[],[],"1.0","通过支出"],
         "payment_state_submit"=>["payment","state","submit",[],[],"1.0","提交支出"],
         "payment_state_cancel"=>["payment","state","cancel",[],[],"1.0","作废支出"],
         "payment_state_del"=>["payment","state","del",[],[],"1.0","删除支出"],
         "payment_state_recall"=>["payment","state","recall",[],[],"1.0","撤回支出"],
         "payment_state_pass_many"=>["payment","state","pass_many",[],[],"1.0","批量通过支出"],
         "payment_state_submit_many"=>["payment","state","submit_many",[],[],"1.0","批量提交支出"],
         "payment_state_cancel_many"=>["payment","state","cancel_many",[],[],"1.0","批量作废支出"],
         "payment_state_del_many"=>["payment","state","del_many",[],[],"1.0","批量删除支出"],
         "payment_state_recall_many"=>["payment","state","recall_many",[],[],"1.0","批量撤回支出"],
         //1.24 两个一对多支出和项目的关联
         "payment_project_add_ids_by_project"=>["payment","project","add_ids_by_project",[],[],"1.0","支出关联多个项目"],
         "payment_project_add_projects_by_id"=>["payment","project","add_projects_by_id",[],[],"1.0","项目关联多个支出"],
         "payment_project_add_by_price"=>["payment","project","add_by_price",[],[],"1.0","创建支出并关联项目"],
         "payment_project_edit"=>["payment","project","edit",[],[],"1.0","修改指定支出到项目的金额"],
         "payment_project_cancel"=>["payment","project","cancel",[],[],"1.0","取消支出和项目关联"],
         "payment_project_list_by_project_id"=>["payment","project","list_by_project_id",[],[],"1.0","查看项目关联的支出"],
        //左侧视图数据的导入和导出 2.18

        //  "json_menu_get_data"=>["json","menu","json_menu_get_data",[],[],"1.0","左侧视图数据的导入"],
        //  "json_menu_write_data"=>["json","menu","json_menu_write_data",[],[],"1.0","左侧视图数据的导出"],
        
        "clazz_manage_list"=>["clazz","manage","list",[],[],"1.0","课程页面列表"],
        "clazz_manage_add"=>["clazz","manage","add",[],[],"1.0","添加page"],
        "clazz_manage_edit"=>["clazz","manage","edit",[],[],"1.0","修改page"],
        "clazz_manage_del"=>["clazz","manage","del",[],[],"1.0","删除page"],
        "clazz_data_getByClassId"=>["clazz","manage","getByClassId",[],[],"1.0","获取一条课程列表"],
        "clazz_manage_enroll_is_agree"=>["clazz","manage","enroll_is_agree",[],[],"1.0","修改报名人员状态为通过"],
        "clazz_manage_enroll_is_refuse"=>["clazz","manage","enroll_is_refuse",[],[],"1.0","删除报名人员"],

        "lecturer_manage_list" => ["lecturer", "manage", "list", [], [], '1.0',"讲师列表"],//讲师表
        "lecturer_manage_cooperation"=>["lecturer","manage","cooperation",[],[],'1.0',"讲师长短期"],//讲师长期短期接口
        "lecturer_manage_add"=>["lecturer","manage","add",[],[],'1.0',"新增讲师"],//新增讲师
        "lecturer_manage_edit"=>["lecturer","manage","edit",[],[],'1.0',"新增讲师"],//修改讲师
        "lecturer_manage_del"=>["lecturer","manage","del",[],[],'1.0',"新增讲师"],//删除讲师
        "lecturer_data_getByLeturerId"=>["lecturer","manage","getByLeturerId",[],[],'1.0',"新增讲师"],//获取一条讲师信息
    ),
);
