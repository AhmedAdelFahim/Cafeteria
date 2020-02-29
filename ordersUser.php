<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Order</title>
    <!-- Latest compiled and minified CSS -->
<!--    <script src="public/lib/jquery-ui-1.12.1.custom/jquery-ui.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/util.css">
    <link rel="stylesheet" type="text/css" href="public/css/main.css">
<!--    <link rel="stylesheet" type="text/css" href="public/lib/jquery-ui-1.12.1.custom/jquery-ui.css">-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="public/css/order_admin.css">
    <link rel="stylesheet" href="public/css/min_css.lass">
    <!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
</head>
<body>
    <?php

    require_once("Models/User.php");
    require_once("Models/Order.php");
    require_once ("utils/check_authorization.php");
    checkAuthorization("user");
    $user = new User;
    $userId = $_SESSION["userId"];
    $userData = $user->getUserById($userId);
    $userName = $userData->name;
    $order = new Order();
//    $orders = $order->getUserOrders($userId,'2020-01-01','2020-03-03');
    $orders = $order->getUserOrders($userId,$_GET["from"],$_GET["to"]);
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
                    <img id="profile-picture" src="<?php if(empty($userData->picture)) { echo "Assets/admin.png"; } else { echo $userData->picture; } ?>"/>
                    <a href=""><?php echo $userData->name; ?></a>
                </div>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav pull-right">
                    <li class="active"><a href="user_home.php">Home</a></li>
                    <li><a href="">My Orders</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
<div class="limiter " style="display: flex; flex-direction: column; justify-content: center; align-items: center">
    <div style="display: flex; flex-direction: row;justify-content: space-between; width: 50vw; margin-top: 70px">
        <div class="dis-inline"><label style="margin-right: 10px">From</label><input type="text" name="dateFrom" id = "from" class = "Date dis-inline" ></div>
        <div class="dis-inline"><label style="margin-right: 10px">To</label><input type="text"  name="dateTo" id = "to" class = "Date dis-inline"></div>
    </div>
    <div class="" style="margin-top: 30px">
        <div class="wrap-table100">
            <div class="table100">
                <table>
                    <thead>
                    <tr class="table100-head">
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($orders as $order){ ?>
                        <tr id="<?php echo $order->orderId ?>">
                            <td><?php echo $order->order_date?></td>
                            <td><?php
                                switch ($order->status){
                                    case 0:
                                        echo "Processing";
                                        break;
                                    case 1:
                                        echo "Out of delivery";
                                        break;
                                    case 2:
                                        echo "Done";
                                        break;
                                }
                                ?></td>
                            <td><?php echo $order->total_price ." $"?></td>
                            <td><?php
                                    if($order->status== 0) {
                                        ?>
                                        <button class="cancel" id="<?php echo $order->orderId ?>">Cancel</button>
                                        <?php
                                    }
                                ?>
                            </td>

                        </tr>
                        <tr>
                            <td colspan="5">
                                <div class="order-details-container">
                                    <?php foreach ($order->products as $product){ ?>
                                        <div class="card">
                                            <div class="card-header"><h3><?php echo $product->name ?></h3></div>
                                            <div ><img class="card-image"  src="<?php echo $product->picture?>"/></div>
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
    <script src="public/js/order_user.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/20351afc5f.js" crossorigin="anonymous"></script>

</body>
</html>