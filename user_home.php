<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home - User</title>
    <link rel="stylesheet" href="public/css/user_home.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <?php
        require_once("Models/Product.php");
        require_once("Models/User.php");
        $product = new Product;
        $user = new User;
        $products = $product->All();
        $userId = 1;
        $userData = $user->getUserById(1);
        $userName = $userData->name;
    ?>
    <header id="nav">
        <div id="links">
            <table class="nav">
                <td> <a href="user_home.php">Home | </a></td>
                <td> <a href="">My Orders</a></td>
            </table>
        </div>
        <div id="profile-data">
            <img id="profile-picture" src="public/img/admin.png"/>
            <a href=""><?php echo $userName ?></a>
        </div>
    </header>

    <div class="container">

        <div id="order-card">
            <form id="order-form">
                <table>
                    <tbody id="order-card-body">
                        <!--<tr>
                            <td>Tea</td>
                            <td><INPUT TYPE="NUMBER" MIN="0"  STEP="1" VALUE="0" SIZE="6"></td>
                            <td>2 $</td>
                            <td><button>X</button></td>
                        </tr>-->
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
                <!--<div class="card">
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
                </div>-->
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