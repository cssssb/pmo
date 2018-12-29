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
        $this->model = app::load_model_class('examine_project', 'examine');
    }

    // public function add_static($parent_id,$examine_type,$token){
    //     $json['parent_id'] = $parent_id;
    //     
    //     $json['examine_type'] = $examine_type;
        
    //     return $this->model->update($json,true);
    // }
    
    public function edit_static($parent_id,$examine_type,$token='',$examine_id){
        //获取项目信息
        $unicode=app::load_service_class('project_class','project')->get_one($parent_id)['unicode'];
        $project_name = app::load_service_class('project_class','project')->project_name($parent_id);
        $data['project_list_data'] = json_decode(app::load_model_class('projectstatic','project')->get_one('parent_id ='.$parent_id)['data']);
        $data['project_get_one'] =app::load_service_class('project_class', 'project')->get_one_project($parent_id)[0];
            // $data[0]['project_training_ares_name'] = $this->address->connect($data[0]['project_training_ares_id']);
        if($data['project_get_one']['project_training_ares_id']!=null){
            $data['project_get_one']['project_training_ares_name'] = app::load_service_class('address_class', 'project')->connect($data['project_get_one']['project_training_ares_id']);
        }
            $data['lecturer_get_project']['lecturer'] = app::load_service_class('lecturer_plan_class', 'lecturer')
        ->model
        ->select_lecturer_get_project($parent_id);
        $data['lecturer_get_project']['project_name']=$project_name;
        $data['lecturer_get_project']['unicode']=$unicode;
        $data['implement_get_project']['project_name'] = $project_name;
        $data['implement_get_project']['unicode'] = $unicode;
        $data['implement_get_project']['implement'] = app::load_service_class('implement_plan_class', 'implement')
                                                      ->model
                                                      ->select('state=0 and parent_id='.$parent_id);
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
        $where['parent_id'] = $parent_id;
        $where['examine_type'] = $examine_type;
        $where['id'] = $examine_id;
        $json['version'] = $this->version($parent_id,$examine_type);
        if($token!=''){
        $json['user_name'] = app::load_service_class('common_class', 'examine')->return_staff_user_id($token)['name'];}
        
        $data_field['unicode'] = $unicode;
        $data_field['project_project_template_name'] = $unicode;
        $data_field['unicode'] = $unicode;
        $data_field['unicode'] = $unicode;
        $data_field['unicode'] = $unicode;
        $data_field['unicode'] = $unicode;

        return $this->model->update($json,$where);
    }

    //公共获取
    private function common_list($examine_type){
        $where['examine_type'] = $examine_type;
        $data = $this->model->select($where);
        foreach($data as $k=>$v){
              $list[] = json_decode($v['data'],JSON_FORCE_OBJECT);
        }
        return $list;
    }

    public function return_list($examine_type){
        $data = $this->common_list($examine_type);
        foreach($data as $k=>$v){
            $list[] = $v['project_list_data'];
        }
        //获取后来的
        $id_list= array();
        foreach($list as $key=> $val)
        {
            if(in_array($val['id'],$id_list))
            {
                unset($list[$k]);
            }else
            {
                $id_list[]=$val['id'];
            }
        }

        return $list;
    }

    private function common_one($parent_id,$examine_type){
        $where['parent_id'] = $parent_id;
        $where['examine_type'] = $examine_type;
        $data = $this->model->get_one($where,'*','id DESC');
        return json_decode($data['data'],JSON_FORCE_OBJECT);
    }
    public function project($parent_id,$examine_type){
        return $this->common_one($parent_id,$examine_type)['project_get_one'];
    }
    public function lecturer($parent_id,$examine_type){
        return $this->common_one($parent_id,$examine_type)['lecturer_get_project'];
        
    }
    public function implement($parent_id,$examine_type){
        return $this->common_one($parent_id,$examine_type)['implement_get_project'];
    }
    public function travel($parent_id,$examine_type){
        return $this->common_one($parent_id,$examine_type)['travel_get_project'];
    }
    private function version($parent_id,$examine_type){
        //查看提交的项目在数据库里有几个
        $where['parent_id'] = $parent_id;
        $where['examine_type'] = $examine_type;
        $number = $this->model->count($where);
        return ($number+1).'.0';
    }
    
}