<?php

namespace database;

use PDO;
use PDOException;

class DataBase
{

    private $connection;
    private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    private $dbHost = DB_HOST;
    private $dbUserName = DB_USERNAME;
    private $dbName = DB_NAME;
    private $dbPassword = DB_PASSWORD;

    function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host=" . $this->dbHost . ";dbname=" . $this->dbName, $this->dbUserName, $this->dbPassword, $this->options);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function select($query, $values = null)
    {
        try {
            $query = $this->connection->prepare($query);
            if ($values == null) {
                $query->execute();
            } else {
                $query->execute($values);
            }
            return $query;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function insert($tableName, $fields, $values)
    {

        try {
            $query = $this->connection->prepare("INSERT INTO " . $tableName . "(" . implode(', ', $fields) . " , created_at) VALUES ( :" . implode(', :', $fields) . " , now() );");
            $query->execute(array_combine($fields, $values));
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function update($tableName, $id, $fields, $values)
    {
        $query = "UPDATE " . $tableName . " SET";
        foreach (array_combine($fields, $values) as $field => $value) {
            if ($value) {
                $query .= " `" . $field . "` = ? ,";
            } else {
                $query .= " `" . $field . "` = NULL ,";
            }
        }
        $query .= " updated_at = now()";
        $query .= " WHERE id = ?";
        try {
            $stmt = $this->connection->prepare($query);
            // dd(array_merge(array_filter(array_values($values)), [$id]));
            $stmt->execute(array_merge(array_filter(array_values($values)), [$id]));
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function forceDelete($tableName, $id)
    {
        $query = "DELETE FROM " . $tableName . " WHERE id = ? ;";
        try {
            $stmt = $this->connection->prepare($query);
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function softDelete($tableName, $id)
    {
        $query = "UPDATE " . $tableName . " SET `deleted_at` = now() WHERE id = ?";
        try {
            $stmt = $this->connection->prepare($query);
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function changeBoolFields($tableName, $id, $field)
    {
        $db = new DataBase();
        $record = $db->select('SELECT ' . $field . ' FROM ' . $tableName . ' WHERE id = ?;', [$id])->fetch();
        if (empty($record)) {
            echo '404 - page not found';
            exit;
        }
        $state = $record == 1 ? 0 : 1;
        try {
            $db->update($tableName, $id, [$field], [$state]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function createTable($query)
    {
        try {
            $this->connection->exec($query);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
