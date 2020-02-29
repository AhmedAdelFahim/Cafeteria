<?php
    require 'utils/DBConnection.php';
    $db = database_connection\DBConnection::getInstance();
    $query = "DELETE FROM products WHERE id=$_GET[id]";
    $db->exec($query);
    echo $_GET['id'];
    // header("Location: allProduct.php");
?>