<?php if ( !defined('FRONT_CONTROLLER')) exit('no direct access');

if (!function_exists('getClass')) {
	
	function &getClass($class,$directory = 'module'){
		static $classes = array();
		if ($directory == 'module') {
			$class_name = 'M_'.$class;
			$class_file = SERVER_ROOT.'common/'.$directory.'/'.$class.EXE;
		}
		else if ($directory == 'library') {
			$class_name = 'L_'.$class;
			$class_file = SERVER_ROOT.'common/'.$directory.'/'.$class.EXE;
		}
		else if ($directory == 'model') {
			$class_name = ucfirst($class).'_Model';
			$class_file = SERVER_ROOT_PRODUCT.$directory.'/m_'.$class.EXE;
		}
		else if ($directory == 'controller') {
			$class_name = ucfirst($class).'_Controller';
			$class_file = SERVER_ROOT_PRODUCT.$directory.'/c_'.$class.EXE;
		}
		else {
			$class_name = $class;
		}
		if (isset($classes[$class_name])) {
			return $classes[$class_name];
		}
		if (file_exists($class_file)) {
			if (!class_exists($class_name)) require_once ($class_file);
		}
		else {
			die('no class file - get the fuck out of here');
		}

		$classes[$class_name] = new $class_name();
		return $classes[$class_name];
		
	}
}
