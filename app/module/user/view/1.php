<?php
$a = ["budget_paper"=>  [
    "data"=>  [
    "form-temp-name"=>  "预算管理",
    "form-list"=>  [[
    //新建预算
    "id_name"=>  "budget_project_name",
    "type_name"=>  "BudgetListTextSearchLink",  //下拉搜索+联动
    "key"=>  "",
    "title"=>  "所属项目",
    "tip"=>  "",
    "add_button"=>  [
    "data"=>  [
    "form-list"=>  [[
    "id_name"=>  "add_project_name",
    "type_name"=>  "MutiText",  //input
    "key"=>  "",
    "title"=>  "项目名称",
    "tip"=>  "",
    "add_button"=>  [],
    "descript"=>  "",
    "before_api_uri"=>  "",
    "after_api_uri"=>  ""
    ],  [
    "id_name"=>  "add_project_gather",
    "type_name"=>  "ListTextSearch",  //下拉搜索
    "key"=>  "",
    "title"=>  "所属项目集",
    "tip"=>  "",
    "add_button"=>  [
    "data"=>  [
    "form-temp-name"=>  "新建项目集",
    "form-list"=>  [[
    "id_name"=>  "add_project_gather_charge",
    "type_name"=>  "ProjectGather",
    "key"=>  "",
    "title"=>  "销售负责人",
    "tip"=>  "",
    "add_button"=>  [],
    "descript"=>  "",
    "before_api_uri"=>  [[
    "id"=>  1,
    "name"=>  "亢鹏",
    ],  [
    "id"=>  2,
    "name"=>  "寇艳艳",
    "budget_cost"=>  10000
    ],  [
    "id"=>  3,
    "name"=>  "张剑",
    "budget_cost"=>  10000
    ]],
    "after_api_uri"=>  ""
    ]]
    ]
    ],
    "descript"=>  "",
    "before_api_uri"=>  [[
    "id"=>  1,
    "name"=>  "项目集1",
    ],  [
    "id"=>  2,
    "name"=>  "项目集2",
    ],  [
    "id"=>  3,
    "name"=>  "项目集3",
    ]],
    "after_api_uri"=>  ""
    ],
    [
    "id_name"=>  "add_project_charge",
    "type_name"=>  "ListText",  //下拉搜索
    "key"=>  "",
    "title"=>  "实施负责人",
    "tip"=>  "",
    "add_button"=>  [],
    "descript"=>  "",
    "before_api_uri"=>//"staff_of_ding"
      [[
    "id"=>  1,
    "name"=>  "亢鹏",
    ],  [
    "id"=>  2,
    "name"=>  "寇艳艳",
    "budget_cost"=>  10000
    ],  [
    "id"=>  3,
    "name"=>  "张剑",
    "budget_cost"=>  10000
    ]]
    ,
    "after_api_uri"=>  ""
    ],  [
    "id_name"=>  "project_templet",
    "type_name"=>  "ListTextSearch",  //下拉搜索
    "key"=>  "",
    "title"=>  "项目模板",
    "tip"=>  "",
    "add_button"=>  [
    "data"=>  [
    "form-temp-name"=>  "项目模板",
    "form-list"=>  [[
    "id_name"=>  "add_project_templet",
    "type_name"=>  "ListText",  //下拉搜索
    "key"=>  "",
    "title"=>  "销售负责人1",
    "tip"=>  "",
    "add_button"=>  [],
    "descript"=>  "",
    "before_api_uri"=>  [[
    "id"=>  1,
    "name"=>  "亢鹏",
    ],  [
    "id"=>  2,
    "name"=>  "寇艳艳",
    "budget_cost"=>  10000
    ],  [
    "id"=>  3,
    "name"=>  "张剑",
    "budget_cost"=>  10000
    ]],
    "after_api_uri"=> ""
    ]]
    ]
    ],
    "descript"=> "",
    "before_api_uri"=> [[
    "id"=> 1,
    "name"=> "公开课实施",
    ], [
    "id"=> 2,
    "name"=> "行业培训实施",
    ]],
    "after_api_uri"=> ""
    ],
    [
    "id_name"=> "add_customer_name",
    "type_name"=> "MutiText", //input
    "key"=> "",
    "title"=> "客户名称",
    "tip"=> "",
    "add_button"=> [],
    "descript"=> "",
    "before_api_uri"=> "",
    "after_api_uri"=> ""
    ], [
    "id_name"=> "add_days",
    "type_name"=> "MutiText", //input
    "key"=> "",
    "title"=> "天数",
    "tip"=> "",
    "add_button"=> [],
    "descript"=> "",
    "before_api_uri"=> "",
    "after_api_uri"=> ""
    ], [
    "id_name"=> "add_training_numbers",
    "type_name"=> "MutiText", //input
    "key"=> "",
    "title"=> "培训人数",
    "tip"=> "",
    "add_button"=> [],
    "descript"=> "",
    "before_api_uri"=> "",
    "after_api_uri"=> ""
    ], [
    "id_name"=> "add_training_ares",
    "type_name"=> "MutiText", //input
    "key"=> "",
    "title"=> "培训地点",
    "tip"=> "",
    "add_button"=> [],
    "descript"=> "",
    "before_api_uri"=> "",
    "after_api_uri"=> ""
    ]
    
    ],
    
    ]
    ],
    "descript"=> "",
    "before_api_uri"=> [[
    "id"=> 1,
    "name"=> "项目1",
    "cost"=> 10000
    ], [
    "id"=> 2,
    "name"=> "项目2",
    "cost"=> 20000
    ], [
    "id"=> 3,
    "name"=> "项目3",
    "cost"=> 30000
    ]],
    "after_api_uri"=> ""
    ],
    [
    "id_name"=> "budget_tax",
    "type_name"=> "MutiText", //input
    "key"=> "6%",
    "title"=> "税率",
    "tip"=> "",
    "add_button"=> [],
    "descript"=> "",
    "before_api_uri"=> "",
    "after_api_uri"=> ""
    ],
    [
    "id_name"=> "budget_consulting_fee",
    "type_name"=> "MutiText", //input
    "key"=> "",
    "title"=> "咨询费用",
    "tip"=> "",
    "add_button"=> [],
    "descript"=> "",
    "before_api_uri"=> "",
    "after_api_uri"=> ""
    ],
    [
    "id_name"=> "budget_expects_revenue",
    "type_name"=> "MutiText", //input
    "key"=> "",
    "title"=> "预计收入",
    "tip"=> "",
    "add_button"=> [],
    "descript"=> "",
    "before_api_uri"=> "",
    "after_api_uri"=> ""
    ]
    
    ],
    
    "teacher-form-list"=> [
    [
    "id_name"=> "teacher_name",
    "type_name"=> "ListTextSearch", //下拉搜索
    "key"=> "",
    "title"=> "讲师姓名",
    "tip"=> "",
    "add_button"=> [
    "data"=> [
    "form-temp-name"=> "讲师姓名",
    "form-list"=> [[
    "id_name"=> "teacher_income_tax",
    "type_name"=> "MutiText", //input
    "key"=> "",
    "title"=> "所得税",
    "tip"=> "",
    "add_button"=> [],
    "descript"=> "",
    "before_api_uri"=> "",
    "after_api_uri"=> ""
    ],]
    ]
    ],
    "descript"=> "",
    "before_api_uri"=> [[
    "id"=> 1,
    "name"=> "讲师1",
    ], [
    "id"=> 2,
    "name"=> "讲师2",
    ], [
    "id"=> 3,
    "name"=> "讲师3",
    ]],
    "after_api_uri"=> ""
    ],
    [
    "id_name"=> "teacher_income_tax",
    "type_name"=> "MutiText", //input
    "key"=> "",
    "title"=> "所得税",
    "tip"=> "",
    "add_button"=> [],
    "descript"=> "",
    "before_api_uri"=> "",
    "after_api_uri"=> ""
    ],
    [
    "id_name"=> "teacher_lecture_fee",
    "type_name"=> "MutiText", //input
    "key"=> "3000",
    "title"=> "讲课费",
    "tip"=> "",
    "add_button"=> [],
    "descript"=> "",
    "before_api_uri"=> "",
    "after_api_uri"=> ""
    ],
    [
    "id_name"=> "teacher_lecture_days",
    "type_name"=> "MutiText", //input
    "key"=> "5",
    "title"=> "课程天数",
    "tip"=> "",
    "add_button"=> [],
    "descript"=> "",
    "before_api_uri"=> "",
    "after_api_uri"=> ""
    ],
    [
    "id_name"=> "teacher_duty",
    "type_name"=> "ListTextSearch", //下拉搜索
    "key"=> "",
    "title"=> "职责",
    "tip"=> "",
    "add_button"=> [],
    "descript"=> "",
    "before_api_uri"=> [[
    "id"=> 1,
    "name"=> "主讲",
    ], [
    "id"=> 2,
    "name"=> "专家",
    ], [
    "id"=> 3,
    "name"=> "评审",
    ]],
    "after_api_uri"=> ""
    ]
    ],
    ]
]];