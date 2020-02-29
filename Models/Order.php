<?php

require_once ("utils/DBConnection.php");
require_once ("Models/User.php");

class Order {
    private static $db;
    private $user_id;

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

    function getUser($id) 
    {
        $this->user_id = $id;
        $user = new User;
        return $user->getUserById($id);
    }

    function getDistinctUsersData() 
    {
        $query = "SELECT DISTINCT `user_id`, sum(amount) as amount FROM users_orders";
        $stmt = self::$db->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }
    
    function getUserOrders($userId,$fromDate,$toDate){
        $result = [];
        $stmt=self::$db->prepare("SELECT DISTINCT orders.id AS orderId,orders.created_at as order_date, orders.status as status , orders.total_price from users_orders ,orders WHERE users_orders.user_id = ? and orders.id = users_orders.order_id and orders.created_at <= ? and created_at>= ?");
        $stmt->execute([$userId,$toDate,$fromDate]);
        $orders = $stmt->fetchAll(PDO::FETCH_OBJ);
//        var_dump($orders);
        foreach ($orders as $order){
            $resultObj = new stdClass();
            $resultObj->orderId = $order->orderId;
            $resultObj->order_date = $order->order_date;
            $resultObj->total_price = $order->total_price;
            $resultObj->status = $order->status;

            $stmt3=self::$db->prepare("SELECT users_orders.total_price as total_price , users_orders.amount as amount, products.name as `name` ,products.picture as picture FROM users_orders,products WHERE products.id = users_orders.product_id and users_orders.order_id = ?");
            $stmt3->execute([$order->orderId]);
            $productsData = $stmt3->fetchAll(PDO::FETCH_OBJ);
            $resultObj->products = $productsData;
//            echo "\n";
            array_push($result,$resultObj);
        }

        return $result;
    }

    function getWaitedOrders(){
        $result = [];
        $stmt=self::$db->prepare("SELECT id,created_at as order_date,total_price FROM `orders` WHERE `status` = ?");
        $stmt->execute([0]);
        $orders = $stmt->fetchAll(PDO::FETCH_OBJ);
//        var_dump($row);
        foreach($orders as $order)
        {
            $resultObj = new stdClass();
            $resultObj->order_date = $order->order_date;
            $resultObj->total_price = $order->total_price;
            $stmt2=self::$db->prepare("SELECT DISTINCT users.name as `name` ,users.roomNo as room , users.ext FROM users_orders,users WHERE users_orders.user_id = users.id AND users_orders.order_id = ?");
            $stmt2->execute([$order->id]);
            $userData = $stmt2->fetchAll(PDO::FETCH_OBJ);
            if(count($userData)==0) continue;
//            var_dump($userData);
            $resultObj->name = $userData[0]->name;
            $resultObj->room = $userData[0]->room;
            $resultObj->ext = $userData[0]->ext;
            $stmt3=self::$db->prepare("SELECT users_orders.total_price as total_price , users_orders.amount as amount, products.name as `name` ,products.picture as picture FROM users_orders,products WHERE products.id = users_orders.product_id and users_orders.order_id = ?");
            $stmt3->execute([$order->id]);
            $productsData = $stmt3->fetchAll(PDO::FETCH_OBJ);
//            var_dump($productsData);
            $resultObj->products = $productsData;
//            echo "\n";
            array_push($result,$resultObj);

        }
//        var_dump($result);
        return $result;
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

    function getOrderDate($id)
    {
        $query = "SELECT `created_at` FROM orders WHERE id = ?";
        $stmt=self::$db->prepare($query);
        $stmt->execute([$id]);
        $orderDate = $stmt->fetch(PDO::FETCH_OBJ);
        return $orderDate[0];
    }

    function getDistinctCheckUser($id)
    {
        $this->user_id = $id;
        $query = "SELECT DISTINCT order_id FROM users_orders WHERE user_id = ?";
        $stmt=self::$db->prepare($query);
        $stmt->execute([$id]);
        $orderDate = $stmt->fetchAll(PDO::FETCH_COLUMN);
        return $orderDate;
    }

    function getUserOrders()
    {
        $ordersId = $this->getDistinctCheckUser($this->user_id);
        $place_holders = implode(',', array_fill(0, count($ordersId), '?'));
        $stmt=self::$db->prepare("SELECT * FROM orders WHERE id IN ($place_holders)");
        $stmt->execute($ordersId);
        $usrOrders = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $usrOrders;
    }

    function getOrderProducts($id)
    {
        $query = "SELECT * FROM products WHERE id IN (SELECT DISTINCT product_id FROM users_orders WHERE order_id = ?)";
        $stmt=self::$db->prepare($query);
        $stmt->execute([$id]);
        $userProds = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $userProds;
    }
}
