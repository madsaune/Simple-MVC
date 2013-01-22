<?php

class Post
{
	public $data;

	public function __construct()
	{
		$this->data = $_POST;
	}

	public function get($key)
	{
		return $this->data[$key];
	}

}