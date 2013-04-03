<?php if ( !defined('FRONT_CONTROLLER')) exit('no direct access');

function __autoload($className){
	list($filename,$suffix) = explode('_', $className);
	if ($suffix == 'Model') {
		$file = SERVER_ROOT_PRODUCT.'models/m_'.strtolower($filename).EXE;
	}
	elseif ($suffix == 'View') {
		$file = SERVER_ROOT_PRODUCT.'views/v_'.strtolower($filename).EXE;
	}
	elseif ($className == 'View') {
		$file = SERVER_ROOT_PRODUCT.'views/'.strtolower($filename).EXE;
	}
	elseif ($suffix == 'Controller') {
		$file = SERVER_ROOT_PRODUCT.'controllers/c_'.strtolower($filename).EXE;
	}
	else {
		$file = SERVER_ROOT_PRODUCT.'common/'.strtolower($filename).EXE;
	}
	if (file_exists($file)) {
		include_once ($file);
	}
	else {
		die($file.' << no file to autoload: - what the fuck??');
	}
}

//fetch the passed request
$request = $_SERVER['QUERY_STRING'];

//parse the page request and other GET variables
$parsed = explode('&', $request);
//var_dump($parsed);
//echo '<br>';
//page
$product = array_shift($parsed);
define('SERVER_ROOT_PRODUCT', SERVER_ROOT.$product.'/');
//parse parameters out into $getVars
$getVars = array();
foreach ($parsed as $argument) {
	list($valuable,$value)=explode('=', $argument);
	
	$getVars[$valuable] = $value;
}

//path to the file
$target = SERVER_ROOT_PRODUCT.'controllers/c_'.$getVars['c'].EXE;

//get target
if (file_exists($target)){
	include_once ($target);
	
	$class = ucfirst($getVars['c']).'_Controller';
	if (class_exists($class)) {
		$controller = new $class;
	}
	else {
		die('no class - get the fuck out');
	}
}
else{
	die('no page - get the fuck out');
}

$controller->main($getVars);