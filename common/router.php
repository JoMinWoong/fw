<?php if ( !defined('FRONT_CONTROLLER')) exit('no direct access');

/**
 * This method is invoked each time a class is used which has not yet been define
 * @param string $className
 */
function __autoload($className){

	list($filename,$suffix) = explode('_', $className);
	
	if ($suffix == 'View') {
		$file = SERVER_ROOT_PRODUCT.'view/v_'.strtolower($filename).EXE;
	}
	else if ($className == 'View') {
		$file = SERVER_ROOT_PRODUCT.'view/'.strtolower($className).EXE;
	}
/*
	list($filename,$suffix) = explode('_', $className);

	if ($suffix == 'Model') {
		$file = SERVER_ROOT_PRODUCT.'model/m_'.strtolower($filename).EXE;
	}
	elseif ($suffix == 'View') {
		$file = SERVER_ROOT_PRODUCT.'view/v_'.strtolower($filename).EXE;
	}
	elseif ($className == 'View') {
		$file = SERVER_ROOT_PRODUCT.'view/'.strtolower($filename).EXE;
	}
	elseif ($suffix == 'Controller') {
		$file = SERVER_ROOT_PRODUCT.'controller/c_'.strtolower($filename).EXE;
	}
	else {
		$file = SERVER_ROOT_PRODUCT.'common/'.strtolower($filename).EXE;
	}
	if (file_exists($file)) {
		require_once ($file);
	}
*/
	if (@file_exists($file) && !@class_exists($className)) {
		require_once ($file);
	}
	else {
		//die($file.' << no file to autoload: - what the fuck??');
	}
}

//fetch the passed request
$request = $_SERVER['QUERY_STRING'];

//parse the page request and other GET variables
$parsed = explode('&', $request);

//page
$product = array_shift($parsed);
define('SERVER_ROOT_PRODUCT', SERVER_ROOT.$product.'/');
if (!$product || !file_exists(SERVER_ROOT_PRODUCT)) {
	//TODO: view login page rendered by template engine
	include (SERVER_ROOT.'/common/view/login.php');
	exit;
}

//include the RainTPL class
include 'common/raintpl-master/inc/rain.tpl.class.php';
raintpl::configure('base_url', null );

raintpl::configure('tpl_dir', SERVER_ROOT_PRODUCT.'view/tpl/' );
raintpl::configure('cache_dir', SERVER_ROOT_PRODUCT.'view/tmp/' );

//parse parameters out into $getVars
$getVars = array();
foreach ($parsed as $argument) {
	list($valuable,$value)=explode('=', $argument);
	
	$getVars[$valuable] = $value;
}

$controller_name = ($getVars['c'])?$getVars['c']:'';
//path to the file
$target = SERVER_ROOT_PRODUCT.'controller/c_'.$controller_name.EXE;

//get target
if (file_exists($target)){
	include_once ($target);
	
	$class = ucfirst($controller_name).'_Controller';
	if (class_exists($class)) {
		$controller = new $class;
	}
	else {
		$m_path =& getClass('path','module');
		die('no class - get the fuck out > '.$m_path->currentFile());
	}
}
else{
	$m_path =& getClass('path','module');
	die('no page - get the fuck out > '.$m_path->currentFile());
}

$controller->main($getVars);