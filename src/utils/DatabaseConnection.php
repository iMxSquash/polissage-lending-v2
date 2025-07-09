<?php

namespace App\Utils;

class DatabaseConnection
{
    private static $instance = null;
    private $connection;

    private function __construct()
    {
        $config = include SRC_PATH . '/config/config.php';
        $dbConfig = $config['database'];

        try {
            $dsn = "mysql:host={$dbConfig['host']};dbname={$dbConfig['name']};charset={$dbConfig['charset']}";
            $this->connection = new \PDO($dsn, $dbConfig['username'], $dbConfig['password']);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            throw new \Exception("Database connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
