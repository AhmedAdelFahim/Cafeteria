<?php
    require_once ("utils/DBConnection.php");
        function getAllcategories(){
        $db = \database_connection\DBConnection::getInstance();
        $stmt=$db->prepare("Select * FROM categories");
        $stmt->execute();
        $rows = $stmt->fetchall(PDO::FETCH_ASSOC);
        //var_dump($rows);
        return $rows;
        }

        $category = getAllCategories();
        foreach ($category as $eman){
            echo $eman['name'];
        }
    // var_dump($category);
?>