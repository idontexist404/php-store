<?php
namespace core\classes;

use PDO;
use PDOException;

class Database
{
    private $connection;

    // ============================================================
    private function connect()
    // Connect to the database
    {
        $this->connection = new PDO(
            'mysql:' .
            'dbname=' . MYSQL_DATABASE . ';' .
            'host=' . MYSQL_SERVER . ';' .
            'port=' . MYSQL_PORT . ';' .
            'charset=' . MYSQL_CHARSET,
            MYSQL_USER,
            MYSQL_PASS,
            array(PDO::ATTR_PERSISTENT => true)
        );

        // Debug
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }


    // ============================================================
    private function disconnect()
    // Disconnect from database
    {
        $this->connection = null;
    }

    // ============================================================
    // CRUD
    // ============================================================
    public function select($sql, $parameters = null)
    // Performs SQL search functions
    {
        $this->connect();

        $results = null;

        try {
            // Communicates with database
            if(!empty($parameters)) {
                $perform = $this->connection->prepare($sql);
                $perform->execute($parameters);
                $results = $perform->fetchAll(PDO::FETCH_CLASS);
            } else {
                $perform = $this->connection->prepare($sql);
                $perform->execute();
                $results = $perform->fetchAll(PDO::FETCH_CLASS);
            }
        } catch (PDOException $e) {
            // Only runs in case of error
            return false;
        }

        // Disconnects from database
        $this->disconnect();

        // Return obtained results
        return $results;
    }
}
