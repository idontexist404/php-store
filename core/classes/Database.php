<?php
namespace core\classes;

use Exception;
use PDO;
use PDOException;

class Database
{
    private $connection;

    //============================================================

    private function connect()
    // Connect to the database
    {
        // dsn means Data Source Name
        // https://www.php.net/manual/en/ref.pdo-mysql.connection.php

        $dsn = sprintf("mysql:dbname=%s;host=%s;port=%s;charset=%s",
            MYSQL_DATABASE,
            MYSQL_SERVER,
            MYSQL_PORT,
            MYSQL_CHARSET
        );

        try {
            $this->connection = new PDO(
                $dsn,
                MYSQL_USER,
                MYSQL_PASS
            );

            // Debug
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (\Exception $e) {
            exit($e->getMessage());
        }
    }

    //============================================================

    private function disconnect()
    // Disconnect from database
    {
        $this->connection = null;
    }

    //************************************************************
    // CRUD
    //************************************************************

    //============================================================
    // SELECT
    //============================================================

    public function select($sql, $parameters = null)
    // Performs SQL search functions
    {

        // Checks if is a SELECT statement
        if (!preg_match("/^SELECT/i", $sql)) {
            throw new Exception('Database - Not a SELECT statement.');
        }

        // Connects
        $this->connect();

        $results = null;

        // Talks
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

    //============================================================
    // INSERT
    //============================================================

    public function insert($sql, $parameters = null)
    {
        // Checks if is a SELECT statement
        if (!preg_match("/^INSERT/i", $sql)) {
            throw new Exception('Database - Not a INSERT statement.');
        }

        // Connects
        $this->connect();

        // Talks
        try {
            // Communicates with database
            if(!empty($parameters)) {
                $perform = $this->connection->prepare($sql);
                $perform->execute($parameters);
            } else {
                $perform = $this->connection->prepare($sql);
                $perform->execute();
            }
        } catch (PDOException $e) {

            // Only runs in case of error
            return false;
        }

        // Disconnects from database
        $this->disconnect();
    }

    //============================================================
    // UPDATE
    //============================================================

    public function update($sql, $parameters = null)
    {
        // Checks if is a UPDATE statement
        if (!preg_match("/^UPDATE/i", $sql)) {
            throw new Exception('Database - Not a UPDATE statement.');
        }

        // Connects
        $this->connect();

        // Talks
        try {
            // Communicates with database
            if(!empty($parameters)) {
                $perform = $this->connection->prepare($sql);
                $perform->execute($parameters);
            } else {
                $perform = $this->connection->prepare($sql);
                $perform->execute();
            }
        } catch (PDOException $e) {

            // Only runs in case of error
            return false;
        }

        // Disconnects from database
        $this->disconnect();
    }

    //============================================================
    // DELETE
    //============================================================

    public function delete($sql, $parameters = null)
    {
        // Checks if is a DELETE statement
        if (!preg_match("/^DELETE/i", $sql)) {
            throw new Exception('Database - Not a DELETE statement.');
        }

        // Connects
        $this->connect();

        // Talks
        try {
            // Communicates with database
            if(!empty($parameters)) {
                $perform = $this->connection->prepare($sql);
                $perform->execute($parameters);
            } else {
                $perform = $this->connection->prepare($sql);
                $perform->execute();
            }
        } catch (PDOException $e) {

            // Only runs in case of error
            return false;
        }

        // Disconnects from database
        $this->disconnect();
    }

    //============================================================
    // GENERIC
    //============================================================

    public function statement($sql, $parameters = null)
    {
        // Verify if it is a different statement
        if (preg_match("/^SELECT|INSERT|UPDATE|DELETE/i", $sql)) {
            throw new Exception('Database - Invalid statement.');
        }

        // Connects
        $this->connect();

        // Talks
        try {
            // Communicates with database
            if(!empty($parameters)) {
                $perform = $this->connection->prepare($sql);
                $perform->execute($parameters);
            } else {
                $perform = $this->connection->prepare($sql);
                $perform->execute();
            }
        } catch (PDOException $e) {

            // Only runs in case of error
            return false;
        }

        // Disconnects from database
        $this->disconnect();
    }
}
