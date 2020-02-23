<?php
    require_once("utils/DBConnection.php");
        var_dump($_POST);
        $productname = $_POST["product_name"];
        $price = "1";
        $path = "dslfs";
        $categoryid = "1";
        $db = \database_connection\DBConnection::getInstance();
        $query="INSERT INTO `products`( `name`, `price`, `picture`, `category_id`, `created_at`, `updated_at`) VALUES (?,?,?,?,?,?)";     
        $stmt=$db->prepare($query);
        $stmt->execute([$productname,$price,$path,$categoryid,date("Y-m-d H:i:s"),date("Y-m-d H:i:s")]);
        $result=$stmt->fetchAll();
        // var_dump($result);
?>
