<?php
    session_start();
    include("../config/dbcon.php");
    if(isset($_SESSION["loggedin"])){
        if(isset($_POST["scope"])){
            $scope = $_POST["scope"];
            switch($scope)
            {
                // Add
                case "add":
                    $prod_id = $_POST["prod_id"];
                    $prod_qty = $_POST["prod_qty"];

                    $users_id = $_SESSION["id"];

                    $check = "SELECT * FROM carts WHERE products_id='$prod_id' AND users_id='$users_id'";
                    $run = mysqli_query($con, $check);

                    if(mysqli_num_rows($run) > 0){
                        echo "active";
                    }
                    else{
                        $query = "INSERT INTO carts(users_id,products_id,products_qty) VALUES ('$users_id','$prod_id','$prod_qty')";
                        $result = mysqli_query($con, $query);

                        if($result){
                            echo 200;
                        }
                        else{
                            echo 500;
                        }
                    }
                    break;

                // Update
                case "update":
                    $prod_id = $_POST["prod_id"];
                    $prod_qty = $_POST["prod_qty"];

                    $users_id = $_SESSION["id"];

                    $check = "SELECT * FROM carts WHERE products_id='$prod_id' AND users_id='$users_id'";
                    $run = mysqli_query($con, $check);

                    if(mysqli_num_rows($run) > 0){
                        $query = "UPDATE carts SET products_qty='$prod_qty' WHERE products_id='$prod_id' AND users_id='$users_id'";
                        $result = mysqli_query($con, $query);
                        if($result){
                            echo 200;
                        }
                        else{
                            echo 500;
                        }
                    }
                    else{
                        echo "ERROR";
                    }
                    break;

                // Delete
                case "delete":
                    $cart_id = $_POST["cart_id"];
                    $users_id = $_SESSION["id"];

                    $check = "SELECT * FROM carts WHERE carts_id='$cart_id' AND users_id='$users_id'";
                    $run = mysqli_query($con, $check);

                    if(mysqli_num_rows($run) > 0){
                        $query = "DELETE FROM carts WHERE carts_id='$cart_id'";
                        $result = mysqli_query($con, $query);
                        if($result){
                            echo 200;
                        }
                        else{
                            echo 500;
                        }
                    }
                    else{
                        echo "ERROR";
                    }
                    break;
                default:
                    echo 500;
            }
        }
    }
    else{
        echo 401;
    }
?>