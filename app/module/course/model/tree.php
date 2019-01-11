<?php
namespace tree;
defined('IN_LION') or exit('No permission resources.');
use \app;
use \system\trees;
\app::load_sys_class('model',false);
/**
 * ================
 * @Author:    css
 * @ver:       1.0
 * @DataTime:  2019-01-07
 * @describe:  tree_tree model class
 * ================
 */
   class tree extends trees {
    private $id;
    private $name;
    private $parent_id;
    private $depth;
    private $is_leaf;
    private $child_list;
    public function __construct($id, $name, $parent_id, $depth=0, $is_leaf=1, $child_list=[])
    {
        $this->id = $id;
        $this->name = $name;
        $this->parent_id = $parent_id;
        $this->depth = $depth;
        $this->is_leaf = $is_leaf;
        $this->child_list = $child_list;
    }
    public function add_child($child_id)
    {
        $this->child_list[] = $child_id;
        $this->is_leaf = 0;
    }
    public function set_parent($parent_id)
    {
        $this->parent_id = $parent_id;
    }
    public function cut_leaf()
    {
        $child_list = $this->child_list;
        $this->child_list = [];
        $this->is_leaf = 0;
        return ["id" =>$this->id,"child_list"=>$child_list ];
    }
    public function to_array()
    {
        return [
            "id"=>$this->id,
            "id"=>$this->name,
            "id"=>$this->parent_id,
            "id"=>$this->depth,
            "id"=>$this->is_leaf,
            "id"=>$this->child_list,
        ];
    }
}