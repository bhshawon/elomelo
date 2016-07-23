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

		$loader=new Twig_Loader_Filesystem($file.'public/views'); //can this be fixed too?

		$cache=$file.'public/compilation_cache';

		$twig=new Twig_Environment($loader);

		if($user=Authenticate::checkLogin())
			$data['user']=$user['username'];
		
		$data['root']=APP_URI; //used here doesn't work
		// open the template file
		echo $twig->render($view, $data);
	}

	public function redirect($url)
	{
		header("Location: $url", true, 302);
		exit;
	}

	
}
// route er issue ta kisuta solve hoise
// though very dirty code
// but ekhon new ekta jhamelai porsi
// you get the problem?
// css/js oi dir e nai, error
// hmm, thats why i created that APP_URI and APP_URL in config.php
// wow
// I tried same thing this morning
// wasn't working
// :P anyway, let's ee ur route code