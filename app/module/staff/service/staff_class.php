<?php
namespace staff;

defined('IN_LION') or exit('No permission resources.');

final class staff_class
{
	public function __construct()
	{
		$this->model = \app::load_model_class('staff', 'staff');
	}

}