<?php

class PageNotExist extends Controller
{
	public function GET()
	{
		$this->view->render('404');
	}
}