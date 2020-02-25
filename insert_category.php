<?php
    include_once ("utils/DBConnection.php");
    $category = "";
    if (isset($_POST['submit'])) {
    $category = $_POST['category'];
    $db = \database_connection\DBConnection::getInstance();
    $query = "INSERT INTO categories (`name`,`created_at`) VALUES (?,?);";
    $stmt = $db->prepare($query);
    $stmt->execute([$category,date("Y-m-d H:i:s")]);
    $result=$stmt->fetchAll();
    header("Location: AddProduct.php");
    }
?>