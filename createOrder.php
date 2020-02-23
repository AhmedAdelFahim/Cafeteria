<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Add Product </title>
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/createOrder.css">
</head>

<body id="main_body">

    <?php
        require_once("Models/Product.php"); 
        require_once("Models/User.php");
        require_once("Controllers/ordersController.php");
        $product = new Product;
        $user = new User;

        $products = $product->All();
        $users = $user->All();
        $price = 0;

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $order = new ordersController;

            if(isset($_POST['products'])){
                $order->adminSaveOrder($_POST['products'], $_POST['user'], $_POST['notes'], $_POST['price'] );
            }else{
                $error = "Please select a product";
            }
        }
    ?>
    <div id="container">
        <div class="title">
            <div class="menu">
                <table class="nav">
                    <td> <a href="Home.php?">Home | </a></td>
                    <td> <a href="Products.php?">Products | </a></td>
                    <td> <a href="Users.php?">Users | </a></td>
                    <td> <a href="ManualOrders.php?">Manual orders | </a></td>
                    <td> <a href="Checks.php?">Checks </a></td>
                </table>
            </div>
            <div class="profilePic">
                <a href=""><img src="Assets/admin.png"/>Admin</a>
            </div>
        </div>
        <div id="bodyContainer">
            <div id="formContainer">
                <form id="form" class="addproduct" method="POST" action="">
                    <table class="notes" id="notes">
                        <tr>

                            <td> Notes </td>

                            <td> <textarea name="notes"></textarea> </td>
                        </tr>

                        <tr id="room">
                            <td> Room </td>

                            <td> 
                                <select name="room" id="roomValues">
                                    <option value="100">100</option>
                                    <option value="200">200</option>
                                    <option value="300">300</option>
                                    <option value="400">400</option>
                                </select>
                            </td>

                        </tr>

                        <tr>
                            <td>
                            </td>
                            <td>
                                <hr>
                            </td>
                        </tr>

                        <tr id="productpicture">
                            <td></td>
                            <td id="price"><h4 id="totalPrice">EGP <? if(isset($price)){ echo $price; }else{ echo 0; } ?></h4></td>

                        </tr>

                        <tr class="buttons">
                            <td></td>
                            <td> 
                                <input id="saveForm" class="button_text" type="submit" name="submit" value="Confirm" />
                            </td>
                        </tr>
                    </table>
                
            </div>
            <div id="allProductsContainer">
                <div id="search">
                    <input height="3" id="searchBar" type="text" placeholder="Search..">
                    <i class="fa fa-search"></i>
                </div>
                <div id="selectContainer">
                    <h4>Add to user</h4>
                    
                        <table class="notes">
                            <tr>

                                <td> 
                                    <select name="user" id="allUsers">
                                        <?php
                                            foreach($users as $user) {
                                        ?>
                                        <option value="<?php echo $user->id; ?>"><?php echo $user->name; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>    
                                </td>
                            </tr>
                        </table>
                    </form>
                    <div id="separator"></div>
                    <div class="products">
                        <?php 
                            foreach($products as $product){
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
                </div>
            </div>
        </div>
        

    </div>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
    <script src="https://kit.fontawesome.com/20351afc5f.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="public/JS/createOrder.js"></script>
</body>

</html>