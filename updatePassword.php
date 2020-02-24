<?php

require 'utils/DBConnection.php';
session_start();

if (!isset($_SESSION['userEmail'])) {
    $_SESSION['userEmail'] = $_POST['emailValue'];
}

try {
    $conn = database_connection\DBConnection::getInstance();
    $stmt = $conn->prepare('UPDATE users SET password = ? WHERE email = ?');
    $stmt->execute([$_POST['passValue'], $_SESSION['userEmail']]);

    //send confirmation email to registered person to activate his account
    $to_email = $_SESSION['userEmail'];
    $subject = 'update Password';
    $body = 'Your Password was changed, If you did not change it click <a href="#">Report</a>';

    $headers = 'From: ';
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $sent = 1;
    mail($to_email, $subject, $body, $headers);
    if (mail($to_email, $subject, $body, $headers)) {
        echo 'email sent';
        $sent = 2;
    } else {
        $sent = 0;
    }

    if ($stmt->execute([$_POST['passValue'], $_SESSION['userId']])) {
        $_SESSION['updateMsg'] = 'Your Password updated successfully';
        header('location:Login.php');
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
