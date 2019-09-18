<?php

namespace Home\controller;
use controller\AbstractController as IdxController;

class HomeController
	extends IdxController
{
 
  	public $request;
  	public $params;

 public function IndexAction($request , $params) {
 	include __DIR__."/../view/vista.php";
 }

 public function PremiumAction($request , $params) {
 	include __DIR__."/../view/vista.php";
 }


}
