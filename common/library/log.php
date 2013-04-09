<?php if ( !defined('FRONT_CONTROLLER')) exit('no direct access');
define('USER_ERROR_DIR', '/home/site/error_log/Site_User_errors.log');
define('GENERAL_ERROR_DIR', '/home/site/error_log/Site_General_errors.log'); 
 function user($msg,$username) 
    { 
    	if (file_exists(USER_ERROR_DIR)) {
    		$date = date('d.m.Y h:i:s'); 
    		$log = $msg."   |  Date:  ".$date."  |  User:  ".$username."\n"; 
    		error_log($log, 3, self::USER_ERROR_DIR);
    	}
    } 
  /* 
   General Errors... 
  */ 
    function general($msg,$title = null) 
    {
    	if (file_exists(GENERAL_ERROR_DIR)) {
    		$date = date('d.m.Y h:i:s'); 
    		$log = $msg."   |  Date:  ".$date."\n";	
    		error_log($msg."   |  Tarih:  ".$date, 3, self::GENERAL_ERROR_DIR);
    	}
    } 

/*
Class Log { 
  // 
  const USER_ERROR_DIR = '/home/site/error_log/Site_User_errors.log'; 
  const GENERAL_ERROR_DIR = '/home/site/error_log/Site_General_errors.log'; 

  
  	public function __construct(){
  		echo "test<br>";
  	}
    public function user($msg,$username) 
    { 
    	if (file_exists(self::USER_ERROR_DIR)) {
    		$date = date('d.m.Y h:i:s'); 
    		$log = $msg."   |  Date:  ".$date."  |  User:  ".$username."\n"; 
    		error_log($log, 3, self::USER_ERROR_DIR);
    	}
    } 

    public function general($msg,$title = null) 
    { 
    	if (file_exists(self::GENERAL_ERROR_DIR)) {
    		$date = date('d.m.Y h:i:s'); 
    		$log = $msg."   |  Date:  ".$date."\n";	
    		error_log($msg."   |  Tarih:  ".$date, 3, self::GENERAL_ERROR_DIR);
    	}
    } 

} 
*/
/*
$log = new log(); 
$log->user($msg,$username); //use for user errors
*/  
?>