<?php if ( !defined('FRONT_CONTROLLER')) exit('no direct access');
class News_Model{
	private $var = array();
	function getData($p_queryData){
		
		//variable assign example
		$variable = 'Hello '.$p_queryData;
		$this->assign( 'variable', $variable );
	
		//loop example
		$week = array( 'Monday', 'Tuersday', 'Wednesday', 'Friday', 'Saturday', 'Sunday' );
		$this->assign( "week", $week );
	
		//loop example 2
		$user = array(  array( 'name'=>'Jupiter', 'color'=>'yellow'),
						array( 'name'=>'Mars', 'color'=>'red' ),
						array( 'name'=>'Earth', 'color'=>'blue' ),
		);
		$this->assign( "user", $user );
	
		//loop example with empty array
		$this->assign( "empty_array", array() );
	
		$info = array( 'title'=>'Rain TPL Example', 'copyright' => 'Copyright 2006 - 2011 Rain TPL<br>Project By Rain Team' );
	
		$this->assign( $info );
	
		global $global_variable;
		$global_variable = 'This is a global variable';
		return $this->var;
	}

	function assign( $variable, $value = null ){
		if( is_array( $variable ) )
			$this->var = $variable + $this->var;
		else
			$this->var[ $variable ] = $value;
	}
}