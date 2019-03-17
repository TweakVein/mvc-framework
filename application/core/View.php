<?php

namespace application\core;

class View
{
	public $path;
	public $layout = "default";
	public $route;

	public function __construct($route)
	{
		$this->route = $route;
		$this->path = $route['controller']."/".$route['action'];
	}

	public function render($title, $vars = [])
	{
		if( file_exists('application/views/'.$this->path.'.php') )
		{
			ob_start();
			require 'application/views/'.$this->path.'.php';
			$content = ob_get_clean();
			require 'application/views/layouts/'.$this->layout.'.php';
		} else
		{
			View::errorShow(404);
		}
	}

	public function redirect($url)
	{
		header("location: " . $url);
		exit;
	}

	public static function errorShow($code)
	{
		$path = 'application/views/errors/'.$code.'.php';
		if( file_exists($path) )
		{
			http_response_code($code);
			require $path;
			exit();
		} else
		{
			echo "Page, which requested, is undefined!";
		}
	}
}