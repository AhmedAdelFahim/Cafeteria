<html>
    <head>
        <title>Forget-Password</title>
        <link href="public/css/forgetPassPage.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <h1 class="headerName">Cafeteria</h1>
            <form class="formBox" name="loginForm" action="updatePassword.php" method="post" enctype="">
                <label class="emailLabel">Email</label>
                <input type="email" value="" placeholder="Enter your email" name="emailValue" class="emailBox">
                <br><br><br>

                <label class="passLabel">New Password</label>
                <input type="password" value="" placeholder="Enter new Password" name="passValue" class="passBox" id="passBox">
                <br><br><br>

                <label class="confirmPassLabel">Confirm new Password</label>
                <input type="password" value="" placeholder="Confirm new Password" name="confirmPassValue" class="confirmPassBox" id="confirmPassBox">
                <br>
                <label id="error" class="error"></label>
                <br><br>

                <input type="submit" value="Submit" name="submitButton" class="submitBox" id="submitBox">
            </form>

        </div>

        <script>
            function checkPass (){
                passValue = document.getElementById("passBox").value;
                confirmPassValue = document.getElementById("confirmPassBox").value;
                if (passValue == confirmPassValue) {
                    document.getElementById("submitBox").disabled=false;
                    document.getElementById("error").innerHTML="";
                    console.log("equal");
                }else{
                    console.log("not equal");
                    document.getElementById("error").innerHTML="*Not identical Password!";
                    document.getElementById("submitBox").disabled=true;
                }
            }

            document.getElementById("confirmPassBox").addEventListener("keyup",checkPass);

        </script>
    </body>
</html>