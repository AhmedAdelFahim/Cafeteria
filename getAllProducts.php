<?php

require_once ("utils/DBConnection.php");

function getAllProducts(){
    $db = \database_connection\DBConnection::getInstance();
    $stmt=$db->prepare("Select * FROM products");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    var_dump($row);
}

getAllProducts();