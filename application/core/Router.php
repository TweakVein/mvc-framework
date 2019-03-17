<?php

namespace application\core;

use application\core\View;

class Router
{

	protected $routes = [];
	protected $params = [];

  public function __construct()
  {
    $arr = require 'application/config/routes.php';
    foreach ($arr as $key => $params)
    {
    	$this->add($key, $params);
    }
  }

  public function add($route, $params)
  {
  	$route = '#^'.$route.'$#';
  	$this->routes[$route] = $params;
  }

  public function match()
  {
  	$uri = trim($_SERVER['REQUEST_URI'], '/');
    foreach ($this->routes as $route => $params) 
    {
      if( preg_match($route, $uri, $matches) )
      {
        $this->params = $params;
        return true;
      }
    }
    return false;
  }

  public function run()
  {
  	if( $this->match() )
    {
      $path = 'application\controllers\\'.ucfirst($this->params['controller'])."Controller";
      if( class_exists($path) )
      {
        $action = $this->params['action'] . "Action";
        if( method_exists($path, $action) )
        {
          $controller = new $path($this->params);
          $controller->$action();
        } else
        {
          View::errorShow(404);
        }
      } else
      {
        View::errorShow(404);
      }
    } else
    {
      View::errorShow(404);
    }
  }
}