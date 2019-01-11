<?php
/**
 * ================
 * @Author:    lion
 * @ver:       1.0
 * @DataTime:  2018-07-07
 * @describe:  系统入口
 * ================
 */
//定义目录
define('ROOT_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR);
define('SYSTEM_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR."system".DIRECTORY_SEPARATOR);
define('CONFIG_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR."config".DIRECTORY_SEPARATOR);
define('MODULE_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR."module".DIRECTORY_SEPARATOR);
define('TEXT_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR."text".DIRECTORY_SEPARATOR);

//开启调试模式
define('SYSTEM_DEBUG',true);
//加载框架
require SYSTEM_PATH.'app.php';

app::run();