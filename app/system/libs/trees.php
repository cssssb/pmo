<?php
/**
 *  db_factory.class.php 数据库工厂类
 *
 * @copyright			(C) 2005-2015 PHPCMS
 * @license				http://www.phpcms.cn/license/
 * @lastmodify			2015-02-10
 */
namespace system;

defined('IN_LION') or exit('No permission resources.');

final class tress {
    private $tree_list;//数组键值对列表
    private $tree_point_list;//对象列表
    /**
     * __construct
     * 依赖 tree_point 类
     *
     * @param  mixed $tree_list 树列表二维数组，需要有id,parent_id
     *
     * @return void
     */
    public function __construct($tree_list)
    {
        $this->create_tree($tree_list);
        $this->label_leaf();
        $this->tree_point_list = [];
    }
    /**
     * out_tree
     * 依赖对象属性 $this->tree_list 树列表
     * @return array 返回树形数组
     */
    public function add_point($id, $name, $parent_id, $depth=0, $is_leaf=1, $child_list=[])
    {
        $this->tree_point_list[] = new tree_point($id, $name, $parent_id, $depth=0, $is_leaf=1, $child_list=[]);
    }
    private function create_tree($tree_list)
    {
        $root_parent_id = -1;
        $return_id = 0;
        foreach ($tree_list as $k) {
            $this->tree_list[$k['id']] = $k;
            $this->tree_list[$k['id']]['child_list'] = [];
        }
        foreach ($this->tree_list as $item) {
            if ($item['parent_id']!=$root_parent_id) {
                $this->tree_list[$item['parent_id']]['child_list'][] = &$this->tree_list[$item['id']];
            }
        }
    }
    public function out_tree($return_id = 0){
        return $this->tree_list[$return_id]['child_list'];
    }
    public function out_tree_list()
    {
        return $this->tree_list;
    }
    public function label_leaf()
    {
        //标记叶子
        foreach ($this->tree_list as $k=>$value){
            if(empty($this->tree_list["$k"]['child_list'])){
                $this->tree_list["$k"]['is_leaf'] = 1;
            }else{
                $this->tree_list["$k"]['is_leaf'] = 0;
            }
        }
    }
    public function creat_leaf_list()
    {
        $leaf_list = [];
        $tree_list = [];
        //剪除叶子
        foreach ($this->tree_list as $k=>$value){
            unset($value['child_list']);
            if(empty($this->tree_list["$k"]['child_list'])){
                $leaf_list[]=$value;
                unset($tree_list["$k"]); 
            }else{
                $tree_list["$k"] = $value;
            }
        }
        return ["tree_list"=>$tree_list,"leaf_list"=>$leaf_list];
    }
}
?>