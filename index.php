<?php
define('FRONT_CONTROLLER',pathinfo(__FILE__, PATHINFO_BASENAME));
define('SERVER_ROOT',str_replace(FRONT_CONTROLLER, '', $_SERVER[SCRIPT_FILENAME]));
define('SITE_ROOT','sv2.sctv-test.net');
define('EXE','.php');
define('ENVIRONMENT', 'development');
require_once (SERVER_ROOT.'/common/library/common.php');
if (defined('ENVIRONMENT')) {
	
	switch (ENVIRONMENT){//TODO cash off 
		case 'development':
			function print_sl($str,$title = null){echo '<br> ['	.$title.' >> '.$str.' ]<br>';};
			function print_vd($obj,$title = null){ $t = ($title)?$title:rand();echo '<br>-------------start< '.$t.','.__FILE__.' : '.__LINE__.' >------------<br>'; var_dump($obj); echo '<br>-------------end< '.$t.' >------------<br>';};
			function print_d($str,$title = null){echo '<br> ['.$title.' >die> '.$str.' ]';die();};
			error_reporting(E_ALL);
			ini_set('display_errors','on');
			break;
		case 'getsysdata':
			
			//TODO : create array of library instances
			function print_sl($str,$title = null){getClass('log','module')->general($str,$title); };
			function print_vd($obj,$title = null){getClass('log','module')->general($obj,$title); };
			function print_d($str,$title = null){getClass('log','module')->general($str,$title); };
			error_reporting(E_ALL);
			ini_set('display_errors','on');
			break;
		default: //release mode
			function print_sl($str,$title = null){return false;};
			function print_vd($obj,$title = null){return false;};
			function print_d($str,$title = null){return false;};
			error_reporting(0);
			ini_set('display_errors','off');
			break;
	}
}

require_once (SERVER_ROOT.'/common/router.php');