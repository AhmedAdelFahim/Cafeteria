<?php
require_once ("utils/DBConnection.php");
//foreach (json_decode($_POST["products"],true) as $product){
//        echo $product["id"] ." => ".$product["value"]."\n";
//}
function insert($status = 0 , $total_price , $notes,$products)
{
    session_start();
    $db = \database_connection\DBConnection::getInstance();
//    $db->beginTransaction();
    $query = "INSERT INTO orders (`status`, `total_price`, `notes`, `created_at`, `updated_at`) VALUES ( ? , ? , ? , ? , ? );";
    $stmt = $db->prepare($query);
    $stmt->execute([$status,$total_price,$notes,date("Y-m-d H:i:s"),date("Y-m-d H:i:s")]);
    $result = $stmt->rowCount();

    if($result > 0){
        $orderId = $db->lastInsertId();
        $userId=$_SESSION['userId'];                                      //static
        $query = "INSERT INTO users_orders (`user_id`, `product_id`, `order_id`,`total_price`,`amount`) VALUES ( ? , ? , ? , ? , ? );";
        $stmt = $db->prepare($query);
        foreach (json_decode($products,true) as $product){
                $stmt2=$db->prepare("Select `price` FROM products where id=?");
                $stmt2->execute([$product["id"]]);
                $price = $stmt2->fetchAll(PDO::FETCH_OBJ)[0]->price;
                $stmt->execute([$userId,$product["id"],$orderId,$price*$product["value"],$product["value"]]);
        }
        $result = $stmt->rowCount();
        if($result>0)
        {
//            $db.commit();
            return true;
        }else{
//            $db->rollBack();
            return false;
        }
    }else{
//        $db->rollBack();
        return false;
    }
}

insert(0,$_POST["total"],$_POST["notes"],$_POST["products"]);