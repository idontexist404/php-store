<?php
use core\classes\Database;
use core\classes\Functions;

// Open session
session_start();

// Load config file
require_once('../config.php');

// Automatically load (psr-4) project classes using namespaces
require_once('../vendor/autoload.php');

$a = new Database();
$b = new Functions();

$b->test();

echo 'OK!';
