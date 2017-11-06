<?php
    function db_connect() {
        // Define connection as a static variable, to avoid connecting more than once 
        static $connection;
        // Try and connect to the database, if a connection has not been established yet
        if(!isset($connection)) {
            $config = parse_ini_file(dirname(__FILE__) . '/../config.ini');     
            $connection = new mysqli($config['hostname'], $config['username'], $config['password'], $config['dbname']);    
            if($connection->connect_error === false){
                die("Connection failed: " . $conn->connect_error);           
            }
        }
        return $connection;
    }

    function query($stmt){
        return db_connect()->query($stmt);
    }

    function dbAddToCart($user_id, $product_id, $color, $size, $qty){
        $insert_query = "INSERT INTO cart_items (user_id, product_id , product_variant_id, quantity, ordered) VALUES ('$user_id', $product_id, (SELECT product_variant_id FROM product_variants WHERE product_id = $product_id AND color = '$color' AND size = $size LIMIT 1), $qty, false);";
        return query($insert_query);
    }

    function dbGetCartItems($user_id){
        $stmt = "SELECT p.product_id, p.product_name, pv.color, pv.size, c.item_id, c.product_variant_id, c.quantity
            FROM cart_items c 
                INNER JOIN products p 
                    ON c.product_id = p.product_id 
                    AND c.user_id = '$user_id' 
                    AND c.ordered = false 
                    INNER JOIN product_variants pv 
                        ON c.product_variant_id = pv.product_variant_id;
        ";
        return query($stmt);
    }

    function dbOrderItemsInCart($user_id){
        $update_query = "UPDATE cart_items SET ordered = true WHERE user_id = '$user_id' AND ordered = false";
        return query($update_query);
    }
?>