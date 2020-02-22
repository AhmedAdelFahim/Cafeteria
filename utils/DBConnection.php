<?php

namespace database_connection;

use PDO;

class DBConnection
{
    private static $instance = null;
//        private static $servername = "localhost";
    private static $dsn = 'mysql:host=localhost;dbname=cafeteria';
    private static $username = 'root';
    private static $password = '';

    private function __construct()
    {
        try {
            self::$instance = new PDO(self::$dsn, self::$username, self::$password);
        } catch (PDOException $e) {
            echo 'MySql Connection Error: '.$e->getMessage();
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            new DBConnection();
        }

        return self::$instance;
    }

    public static function disconnect()
    {
        self::$instance = null;
    }
}
