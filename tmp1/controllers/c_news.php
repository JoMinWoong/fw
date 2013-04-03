<?php if ( !defined('FRONT_CONTROLLER')) exit('no direct access');
class News_Controller{
	public $template = 'news';

	public function main(array $getVars){

		$newsModel = new News_Model;
		$article = $newsModel->get_article($getVars['article']);
		
		$view = new View($this->template);
		$view->assign('title',	$article['title']);
		$view->assign('content', $article['content']);
	}
}