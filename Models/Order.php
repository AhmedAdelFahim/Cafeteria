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

    function getLastOrder($userId){
        $query = "SELECT users_orders.total_price as total_price , users_orders.amount as amount, products.name as `name` ,products.picture as picture from users_orders ,products WHERE users_orders.user_id = ? AND users_orders.product_id = products.id AND users_orders.order_id = (SELECT MAX(users_orders.order_id) FROM users_orders WHERE users_orders.user_id = ? );";
        $stmt = self::$db->prepare($query);
        $stmt->execute([$userId,$userId]);
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
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