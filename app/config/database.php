<?php
defined('IN_LION') or exit('No permission resources.');
return array(
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
	'default2' => array(
		'hostname' => '192.168.4.41',
		'port' => 3306,
		'database' => 'pmo',
		'username' => 'root',
		'password' => '123456',
		'tablepre' => 'pmo_',
		'charset' => 'utf8',
		'type' => 'mysqli',
		'debug' => true,
		'pconnect' => 0,
		'autoconnect' => 0
	),
);