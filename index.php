<?php
define('FRONT_CONTROLLER','index.php');
define('SERVER_ROOT',str_replace(FRONT_CONTROLLER, '', $_SERVER[SCRIPT_FILENAME]));
define('SITE_ROOT','sv2.sctv-test.net');
define('EXE','.php');

//TODO : change mode by domain
ini_set('display_errors','On');

require_once (SERVER_ROOT.'controllers/router.php');