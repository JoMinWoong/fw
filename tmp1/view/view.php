<?php if ( !defined('FRONT_CONTROLLER')) exit('no direct access');
class View{
	//private $data = array();
	private $render = FALSE;

	//TODO : display page
	public function draw($assign) {
		$tpl = new RainTPL;
		$tpl->var = $assign;
		$html = $tpl->draw( $this->render, $return_string = true );
		echo $html;

	}

	public function __construct($template){

		$file = SERVER_ROOT_PRODUCT.'view/v_'.strtolower($template).'.html';
		if (file_exists($file)) {
			$this->render = SERVER_ROOT_PRODUCT.'view/v_'.strtolower($template);
		}
		else {
			die('no viewfile to render - no need to talk');
		}
	}
}