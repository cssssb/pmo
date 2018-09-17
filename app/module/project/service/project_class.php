<?php
namespace project;

defined('IN_LION') or exit('No permission resources.');

final class project_class
{
	public function __construct()
	{
		$this->model = \app::load_app_class('project', 'project');

	}
/**
 * ================
 * @Function:     addProject
 * @Parameter:    
 * @DataTime:     2018-09-17
 * @Return:       bool
 * @Notes:        添加项目
 * @ErrorReason:  null
 * ================
 */
    public function add_project($data){
        return $this->model->insert($data);
    }
}