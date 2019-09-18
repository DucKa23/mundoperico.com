<?php

namespace Login\controller;
use controller\AbstractController as IdxController;

class LoginController
	extends IdxController
{
 
  	public $request;
  	public $params;

 public function IndexAction($request , $params) {
 	include __DIR__."/../view/login.php";
 }

 public function PremiumAction($request , $params) {
 	include __DIR__."/../view/login.php";
 }


}