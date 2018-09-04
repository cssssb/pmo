<?php
namespace user;
defined('IN_LION') or exit('No permission resources.');
final class form_input_component_frame{
    private 
    $id_name,
    $type_name,
    $key,
    $title,
    $tip,
    $add_button,
    $descript,
    $before_api_uri,
    $after_api_uri,
    $data;
    public function __construct(
        $id_name,
        $type_name,
        $key,
        $title,
        $tip,
        $add_button,
        $descript,
        $before_api_uri,
        $after_api_uri){
        $this->data=["id_name" => $id_name,
        "type_name" => $type_name, //input
        "key" =>$key,
        "title" => $title,
        "tip" => $tip,
        "add_button" => $add_button,
        "descript" => $descript,
        "before_api_uri" => $before_api_uri,
        "after_api_uri" => $after_api_ur];
    }
    public function out_data(){
        return $this->data;
    }
}