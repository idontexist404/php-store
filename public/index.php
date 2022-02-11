<?php
use core\classes\Database;
use core\classes\Functions;

// Open sessioncd
session_start();

// Load config file
require_once('../config.php');

// Autoload (psr-4) project classes using namespaces
require_once('../vendor/autoload.php');

// Load routes
require_once('../core/Routes.php');

