<?php
namespace user;
defined('IN_LION') or exit('No permission resources.');
final class form_input_component{
    //view 的input返回
        private $data,$form,$sql,$before_api_uri,$after_api_uri;
        public function __construct(){
		$data = \app::load_view_class('form_input_component_frame','user');

            $proto = new form_input_component_frame($data);
        }
        public function output($data){
            return $proto->out;
        }
}