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
    <link rel="stylesheet" href="public/css/checks.css">
    <link rel="stylesheet" href="public/css/createOrder.css">
    <link rel="stylesheet" href="public/css/min_css.lass">
    <!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
</head>
<body>
    <?php
    require_once("Models/Order.php");
    require_once("Models/User.php");
    $order = new Order();
    $users = new User();
    $eachUserData = $order->getDistinctUsersData();

    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }
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
                    <li><a href="allProduct.php">Products</a></li>
                    <li><a href="ordersAdmin.php">Orders</a></li>
                    <li><a href="checks.php">Checks</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
    <div class="limiter">
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table100">
                <h2>Checks</h2>
                <table>
                    <tr id="room">
                        <td> 
                            <select name="users" id="users">
                                <option disabled selected>User</option>
                                <?php
                                    foreach($users->All() as $user) {
                                ?>
                                <option value="<?php echo $user->id; ?>"><?php echo $user->name; ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </td>

                    </tr>
                </table>
                <table class="super">
                    <thead>
                    <tr class="table100-head">
                        <th>Name</th>
                        <th>Total Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(isset($_GET['user'])){
                        foreach ($eachUserData as $key => $userData){ 
                            if($userData->user_id == $_GET['user']){
                    ?>
                        <tr>
                            <td class="clicker"><button onclick="showDetails(<?php echo $key; ?>)" class="stretch">+</button> <?php if(isset($_GET['user'])) echo $order->getUser($_GET['user'])->name; else echo $order->getUser($userData->user_id)->name; ?></td>
                            <td><?php echo $userData->amount; ?></td>
                        </tr>
                        <tr class="details<?php echo $key; ?> details" colspan="2">
                            <td>
                                <table>
                                    <thead>
                                        <tr class="table100-head">
                                            <th>Order Date</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($order->getEachUserOrders() as $orders){
                                        ?>
                                        <tr>
                                            <td><?php print date("gA D F", strtotime($orders->created_at)); ?></td>
                                            <td><?php echo $orders->total_price; ?> EGP</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="products">
                                                                    <?php
                                                                        foreach($order->getOrderProducts($orders->id) as $product){
                                                                    ?>
                                                                    <div class="product selectProduct" data-id = "<? echo $product->id; ?>" data-name="<? echo $product->name; ?>" data-price="<? echo $product->price; ?>">
                                                                        <!-- <a href="createOrder.php?status=set&id=<?php echo $product->id; ?>"><img src="Assets/coffee.png"/></a> -->
                                                                        <img src="Assets/coffee.png"/>
                                                                        <h4><?php echo $product->name; ?></h4>
                                                                    </div>
                                                                
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    <?php 
                            break;
                            }
                        } 
                    }else{ 
                        foreach ($eachUserData as $key => $userData){ 
                    ?>
                        <tr>
                            <td class="clicker"><button onclick="showDetails(<?php echo $key; ?>)" class="stretch">+</button> <?php echo $order->getUser($userData->user_id)->name; ?></td>
                            <td><?php echo $userData->amount; ?></td>
                        </tr>
                        <tr class="details<?php echo $key; ?> details" colspan="2">
                            <td>
                                <table>
                                    <thead>
                                        <tr class="table100-head">
                                            <th>Order Date</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($order->getEachUserOrders() as $orders){
                                        ?>
                                        <tr>
                                            <td><?php print date("gA D F", strtotime($orders->created_at)); ?></td>
                                            <td><?php echo $orders->total_price; ?> EGP</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="products">
                                                                    <?php
                                                                        foreach($order->getOrderProducts($orders->id) as $product){
                                                                    ?>
                                                                    <div class="product selectProduct" data-id = "<? echo $product->id; ?>" data-name="<? echo $product->name; ?>" data-price="<? echo $product->price; ?>">
                                                                        <!-- <a href="createOrder.php?status=set&id=<?php echo $product->id; ?>"><img src="Assets/coffee.png"/></a> -->
                                                                        <img src="Assets/coffee.png"/>
                                                                        <h4><?php echo $product->name; ?></h4>
                                                                    </div>
                                                                
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="pag">
            <ul class="pagination">
                <li><a href="?pageno=1">First</a></li>
                <li class="<?php if ($pageno <= 1) {
                        echo 'disabled';
                    } ?>">
                    <a href="<?php if ($pageno <= 1) {
                        echo '#';
                    } else {
                        echo '?pageno='.($pageno - 1);
                    } ?>">Prev</a>
                </li>
                <li class="<?php if ($pageno >= $total_pages) {
                    echo 'disabled';
                    } ?>">
                    <a href="<?php if ($pageno >= $total_pages) {
                        echo '#';
                    } else {
                        echo '?pageno='.($pageno + 1);
                    } ?>">Next</a>
                </li>
                <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
            </ul>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/20351afc5f.js" crossorigin="anonymous"></script>
    <script src="public/js/checks.js"></script>
</body>
</html>