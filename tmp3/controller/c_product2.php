<?php if ( !defined('FRONT_CONTROLLER')) exit('no direct access');
class Product2_Controller{
	public $template = 'product2';

	public function main(array $getVars){
		//$newsModel = new Product2_Model;
		$newsModel = getClass('product2','model');
		//getClass('news','model');
		$view = new View($this->template);
		$article = $newsModel->getData($getVars['article']);
		//TODO
		$article['product'] = $this->template;
		//$article( "product", $this->template );
		$view->draw($article);
		//$view->assign('title',	$article['title']);
		//$view->assign('content', $article['content']);
	}
}