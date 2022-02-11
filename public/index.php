<?php
use core\classes\Database;
use core\classes\Functions;

// Open sessioncd
session_start();

// Load config file
require_once('../config.php');

// Autoload (psr-4) project classes using namespaces
require_once('../vendor/autoload.php');

$db = new Database();
$customers = $db->select("SELECT * FROM customers");
<<<<<<< HEAD
echo '<pre>';
print_r($customers);
echo '</pre>';
=======
$db->insert("INSERT TEST");

print_r($customers);
>>>>>>> 095c86d (whoops, forgot to delete!)

// phpinfo();
