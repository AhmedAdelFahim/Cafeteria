<?php
require 'utils/DBConnection.php';

$db = database_connection\DBConnection::getInstance();

$id= $_GET['id'];
$status= $_GET['status'];

var_dump($_GET);
$query = 'UPDATE orders SET `status`=? WHERE id=?';

$stmt = $db->prepare($query);

$stmt->execute([$status,$id]);

header("Location: ordersAdmin.php");

?>