<?php

use application\core\Router;
use application\lib\Db;

ini_set("display_errors", 1);
error_reporting("E_ALL");

function debug($val)
{ 
	echo "<pre>" . var_dump($val) . "</pre>"; 
	exit;
}

spl_autoload_register(function($class)
{
	$path = str_replace("\\", "/", $class . ".php");
	if( file_exists($path) ) require $path;
});

session_start();

$router = new Router;
$router->run();