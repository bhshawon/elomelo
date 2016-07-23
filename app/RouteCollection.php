<?php

class RouteCollection
{
	public static function getCollection(): array 
	{
		return [

			[
				"url" => "",
				"controller" => "HomeController",
				"method" => "index",
				"action" => "get",
				"params" => []
			],
			
			[
				"url" => "home",
				"controller" => "HomeController",
				"method" => "index",
				"action" => "get",
				"params" => []
			],

			[
				"url" => "contact",
				"controller" => "ContactController",
				"method" => "index",
				"action" => "get",
				"params" => []
			],

			[
			 	"url" => "login",
			 	"controller" => "AuthController",
			 	"method" => "getLogin",
			 	"action" => "get",
			 	"params" => []
			],

			[
			 	"url" => "login",
			 	"controller" => "AuthController",
			 	"method" => "postLogin",
			 	"action" => "post",
			 	"params" => []
			],


			[
			 	"url" => "register",
			 	"controller" => "AuthController",
			 	"method" => "getRegister",
			 	"action" => "get",
			 	"pa
			 	rams" => []
			],
			[
			 	"url" => "register",
			 	"controller" => "AuthController",
			 	"method" => "postRegister",
			 	"action" => "post",
			 	"params" => []
			],

			[
			 	"url" => "logout",
			 	"controller" => "AuthController",
			 	"method" => "logout",
			 	"action" => "get",
			 	"params" => []
			],

			[
			 	"url" => "addTicket",
			 	"controller" => "SellController",
			 	"method" => "sellView",
			 	"action" => "get",
			 	"params" => []
			],

			[
			 	"url" => "addTicket",
			 	"controller" => "SellController",
			 	"method" => "addTicket",
			 	"action" => "post",
			 	"params" => []
			],

			[	
			 	"url" => "users/{username}",
			 	"controller" => "UserController",
			 	"method" => "getUserPage",
			 	"action" => "get",
			 	"params" => []
			],
				
		];
	}

}