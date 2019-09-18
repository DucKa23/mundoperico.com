<?php


use Home\controller\HomeController;
use controller\AbstractController as IdxController;

class Routing
	implements RoutingInterface
{

	/**
	 * Objeto de tipo Routes
	 * @var \StdClass
	 */
	protected $routes;

	public function __construct(){
		$this->buildRoutes();
	}	



	public function buildRoutes(){

		$contenido = file_get_contents(__DIR__."/config/routes.json");
	// Guardamos el contenido de routes.json en String en la variable $contenido.

		$this->routes = json_decode($contenido); 
	// Decodificamos el String de $contenido y lo guardamos en la propiedad $routes.

		$this->routes = $this->routes instanceof \StdClass
		// Si la propiedad routes es igual a \StdClass lo dejamos igual.
						? $this->routes 
		// Si no es asi, coge el indice routes del array de la variable global config.
						: $GLOBALS['config'] ['routes']; 
	}
		



	// DONE: Implementar el método buildRoutes
	// la propiedad $routes tendrá que responder TRUE


	public function getController(string $uri) : IdxController{
		$routesArray =  (array) $this->routes; // $this->routes es un objeto y necesitamos modificar a array.
		$uri =ltrim($uri , "/");// se crea variable donde se elimina "/" de $uri
		$result = $routesArray [$uri]->controller; // se crea variable donde guardamos string que queremos 
		$module = $routesArray [$uri]->module;
		$result = is_null($result) // si $resultObject es null o no está creado 
				?"Error\\controller\\ErrorController" //retorna "index"
				:$module."\\controller\\".$result;
		$reflector = new \ReflectionClass($result); 
		return $reflector->newInstance(); 

	}


	public function getAction(string $uri) : string{
		$routesArray =  (array) $this->routes; // $this->routes es un objeto, se modifica a array.
		$uri =ltrim($uri , "/");// se crea variable donde se elimina "/" de $uri
		$result = $routesArray [$uri]->action; // se crea variable donde guardamos string que queremos 
		return is_null($result) // si $result es null o no está creado 
				?"index" //retorna "index"
				:$result; // si no es null retorna $result

	}


	// TODO: Implementar las funciones necesarias 
	// para que Routing cumpla con la interfaz RoutingInterface 
}
