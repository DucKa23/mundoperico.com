<?php

namespace Contact\controller;
use controller\AbstractController;

class ContactController
extends AbstractController
{

	public $request;
	public $params;

	//TODO: Implementa la acción que recogerá los datos enviados 
	//      mediante el envio por AJAX de un formulario
	//      la acción se llamará processContactAjaxAction
	public function processContactAjaxAction ($request , array $params) {


		if (empty($params['email'])){
			$message = false;
		} 
		elseif (empty($params['nombre'])){
			$message = false;
		}
		elseif (empty($params['mensaje'])) {
			$message = false;
		}
		else { //si todo está relleno ;
			$message =  "DATOS RECIBIDOS CORRECTAMENTE."; 
			//echo json_encode($message);
		}
		echo json_encode($message);
		
	}
		// TODO: Haz que se verifique la $request recibida
		//       y que estén todos los datos que se esperan,
		//       dentro del parámetro $params


	//DONE: Completa la implementación de indexAction
	//      para que muestre un formulario que funcione via ajax
	public function indexAction($request ,array $params){
		include __DIR__."/../view/contact.php";
	}
}