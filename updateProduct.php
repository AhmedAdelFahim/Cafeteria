<?php
require 'utils/DBConnection.php';
    $db = database_connection\DBConnection::getInstance();
    $query = 'UPDATE products SET `name`=?, `price`=?, `picture`=?, `category_id`=? WHERE id=?';
    $stmt = $db->prepare($query);
    $stmt->execute([$_POST['product_name'], $_POST['price'], $_FILES['image']['name'], $_GET['category']]);
    header("Location: allProduct.php");
?>   