<?php if ( !defined('FRONT_CONTROLLER')) exit('no direct access');
class News_Controller{
	public $template = 'news';

	public function main(array $getVars){
		//$newsModel = new News_Model;
		$newsModel = getClass('news','model');
		//getClass('news','model');
		$view = new View($this->template);
		
		$article = $newsModel->getData($getVars['article']);
		//TODO
		print_vd($article);
		$article['product'] = $this->template;
		//$article( "product", $this->template );
		$view->draw($article);
		//$view->assign('title',	$article['title']);
		//$view->assign('content', $article['content']);
	}
}