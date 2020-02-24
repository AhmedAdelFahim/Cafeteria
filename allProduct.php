<?php
    require_once ("utils/DBConnection.php");
    $db = \database_connection\DBConnection::getInstance();
    $query="SELECT `name`, price , picture FROM products;";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(); 
    // var_dump($result);
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Add Product </title>
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
</head>

<body id="main-body">
    

    <div id="container">
        <div class="title">
            <div class="menu">
                <table>
                    <td> <a href="Home.php?">Home | </a></td>
                    <td> <a href="Products.php?">Products | </a></td>
                    <td> <a href="Users.php?">Users | </a></td>
                    <td> <a href="ManualOrders.php?">Manual orders | </a></td>
                    <td> <a href="Checks.php?">Checks </a></td>
                </table>
            </div>
            <div class="header">
                <h5 class="adminname"><img src="./Assets/admin.png" width='30px' height='30px' alt='img'>Admin</h5>

            </div>
        </div>
    <div class="main">
    
        <h1 class="allProduct"> All Products </h1>
        <a href="addProduct.php?">add product</a>  
        <br>
    </div>
            <table class="table-header">
                <tr>
                <th> Product </th>    
                <th> Price </th>    
                <th> Image </th>    
                <th> Action </th>    
                </tr>
    <?php

        foreach($result as $data){
          echo "<tr>";
          echo "<td>".$data['name']."</td> ";
          echo "<td>".$data['price']."</td>";
          echo "<td><img src=".$data['picture']." width='30px' height='30px' alt='img'></td>";
          echo "<td><a href='updateProduct.php' class='update'>Edit | </a><a href='deleteProduct.php' class='delete'>Delete</a></td>";
          echo "</tr>";
        }
      ?>   
  </div>         
</body>
</html>