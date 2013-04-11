<?php if ( !defined('FRONT_CONTROLLER')) exit('no direct access');

if (!function_exists('getClass')) {
	
	function &getClass($class,$directory = 'module'){

		static $classes = array();
		if ($directory == 'module') {
			$class_name = 'M_'.$class;
		}
		else {
			$class_name = $class;
		}
		if (isset($classes[$class_name])) {
			return $classes[$class_name];
		}
		if (file_exists(SERVER_ROOT.'common/'.$directory.'/'.$class.EXE)) {
			if (!class_exists($class_name)) require_once (SERVER_ROOT.'common/'.$directory.'/'.$class.EXE);
		}
		else {
			die('no class file - get the fuck out of here');
		}

		$classes[$class_name] = new $class_name();
		var_dump($classes[$class_name]->general());
		return $classes[$class_name];
		
	}
}
