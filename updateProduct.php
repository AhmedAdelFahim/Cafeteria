<?php
    require 'utils/DBConnection.php';

    $db = database_connection\DBConnection::getInstance();

    $picturePath = "upload/".$_FILES['Product_Picture']['name'];

    $query = 'UPDATE products SET `name`=?, `price`=?, `picture`=?, category_id=? WHERE id=?';

    $stmt = $db->prepare($query);

    $stmt->execute([$_POST['product_name'], $_POST['price'], $picturePath, $_POST["category"], $_GET['id']]);

    header("Location: allProduct.php?updated=1");
?>   