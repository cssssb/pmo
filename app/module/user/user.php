<?php
namespace user;
defined('IN_LION') or exit('No permission resources.');
// $a = new user;
// echo 1;
class user{
	/**
	 * 构造函数
	 */
	public function __construct() {
        echo 'login';
         var_dump('123');

	}
	public function check(){
        echo "check";
        // return $this->check();
    }
    
}

// return $a->check();
// $a = new user;
// echo $_GET['m'];
if($_GET['m']='check'){
    $a->check();
    // echo 1234657984568;
}

