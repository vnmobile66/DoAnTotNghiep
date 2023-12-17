<?php
    include("../config/dbcon.php");

    function sumOrders(){
        global $con;
        $query = "SELECT orders_id, total_price, ROUND(SUM(total_price)) AS sum FROM orders";
        return $query_run = mysqli_query($con,$query);
    }

    function totalOrders(){
        global $con;
        $query = "SELECT orders_id, COUNT(orders_id) FROM orders";
        return $query_run = mysqli_query($con,$query);
    }
    function getAll($table){
        global $con;
        $query = "SELECT * FROM $table";
        return $query_run = mysqli_query($con,$query);
    }
    function getById($table,$id){
        global $con;
        $query = "SELECT * FROM $table WHERE category_id='$id'";
        return $query_run = mysqli_query($con,$query);
    }

    function getBrandId($table,$id){
        global $con;
        $query = "SELECT * FROM $table WHERE brand_id='$id'";
        return $query_run = mysqli_query($con,$query);
    }

    function getProductsId($table,$id){
        global $con;
        $query = "SELECT * FROM $table WHERE products_id='$id'";
        return $query_run = mysqli_query($con,$query);
    }

    function getCart(){
        global $con;
        $users_id = $_SESSION["id"];
        $query = "SELECT c.carts_id as ccarts_id, c.products_id, c.products_qty, p.products_id as pproducts_id, p.products_name, p.products_image, p.products_price_sales, p.products_price 
                    FROM carts c, products_tbl p WHERE c.products_id=p.products_id AND c.users_id='$users_id' ORDER BY ccarts_id DESC";
        return $query_run = mysqli_query($con,$query);
    }

    function getBannerId($table,$id){
        global $con;
        $query = "SELECT * FROM $table WHERE banner_id='$id'";
        return $query_run = mysqli_query($con,$query);
    }

    function orderItems($table,$id){
        global $con;
        $query = "SELECT * FROM $table JOIN products_tbl ON products_tbl.products_id = $table.products_id WHERE orders_id='$id'";
        return $query_run = mysqli_query($con,$query);
    }

    function redirect($url,$message){
        $_SESSION['message'] = $message;
        header('Location:'. $url);
    }
?>