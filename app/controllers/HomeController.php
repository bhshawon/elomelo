<?php
namespace controllers;

use core\Controller;

class HomeController extends Controller
{
	public function index()
	{

		$this->view('home/index.html');		
	}


	public function test($request)
	{


		$data = array(
			'msg' => "Hello World!",
			'posted' => isset($request['name']), 
			'redirect' => "test"
		);
		$this->view('home/index', $data);	
	}

}
