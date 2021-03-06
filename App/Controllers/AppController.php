<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action {

public function timeline(){

	

	$this->validaAutenticação();
	//echo "chegamos ate aqui";
	//echo "<pre>";
	//print_r($_SESSION);
	//echo "</pre>";

	//recuperação dos tweets
	$tweet = Container::getModel('Tweet');

	$tweet->__set('id_usuario',$_SESSION['id'] );

	$tweets = $tweet->getAll();
	//echo "<pre>";
	//print_r($tweets);
	//echo "</pre>";

	$this->view->tweets = $tweets;


	$this->render('timeline');
	
}
public function tweet(){


	
	$this->validaAutenticação();

	$tweet = Container::getModel('Tweet');
	$tweet->__set('tweet',$_POST['tweet']);
	$tweet->__set('id_usuario',$_SESSION['id']);

	$tweet->salvar();	
	header('Location: /timeline');

	} 
	


public function validaAutenticação() {
	session_start();

	if (!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '' ) {
		header('Location: /?login=error');
	}
	
}

}

?>