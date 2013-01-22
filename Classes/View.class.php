<?php

class View
{

	private $viewsFolder; // Relative from root folder
	private $pathToView;
	private $pathToTemp;

	public function __construct()
	{
		$this->viewsFolder = Config::get('root') . "/Views/";
	}

	public function render($view = 'index', $vars = array(), $template = false)
	{

		$this->unpack($vars);
		$this->pathToView = $this->viewsFolder . $view . '.php';

		if($template)
		{
			try
			{
				$this->pathToTemp = $this->viewsFolder . $template . '.php';
				$this->load_template();
			}
			catch(Exception $e)
			{
				$this->get_404();
			}
		}
		else
		{
			try
			{
				$this->load_view();
			}
			catch(Exception $e)
			{
				$this->get_404();
				echo $e->getMessage();
			}
		}

	}

	private function load_template()
	{
		if(file_exists($this->pathToTemp))
		{
			include($this->pathToTemp);
		}
		else
		{
			throw new Exception("Cannot load template");
		}
	}

	private function load_view()
	{
		if(file_exists($this->pathToView))
		{
			include($this->pathToView);
		}
		else
		{
			// Throw new exception
			throw new Exception("Cannot load view");
		}
	}

	private function get_404()
	{
		if(file_exists($this->viewsFolder . '404.php'))
		{
			include($this->viewsFolder . '404.php');
		}
	}

	private function unpack($array)
	{
		if(is_array($array))
		{
			foreach($array as $key => $value)
			{
				$this->$key = $value;
			}
		}	
	}

}