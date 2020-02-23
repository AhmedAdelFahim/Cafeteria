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
            $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $rows;
        }
    }

    function getUserById($id){
        $db = \database_connection\DBConnection::getInstance();
        $stmt=$db->prepare("Select * FROM users WHERE id=?");
        $stmt->execute([$id]);
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        return $user;
    }
}