<?php
    require 'utils/DBConnection.php';
    $db = database_connection\DBConnection::getInstance();
    $id = $_GET['id'];
    $query = "DELETE FROM products WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);
    header("Location: allProduct.php");
?>