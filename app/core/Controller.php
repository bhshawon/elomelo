<?php
namespace core;
use core\auth\Authenticate;
use \Twig_Loader_Filesystem;
use \Twig_Environment;

class Controller
{

	public function view($view, $data=[])
	{

		$file = substr((dirname(__FILE__)), 0, -8);

		$loader=new Twig_Loader_Filesystem($file.'public/views'); 

		$cache=$file.'public/compilation_cache';

		$twig=new Twig_Environment($loader);

		if($user=Authenticate::checkLogin())
			$data['user']=$user['username'];
		
		$data['root']=APP_URI; 
		
		echo $twig->render($view, $data);
	}

	public function redirect($url)
	{
		header("Location: $url", true, 302);
		exit;
	}

	
}
