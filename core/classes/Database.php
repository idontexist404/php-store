<?php
namespace core\classes;

use PDO;

class Database
{
    private $connect;

    // ============================================================
    private function connect()
    // Connect to the database
    {
        $this->connect = new PDO(
            'mysql:' .
            'host=' . MYSQL_SERVER . ':' .
            'dbname=' . MYSQL_DATABASE . ':' .
            'charset=' . MYSQL_CHARSET,
            MYSQL_USER,
            MYSQL_PASS,
            array(PDO::ATTR_PERSISTENT => true)
        );
    }


    // ============================================================
    private function disconnect()
    // Disconnect from database
    {

    }

}

/*
define('MYSQL_SERVER',      'localhost');
define('MYSQL_DATABASE',    'php_store');
define('MYSQL_USER',        'user_php_store');
define('MYSQL_PASS',        '');
define('MYSQL_CHARSET',     'utf8');
*/
