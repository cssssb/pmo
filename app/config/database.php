<?php
defined('IN_LION') or exit('No permission resources.');
return array(
	'default2' => array(
		'hostname' => 'localhost',
		'port' => 3306,
		'database' => 'pmo_c',
		'username' => 'root',
		'password' => 'root',
		'tablepre' => 'pmo_',
		'charset' => 'utf8',
		'type' => 'mysqli',
		'debug' => true,
		'pconnect' => 0,
		'autoconnect' => 0
	),
	'default' => array(
		'hostname' => 'localhost',
		'port' => 3306,
		'database' => 'pmo_c',
		'username' => 'root',
		'password' => 'root',
		'tablepre' => 'pmo_',
		'charset' => 'utf8',
		'type' => 'mysqli',
		'debug' => true,
		'pconnect' => 0,
		'autoconnect' => 0
	),
	'course' => array(
		'hostname' => 'localhost',
		'port' => 3306,
		'database' => 'pmo_c',
		'username' => 'root',
		'password' => 'root',
		'tablepre' => 'erp_',
		'charset' => 'utf8',
		'type' => 'mysqli',
		'debug' => true,
		'pconnect' => 0,
		'autoconnect' => 0
	),
	'activity' => array(
		'hostname' => 'localhost',
		'port' => 3306,
		'database' => 'aliyuncsi',
		'username' => 'root',
		'password' => 'root',
		'tablepre' => 'v9_',
		'charset' => 'utf8',
		'type' => 'mysqli',
		'debug' => true,
		'pconnect' => 0,
		'autoconnect' => 0
	),
);