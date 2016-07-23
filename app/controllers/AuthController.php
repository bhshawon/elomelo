<?php
namespace controllers;
use core\Controller;
use core\auth\Authenticate;

class AuthController extends Controller
{
	public function getLogin()
	{
		
		$this->view('auth/login.html');
	}

	public function postLogin($post)
	{

		Authenticate::login($post['username'], $post['password']);

		$this->view('auth/register.html');

	}

	public function getRegister()
	{
		$this->view('auth/register.html');
	}

	public function postRegister($post)
	{	
		$username=$post['username'];
		$password=$post['password'];
		$email=$post['email'];

		if($password=$post['rpassword'])
		{
			Authenticate::register($username, $password, $email);
		}
		$this->redirect('home');
	}

	public function logout()
	{
		Authenticate::logout();
		$this->redirect('home');
	}

}