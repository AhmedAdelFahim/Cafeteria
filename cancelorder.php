<?php
require_once("utils/DBConnection.php") ;
$db = \database_connection\DBConnection::getInstance() ;
$id= $_GET['row'];
$sql= "DELETE FROM orders where id=?";
$stmt=$db->prepare($sql);
$stmt->execute([$id]);
header("Location: ordersUser.php?from=". date("Y-m-d",time()-604800)."&to=".date("Y-m-d",time()+604800));
?>
