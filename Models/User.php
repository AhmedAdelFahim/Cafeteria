<?php

require_once ("utils/DBConnection.php");

class User {
    private static $db;

    function __construct() {
        self::$db = \database_connection\DBConnection::getInstance();
    }

    function All(){
        if(!empty(self::$db)){
            $stmt=self::$db->prepare("Select * FROM users");
            $stmt->execute();
            $row = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $row;
        }
    }
}