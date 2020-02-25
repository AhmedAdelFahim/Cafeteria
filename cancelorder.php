<?php
require_once("utils/DBConnection.php") ;
$db = \database_connection\DBConnection::getInstance() ;
$id= $_GET['row'];
$sql= "DELETE FROM orders where id=? AND status=?";
$stmt=$conn->prepare($sql);
$stmt->execute([$id , $status]);
?>