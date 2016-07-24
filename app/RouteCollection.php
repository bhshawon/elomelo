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
				
		];
	}

}