<html>
<head>
    <title>Login</title>
<!--    <link href="public/css/login.css" rel="stylesheet">-->
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hamburgers/1.1.3/hamburgers.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.2/js/animsition.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="public/css/util_form.css">
    <link rel="stylesheet" type="text/css" href="public/css/main_form.css">
</head>

<body>
<div class="container-contact100">
    <div class="wrap-contact100">
<!--        <h1 class="headerName">Cafeteria</h1>-->
        <form class="contact100-form validate-form" action="validateLogin.php" method="post" enctype="">
                <?php
                session_start();
                if (isset($_SESSION['updateMsg'])) {
                    echo '<br> <label style="color:green; margin-left: 400px;">'.$_SESSION['updateMsg'].'</label>';
                    unset($_SESSION['updateMsg']);
                    echo'<br>';
                }
                ?>
				<span class="contact100-form-title">
					Login
				</span>



            <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                <span class="label-input100">Email</span>
                <input class="input100" type="text" name="emailValue" placeholder="Enter your email addess">
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate = "Password is required">
                <span class="label-input100">Password</span>
                <input class="input100" type="password" name="passValue" placeholder="Enter password">
                <span class="focus-input100"></span>
            </div>

            <?php
            if (isset($_SESSION['errorMsg'])) {
                echo ' <label style="color:red; ">'.$_SESSION['errorMsg'].'</label>';
                unset($_SESSION['errorMsg']);
            }
            ?>
<!--            <label style="color:red;">''</label>-->
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

<script src="https://use.fontawesome.com/6216855c1e.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animsition/4.0.2/js/animsition.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</body>
</html>