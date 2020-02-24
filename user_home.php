<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home - User</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">-->
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hamburgers/1.1.3/hamburgers.min.css">-->
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.2/js/animsition.min.js">-->
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js">-->
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.css">-->
    <link rel="stylesheet" href="public/css/min_css.lass">
    <link rel="stylesheet" href="public/css/user_home.css">

</head>
<body>
    <?php

        require_once("Models/Product.php");
        require_once("Models/User.php");
        require_once("Models/Order.php");
        require_once ("utils/check_authorization.php");
        checkAuthorization("user");
//        session_start();
        $product = new Product;
        $user = new User;
        $products = $product->All();
        $userId = $_SESSION["userId"];
        $userData = $user->getUserById($userId);
        $userName = $userData->name;
        $order = new Order();
        $orders = $order->getLastOrder($userId);
//        var_dump($orders);
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
                    <img id="profile-picture" src="<?php echo $userData->picture; ?>"/>
                    <a href=""><?php echo $userData->name; ?></a>
                </div>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav pull-right">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="">My Orders</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <div class="my-container">

        <div id="order-card">
            <form id="order-form">
                <table>
                    <tbody id="order-card-body">
                        <tr>
                            <td colspan="4">
                                <label>Notes:</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <textarea cols="33" rows="7"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Room No</td>
                            <td colspan="2"><select name="room_no">
                                    <option value="<?php echo $userData->roomNo ?>"><?php echo $userData->roomNo ?></option>
                                </select></td>
                        </tr>
                        <tr>
                            <td colspan="4"><h4 class="display-inline">Total : </h4><h4 class="display-inline" id="total">0</h4><h4 class="display-inline"> $</h4></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <input type="submit" value="SUBMIT"/>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <div id="products-orders-container">
            <div><h3>Latest Orders</h3></div>
            <div id="latest-orders">
                <?php
                foreach ($orders as $order) {
                    ?>
                    <div class="card">
                        <div class="card-header"><h1><?php echo $order->name; ?></h1></div>
                        <div ><img class="card-image"  src="public/img/tea.png"/></div>
                        <div class="card-body"><h4 class="display-inline">Total: </h4></h4><h4 class="display-inline"><?php echo $order->total_price; ?> </h4><h4 class="display-inline">$</h4></div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div>---------------------------------------------------------------------------------------------------------------------------------------------------------</div>
            <div id="all-products">
                <?php
                    foreach ($products as $product) {
                ?>
                <div class="card" id="<?php echo $product->id ?>">
                    <div class="card-header"><h1><?php echo $product->name; ?></h1></div>
                    <div ><img class="card-image"  src="public/img/tea.png"/></div>
                    <div class="card-body"><h4 class="display-inline"><?php echo $product->price; ?> </h4><h4 class="display-inline">$</h4></div>
                </div>
                <?php
                    }
                ?>

                </div>
            </div>
        </div>
    </div>

    <script src="public/js/user_home.js"></script>
</body>
</html>