<?php if ( !defined('FRONT_CONTROLLER')) exit('no direct access');
class News_Controller{
	public $template = 'news';

	public function main(array $getVars){
		$newsModel = new News_Model;
		$view = new View($this->template);

		$article = $newsModel->getData($getVars['article']);
		$article['product'] = $this->template;
		$view->draw($article);
	}
}