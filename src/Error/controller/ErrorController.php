<?php

namespace Error\controller ;
//TODO:
// es: Determinar el namespace correcto
// en: Determine the right namespace
use controller\AbstractController as IdxController;
use controller\IndexControllerInterface as IdxInterface;

class ErrorController extends IdxController	
	//TODO: 
	// es: relacionar correctamente con AbstractController
    // en: relate in the right manner with AbstractController
	implements IdxInterface
	//TODO:
	// es: Importar IndexControllerInterface
	// en: Import IndexControllerInterface
{	

	public function indexAction($request ,array $params) {
 	include __DIR__."/../view/error.php";
 }


}