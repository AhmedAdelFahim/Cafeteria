<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Add Product </title>
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/createOrder.css">
</head>

<body id="main_body">

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
                <form id="form" class="addproduct" method="POST" action="addproduct.php">
                    <table class="notes">
                        <tr>

                            <td> Notes </td>

                            <td> <textarea></textarea> </td>
                        </tr>

                        <tr id="room">
                            <td> Room </td>

                            <td> 
                                <select id="roomValues">
                                    <option value="volvo">Volvo</option>
                                    <option value="saab">Saab</option>
                                    <option value="mercedes">Mercedes</option>
                                    <option value="audi">Audi</option>
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
                            <td id="price"><h4>EGP 360</h4></td>

                        </tr>

                        <tr class="buttons">
                            <td></td>
                            <td> 
                                <input id="saveForm" class="button_text" type="submit" name="submit" value="Confirm" />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div id="allProductsContainer">
                <div id="search">
                    <input height="3" id="searchBar" type="text" placeholder="Search..">
                    <i class="fa fa-search"></i>
                </div>
                <div id="selectContainer">
                    <h4>Add to user</h4>
                    <form id="form" class="selectUser" method="POST" action="addproduct.php">
                        <table class="notes">
                            <tr>

                                <td> 
                                    <select id="allUsers">
                                        <option value="volvo">Volvo</option>
                                        <option value="saab">Saab</option>
                                        <option value="mercedes">Mercedes</option>
                                        <option value="audi">Audi</option>
                                    </select>    
                                </td>
                            </tr>
                        </table>
                    </form>
                    <div id="separator"></div>
                    <div class="products">
                        <div class="product">
                            <img src="Assets/coffee.png"/>
                            <h4>Product name</h4>
                        </div>
                        <div class="product">
                            <img src="Assets/coffee.png"/>
                            <h4>Product name</h4>
                        </div>
                        <div class="product">
                            <img src="Assets/coffee.png"/>
                            <h4>Product name</h4>
                        </div>
                        <div class="product">
                            <img src="Assets/coffee.png"/>
                            <h4>Product name</h4>
                        </div>
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
</body>

</html>