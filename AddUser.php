<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
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
<body>
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
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="">Users</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="#">Orders</a></li>
                    <li><a href="#">Checks</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <div class="container-contact100">
    <div class="wrap-contact100">
        <?php
            $pageName = 'user.php';
            if (isset($_GET['operation'])) {
                if ($_GET['operation'] == 'update') {
                    $pageName = 'updateUser.php?id='.$_GET['id'];
                }
            }
        ?>
        <form action=<?php echo $pageName; ?> method="post" enctype = "multipart/form-data" class="contact100-form validate-form">
				<span class="contact100-form-title">
					Add User
				</span>

            <div class="wrap-input100 validate-input" data-validate="Name is required">
                <span class="label-input100">Your Name</span>
                <input class="input100" type="text" name="name" placeholder="Enter your name" value="">
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                <span class="label-input100">Email</span>
                <input class="input100" type="text" name="email" placeholder="Enter your email addess" value="">
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate = "Password must be more than 8 character">
                <span class="label-input100">Password</span>
                <input class="input100" type="password" name="pass" placeholder="Enter your password" value="">
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate = "Confirm password not match Password">
                <span class="label-input100">Password</span>
                <input class="input100" type="password" name="cpass" placeholder="Enter confirm password" value="">
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate = "Room Number is required">
                <span class="label-input100">Room No.</span>
                <input class="input100" type="text" name="roomNo" placeholder="Enter Room Number" value="">
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate = "Ext. is required">
                <span class="label-input100">Ext.</span>
                <input class="input100" type="text" name="ext" placeholder="Enter Ext. Number" value="">
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate = "Profile Picture is required">
                <span class="label-input100">Profile Picture</span>
                <input class="input100" type="file" name = "profil" placeholder="Enter Ext. Number" value="">
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



    <div id="dropDownSelect1"></div>
    <script src="https://use.fontawesome.com/6216855c1e.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.2/js/animsition.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="public/js/add_user.js"></script>
</body>
</html>