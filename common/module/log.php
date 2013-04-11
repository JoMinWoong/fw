<?php if ( !defined('FRONT_CONTROLLER')) exit('no direct access');

Class M_log { 
  // 
  const USER_ERROR_DIR = '/home/site/error_log/Site_User_errors.log'; 
  const GENERAL_ERROR_DIR = '/home/site/error_log/Site_General_errors.log'; 

    public function user($msg,$username) 
    { 
    	if (file_exists(self::USER_ERROR_DIR)) {
    		$date = date('d.m.Y h:i:s'); 
    		$log = $msg."   |  Date:  ".$date."  |  User:  ".$username."\n"; 
    		error_log($log, 3, self::USER_ERROR_DIR);
    	}
    } 
	
    public function test($str,$title){
    	echo $str.' : '.$title.'<br>';
    }
    
    public function general($msg,$title = null) 
    { 
    	echo "<br> >> $msg << <br>";
    	/*
    	if (file_exists(self::GENERAL_ERROR_DIR)) {
    		$date = date('d.m.Y h:i:s'); 
    		$log = $msg."   |  Date:  ".$date."\n";	
    		error_log($msg."   |  Tarih:  ".$date, 3, self::GENERAL_ERROR_DIR);
    	}
    	*/
    } 

} 

/*
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

    function general($msg,$title = null) 
    {
    	if (file_exists(GENERAL_ERROR_DIR)) {
    		$date = date('d.m.Y h:i:s'); 
    		$log = $msg."   |  Date:  ".$date."\n";	
    		error_log($msg."   |  Tarih:  ".$date, 3, self::GENERAL_ERROR_DIR);
    	}
    } 

*/



?>