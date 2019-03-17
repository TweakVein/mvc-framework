<?php

namespace application\core;

use application\core\View;

abstract class Controller 
{
	public $route;
	public $view;
	public $acl;

	public function __construct($route) 
	{
		$this->route = $route;
		$this->view = new View($route);
		$this->checkAcl();
		$this->model = $this->loadModel($route['controller']);
	}

	public function loadModel($name) 
	{
		$path = 'application\models\\'.ucfirst($name);
		if (class_exists($path)) 
		{
			return new $path;
		}
	}

	public function checkAcl()
	{
		$this->acl = require 'application/config/acl/'.$this->route['controller'].'.php';
		if( $this->isAction('all') )
		{
			return true;
		} elseif( isset($_SESSION['authorize']['id']) && $this->isAction('authorize') )
		{
			return true;
		} elseif( isset($_SESSION['admin']) && $this->isAction('admin') )
		{
			return true;
		}
		View::errorShow(404);
	}

	public function isAction($key)
	{
		return in_array($this->route['action'], $this->acl[$key]);
	}
}