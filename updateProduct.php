<?php
    require 'utils/DBConnection.php';

    var_dump($_POST);
    $db = database_connection\DBConnection::getInstance();

    if(isset($_FILES['Product_Picture']['name'])&&!empty($_FILES['Product_Picture']['name'])){
        $picturePath = "upload/".$_FILES['Product_Picture']['name'];
        $file_name = $_FILES['Product_Picture']['name'];
        $file_size = $_FILES['Product_Picture']['size'];
        $file_tmp = $_FILES['Product_Picture']['tmp_name'];
        $file_type = $_FILES['Product_Picture']['type'];

        move_uploaded_file($file_tmp, 'upload/'.$file_name);
    }

    $query = 'UPDATE products SET `name`=?, `price`=?, `picture`=?, category_id=? WHERE id=?';

    $stmt = $db->prepare($query);

    $stmt->execute([$_POST['product_name'], $_POST['price'], $picturePath, $_POST["category"], $_GET['id']]);

    header("Location: allProduct.php?updated=1");
?>   