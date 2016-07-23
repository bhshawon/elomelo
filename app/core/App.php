<?php

namespace core;

require_once '../app/config.php';
require_once '../../MyMVC/vendor/autoload.php';
use Carbon\Carbon;
use core\Route;
use \RouteCollection;

	
class App
{


	protected $controller = '';

	protected $method = '';

	protected $params=[];

	protected $route;

	protected $action="get";

	public function __construct()
	{

		$this->setupAutoload();
		$url=$this->parseURL();

		foreach (RouteCollection::getCollection() as $key) {


			$routeParams=Route::GetRoutParams($key['url'], $url);
			
			if($routeParams!==FALSE && strcmp($this->action, $key["action"])==0)
			{

				$name = "controllers\\".$key["controller"];
				$this->controller = new $name();
				$this->method = $key["method"];
				$this->controller->{$this->method}($this->params);
				break;
			}
			
		}

	}

	private function setupAutoload()
	{
		spl_autoload_register(function($class){

			$file = APP_DIR.str_replace("\\", "/", $class).".php";

			if (file_exists($file))
				require_once $file;
		});
	}



	public function parseURL()
	{
		if(!empty($_POST))
		{

			$this->action="post";
			$this->params = $_POST;
			unset($_POST);
		}

		if(isset($_GET['url'])) 
		{
			return $url = rtrim($_GET['url'], '/');
			var_dump($_REQUEST);
		}
	}


	
}
