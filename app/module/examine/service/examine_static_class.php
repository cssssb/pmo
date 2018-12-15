<?php
namespace examine;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2018-12-14
 * @describe:  examine_examine_static service class
 * ================
 */
final class examine_static_class
{
    public function __construct()
    {
        $this->model = app::load_model_class('examine_static', 'examine');
    }
    public function add_static($parent_id,$examine_type,$token){
        //获取项目信息
        $unicode=app::load_service_class('project_class','project')->get_one($parent_id)['unicode'];
        $project_name = app::load_service_class('project_class','project')->project_name($parent_id);
        $data['project_get_one'] =app::load_service_class('project_class', 'project')->get_one_project($parent_id)[0];
        $data['lecturer_get_project'] = app::load_service_class('lecturer_plan_class', 'lecturer')
        ->model
        ->select_lecturer_get_project($parent_id);
        $data['lecturer_get_project']['project_name']=$project_name;
        $data['lecturer_get_project']['unicode']=$unicode;
        $data['implement_get_project']['project_name'] = $project_name;
        $data['implement_get_project']['unicode'] = $unicode;
        $data['implement_get_project']['implement'] = app::load_service_class('implement_plan_class', 'implement')
                                                      ->model
                                                      ->get_one('state=0 and parent_id='.$parent_id,'*','id DESC');
        $data['implement_get_project']['venue'] = app::load_service_class('implement_room_class','implement')
                                                  ->model       
                                                  ->select('parent_id='.$parent_id.' and state=0');
        $data['travel_get_project']['project_name'] = $project_name;
        $data['travel_get_project']['unicode'] = $unicode;
        $data['travel_get_project']['city'] = app::load_service_class('city_class', 'travel')->list_city($parent_id);
        $data['travel_get_project']['meal'] = app::load_service_class('meal_class', 'travel')->list_meal($parent_id);
        $data['travel_get_project']['province'] = app::load_service_class('province_class', 'travel')->list_province($parent_id);
        $data['travel_get_project']['stay'] = app::load_service_class('stay_class', 'travel')->list_stay($parent_id);
        $json['data'] = json_encode($data,JSON_UNESCAPED_UNICODE);
        $json['parent_id'] = $data['project_get_one']['id'];
        $json['version'] = $this->version($parent_id,$examine_type);
        $json['examine_type'] = $examine_type;
        $json['user_name'] = app::load_service_class('common_class', 'examine')->return_staff_user_id($token)['name'];
        return $this->model->insert($json);
    }
    public function list(){

    }
    public function project(){

    }
    public function lecturer(){

    }
    public function implement(){
        
    }
    private function version($parent_id,$examine_type){
        //查看提交的项目在数据库里有几个
        $where['parent_id'] = $parent_id;
        $where['examine_type'] = $examine_type;
        $number = $this->model->count($where);
        return ($number+1).'.0';
    }
}