<?php
    session_start();
    include("../config/dbcon.php");
    require("myfunction.php");

    if(isset($_SESSION["loggedin"])){
        if(isset($_POST["placeOrderBtn"])){
            $users_name = mysqli_real_escape_string($con, $_POST["users_name"]);
            $users_phone = mysqli_real_escape_string($con, $_POST["users_phone"]);
            $address = mysqli_real_escape_string($con, $_POST["address"]);
            $payment_mode = mysqli_real_escape_string($con, $_POST["payment_mode"]);

            if($users_name == "" || $users_phone == "" || $address == ""){
                header("location: ../checkout.php");
                exit(0);
            }
            
            $cartItems = getCart();
            $totalPrice = 0;
            
            foreach($cartItems as $cart){
                $totalPrice += $cart["products_price_sales"]*$cart["products_qty"];
            }
            $tracking_no = "HP".rand(111,999).substr($users_phone,2);
            $users_id = $_SESSION["id"];

            $query = "INSERT INTO orders (tracking_no, users_id, users_name, users_phone, address, total_price, payment_mode) 
                    VALUES ('$tracking_no','$users_id','$users_name','$users_phone','$address','$totalPrice','$payment_mode')";
            $result = mysqli_query($con, $query);
            if($result){
                foreach($cartItems as $cart){
                    $products_id = $cart["products_id"];
                    $products_qty = $cart["products_qty"];
                    $price = $cart["products_price_sales"];
                    $orders_id = mysqli_insert_id($con);
                    $insert = "INSERT INTO order_items(products_id, qty, price, orders_id) VALUES ('$products_id','$products_qty','$price','$orders_id')";
                    $run = mysqli_query($con, $insert);

                    $products_query = "SELECT * FROM products_tbl WHERE products_id='$products_id' LIMIT 1";
                    $products_run = mysqli_query($con, $products_query);
                    $prodData = mysqli_fetch_array($products_run);
                    $current = $prodData["products_qty"];
                    $new_qty = $current - $products_qty;

                    $updateProducts = "UPDATE products_tbl SET products_qty='$new_qty' WHERE products_id='$products_id' ";
                    $updateRun = mysqli_query($con, $updateProducts);
                }
                $delete = "DELETE FROM carts WHERE users_id='$users_id'";
                $delete_run = mysqli_query($con, $delete);
                header("location: ../profile.php");
                die();
            }
        }
    }
    else{
        header("location: ../login.php");
    }
?>