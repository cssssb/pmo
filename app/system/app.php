<?php

/**
 * ================
 * @Author:    lion
 * @ver:       1.0
 * @DataTime:  2018-07-07
 * @describe:  框架入口
 * ================
 */
define('IN_LION', true);
// echo "load app";
// echo  microtime();
// echo "\n";
class app
{
    //初始化web应用
	public static function run()
	{
		self::load_controller();
	}
	public static function load_controller()
	{
		if (!empty($_GET['url'])) {
			$url = $_GET['url'];
			$url_array = explode("/", $url);
            // 获取模块名称
			$module = $url_array[0];
            // 获取控制器名
			array_shift($url_array);
			$controller_name = $url_array[0];
			if($controller_name != 'doc'){
			$controller = $controller_name . '_controller';}else{
				$controller = $controller_name;
			}
            // 获取动作名
			array_shift($url_array);
			$action = $url_array[0];
            // 获取参数
			array_shift($url_array);
			$queryString = empty($url_array) ? array() : $url_array;

            // 实例化控制器
			$path = MODULE_PATH . $module . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR;
			$filepath = $path . $controller . '.php';
			$namespace = $module;

			if (file_exists($filepath)) {
				include $filepath;
				$name = $namespace . '\\' . $controller;
				if (class_exists($name)) {
					$int = new $name;
					if ((int)method_exists($name, $action)) {
						call_user_func_array(array($int, $action), $queryString);
					}
				} else {
					exit('Controller does not exist.');
				}
			} else {
				exit('Controller does not exist.');
			}
		}
	}
	/**
	 * 加载控制器类
	 * @param string $classname 类名
	 * @param string $module 模块名称
	 */
	public static function load_cont_class($classname, $module){
		$path = MODULE_PATH . $module  . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR;
		$namespace = $module;
		return self::_load_class($classname.'_controller', $path, $namespace, true);
	}
	/**
	 * 加载模块类
	 * @param string $classname 类名
	 * @param string $module 模块名称
	 */
	public static function load_app_class($classname, $module)
	{
		$path = MODULE_PATH . $module . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR;
		$namespace = $module;
		return self::_load_class($classname, $path, $namespace, true);
	}

	/**
	 * 加载视图类
	 * @param string $classname 类名
	 * @param string $module 视图名称
	 */
	public static function load_view_class($classname, $module)
	{
		$path = MODULE_PATH . $module . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR;
		$namespace = $module;
		return self::_load_class($classname, $path, $namespace, true);
	}

	/**
	 * 加载服务类
	 * @param string $classname 类名
	 * @param string $module 服务名称
	 */
	public static function load_service_class($classname, $module)
	{
		$path = MODULE_PATH . $module . DIRECTORY_SEPARATOR . 'service' . DIRECTORY_SEPARATOR;
		$namespace = $module;
		return self::_load_class($classname, $path, $namespace, true);
	}

	/**
	 * 加载系统类
	 * @param string $classname 类名
	 */
	public static function load_sys_class($classname, $initialize = true)
	{
		return self::_load_class($classname, '', $namespace = 'system', $initialize);
	}

	/**
	 * 加载类文件函数
	 * @param string $classname 类名
	 * @param string $path 文件地址
	 * @param string $namespace 命名空间
	 * @param boolean $initialize 是否初始化
	 */
	private static function _load_class($classname, $path = '', $namespace = 'system', $initialize = true)
	{
		static $classes = array();
		if (empty($path)) {
			$path = SYSTEM_PATH . 'libs' . DIRECTORY_SEPARATOR;
		}
		$key = md5($path . $classname);
		if (isset($classes[$key])) {
			if (!empty($classes[$key])) {
				return $classes[$key];
			} else {
				return true;
			}
		}
		$filepath = $path . $classname . '.php';
		if (file_exists($filepath)) {
			include $filepath;
			$name = $namespace . '\\' . $classname;
			if ($initialize) {
				$classes[$key] = new $name;
			} else {
				$classes[$key] = true;
			}
			return $classes[$key];
		} else {
			return false;
		}
	}
	/**
	 * 加载配置文件
	 * @param string $file 配置文件
	 * @param string $key  要获取的配置荐
	 * @param string $default  默认配置。当获取配置项目失败时该值发生作用。
	 * @param boolean $reload 强制重新加载。
	 */
	// public static function load_config($file, $key = '', $default = '') {
	public static function load_config($file, $key='', $default='')
	{
		static $configs = array();
		if (isset($configs[$file])) {
			if (empty($key)) {
				return $configs[$file];
			} elseif (isset($configs[$file][$key])) {
				return $configs[$file][$key];
			} else {
				return $default;
			}
		}
		$path = CONFIG_PATH . DIRECTORY_SEPARATOR . $file . '.php';
		if (file_exists($path)) {
			$configs[$file] = include $path;
		}
		if (empty($key)) {
			return $configs[$file];
		} elseif (isset($configs[$file][$key])) {
			return $configs[$file][$key];
		} else {
			
			return $default;
		}
	}
}