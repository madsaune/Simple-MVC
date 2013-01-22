<?php

// Current hours: 3
$root = dirname(getcwd());

require_once($root . "/Classes/Config.class.php");
require_once($root . "/Settings/settings.php");
require_once($root . "/Classes/Post.class.php");
require_once($root . "/Classes/Controller.class.php");
require_once($root . "/Classes/View.class.php");
require_once($root . "/Controllers/Index.class.php");
require_once($root . "/Controllers/PageNotExist.class.php");

$params = (!empty($_REQUEST['p'])) ? $_REQUEST['p'] : false;

if(!$params)
{
	$page = new Index();
	$page->GET();
}
else
{
	$reqMethod = $_SERVER['REQUEST_METHOD'];
	$params = explode('/', $params);

	if(!class_exists($params[0]))
	{
		$page = new PageNotExist();
		$page->GET();
		exit();
	}
	else
	{
		$page = new $params[0]();
	}
	
	// Find out what kind of request and execute proper method
	if($reqMethod == 'GET')
	{
		$page->GET();
	}
	else if($reqMethod == 'POST')
	{
		if(!Config::get('POSTEnabled'))
		{
			// Throw new exception
			echo "You are trying to do a POST request. POST requests is turned off. Contact site administrator.";
			exit();
		}

		$page->POST($_POST);
	}
	else
	{
		// Throw new exception
		echo "Wrong request method";
	}
}