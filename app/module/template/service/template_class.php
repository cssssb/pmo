<?php
namespace template;

defined('IN_LION') or exit('No permission resources.');

final class template_class
{
	public function __construct()
	{
		$this->model = \app::load_model_class('template', 'template');
	}

}