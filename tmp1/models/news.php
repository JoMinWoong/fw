<?php if ( !defined('FRONT_CONTROLLER')) exit('no direct access');
class News_Model{
	
	private $articles = array
	(
			//article 1
			'new' => array
			(
					'title' => 'New Website' ,
					'content' => 'Welcome to the site! We are glad to have you here.'
			)
			,
			//2
			'mvc' => array
			(
					'title' => 'PHP MVC Frameworks are Awesome!' ,
					'content' => 'It really is very easy. Take it from us!'
			)
			,
			//3
			'test' => array
			(
					'title' => 'Testing' ,
					'content' => 'get off of ma face suckerr'
			)
	);
	
	public function __construct()
	{
	}
	
	public function get_article($articleName){
		
		$article = $this->articles[$articleName];
		var_dump($this->articles);
		echo "<br><br>$articleName<br>";
		return $article;
	}
}