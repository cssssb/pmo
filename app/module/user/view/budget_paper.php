<?php
namespace user;

defined('IN_LION') or exit('No permission resources.');
final class budget_paper
{
    public function __construct()
    {
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Connection, User-Agent, Cookie');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE');
        header('Content-type: application/json; charset=UTF-8');
	// $this->data = $this->common_json();
    }
  
    //预算page
    public function budget_json()
    {
        $budget_pager = ["budget_paper" => [
            "data" => [
                "form-temp-name" => "预算管理",
                "form-list" => [
                    [
            //新建预算
                        "id_name" => "budget_project_name",
                        "type_name" => "BudgetListTextSearchLink",  //下拉搜索+联动
                        "key" => "",
                        "title" => "所属项目",
                        "tip" => "",
                        "add_button" => [
                            "data" => [
                                "form-list" => [
                                    [
                                        "id_name" => "add_project_name",
                                        "type_name" => "MutiText",  //input
                                        "key" => "",
                                        "title" => "项目名称",
                                        "tip" => "",
                                        "add_button" => [],
                                        "descript" => "",
                                        "before_api_uri" => "",
                                        "after_api_uri" => ""
                                    ], [
                                        "id_name" => "add_project_gather",
                                        "type_name" => "ListTextSearch",  //下拉搜索
                                        "key" => "",
                                        "title" => "所属项目集",
                                        "tip" => "",
                                        "add_button" => [
                                            "data" => [
                                                "form-temp-name" => "新建项目集",
                                                "form-list" => [[
                                                    "id_name" => "add_project_gather_charge",
                                                    "type_name" => "ProjectGather",
                                                    "key" => "",
                                                    "title" => "销售负责人",
                                                    "tip" => "",
                                                    "add_button" => [],
                                                    "descript" => "",
                                                    "before_api_uri" => "staff_small_list",
                                                    "after_api_uri" => ""
                                                ]]
                                            ]
                                        ],
                                        "descript" => "",
                                        "before_api_uri" => "of_project",
                                        "after_api_uri" => ""
                                    ],
                                    [
                                        "id_name" => "add_project_charge",
                                        "type_name" => "SelectList",  //下拉搜索
                                        "key" => "",
                                        "title" => "实施负责人",
                                        "tip" => "",
                                        "add_button" => [],
                                        "descript" => "",
                                        "before_api_uri" =>
                                        "staff_small_list",
                                        "after_api_uri" => ""
                                    ], [
                                        "id_name" => "project_templet",
                                        "type_name" => "ListTextSearch",  //下拉搜索
                                        "key" => "",
                                        "title" => "项目模板",
                                        "tip" => "",
                                        "add_button" => [
                                            "data" => [
                                                "form-temp-name" => "项目模板",
                                                "form-list" => [[
                                                    "id_name" => "add_project_templet",
                                                    "type_name" => "SelectList",  //下拉搜索
                                                    "key" => "",
                                                    "title" => "销售负责人",
                                                    "tip" => "",
                                                    "add_button" => [],
                                                    "descript" => "",
                                                    "before_api_uri" => "staff_small_list",
                                                    "after_api_uri" => ""
                                                ]]
                                            ]
                                        ],
                                        "descript" => "",
                                        "before_api_uri" => "project_template",
                                        "after_api_uri" => ""
                                    ],
                                    [
                                        "id_name" => "add_customer_name",
                                        "type_name" => "MutiText", //input
                                        "key" => "",
                                        "title" => "客户名称",
                                        "tip" => "",
                                        "add_button" => [],
                                        "descript" => "",
                                        "before_api_uri" => "",
                                        "after_api_uri" => ""
                                    ], [
                                        "id_name" => "add_days",
                                        "type_name" => "MutiText", //input
                                        "key" => "",
                                        "title" => "天数",
                                        "tip" => "",
                                        "add_button" => [],
                                        "descript" => "",
                                        "before_api_uri" => "",
                                        "after_api_uri" => ""
                                    ], [
                                        "id_name" => "add_training_numbers",
                                        "type_name" => "MutiText", //input
                                        "key" => "",
                                        "title" => "培训人数",
                                        "tip" => "",
                                        "add_button" => [],
                                        "descript" => "",
                                        "before_api_uri" => "",
                                        "after_api_uri" => ""
                                    ], [
                                        "id_name" => "add_training_ares",
                                        "type_name" => "MutiText", //input
                                        "key" => "",
                                        "title" => "培训地点",
                                        "tip" => "",
                                        "add_button" => [],
                                        "descript" => "",
                                        "before_api_uri" => "",
                                        "after_api_uri" => ""
                                    ]

                                ],

                            ]
                        ],
                        "descript" => "",
                        "before_api_uri" => "project_header",
                        "after_api_uri" => ""
                    ],
                    [
                        "id_name" => "budget_tax",
                        "type_name" => "MutiText", //input
                        "key" => "6%",
                        "title" => "税率",
                        "tip" => "",
                        "add_button" => [],
                        "descript" => "",
                        "before_api_uri" => "",
                        "after_api_uri" => ""
                    ],
                    [
                        "id_name" => "budget_consulting_fee",
                        "type_name" => "MutiText", //input
                        "key" => "",
                        "title" => "咨询费用",
                        "tip" => "",
                        "add_button" => [],
                        "descript" => "",
                        "before_api_uri" => "",
                        "after_api_uri" => ""
                    ],
                    [
                        "id_name" => "budget_expects_revenue",
                        "type_name" => "MutiText", //input
                        "key" => "",
                        "title" => "预计收入",
                        "tip" => "",
                        "add_button" => [],
                        "descript" => "",
                        "before_api_uri" => "",
                        "after_api_uri" => ""
                    ]

                ],

                "teacher-form-list" => [
                    [
                        "id_name" => "teacher_name",
                        "type_name" => "ListTextSearch", //下拉搜索
                        "key" => "",
                        "title" => "讲师姓名",
                        "tip" => "",
                        "add_button" => [
                            "data" => [
                                "form-temp-name" => "讲师姓名",
                                "form-list" => [[
                                    "id_name" => "teacher_income_tax",
                                    "type_name" => "MutiText", //input
                                    "key" => "",
                                    "title" => "所得税",
                                    "tip" => "",
                                    "add_button" => [],
                                    "descript" => "",
                                    "before_api_uri" => "",
                                    "after_api_uri" => ""
                                ], ]
                            ]
                        ],
                        "descript" => "",
                        "before_api_uri" => [[
                            "id" => 1,
                            "name" => "讲师1",
                        ], [
                            "id" => 2,
                            "name" => "讲师2",
                        ], [
                            "id" => 3,
                            "name" => "讲师3",
                        ]],
                        "after_api_uri" => ""
                    ],
                    [
                        "id_name" => "teacher_income_tax",
                        "type_name" => "MutiText", //input
                        "key" => "",
                        "title" => "所得税",
                        "tip" => "",
                        "add_button" => [],
                        "descript" => "",
                        "before_api_uri" => "",
                        "after_api_uri" => ""
                    ],
                    [
                        "id_name" => "teacher_lecture_fee",
                        "type_name" => "MutiText", //input
                        "key" => "3000",
                        "title" => "讲课费",
                        "tip" => "",
                        "add_button" => [],
                        "descript" => "",
                        "before_api_uri" => "",
                        "after_api_uri" => ""
                    ],
                    [
                        "id_name" => "teacher_lecture_days",
                        "type_name" => "MutiText", //input
                        "key" => "5",
                        "title" => "课程天数",
                        "tip" => "",
                        "add_button" => [],
                        "descript" => "",
                        "before_api_uri" => "",
                        "after_api_uri" => ""
                    ],
                    [
                        "id_name" => "teacher_duty",
                        "type_name" => "ListTextSearch", //下拉搜索
                        "key" => "",
                        "title" => "职责",
                        "tip" => "",
                        "add_button" => [],
                        "descript" => "",
                        "before_api_uri" => [[
                            "id" => 1,
                            "name" => "主讲",
                        ], [
                            "id" => 2,
                            "name" => "专家",
                        ], [
                            "id" => 3,
                            "name" => "评审",
                        ]],
                        "after_api_uri" => ""
                    ]
                ],
            ]
        ]];
                return $budget_pager;
    }
    public function long_traffic_card_list(){
        //长途交通card
    $data =[    "long_traffic_card_list"=> [
            "long_fee_card"=> [[
                "id_name"=> "long_fee_card_people",
                "type_name"=> "MutiText", //input
                "key"=> "",
                "title"=> "人员",
                "tip"=> "",
                "add_button"=> [
                ],
                "descript"=> "",
                "before_api_uri"=> "",
                "after_api_uri"=> ""
            ], [
                "id_name"=> "long_fee_card_start_time",
                "type_name"=> "TextDatetime", //input
                "key"=> "",
                "title"=> "出发时间",
                "tip"=> "",
                "add_button"=> [
                ],
                "descript"=> "",
                "before_api_uri"=> "",
                "after_api_uri"=> ""
            ],
            [
                "id_name"=> "long_fee_card_start_place",
                "type_name"=> "MutiText", //input
                "key"=> "",
                "title"=> "出发地点",
                "tip"=> "",
                "add_button"=> [
                ],
                "descript"=> "",
                "before_api_uri"=> "",
                "after_api_uri"=> ""
            ],
            [
                "id_name"=> "long_fee_card_end_time",
                "type_name"=> "TextDatetime", //input
                "key"=> "",
                "title"=> "结束时间",
                "tip"=> "",
                "add_button"=> [
                ],
                "descript"=> "",
                "before_api_uri"=> "",
                "after_api_uri"=> ""
            ],
            [
                "id_name"=> "long_fee_card_end_place",
                "type_name"=> "MutiText", //input
                "key"=> "",
                "title"=> "结束地点",
                "tip"=> "",
                "add_button"=> [
                ],
                "descript"=> "",
                "before_api_uri"=> "",
                "after_api_uri"=> ""
            ],
            [
                "id_name"=> "long_fee_card_vehicle",
                "type_name"=> "SelectList", //下拉搜索
                "key"=> "",
                "title"=> "交通工具",
                "tip"=> "",
                "add_button"=> [
                    "data"=> [
                        "form-list"=> []
                    ]
                ],
                "descript"=> "",
                "before_api_uri"=> [[
                    "id"=> 1,
                    "name"=> "飞机",
                ], [
                    "id"=> 2,
                    "name"=> "火车",
                ], [
                    "id"=> 3,
                    "name"=> "大巴",
                ]],
                "after_api_uri"=> ""
            ]],
        ],
        //市内交通
        "short_traffic_card_list"=> [
            "short_fee_card"=> [[
                "id_name"=> "short_fee_card_people",
                "type_name"=> "MutiText", //input
                "key"=> "",
                "title"=> "人员",
                "tip"=> "",
                "add_button"=> [
                ],
                "descript"=> "",
                "before_api_uri"=> "",
                "after_api_uri"=> ""
            ], [
                "id_name"=> "short_fee_type",
                "type_name"=> "MutiText", //input
                "key"=> "",
                "title"=> "费用名称",
                "tip"=> "",
                "add_button"=> [
                ],
                "descript"=> "",
                "before_api_uri"=> "",
                "after_api_uri"=> ""
            ],
            [
                "id_name"=> "short_fee",
                "type_name"=> "MutiText", //input
                "key"=> "",
                "title"=> "费用",
                "tip"=> "",
                "add_button"=> [
                ],
                "descript"=> "",
                "before_api_uri"=> "",
                "after_api_uri"=> ""
            ],
            ],
        ],
        "hotel_expense_card_list"=> [
            "hotel_expense_card"=> [[
                "id_name"=> "hotel_expense_people",
                "type_name"=> "MutiText", //input
                "key"=> "",
                "title"=> "人员",
                "tip"=> "",
                "add_button"=> [
                ],
                "descript"=> "",
                "before_api_uri"=> "",
                "after_api_uri"=> ""
            ], [
                "id_name"=> "hotel_expense_days",
                "type_name"=> "MutiText", //input
                "key"=> "",
                "title"=> "天数",
                "tip"=> "",
                "add_button"=> [
                ],
                "descript"=> "",
                "before_api_uri"=> "",
                "after_api_uri"=> ""
            ],
            [
                "id_name"=> "hotel_expense_total",
                "type_name"=> "MutiText", //input
                "key"=> "",
                "title"=> "费用总价",
                "tip"=> "",
                "add_button"=> [
                ],
                "descript"=> "",
                "before_api_uri"=> "",
                "after_api_uri"=> ""
            ],
            ],
        ]
        ];
        return $data;
    }
    public function province_cost()
    {
        // return 1;die;
        //长途交通
        $data = $this->data;
        $data['tip'] = 123;
        return json_encode($data);;
    }
    public function staff_of_ding($data)
    {
        foreach ($data as $k) {
            $ass[] = [
                "id" => $k['id'],
                "name" => $k['name'], //input
                "department_id" => $k['department_id'],
                "position" => $k['position'],
                "department" => $k['department'],
                "unionid" => $k['unionid'],
                "userid" => $k['userid'],
                "jobnumber" => $k['jobnumber'],
                "email" => $k['email'],
                "hiredDate" => $k['hiredDate'],
                "openid" => $k['openid'],
                "mobile" => $k['mobile'],
                "state" => $k['state'],
                "power" => $k['power'],
            ];
        }
        return json_encode($ass);
    }
    public function small_list($data)
    {
        
        return json_encode($data);
    }
}