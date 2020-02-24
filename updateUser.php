<?php
    require 'utils/DBConnection.php';
    $conn = database_connection\DBConnection::getInstance();

    $sql = 'UPDATE users SET name=?, email=?, password=?, roomNo=?, ext=?, picture=?, privilege=?
            where id=?';
    $stat = $conn->prepare($sql);
    $stat->execute([$_POST['name'], $_POST['email'], $_POST['pass'], $_POST['roomNo'], $_POST['ext'], 'upload/'.$_FILES['profil']['name'], 'user', $_GET['id']]);

    header('location:AllUsers.php?updated=1');
