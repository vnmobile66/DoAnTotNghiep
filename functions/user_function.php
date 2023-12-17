<?php
    require_once("config/dbcon.php");
    function userSelect($table){
        global $con;
        $query = "SELECT * FROM $table";
        return $query_run = mysqli_query($con,$query);
    }

    function getUsersId($table,$id){
        global $con;
        $query = "SELECT * FROM $table WHERE users_id='$id'";
        return $query_run = mysqli_query($con,$query);
    }
    function getId($table,$id){
        global $con;
        $query = "SELECT * FROM $table WHERE category_id='$id'";
        return $query_run = mysqli_query($con,$query);
    }
    function getProducts($table,$id){
        global $con;
        $query = "SELECT * FROM $table WHERE products_id='$id'";
        return $query_run = mysqli_query($con,$query);
    }
    function getNameBrand($table,$id){
        global $con;
        $query = "SELECT * FROM $table JOIN brand_tbl ON brand_tbl.brand_id = $table.brand_id WHERE products_id='$id'";
        return $query_run = mysqli_query($con,$query);
    }
    function getNameCate($table,$id){
        global $con;
        $query = "SELECT * FROM $table JOIN categories ON categories.category_id = $table.category_id WHERE products_id='$id'";
        return $query_run = mysqli_query($con,$query);
    }
    function getCarts(){
        global $con;
        $users_id = $_SESSION["id"];
        $query = "SELECT c.carts_id as ccarts_id, c.products_id, c.products_qty, p.products_id as pproducts_id, p.products_name, p.products_image, p.products_price_sales, p.products_price 
                    FROM carts c, products_tbl p WHERE c.products_id=p.products_id AND c.users_id='$users_id' ORDER BY ccarts_id DESC";
        return $query_run = mysqli_query($con,$query);
    }

    function getSales($table){
        global $con;
        $query = "SELECT * FROM $table WHERE deal=1";
        return $query_run = mysqli_query($con,$query);
    }
    function getShow($table,$cate){
        global $con;
        $query = "SELECT * FROM $table WHERE active_homepage=1 AND category_id='$cate'";
        return $query_run = mysqli_query($con,$query);
    }
    function showBanner($table){
        global $con;
        $query = "SELECT * FROM $table WHERE banner_show=1";
        return $query_run = mysqli_query($con,$query);
    }

    function getOrders(){
        global $con;
        $users_id = $_SESSION["id"];
        $query = "SELECT * FROM orders WHERE users_id='$users_id'";
        return $query_run = mysqli_query($con,$query);
    }

    function searchItem($keyword){
        global $con;
        $query = "SELECT * FROM products_tbl WHERE products_name LIKE '%".$keyword."%'";
        return $query_run = mysqli_query($con,$query);
    }

    function orderItems($table,$id){
        global $con;
        $query = "SELECT * FROM $table 
        JOIN products_tbl ON products_tbl.products_id = $table.products_id
        -- JOIN orders ON orders.orders_id = $table.orders_id
        WHERE orders_id='$id'";
        return $query_run = mysqli_query($con,$query);
    }
?>