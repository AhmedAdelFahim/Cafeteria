<?php
$errName  = $errEmail = $errPasswordTxt = $errCPassword = $errRoom = $errEXT= $errProfileImg = "" ;
if( $_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty($_POST["name"]))
    {
        $errName = "you must enter your name";
    }
    if(empty($_POST["email"]))
    {
        $errEmail = "you must enter your email";
    }
    else
    {
        $email = $_POST["email"] ;
        if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email))
        {
            $errEmail = "invalid email";
        }
    }
    if(empty($_POST["pass"]))
    {
        $errPasswordTxt = "you must enter the password";
    }
    else
    {
        $passwordTxt = $_POST["pass"] ;
        if(strlen($_POST["pass"]) < 8)
        {
            $errPasswordTxt = " your password must contain at least 8 char ." ;
        }
        if(preg_match('/[\'^£$%&*()}{@#~?><>,|=+¬-]/', $passwordTxt)) 
        {
            $errPasswordTxt = "your password contains only underScore" ;
        }
        if(preg_match("#[A-Z]+#", $passwordTxt))
        {
            $errPasswordTxt = "your password can't conain capital letter" ;
        }
    }
    if(empty($_POST["cpass"]))
    {
        $errCPassword = "you must enter the confirm password";
       
    }
    else
    {
        $cPassword = $_POST["cpass"] ;
        if (strcmp($passwordTxt, $cPassword) !== 0)
        {
            $errCPassword = "Passwords aren't match!";
           
        }
    }
    if(empty($_POST["roomNo"]))
    {
        $errRoom = "you must enter room number";
        
    }
    if(empty($_POST["ext"]))
    {
        $errEXT = "you must enter the ext";
        
    }
    if(empty($_FILES["profil"]))
    {
        $errProfileImg = "you must choose image";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link href="adduser.css" rel="stylesheet">
</head>
<body>
    <div class="container">
    <div class="admin">
        <a href="Homepage.html">Home</a><span>| </span>
        <a href="Product.html">Product</a><span>| </span>
        <a href="Users">Users</a><span>| </span>
        <a href="Maualorder.html">Manual Order</a><span>| </span>
        <a href="checks.html">Checks</a>
    </div>

    <div class="pic">
    <a href=""><img src = "Assets/admin.png"/>Admin</a>
    </div>
    <div class="form">
        <h1>Add User </h1> 
        <form action="user.php" method="post" enctype = "multipart/form-data">
            <table class ="table">
                <tr>
                    <td> Name </td>
                    <td><input type="text" name="name" class="Name" id="name">
                    <span class="error" id="errorName">* <?php echo $errName;?></span></td>
                </tr>
                <tr>
                    <td> Email </td>
                    <td><input type="text" name="email" class="Name" id="email">
                    <span class="error" id="errorEmail">*<?php echo $errEmail;?></span></td>
                </tr>
                <tr>
                    <td>Passowrd</td>
                    <td><input type="password" name="pass" class="Name" id="password">
                    <span class="error" id="errorPass">*<?php echo $errPasswordTxt;?></span></td>
                </tr>
                <tr>
                    <td>Confirm Passowrd</td>
                    <td><input type="password" name="cpass" class="Name" id="cPassword">
                    <span class="error" id="errorCpass">*<?php echo $errCPassword;?></span></td>
                </tr>
                <tr>
                    <td>Room No.</td>
                    <td><input type="text" name="roomNo" class="Name" id="room_No">
                    <span class="error" id="errorRoom">*<?php echo $errRoom;?></span></td>
                </tr>
                <tr>
                    <td>Ext</td>
                    <td><input type="text" name="ext" class="Name" id="Ext">
                    <span class="error" id="errorExt">*<?php echo $errEXT;?></span></td>
                </tr>
                <tr>
                    <td>Profile picture </td>
                    <td><input type = "file" name = "profil" class="Name" id="Profile">
                    <span class="error" id="errorPic">*<?php echo $errProfileImg;?></span></td>
                </tr>
                <tr>
                    <td> <button type="submit" name="save" id ="Save"> Save </button> </td>
                    <td> <button type="reset" name="reset"> reset </button> </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<script src = "addinguser.js"></script>
</body>
</html>