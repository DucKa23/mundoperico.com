<?php

namespace Noticia\controller;
use controller\AbstractController as IdxController;

class NoticiaController
	extends IdxController
{
 
  	public $request;
  	public $params;

 public function IndexAction($request , $params) {
 	include __DIR__."/../view/noticia.php";
 }

 public function PremiumAction($request , $params) {
 	include __DIR__."/../view/noticia.php";
 }


}