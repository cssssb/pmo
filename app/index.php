<?php
/**
 * ================
 * @Author:    lion
 * @ver:       1.0
 * @DataTime:  2018-07-07
 * @describe:  系统入口
 * ================
 */

define('ROOT_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR);

include LION.'/system/app.php';

app::creat_app();

?>