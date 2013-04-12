<?php if ( !defined('FRONT_CONTROLLER')) exit('no direct access');

/**
 * module to get info about path , directory or filename
 * @author MinWoong Jo
 *
 */
Class M_path {
	
	/**
	 * get current file name
	 * @return current file name
	 */
	public function currentFile() {
		$query = $_SERVER['PHP_SELF'];
		$path = pathinfo( $query );
		return $path['basename'];
	}

	/**
	 * get current url
	 * @return current url
	 */
	public function currentURL() {
		$pageURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
		if ($_SERVER["SERVER_PORT"] != "80")
		{
		    $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} 
		else 
		{
		    $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		return $pageURL;
	}
}
