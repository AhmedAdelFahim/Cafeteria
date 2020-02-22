<html>
    <head>
        <title>Login</title>
        <link href="public/css/login.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <h1 class="headerName">Cafeteria</h1>
            <form class="formBox" name="loginForm" action="validateLogin.php" method="post" enctype="">
                <?php
                    session_start();
                    if (isset($_SESSION['updateMsg'])) {
                        echo '<br> <label style="color:green; margin-left: 400px;">'.$_SESSION['updateMsg'].'</label>';
                        unset($_SESSION['updateMsg']);
                        echo'<br>';
                    }
                ?>
                <label class="emailLabel">Email</label>
                <input type="email" value="" placeholder="Enter your email" name="emailValue" class="emailBox">
                <br><br><br><br>

                <label class="passLabel">Password</label>
                <input type="password" value="" placeholder="Enter your password" name="passValue" class="passBox">

                <?php
                    if (isset($_SESSION['errorMsg'])) {
                        echo '<br><br> <label style="color:red; margin-left: 400px;">'.$_SESSION['errorMsg'].'</label>';
                        unset($_SESSION['errorMsg']);
                    }
                ?>
                <br><br><br>

                <input type="submit" value="Login" name="loginButton" class="loginBox">
            </form>

            <br><br>
            <a href="forgetPassPage.php" class="forgetPassBox">Forget Password?</a>
        </div>

    </body>
</html>