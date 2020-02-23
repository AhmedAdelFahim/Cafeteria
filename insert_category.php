<?php
    include_once ("utils/DBConnection.php");
    $category = "";
    if (isset($_POST['submit'])) {
    $category = $_POST['category'];
    $db = \database_connection\DBConnection::getInstance();
    $query = "INSERT INTO categories (`name`,`created_at`) VALUES (?,?);";
    $stmt = $db->prepare($query);
    // var_dump($category);
    $stmt->execute([$category,date("Y-m-d H:i:s")]);
    $result=$stmt->fetchAll();
    // $result->free_result();
    header("Location: addingProduct.php");
    }
?>