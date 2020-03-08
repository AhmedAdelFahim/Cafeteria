<?php

// spl_autoload_register(function ($getInstance) {
//     include 'utils/DBConnection.php';
// });
require 'utils/DBConnection.php';
session_start();
//var_dump($_SESSION);
//session_destroy();

$_SESSION['userEmail'] = $_POST['emailValue'];
$userPass = $_POST['passValue'];


try {
    $conn = database_connection\DBConnection::getInstance();
    // $stmt = $conn->prepare('SELECT * FROM users WHERE email=? AND password=?');
    // $stmt->execute([$_SESSION['userEmail'], $userPass]);

    $stmt = $conn->prepare('SELECT * FROM users WHERE email=?');
    $stmt->execute([$_SESSION['userEmail']]);

    $trueData = 0;
    $users = $stmt->fetchAll() ;
    if(count($users) == 0){
        $_SESSION['errorMsg'] = '*Invalid Email Address!';
        header("Location: Login.php");
    }

    foreach ($users as $row) {
        $hash = $row["password"];

        if (password_verify($userPass, $hash)) {
            if ($row['privilege'] == 'user') {
                $_SESSION['userName'] = $row['name'];
                $_SESSION['userId'] = $row['id'];
                echo $_SESSION['userName'].' '.$_SESSION['userId'];
                header("Location: user_home.php");
    
            } elseif ($row['privilege'] == 'admin') {
                $_SESSION['adminName'] = $row['name'];
                $_SESSION['userId'] = $row['id'];
                echo $_SESSION['adminName'].' '.$_SESSION['adminId'];
                header("Location: createOrder.php");
    
            } else {
                echo 'Your data has not been completed yet';
            }
            $trueData = 1;
        } else {
            $_SESSION['errorMsg'] = '*Invalid Email OR Password!';
       
            header("Location: Login.php");
        }
    }
    echo $verify;
} catch (Exception $e) {
    echo $e->getMessage();
}
