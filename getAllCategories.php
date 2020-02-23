<?php
    require_once ("utils/DBConnection.php");
        function getAllcategories(){
        $db = \database_connection\DBConnection::getInstance();
        $stmt=$db->prepare("Select * FROM categories");
        $stmt->execute();
        $rows = $stmt->fetchall(PDO::FETCH_ASSOC);
        var_dump($rows);
        // foreach ($stmt->fetchall() as $eman){
        //     echo $eman['name'];
        return $rows;
        }
        
    // }
    // getAllcategories();
    // $category = [];
    $category = getAllCategories();
    foreach ($category as $eman){
            echo $eman['name'];
    }
    // var_dump($category);
?>