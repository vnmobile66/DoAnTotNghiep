<?php
    session_start();
    include("../config/dbcon.php");
    include("myfunction.php");

    if(isset($_POST["register_btn"])){
        $users_name = mysqli_real_escape_string($con, $_POST["users_name"]);
        $users_phone = mysqli_real_escape_string($con, $_POST["users_phone"]);
        $users_pass = mysqli_real_escape_string($con, $_POST["users_pass"]);
        $users_rePass = mysqli_real_escape_string($con, $_POST["users_rePass"]);

        $users_conscious = $_POST["users_conscious"];
        $users_city = $_POST["users_city"];
        $users_wards = $_POST["users_wards"];

        $phone = "SELECT users_id FROM users WHERE users_phone = '$users_phone' ";
        $phone_run = mysqli_query($con, $phone);
        if(mysqli_num_rows($phone_run) == 1){
            $_SESSION['message'] = "Số điện thoại đã được sử dụng";
            header("location: ../register.php");
        }

        if(empty($users_name)){
            $_SESSION['message'] = "Vui lòng nhập tên";
            header("location: ../register.php");
        }
        else if(empty($users_phone)){
            $_SESSION['message'] = "Vui lòng nhập số điện thoại";
            header("location: ../register.php");
        }
        else if(empty($users_pass)){
            $_SESSION['message'] = "Vui lòng nhập mật khẩu";
            header("location: ../register.php");
        }
        else if(empty($users_rePass)){
            $_SESSION['message'] = "Vui lòng nhập mật khẩu";
            header("location: ../register.php");
        }
        else if($users_rePass != $users_pass){
            $_SESSION['message'] = "Mật khẩu không trùng khớp";
            header("location: ../register.php");
        }
        else{
            $password = password_hash($users_pass, PASSWORD_DEFAULT);
            $query = "INSERT INTO users(users_name,users_phone,users_password,users_conscious,users_city,users_wards,users_avt) 
            VALUES ('$users_name','$users_phone','$password','$users_conscious','$users_city','$users_wards','') ";

            $run = mysqli_query($con, $query);

            if($run){
                header("location: ../login.php");
            }
            else{
                redirect("register.php","Lỗi");
            }
        }
    }

    else if(isset($_POST["login_btn"])){
        $users_phone = mysqli_real_escape_string($con, $_POST["users_phone"]);
        $users_pass = mysqli_real_escape_string($con, trim($_POST["users_pass"]));

        $query = "SELECT * FROM users WHERE users_phone='$users_phone'";

        $run = mysqli_query($con, $query);

        if (mysqli_num_rows($run) > 0){
            $row = mysqli_fetch_array($run);
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $row["users_id"];
            $_SESSION["name"] = $row["users_name"];
            $_SESSION["phone"] = $row["users_phone"];
            $_SESSION["avt"] = $row["users_avt"];
            $role_as = $row["role_as"];
            $pass_hash = $row["users_password"];
            if(password_verify($users_pass,$pass_hash)){
                if($role_as == 1){
                    header("location: ../admin/index.php");
                    exit();
                }
                else{
                    header("location: ../index.php");
                    exit();
                }
            }
            else{
                header("location: ../login.php");
            }
        }
        else{
            redirect("../login.php","Vui lòng kiểm tra lại thông tin đăng nhập");
        }
    }

    else if(isset($_POST["updatePass"])){
        $users_id = $_SESSION["id"];
        $oldPass = mysqli_real_escape_string($con, $_POST["users_pass"]);
        $newPass = $_POST["new_pass"];
        $reNewPass = $_POST["re_new_pass"];

        $old_query = "SELECT * FROM users WHERE users_id='$users_id'";
        $old_run = mysqli_query($con,$old_query);

        if(mysqli_num_rows($old_run) > 0){
            $row = mysqli_fetch_array($old_run);
            $pass_hash = $row["users_password"];
            if(password_verify($oldPass,$pass_hash)){
                if($newPass != $reNewPass){
                    echo "Mat khau khong trung khop";
                }
                else{
                    $password = password_hash($newPass, PASSWORD_DEFAULT);
                    $new_query = "UPDATE users SET users_password='$password' WHERE users_id='$users_id'";

                    $new_query_run = mysqli_query($con, $new_query);
                    if($new_query_run){
                        echo "Thanh cong";
                        header("location: ../index.php");
                    }
                    else{
                        echo "That bai";
                        header("location: ../profile.php");
                    }
                }
            }
            else{
                echo "Mat khau khong chinh xac";
                header("location: ../profile.php");
            }
        }
    }
?>