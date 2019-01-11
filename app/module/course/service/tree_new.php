<?php
namespace course;

//namespace 模块名
use \app;

defined('IN_LION') or exit('No permission resources.');
class tree_new
{
    private $file_path;//脑图文件地址
    private $output_type = [
        "txt"=>["line_Separator"=>"\n","outline_separator"=>"\t","initial_depth"=> 0],
        "md"=>["line_Separator"=>"#","outline_separator"=>"\t","initial_depth"=> 1],
    ];
    private $line_Separator;//定义行分隔符
    private $outline_separator;//定义大纲分隔符
    private $initial_depth;//定义初始深度
    private $brain_tree;//脑图树

    /**
     * __construct 构造脑图
     *
     * @param  mixed $file_path 脑图文件地址
     * @param  mixed $file_type 脑图类型 | txt | md
     *
     * @return void
     */

    public function __construct($file_path='list.txt', $file_type="txt")
    {
        $this->file_path = $file_path;
        $this->line_Separator = $this->output_type["$file_type"]["line_Separator"];
        $this->outline_separator = $this->output_type["$file_type"]["outline_separator"];
        $this->initial_depth = $this->output_type["$file_type"]["initial_depth"];
        //读取脑图文件
        $tree_new_temp = app::load_text('list');
        // $tree_new_temp = file_exists($file_path)?file_get_contents($file_path):"";
        //按行拆分
        $brain_map_initial_array = explode($this->line_Separator, $tree_new_temp);
        //获得深度和parent_id
        $brain_tree_list = $this->create_tree_list($brain_map_initial_array);
        //去除根节点
        // array_shift($brain_tree_list);
        //创建树对象
        $this->brain_tree = new tree($brain_tree_list);
    }
    /**
     * create_tree_list
     *
     * @param  mixed $brain_map_initial_array 包含大纲结构字符的脑图列表
     *
     * @return array $包含父节点id的脑图列表
     */
    private function create_tree_list($brain_map_initial_array)
    {
        $this_line_id = 0;
        $this_line_depth = 0;
        $previous_line_id = 0;
        $previous_line_depth = 0;
        $current_parent_id = -1;
        $parent_id_stack = [-1];
        $brain_tree_list = [];
        foreach ($brain_map_initial_array as $key => $value) {
            $this_line_id = $key;
            $this_line_depth = $this->get_depth($value);
            if ($this_line_depth == $previous_line_depth) {
                // 如果深度相等
            } elseif ($this_line_depth > $previous_line_depth) {
                //如果深度变深
                $parent_id_stack[] = $previous_line_id;
                $current_parent_id = end($parent_id_stack);
            } else {
                //如果深度变浅
                $return_depth = $previous_line_depth - $this_line_depth;//获取返回的层数
                for ($i=0; $i < $return_depth; $i++) {
                    array_pop($parent_id_stack);
                }
                $current_parent_id = end($parent_id_stack);
            };
            $brain_tree_list[] = ["id"=>"$this_line_id","name"=>str_replace("$this->outline_separator", "", $value),"depth"=>$this_line_depth,"parent_id"=>$current_parent_id];
            $previous_line_depth = $this_line_depth;
            $previous_line_id = $this_line_id;
        }
        return $brain_tree_list;
    }
    /**
     * get_depth 获得深度
     * 依赖对象属性 $this->outline_separator 大纲分隔符
     * @param  mixed $line_content 包含大纲结构字符的脑图数据行
     *
     * @return int 深度
     */
    private function get_depth($line_content)
    {
        //获取深度
        return substr_count($line_content, $this->outline_separator) - $this->initial_depth;
    }

    /**
     * out
     *
     * @param  mixed $type 输出类型 | tree_list | tree
     * @param  mixed $format 输出数据格式 默认返回，不输出 | json输出 | print_r输出 | var_dump输出
     *
     * @return array 树 或 树列表
     */
    public function out($type="tree_list", $format = "return")
    {
        switch ($type) {
            case 'tree'://返回树形结构
                return $this->out_by($this->brain_tree->out_tree(), $format);
                break;
            case 'tree_list'://返回列表
                return $this->out_by($this->brain_tree->out_tree_list(), $format);
                break;
            case 'leaf_list'://返回列表
                return $this->out_by($this->brain_tree->creat_leaf_list(), $format);
                break;
            default://默认返回列表
                return $this->out_by($this->brain_tree->out_tree_list(), $format);
                break;
        }
    }
    /**
     * out_by  输出或返回数组
     *
     * @param  mixed $data 数据
     * @param  mixed $format json | print_r | var_dump | return
     *
     * @return array
     */
    private function out_by($data, $format)
    {
        //@param 输出类型
        switch ($format) {
            case 'json':
                header('Content-type: application/json; charset=UTF-8');
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
                break;
            case 'print_r':
                print_r($data);
                break;
            case 'var_dump':
                var_dump($data);
                break;
            default:
                return $data;
                break;
        }
    }
}

class tree_point
{
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
        return ['id' =>$this->id,"child_list"=>$child_list ];
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
class tree
{
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
    public function add_point(int $id, $name, $parent_id, $depth=0, $is_leaf=1, $child_list=[])
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