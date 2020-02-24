<?php
    require 'utils/DBConnection.php';
    $conn = database_connection\DBConnection::getInstance();

    $sql = "DELETE FROM users WHERE id=$_GET[id]";

    $conn->exec($sql);

    header('location:allUsers.php?deleted=1');
