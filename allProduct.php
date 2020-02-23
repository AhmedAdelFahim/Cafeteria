<?php
    require_once ("utils/DBConnection.php");
    $db = \database_connection\DBConnection::getInstance();
    $query="SELECT user_id,username,email,room,profile_pic,ext FROM user;";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(); 
    var_dump($result);
    // echo $result;
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
                <h5 class="adminname"><i class="fas fa-user-tie user"></i>Admin</h5>

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
          echo "<td>".$data['productname']."</td> <td>".$data['price']."</td> <td><img src=".$data['product_Picture']." width='30px' height='30px' alt='img'></td>";
          echo "<form action='' method='POST'>";
          echo "<td><button class='update-btn' type='submit' name='data' value='".$data['product_id'].",".$data['price'].",".$data['product_picture']."'Edit</button></form>";
          echo "<button class='del-btn' onclick='deleteUser(".$data['user_id'].")'>Delete</button></td>";
          echo "</tr>";
        }
      ?>   
  </div>         
</body>
</html>