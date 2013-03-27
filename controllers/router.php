<?php if ( !defined('FRONT_CONTROLLER')) exit('no direct access');
//This function 'overloads' the autoload functionality built into PHP. Basically, 
//this 'magic function' allows us to intercept the action that PHP takes when we try to instantiate a class that does not exist.
function __autoload($className){
	list($filename,$suffix) = split('_', $className);
	$file = SERVER_ROOT.'/models/'.strtolower($filename).EXE;
	if (file_exists($file)) {
		include_once ($file);
	}
	else {
		die('no file you called in models: - what the fuck??');
	}
}

//fetch the passed request
$request = $_SERVER['QUERY_STRING'];

//parse the page request and other GET variables
$parsed = explode('&', $request);
//var_dump($parsed);
//echo '<br>';
//page
$page = array_shift($parsed);

//parse parameters out into $getVars
$getVars = array();
foreach ($parsed as $argument) {
	list($valuable,$value)=split('=', $argument);
	$getVars[$valuable] = $value;
}
/*
print "page : $page <br>";
$vars = print_r($getVars,TRUE);
print "get :<pre>$vars</pre>";
*/
//path to the file
$target = SERVER_ROOT.'controllers/'.$page.EXE;

//get target
if (file_exists($target)){
	include_once ($target);
	
	$class = ucfirst($page).'_Controller';
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

