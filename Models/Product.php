<?php

require_once ("utils/DBConnection.php");

class Product {
    private static $db;

    function __construct() {
        self::$db = \database_connection\DBConnection::getInstance();
    }

    function All(){
        $stmt=self::$db->prepare("Select * FROM products");
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $row;
    }
}
