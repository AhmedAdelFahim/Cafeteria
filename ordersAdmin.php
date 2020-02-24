<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Orders - Admin</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/util.css">
    <link rel="stylesheet" type="text/css" href="public/css/main.css">
    <link rel="stylesheet" href="public/css/order_admin.css">
    <link rel="stylesheet" href="public/css/min_css.lass">
    <!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
</head>
<body>
    <?php
    require_once("Models/Order.php");
    require_once ("utils/check_authorization.php");
    $order = new Order();
    $orders = $order->getWaitedOrders();
    checkAuthorization("admin");
    ?>
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
    <div class="limiter">
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100">
                <table>
                    <thead>
                    <tr class="table100-head">
                        <th>Order Date</th>
                        <th>Name</th>
                        <th>Room</th>
                        <th>Ext.</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($orders as $order){ ?>
                        <tr>
                            <td><?php echo $order->order_date?></td>
                            <td><?php echo $order->name?></td>
                            <td><?php echo $order->room?></td>
                            <td><?php echo $order->ext?></td>
                            <td>Pending</td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <div class="order-details-container">
                                    <?php foreach ($order->products as $product){ ?>
                                        <div class="card">
                                            <div class="card-header"><h3><?php echo $product->name ?></h3></div>
                                            <div ><img class="card-image"  src="public/img/tea.png"/></div>
                                            <div class="card-body"><h4>Total: <?php echo $product->total_price."$  ".$product->amount."X"  ?></h4></div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <h4 >Total: <?php echo $order->total_price ?>$</h4>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/20351afc5f.js" crossorigin="anonymous"></script>
</body>
</html>