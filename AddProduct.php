<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Add Product </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hamburgers/1.1.3/hamburgers.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.2/js/animsition.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="public/css/util_form.css">
    <link rel="stylesheet" type="text/css" href="public/css/main_form.css">
    <link rel="stylesheet" href="public/css/min_css.lass">
</head>

<body id="main-body">


<div id="container">
    <?php
    require_once ("utils/check_authorization.php");
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

    <div class="container-contact100">
        <div class="wrap-contact100">
            <?php
                $pageName = 'insert_product.php';
                if (isset($_GET['operation'])) {
                    if ($_GET['operation'] == 'update') {
                        $pageName = 'updateProduct.php?id='.$_GET['id'];

                        require_once 'utils/DBConnection.php';
                        $conn = database_connection\DBConnection::getInstance();

                        $stat = $conn->prepare('SELECT * FROM products WHERE id = ?');

                        $stat->execute([$_GET['id']]);

                        foreach($stat->fetchAll() as $result) {
                            $nameValue = $result['name'];
                            $priceValue = $result['price'];
                        };

                    }
                }
            ?>
            <form class="contact100-form validate-form" method="POST" action=<?php echo $pageName; ?> enctype = "multipart/form-data">

                <span class="contact100-form-title">
					Add Product
				</span>



                <div class="wrap-input100 validate-input" data-validate = "Product Name is required">
                    <span class="label-input100">Product Name</span>
                    <input id="product_name" name="product_name" class="input100" type="text" placeholder="Enter Product Name" 
                    maxlength="255" <?php if(isset($nameValue)){ echo 'value='.$nameValue; } else {echo 'value=""';}?> />
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Invalid Price">
                    <span class="label-input100">Price</span>
                    <td> <input name="price" id="price" class="input100" type="number" min="1" max="100" step="0.5" size="10"
                        placeholder="Enter Product Name" <?php if(isset($priceValue)){ echo 'value='.$priceValue; } else {echo 'value=""';}?> >
                    <span class="focus-input100"></span>
                </div>


                <div class="wrap-input100 input100-select">
                    <span class="label-input100">Category</span>
                    <div id="categories-container">
                        <select class="selection-2 category" id="category" name="category">
                            <?php
                            require_once('getAllCategories.php');
                            // $category = [];
                            $categories = getAllCategories();
                            // $categories = $db->getAllCategories();
                            // var_dump($categories);
                            foreach($categories as $category) {
                                echo "<option value='".$category['id']."'>{$category['name']}</option>";
                            }
                            ?>
                        </select>
                        <button type="button" style="background-color: #222222; color: white;" class="btn btn-circle add-category"><i class="fa fa-plus"></i></button>
                    </div>
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Profile Picture is required">
                    <span class="label-input100">Profile Picture</span>
                    <input class="input100" type="file" name = "Product_Picture"  value="">
                    <span class="focus-input100"></span>
                </div>

                <div class="container-contact100-form-btn">
                    <div class="wrap-contact100-form-btn">
                        <div class="contact100-form-bgbtn"></div>
                        <button class="contact100-form-btn">
							<span>
								Submit
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<script src="https://use.fontawesome.com/6216855c1e.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.2/js/animsition.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src = "public/js/add_product.js"></script>
</body>

</html>