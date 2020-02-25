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
    <title>All-Products</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="public/css/util.css">
    <link rel="stylesheet" type="text/css" href="public/css/main.css">
    <link rel="stylesheet" href="public/css/min_css.lass">
</head>

<body id="main-body">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div id="profile-data">
                    <img id="profile-picture" src="public/img/admin.png"/>
                    <a href="">Admin</a>
                </div>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav pull-right">
                    <li class="active"><a href="createOrder.php">Home</a></li>
                    <li><a href="AllUsers.php">Users</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="ordersAdmin.php">Orders</a></li>
                    <li><a href="#">Checks</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <div class="container">
        <div class="addProductDiv">
            <a href="AddProduct.php">Add-Product</a>
        </div>

        <div class="limiter">
            <div class="container-table100">
                <div class="wrap-table100">
                    <div class="table100">
                        <table>
                            <thead>
                                <tr class="table100-head">
                                    <th> Product </th>    
                                    <th> Price </th>    
                                    <th> Image </th>    
                                    <th> Action </th>    
                                </tr>
                            </thead>

                            <tbody>
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
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>         
</body>
</html>