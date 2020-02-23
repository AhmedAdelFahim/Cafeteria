
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link href="adduser.css" rel="stylesheet">
</head>
<body>
    <div class="allcontainer">
        <div class = "divcontainer">
        <div class="admin">
        <a href="Homepage.html">Home</a><span> | </span>
        <a href="Product.html">Product</a><span> | </span>
        <a href="Users">Users</a><span> | </span>
        <a href="Maualorder.html">Manual Order</a><span> | </span>
        <a href="checks.html">Checks</a>
    </div>
    <div class="pic">
    <img src = "Assets/admin.png"/><a href="">Admin</a>
    </div>
        </div>
    <div class="form">
        <h1>Add User </h1> 
        <form action="user.php" method="post" enctype = "multipart/form-data">
            <table class ="table">
                <tr>
                    <td class = "row"> Name </td>
                    <td><input type="text" name="name" class="Name" id="name" placeholder=" Enter name">
                    <span class="error" id="errorName">* </span></td>
                </tr>
                <tr>
                    <td class = "row"> Email </td>
                    <td><input type="text" name="email" class="Name" id="email" placeholder=" Enter email">
                    <span class="error" id="errorEmail">*</span></td>
                </tr>
                <tr>
                    <td class = "row">Passowrd</td>
                    <td><input type="password" name="pass" class="Name" id="password" placeholder=" Enter password">
                    <span class="error" id="errorPass">*</span></td>
                </tr>
                <tr>
                    <td class = "row">Confirm Passowrd</td>
                    <td><input type="password" name="cpass" class="Name" id="cPassword" placeholder=" Enter confirm password">
                    <span class="error" id="errorCpass">*</span></td>
                </tr>
                <tr>
                    <td class = "row">Room No.</td>
                    <td><input type="text" name="roomNo" class="Name" id="room_No" placeholder=" Enter room number">
                    <span class="error" id="errorRoom">*</span></td>
                </tr>
                <tr>
                    <td class = "row">Ext.</td>
                    <td><input type="text" name="ext" class="Name" id="Ext" placeholder=" Enter ext">
                    <span class="error" id="errorExt">*</span></td>
                </tr>
                <tr>
                    <td class = "row">Profile picture </td>
                    <td><input type = "file" name = "profil" class="Name" id="Profile">
                    <span class="error" id="errorPic">*</span></td>
                </tr>
                <tr>
                    <td> <input type="submit" name="submit" value="Save" id ="Save" class = "button"></input></td>
                    <td> <input type="reset" name="reset" value="Reset" class = "button"></input></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<script src = "addinguser.js"></script>
</body>
</html>