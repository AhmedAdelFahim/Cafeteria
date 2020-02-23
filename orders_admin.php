<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Orders - Admin</title>
    <link rel="stylesheet" href="public/css/order_admin.css">
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
</head>
<body>
    <?php
        require_once("Models/Order.php");
        $order = new Order();
        $orders = $order->getWaitedOrders();
    ?>
    <header id="nav">
        <div id="links">
            <table class="nav">
                <td> <a href="">Home | </a></td>
                <td> <a href="">Users | </a></td>
                <td> <a href="">Products | </a></td>
                <td> <a href="">Orders</a></td>
                <td> <a href="">Checks</a></td>
            </table>
        </div>
        <div id="profile-data">
            <img id="profile-picture" src="public/img/admin.png"/>
            <a href="">Admin</a>
        </div>
    </header>
    <div class="container">
        <div class="table-container">
            <table class="orders-table">
                <thead>
                    <th>Order Date</th>
                    <th>Name</th>
                    <th>Room</th>
                    <th>Ext.</th>
                    <th>Action</th>
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
                                        <div class="card-header"><h1><?php echo $product->name ?></h1></div>
                                        <div ><img class="card-image"  src="public/img/tea.png"/></div>
                                        <div class="card-body"><h4>Total: <?php echo $product->total_price."$  ".$product->amount."X"  ?></h4></div>
                                    </div>
                                <?php } ?>
                            </div>
                            <h4>Total: <?php echo $order->total_price ?>$</h4>
                        </td>
                    </tr>
                    <?php } ?>
                    <!--<tr>
                        <td colspan="5">
                            <div class="order-details-container">
                                <div class="card">
                                    <div class="card-header"><h1>Tea</h1></div>
                                    <div ><img class="card-image"  src="public/img/tea.png"/></div>
                                    <div class="card-body"><h4>3 $</h4></div>
                                </div>
                                <div class="card">
                                    <div class="card-header"><h1>Tea</h1></div>
                                    <div ><img class="card-image"  src="public/img/tea.png"/></div>
                                    <div class="card-body"><h4>3 $</h4></div>
                                </div>
                                <div class="card">
                                    <div class="card-header"><h1>Tea</h1></div>
                                    <div ><img class="card-image"  src="public/img/tea.png"/></div>
                                    <div class="card-body"><h4>3 $</h4></div>
                                </div>
                                <div class="card">
                                    <div class="card-header"><h1>Tea</h1></div>
                                    <div ><img class="card-image"  src="public/img/tea.png"/></div>
                                    <div class="card-body"><h4>3 $</h4></div>
                                </div>
                                <div class="card">
                                    <div class="card-header"><h1>Tea</h1></div>
                                    <div ><img class="card-image"  src="public/img/tea.png"/></div>
                                    <div class="card-body"><h4>3 $</h4></div>
                                </div>
                                <div class="card">
                                    <div class="card-header"><h1>Tea</h1></div>
                                    <div ><img class="card-image"  src="public/img/tea.png"/></div>
                                    <div class="card-body"><h4>3 $</h4></div>
                                </div>
                            </div>
                            <h4>Total: 52$</h4>
                        </td>
                    </tr>
                    <tr>
                        <td>2020/3/04 10:10 AM</td>
                        <td>Ahmed Adel Fahim</td>
                        <td>12</td>
                        <td>12345</td>
                        <td>Pending</td>
                    </tr>-->
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>