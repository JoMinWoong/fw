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
			function print_sl($str,$title = null){echo '<br> ['.$title.' >> '.$str.' ]<br>';};
			function print_vd($obj,$title = null){ $t = ($title)?$title:rand();echo '<br>-------------start< '.$t.' >------------<br>'; var_dump($obj); echo '<br>-------------end< '.$t.' >------------<br>';};
			function print_d($str,$title = null){echo '<br> ['.$title.' >die> '.$str.' ]';die();};
			error_reporting(E_ALL);
			ini_set('display_errors','on');
			break;
		case 'getsysdata':
			
			//TODO : create array of library instances
			function print_sl($str,$title = null){$m_log =& getClass('log','module'); };
			function print_vd($obj,$title = null){$m_log =& getClass('log','module'); };
			function print_d($str,$title = null){$m_log =& getClass('log','module'); };
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


/*
//include the RainTPL class
include 'common/raintpl-master/inc/rain.tpl.class.php';

raintpl::configure("base_url", null );
raintpl::configure("tpl_dir", "common/raintpl-master/tpl/" );
raintpl::configure("cache_dir", "common/raintpl-master/tmp/" );
*/
require_once (SERVER_ROOT.'/common/router.php');