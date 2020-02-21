<?php

require_once ("utils/DBConnection.php");

class Order {
    private static $db;

    function __construct() {
        self::$db = \database_connection\DBConnection::getInstance();
    }

    function All(){
        $stmt=self::$db->prepare("Select * FROM orders");
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $row;
    }

    function insert($status = 0 , $product_id , $user_id , $total_price , $notes)
    {
        $query = "INSERT INTO orders (`status`, `product_id`, `user_id`, `price`, `notes`, `created_at`, `updated_at`) VALUES ( ? , ? , ? , ? , ? , ? , ?);";
        $stmt = self::$db->prepare($query);
        $stmt->execute([$status,$product_id,$user_id,$total_price,$notes,date("Y-m-d H:i:s"),date("Y-m-d H:i:s")]);

        $result = $stmt->rowCount();

        if($result > 0){
            return true;
        }else{
            return false;
        }
    }
}