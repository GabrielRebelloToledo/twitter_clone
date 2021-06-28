<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action {

public function timeline(){

	session_start();

	if ($_SESSION['id'] != '' && $_SESSION['nome'] != '') {
	//echo "chegamos ate aqui";
	//echo "<pre>";
	//print_r($_SESSION);
	//echo "</pre>";

	$this->render('timeline');
	} 
	else {
		header('Location: /?login=error');
		}

}



}

?>