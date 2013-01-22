<?php

class Config
{
	private static $POSTEnabled = false;
	private static $root; // rootFolder
	private static $resources; // Resources folder 

	public static function set($var, $value)
	{
		Config::$$var = $value;
	}

	public static function get($var)
	{
		return Config::$$var;
	}

	public static function root()
	{
		return self::$root;
	}

	public static function resources()
	{
		return self::$resources;
	}
}