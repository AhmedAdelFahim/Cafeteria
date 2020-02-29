<?php

require_once ("Models/Order.php");

class ordersController {
    public function adminSetOrders($id)
    {
        $cookie_name = "orders";
        
        if(!isset($_COOKIE[$cookie_name])) {
            $cookie_value = array($id);
        }else{
            $cookie_value = explode(", " , $_COOKIE[$cookie_name]);

            if(!in_array ( $id, $cookie_value )){
                array_push($cookie_value, $id);
            }
        }

        setcookie($cookie_name, implode(", " ,$cookie_value), time() + (86400), "/");
    }

    public function adminRemoveOrder($id)
    {
        $cookie_name = "orders";
        
        if(isset($_COOKIE[$cookie_name])) {
            $cookie_value = explode(", " , $_COOKIE[$cookie_name]);

            foreach($cookie_value as $k => $prod_id){
                if($prod_id == $id){
                    break;
                }
            }

            unset($cookie_value[$k]);
            $cookie_value = array_values($cookie_value);

            setcookie($cookie_name, implode(", " ,$cookie_value), time() + (86400), "/");
        }
    }

    public function adminSaveOrder($products_id, $user_id, $notes, $prices, $quantity)
    {
        if(count($products_id) == 0){
            return false;
        }

        $order = new Order;
        
        $order->insert(NULL, $products_id , $user_id , $prices , $notes , $quantity);
        
        return true;
    }
}