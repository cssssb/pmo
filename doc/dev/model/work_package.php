<?php
abstract class Workpack {
    private $id ,$workpack_name ,$workpack_code;
    function __construct($id,$workpack_name,$package_code){
        $this->id = $id;
        $this->workpack_name = $workpack_name;
        $this->workpack_code = $workpack_code;

    }
}