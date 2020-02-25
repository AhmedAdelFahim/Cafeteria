<?php
     require_once("utils/DBConnection.php") ;
     $db = \database_connection\DBConnection::getInstance() ; 
    //  $statusSql = "UPDATE orders SET status=? WHERE id=?" ;
     if(isset($_GET["page"]))
     {
        $page = $_GET["page"];
     }
     else
     {
        $page = 1 ;
     }
     $limit = 3 ;
     $start_from = ($page - 1) * $limit ; 
     $fromDate = $_GET['dateFrom'] ;
     $toDate = $_GET['dateTo'] ;
     $selectQuary = "SELECT `created_at`, status , `total_price` FROM orders WHERE `created_at` <= $toDate AND `created_at`>= $fromDate LIMIT  $start_from , $limit " ;
     $stmt = $db->prepare($selectQuary) ;
     $stmt->execute() ;
     $result = $stmt->fetchAll() ;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Order</title>
    <link href="orders.css" rel="stylesheet">
</head>
<body>
    <div class = "allContainer">
    <div class = "container">
        <div class = "containts">
            <a href = "Home.html">Home</a><span> | </span>
            <a href = "Orders.html">My Orders</a>
        </div>
        <div class = "pic">
       <img src = "admin.png"/> <span><?php  
           session_start();
           $quary = "SELECT name FROM users WHERE email=?" ;
           $stmt = $db->prepare($quary) ;
           $stmt->execute([$_SESSION['userEmail']]) ;
           $result = $stmt->fetchAll();
           print_r ($result) ;
         ?> </span>
        </div>
        </div>
        
        <div class = "list">
        <h1>My Orders</h1>
            <input type="date" name="dateFrom" id = "from" class = "Date">
            <input type="date"  name="dateTo" id = "to" class = "Date">
        </div>
        <div class = "tableOrder">
            <table>
                <tr>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <?php
                    foreach($result as $values)
                    {
                        echo "<td>".$values['created_at']."<a href=''>+</a></td>" ;
                        echo "<td>".$values['status']."</td>" ;
                        echo "<td>".$values['total_price']."</td>" ;
                        echo "<td><a href='cancelorder.php?row=".$values['id']."'>Cancel</a></td>";
                    }
                    $sql = "SELECT `created_at`, status , `total_price`FROM orders WHERE `created_at` <= $toDate AND `created_at`>= $fromDate " ;
                    $st = $db->prepare($sql) ;
                    $st->execute();
                    $result = $st->fetchAll();
                    $total_pages = ceil(count($result)/$limit);
                    for ($i=1; $i <= $total_pages ; $i++)
                    {
                       echo "<a href='order.php?page=".$i."'>".$i."</a>";
                    }
                    ?>
                </tr>
            </table>
        </div>
        <div class = "total">
            <lable class = "amount">Total: </lable>
            <span><?php 
            $query = "SELECT SUM(`total_price`) FROM orders WHERE `created_at` <= $toDate AND `created_at`>= $fromDate " ;
            $stmt = $db->prepare($sql) ;
            $stmt->execute();
            $result = $stmt->fetchAll();
            print_r($result);
            ?></span>
            <lable class = "pound">EGP </lable>
    </div>
</div>
<script src = "selectOrder.js"></script>
</body>
</html>