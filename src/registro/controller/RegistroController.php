<?php

namespace Registro\controller;
use controller\AbstractController as IdxController;

class RegistroController
	extends IdxController
{
 
  	public $request;
  	public $params;

 public function IndexAction($request , $params) {
 	include __DIR__."/../view/registro.php";
 }

 public function PremiumAction($request , $params) {
 	include __DIR__."/../view/registro.php";
 }


}