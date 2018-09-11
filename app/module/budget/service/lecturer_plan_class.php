<?php
namespace budget;
defined('IN_LION') or exit('No permission resources.');

final class lecturer_plan_class{
    public function __construct() {
		$this->model = \app::load_app_class('lecturer_plan','budget');
	
    }

}