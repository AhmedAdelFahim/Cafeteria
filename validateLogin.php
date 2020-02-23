<?php

// spl_autoload_register(function ($getInstance) {
//     include 'utils/DBConnection.php';
// });
require 'utils/DBConnection.php';
session_start();

$_SESSION['userEmail'] = $_POST['emailValue'];
$userPass = $_POST['passValue'];

try {
    $conn = database_connection\DBConnection::getInstance();
    $stmt = $conn->prepare('SELECT * FROM users WHERE email=? AND password=?');
    $stmt->execute([$_SESSION['userEmail'], $userPass]);

    $trueData = 0;

    foreach ($stmt->fetchAll() as $row) {
        if ($row['privilege'] == 'user') {
            $_SESSION['userName'] = $row['name'];
            $_SESSION['userId'] = $row['id'];
            echo $_SESSION['userName'].' '.$_SESSION['userId'];
        } elseif ($row['privilege'] == 'admin') {
            $_SESSION['adminName'] = $row['name'];
            $_SESSION['adminId'] = $row['id'];
            echo $_SESSION['adminName'].' '.$_SESSION['adminId'];
        } else {
            echo 'Your data has not been completed yet';
        }
        $trueData = 1;
    }
    if ($trueData == 0) {
        $_SESSION['errorMsg'] = '*Invalid Email OR Password!';
        header('location:login.php');
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
