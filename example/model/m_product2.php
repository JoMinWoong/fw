<?php if ( !defined('FRONT_CONTROLLER')) exit('no direct access');
class Product2_Model{
	private $var = array();
	function getData($p_queryData){

		$info = array( 'title'=>'this is page title', 'head' => 'this is header', 'copyright' => 'this is footer' );
		$this->assign( $info );
		global $global_variable;
		$global_variable = 'display what you want';
		return $this->var;
	}

	function assign( $variable, $value = null ){
		if( is_array( $variable ) )
			$this->var = $variable + $this->var;
		else
			$this->var[ $variable ] = $value;
	}
}