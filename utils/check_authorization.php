<?php
require_once ("Models/User.php");
function checkAuthorization($pagePrivilege){
    session_start();
//    echo "aaaa";
//    var_dump($_SESSION['userId']);
    if(isset($_SESSION['userId'])&&!empty($_SESSION['userId'])){
        $id = $_SESSION['userId'];
        $user = new User();
        $userData = $user->getUserById($id);
        $privilege = $userData->privilege;
        if ($privilege == $pagePrivilege) {
            return true;
        }
    } else{
        header("Location: Login.php");
        return true;
    }
    header("Location: unauthorized_user.php");
    return false;

}