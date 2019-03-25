<?php
namespace course;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2019-01-07
 * @describe:  course_data controller class
 * ================
 */
class data_controller
{
    // private $data;
    // /**
    //  * 构造函数
    //  */
    //  private $output_type = [
    //     "txt"=>["line_Separator"=>"\n","outline_separator"=>"\t","initial_depth"=> 0],
    //     "md"=>["line_Separator"=>"#","outline_separator"=>"\t","initial_depth"=> 1],
    // ];
    // private $line_Separator;//定义行分隔符
    // private $outline_separator;//定义大纲分隔符
    // private $initial_depth;//定义初始深度
    // private $brain_tree;//脑图树
    // private $file_path;//脑图文件地址

    public function __construct()
    {
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        // $this->code = app::load_cont_class('common','user');//加载token
        // $this->operation = app::load_service_class('operation_class','operation');//加载操作
        //todo 加载相关模块
        $this->tree = app::load_service_class('tree_class', 'course');//
    }
    public function database(){
        $data = app::load_service_class('tree_new', 'course')->out("leaf_list");//
        echo json_encode($data,true);die;
        $leaf_list = $data['leaf_list'];
        $tree_list = $data['tree_list'];
        array_shift($tree_list);
        // if($this->tree->add($leaf_list,$tree_list)){
        //     echo 1;
        // }else{
        //     echo 2;
        // };

    }
    public function a(){
        
        $tree_new_temp = app::load_text('list');
        var_dump($tree_new_temp);
    }
    public function edit_leaf(){
        $data = $this->tree->course->select(1);
        // $this->$
    }
    public function tree($items){
        foreach($items as $k){
            $list[$k['id']] = $k;
        }
        foreach($list as $item){
            if($item['parent_id']!=0){
                $list[$item['parent_id']]['child_list'][] = &$list[$item['id']];
            }else{
                $tree[] = &$list[$item['id']];
            }
        }
        return $tree;
    }
    public function out_json(){
        $this->json = app::load_model_class('json', 'course');
        $data = $this->json->select(1);
        echo json_encode($data,JSON_UNESCAPED_UNICODE);die;
    }
    public function out_json_type(){
        $this->json_type = app::load_model_class('json_type', 'course');
        $data = $this->json_type->select(1);
        $as = $this->tree($data);
        echo json_encode($as,JSON_UNESCAPED_UNICODE);die;
    }
    
}