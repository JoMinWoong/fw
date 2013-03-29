<?php if ( !defined('FRONT_CONTROLLER')) exit('no direct access');
class View_Model{
	private $data = array();
	private $render = FALSE;
	
	public function __construct($template){
		$file = SERVER_ROOT_PRODUCT.'/views/'.strtolower($template).EXE;
		if (file_exists($file)) {
			$this->render = $file;
		}
	}
	
	public function assign($variable,$value){
		$this->data[$variable] = $value;
	}
	
	public function __destruct(){
		$data = $this->data;
		include ($this->render);
	}
}