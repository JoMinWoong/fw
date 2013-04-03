<?php if ( !defined('FRONT_CONTROLLER')) exit('no direct access');
class View{
	private $data = array();
	private $render = FALSE;

	//TODO : display page
	public function draw() {
		/*
		$tpl = new RainTPL;
		//variable assign example
		$variable = "Hello World2!";
		$tpl->assign( "variable", $variable );
		$html = $tpl->draw( 'page', $return_string = true );
		echo $html;
		*/
	}
	
	public function __construct($template){
		$tpl = new RainTPL;
		$file = SERVER_ROOT_PRODUCT.'views/v_'.strtolower($template).EXE;
		if (file_exists($file)) {
			$this->render = $file;
		}
	}
	
	/*
	public function assign($variable,$value){
		$this->data[$variable] = $value;
	}
	*/
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
		$data = $this->data;
		include ($this->render);
	}
}