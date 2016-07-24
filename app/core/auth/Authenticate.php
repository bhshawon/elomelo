<?php
namespace core\auth;
use models\User;
use \Exception;

session_start();


class Authenticate {

	//User register
	public static function register($username, $password, $email)
	{
		$error= [
			"user" => TRUE,
			"email" => TRUE
		];

		try
		{
			User::where('username',$username)->firstOrFail();
			echo "username already exists.<br>";
		}
		catch(Exception $e1)
		{
			$error["user"]=FALSE;
		}

		try
		{
			User::where('email',$email)->firstOrFail();
			echo "email already exists.<br>";
		}
		catch(Exception $e2)
		{
			$error["email"]=FALSE;
		}

		if(!$error["user"] && !$error["email"])
		{
			$now=Carbon::now('Asia/Dhaka');
			$salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
			$password=hash('sha256', ($password.$salt));
			$user=new User(array(
				'username' => $username,
				'password' => $password,
			    'salt' => $salt,
			    'email' => $email,
			    'created_at'=>$now, 
			    'updated_at'=>$now
			    )
			);
			$user->save();
		}
		return $error;
	}

	public static function login($username, $password)
	{
		$error=[
			'user'=>FALSE,
			'password'=>FALSE
		];
		$logged=FALSE;
		$cookie=[
			'username'=>'',
			'email'=>''
		];

		try
		{
			$user=User::where('username',$username)->firstOrFail();
		}
		catch(Exception $e)
		{
			$error["user"]=TRUE;
			echo "username not found";
			return $error;
		}

		$password=hash('sha256', ($password.$user->salt));

		if($password == $user->password)
		{
			$logged=TRUE;
			$cookie['username']=$username;
			$cookie['email']=$user->email;
			$_SESSION['user']=$cookie;
		}

		else
		{
			$error['password']=TRUE;
			echo "password doesn't match";
			return $error;
		}
	}

	public static function checkLogin()
	{
		if(isset($_SESSION['user']))
		{
			return $_SESSION['user'];
		}
		return FALSE;
	}

	public static function logout()
	{
		unset($_SESSION['user']);
	}

}