<?php
namespace course;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');

/**
 * ================
 * @Author:    css
 * @ver:       
 * @DataTime:  2019-01-07
 * @describe:  course_tree service class
 * ================
 */
final class tree_class
{
    public function __construct()
    {
        $this->course_type = app::load_model_class('course_type', 'course');
        $this->course = app::load_model_class('course', 'course');
    }
    public function add($leaf_list,$tree_list){
        foreach($leaf_list as $k){
            $this->course->insert($k);
        }
        foreach($tree_list as $k){
            $this->course_type->insert($k);
        }
        return true;
    }
}