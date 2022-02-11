<?php
use core\classes\Database;
use core\classes\Functions;

// Open session
session_start();

// Load config file
require_once('../config.php');

// Autoload (psr-4) project classes using namespaces
require_once('../vendor/autoload.php');

$db = new Database();

$customers = $db->select("SELECT * FROM customers");
$test = $db->select("INSERT TEST");

echo '<pre>';
print_r($customers/* , $test */);
echo '</pre>';


// phpinfo();
