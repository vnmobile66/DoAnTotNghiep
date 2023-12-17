<?php
    include("functions/user_function.php");
?>
<?php
    if(isset($_FILES["users_avt"]["name"])){
        $users_id = $_POST["users_id"];
        $new_images = $_FILES["users_avt"]["name"];
        $path = "uploads/users";
        $old_images = $_POST["avt_old"];

        if($new_images != ""){
            $update_filename = $new_images;
        }
        else{
            $update_filename = $old_images;
        }

        $query = "UPDATE users SET users_avt='$update_filename' WHERE users_id= '$users_id'";
        $run = mysqli_query($con, $query);
        if($run){
            if($_FILES["users_avt"]["name"] != ""){
                move_uploaded_file($_FILES["users_avt"]["tmp_name"],$path."/".$new_images);
                if(file_exists("uploads/users/".$old_images)){
                    unlink("uploads/users/".$old_images);
                }
            }
            header("location: profile.php");
        }
    }
?>