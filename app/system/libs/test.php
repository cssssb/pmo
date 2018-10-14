<?php
namespace system;

defined('IN_LION') or exit('No permission resources.');
final class test
{
    public $count;
    //测试计数
    public function __construct()
    {        
        $this->data = app::load_sys_class('protocol');//加载json数据模板
        $this->count=0;
    }

    //增加测试
    final public function add_test($name, $is)
    {
        if ($is) {
            $this->data->add_data($this->count." - V - 测试 $name 成功", $is);
        } else {
            $this->data->add_data($this->count." - X - 测试 $name 失败", $is);
        }
        $this->count++;
    }//输出测试
    final public function out_test()
    {
        $this->data->set_code(1002);
        $this->data->output();
    }
}
