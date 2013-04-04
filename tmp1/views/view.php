<?php if ( !defined('FRONT_CONTROLLER')) exit('no direct access');
class View{
	//private $data = array();
	private $render = FALSE;

	//TODO : display page
	public function draw($assign) {
		
		$tpl = new RainTPL;

		//variable assign example
		$variable = "Hello World2!";
		$tpl->var = $assign;
		$html = $tpl->draw( $this->render, $return_string = true );
		echo $html;

	}
	
	public function __construct($template){

		$file = SERVER_ROOT_PRODUCT.'views/v_'.strtolower($template).'.html';
		if (file_exists($file)) {
			$this->render = SERVER_ROOT_PRODUCT.'views/v_'.strtolower($template);
		}
		else {
			die('no viewfile to render - no need to talk');
		}
	}
	
	/*
	public function assign($variable,$value){
		$this->data[$variable] = $value;
	}
	
	public function assign( $variable, $value = null ){
		if( is_array( $variable ) )
			$this->data = $variable + $this->data;
		else
			$this->data[ $variable ] = $value;
	}
	
	//get data to view
	public function getData(){
		return $this->data;
	}
	
	public function __destruct(){
		
		include ($this->render);
	}
	*/
}