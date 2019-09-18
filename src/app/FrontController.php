<?php

//include "config.php";
//ini_set('display_errors', true);
//require_once __DIR__.'/../vendor/autoload.php';
//use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\HttpFoundation\BinaryFileResponse;

class FrontController
	implements ApplicationInterface
{
	/**
	 * Componente de enrutamiento que será del tipo RoutingInterface
	 * @var RoutingInterface
	 */
	protected $routing;
	
	/**
	 * Ruta que se está cargando desde el navegador después del dominio
	 * @var string
	 */
	public $request_uri;
	/**
	 * Información recibida a través de los parámetros de la URL
	 * o de los datos enviados mediante formulario
	 * o ambas cosas
	 * @var array
	 */
	public $params;
	

	/**
	 * Constructor
	 * Crea el componente de Routing que permitirá averiguar
	 * el controller y la acción que se ejecutarán para dar una respuesta
	 * a la petición ($_REQUEST)
	 */
	public function __construct()
	{
		$this->routing = new Routing();
	}

	//TODO: Que obtenga información del servidor en la que haya la ruta solicitada por el usuario en la request
	// p.e. que lo guarde en una variable una vez lo haya conseguido.
	
	//TODO: Esto lo tiene que hacer FrontController
	// en una función.
	// crea esta función. No olvides mirar el código de public/index.php 
	/**
	 * Función que se ejecuta para dar una respuesta
	 * a la petición.
	 * @internal Esta función se ejecuta desde index.php
	 * Si se comenta la línea en que se ejecuta run, la aplicación no se ejecuta
	 * 
	 */
	public function run()
	{
		$this->request_uri = $_SERVER['REQUEST_URI'];
		$this->request_uri = parse_url($this->request_uri);
		$this->request_uri = $this->request_uri['path'];
		$this->params = array_merge($_GET,$_POST);

		$controller = $this->routing->getController($this->request_uri);
		$action = $this->routing->getAction($this->request_uri);
		
		$controller->callAction($this->request_uri, $action, $this->params);
		//$controller->{$action."Action"}($request,$this->params);
		//call_user_func_array([$controller,$action."Action"], [$request,$this->params]);
		exit;

	}

}
?>
