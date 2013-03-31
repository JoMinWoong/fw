<?php
define('FRONT_CONTROLLER','index.php');
define('SERVER_ROOT',str_replace(FRONT_CONTROLLER, '', $_SERVER[SCRIPT_FILENAME]));
define('SITE_ROOT','sv2.sctv-test.net');
define('EXE','.php');

define('ENVIRONMENT', 'development');

if (defined('ENVIRONMENT')) {
	switch (ENVIRONMENT){
		case 'development':
			error_reporting(E_ALL);
			ini_set('display_errors','On');
			break;
		default: //production
			error_reporting(0);
			break;
	}
}



//include the RainTPL class
include 'common/raintpl-master/inc/rain.tpl.class.php';

raintpl::configure("base_url", null );
raintpl::configure("tpl_dir", "common/raintpl-master/tpl/" );
raintpl::configure("cache_dir", "common/raintpl-master/tmp/" );

require_once (SERVER_ROOT.'/common/router.php');