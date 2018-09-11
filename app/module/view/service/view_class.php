<?php
namespace view;
defined('IN_LION') or exit('No permission resources.');

final class view_class{
    public function __construct() {
        $this->component = \app::load_app_class('view_component','view');
        $this->page = \app::load_app_class('view_page','view');
    }

    public function view_out($where=''){
        $data = $this->component->select($where);
        return $data;
    }
}