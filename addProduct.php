<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Add Product </title>
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
</head>

<body id="main-body">
    

    <div id="container">
        <div class="title">
            <div class="menu">
                <table>
                    <td> <a href="Home.php?">Home | </a></td>
                    <td> <a href="Products.php?">Products | </a></td>
                    <td> <a href="Users.php?">Users | </a></td>
                    <td> <a href="ManualOrders.php?">Manual orders | </a></td>
                    <td> <a href="Checks.php?">Checks </a></td>
                </table>
            </div>
            <div class="header">
                <h5 class="adminname"><i class="fas fa-user-tie user"></i>Admin</h5>

            </div>
        </div>
        <div  class="main">
        <h1 class="addproduct">Add Product</h1>
        <form id="form" class="addproduct" method="POST" action="addProduct.php">
            <table class="list">
                <tr>

                    <td>Product</td>

                    <td> <input id="product_name" name="product_name" class="product_name" type="text"
                            maxlength="255" />
                        <span class="error" id="errorProductName">*</span></td>
                </tr>

                <tr >
                    <td>Price</td>

                    <td> <input name="price" id="price" type="number" min="1" max="100" step="0.5" value="1" size="10">
                        <span class="error" id="errorPrice">*</span></td>

                </tr>
                <tr id="category">
                    <td>Category</td>
                    <td> <select class="category" id="category" name="category">
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
                        </select> <span class="error" id="errorCategory">*</span>
                        <a href="addCategory.php?">add category</a></td>
                </tr>
                <tr id="product_picture">
                    <td>Product Picture</td>
                    <td><input type="file" name="Product_Picture">
                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                        <span class="error" id="errorPicture">*</span></td>
                </tr>

                <tr class="buttons">
                    <td></td>
                    <td> <input id="save" class="button_text" type="submit" name="submit" value="Save" />
                        <input id="reset" class="button_text" type="reset" name="reset" value="Reset" /></td>
                </tr>
            </table>
        </form>
        </div>                        
    </div>
    <style>
        .error {
            color: #FF0000;
        }
        .title {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
    </style>
    <script src = "addProduct.js"></script>
</body>

</html>