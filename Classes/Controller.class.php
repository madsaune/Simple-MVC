<?php

class Controller
{
	public $view;
	public $post;

	public function __construct()
	{
		$this->view = new View();
	}

	public function GET() {}
	public function POST() {}
}