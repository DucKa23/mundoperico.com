<?php

namespace Historia\controller;
use controller\AbstractController as IdxController;

class HistoriaController
	extends IdxController
{
 
  	public $request;
  	public $params;

 public function IndexAction($request , $params) {
 	include __DIR__."/../view/historia.php";
 }

 public function PremiumAction($request , $params) {
 	include __DIR__."/../view/historia.php";
 }


}