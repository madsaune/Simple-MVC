<?php

// If you want to enable POST requests
Config::set('POSTEnabled', true);

// Set absolute path to root folder
Config::set('root', dirname(getcwd()));

// Set absolute path to resources
Config::set('resources', Config::root() . "/Resources/");