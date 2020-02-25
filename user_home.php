<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home - User</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
        $product = new Product;
        $user = new User;
        $products = $product->All();
        $userId = $_SESSION["userId"];
        $userData = $user->getUserById($userId);
        $userName = $userData->name;
        $order = new Order();
        $orders = $order->getLastOrder($userId);
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
                    <li class="active"><a href="user_home.php">Home</a></li>
                    <li><a href="">My Orders</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>



    <div class="my-container">

        <div id="order-card">
            <form id="order-form">
                <table >
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
                            <td colspan="4" >
                                <input  type="submit" style="background-color: #222222; color: white;" class="btn" value="SUBMIT"/>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <div id="products-orders-container">
            <div class="notify-container"><h3 class="display-inline">Latest Orders</h3>
                <div class="alert alert-danger alert-dismissible display-inline " role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Errors!</strong><p class="display-inline" id="alert-msg"></p>
                </div>
            </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/6216855c1e.js"></script>
    <script src="public/js/user_home.js"></script>
</body>
</html>