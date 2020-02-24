<?php
    require_once("utils/DBConnection.php");
        // var_dump($_POST);
        $productname = $_POST ["product_name"];
        $price = $_POST["price"];
        $path = $_POST["Product_Picture"];
        $categoryid = $_POST["category"];
        $db = \database_connection\DBConnection::getInstance();
        $query="INSERT INTO `products`( `name`, `price`, `picture`, `category_id`, `created_at`, `updated_at`) VALUES (?,?,?,?,?,?)";     
        $stmt=$db->prepare($query);
        $stmt->execute([$productname,$price,$path,$categoryid,date("Y-m-d H:i:s"),date("Y-m-d H:i:s")]);
        $result=$stmt->fetchAll();
        header("Location: allProduct.php");
?>
