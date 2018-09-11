<?php
namespace user;
defined('IN_LION') or exit('No permission resources.');

final class travel_plan_class{
    public function __construct() {
		$this->model = \app::load_app_class('travel_plan','user');
		$this->province = \app::load_app_class('province_cost','user');
		$this->city = \app::load_app_class('city_cost','user');
		$this->stay = \app::load_app_class('stay_cost','user');
	
		}
}
