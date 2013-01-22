<?php

class Index extends Controller
{

	public function GET()
	{
		// If get request do this
		$this->view->render('index', 0, 'base');
	}

}