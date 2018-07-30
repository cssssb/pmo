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

class app{
    //初始化web应用
    public static function run() {
        self::load_controller();
    }
    public static function load_controller() {
        if (!empty($_GET['url'])){
            $url = $_GET['url'];
            $url_array = explode("/",$url);
            // 获取模块名称
            $module = $url_array[0];
            // 获取控制器名
            $controller_name = $url_array[1];
            $controller = $controller_name . '_controller';
             // 获取动作名
            $action = $url_array[2];
            // 实例化控制器
            
            $int = new $controller($controller_name, $action);
            // 如果控制器存和动作存在，这调用并传入URL参数
            if ((int)method_exists($controller, $action)) {
                call_user_func_array(array($int, $action), $queryString);
            } else {
                exit($controller . "控制器不存在");
            }
        }
    }

    /**
	 * 加载模块类
	 * @param string $classname 类名
	 * @param string $module 模块名称
	 */    
    public static function load_app_class($classname,$module){
        $path = MODULE_PATH.$module.DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR;
        $namespace = $module;        
        return self::_load_class($classname,$path,$namespace, true);
    }

    /**
	 * 加载系统类
	 * @param string $classname 类名
	 */
    public static function load_sys_class($classname){
        return self::_load_class($classname);
    }

    /**
	 * 加载类文件函数
	 * @param string $classname 类名
	 * @param string $path 文件地址
	 * @param string $namespace 命名空间
	 * @param boolean $initialize 是否初始化
	 */
	private static function _load_class($classname, $path = '',$namespace='system', $initialize = true) {
		static $classes = array();
        if (empty($path)){
            $path = SYSTEM_PATH.'libs'.DIRECTORY_SEPARATOR;
        }
		$key = md5($path.$classname);
		if (isset($classes[$key])) {
			if (!empty($classes[$key])) {
				return $classes[$key];
			} else {
				return true;
			}
        }
        $filepath=$path.$classname.'.php';
		if (file_exists($filepath)) {
			include $filepath;
			$name = $namespace.'\\'.$classname;
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
}