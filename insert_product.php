<?php
    require_once("utils/DBConnection.php");
        // var_dump($_POST);
        $productname = $_POST ["product_name"];
        $price = $_POST["price"];
        $path = "upload/".$_FILES['Product_Picture']['name'];
        $categoryid = $_POST["category"];
        var_dump($_FILES);
        $file_name = $_FILES['Product_Picture']['name'];
        $file_size = $_FILES['Product_Picture']['size'];
        $file_tmp = $_FILES['Product_Picture']['tmp_name'];
        $file_type = $_FILES['Product_Picture']['type'];
        $db = \database_connection\DBConnection::getInstance();
        move_uploaded_file($file_tmp, 'upload/'.$file_name);
        $query="INSERT INTO `products`( `name`, `price`, `picture`, `category_id`, `created_at`, `updated_at`) VALUES (?,?,?,?,?,?)";     
        $stmt=$db->prepare($query);
        $stmt->execute([$productname,$price,$path,$categoryid,date("Y-m-d H:i:s"),date("Y-m-d H:i:s")]);
        $result=$stmt->fetchAll();
        header("Location: allProduct.php");
?>
