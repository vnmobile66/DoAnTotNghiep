<?php
    session_start();
    include("../config/dbcon.php");
    include("../functions/myfunction.php");

    // Danh mục
    if(isset($_POST["category-save"])){
        if(!empty($_POST["category_name"])){
            $category_name = $_POST["category_name"];
        }
        else{
            redirect("./add-category.php","Enter category name");
        }

        if(!empty($_FILES["category_images"]["name"])){
            $category_images = $_FILES["category_images"]["name"];
            $path = "../uploads";
        }
        else{
            redirect("./add-category.php","Add Images");
        }
        // $category_images_ext = pathinfo($category_images, PATHINFO_EXTENSION);
        // $filename = time().'.'.$category_images_ext;

        $cate_query = "INSERT INTO categories (category_name,category_image) VALUES ('$category_name','$category_images')";
        $cate_query_run = mysqli_query($con, $cate_query);
        if($cate_query_run){
            move_uploaded_file($_FILES["category_images"]["tmp_name"], $path."/".$category_images);
            redirect("./add-category.php","Success");
        }
        else{
            redirect("./add-category.php","Something went wrong");
        }
    }
    else if(isset($_POST["category-update"])){
        $category_id = $_POST["category_id"];
        $category_name = $_POST["category_name"];
        $new_images = $_FILES["category_images"]["name"];
        $old_images = $_POST["old_images"];
        $path = "../uploads";
        if($new_images != ""){
            $update_filename = $new_images;
        }
        else{
            $update_filename = $old_images;
        }
        $update_query = "UPDATE categories SET category_name= '$category_name', category_image= '$update_filename' WHERE category_id= '$category_id'";

        $update_query_run = mysqli_query($con, $update_query);

        if($update_query_run){
            if($_FILES["category_images"]["name"] != ""){
                move_uploaded_file($_FILES["category_images"]["tmp_name"],$path."/".$new_images);
                if(file_exists("../uploads/".$old_images)){
                    unlink("../uploads/".$old_images);
                }
            }
            redirect("./category.php","Thành công");
        }
        else{
            redirect("./edit-category.php?id=$category_id","Thất bại");
        }
    }
    else if(isset($_POST["delete-category"])){
        // Lấy tên danh mục
        $category_id = mysqli_real_escape_string($con, $_POST["category_id"]);

        // Lấy ảnh danh mục
        $category_query = "SELECT * FROM categories WHERE category_id='$category_id' ";
        $category_query_run = mysqli_query($con, $category_query);
        $category_data = mysqli_fetch_array($category_query_run);
        $image = $category_data["category_image"];

        // Lệnh truy vấn xóa danh mục theo id
        $delete_query = "DELETE FROM categories WHERE category_id='$category_id' ";
        $delete_query_run = mysqli_query($con, $delete_query);

        // Kiểm tra câu truy vẫn đã chạy hay chưa 
        if($delete_query_run){
            if(file_exists("../uploads/".$image)){
                unlink("../uploads/".$image);
            }
            redirect("./category.php","Success");
        }
        else{
            redirect("./category.php","Failer");
        }
    }
    else if(isset($_POST["category-cancel"])){
        header("location: ./category.php");
        exit(0);
    }
    
    // Thương hiệu
    else if(isset($_POST["brand-save"])){-
        $category_id = $_POST["category_id"];
        if(!empty($_POST["brand_name"])){
            $brand_name = $_POST["brand_name"];
        }
        else{
            redirect("./add-brand.php","Thất bại");
        }
        if(!empty($_FILES["brand_image"]["name"])){
            $brand_image = $_FILES["brand_image"]["name"];
            $path = "../uploads/brand";
        }
        else{
            redirect("./add-brand.php","Thất bại");
        }
        $brand_query = "INSERT INTO brand_tbl (brand_name,category_id,brand_image) VALUES ('$brand_name','$category_id','$brand_image') ";
        $brand_query_run = mysqli_query($con, $brand_query);

        if($brand_query_run){
            move_uploaded_file($_FILES["brand_image"]["tmp_name"], $path."/".$brand_image);
            redirect("./add-brand.php","Thành công");
        }
        else{
            redirect("./add-brand.php","Thất bại");
        }
    }
    else if(isset($_POST["brand-update"])){
        $category_id = $_POST["category_id"];
        $brand_id = $_POST["brand_id"];
        $brand_name = $_POST["brand_name"];
        $new_images = $_FILES["brand_image"]["name"];
        $old_images = $_POST["old_images"];
        $path = "../uploads/brand";
        if($new_images != ""){
            $update_filename = $new_images;
        }
        else{
            $update_filename = $old_images;
        }
        $update_query = "UPDATE brand_tbl SET brand_name= '$brand_name',category_id= '$category_id' , brand_image= '$update_filename' WHERE brand_id= '$brand_id'";

        $update_query_run = mysqli_query($con, $update_query);

        if($update_query_run){
            if($_FILES["brand_image"]["name"] != ""){
                move_uploaded_file($_FILES["brand_image"]["tmp_name"],$path."/".$new_images);
                if(file_exists("../uploads/brand/".$old_images)){
                    unlink("../uploads/brand/".$old_images);
                }
            }
            redirect("./brand.php", "Thành công");
        }
        else{
            redirect("./edit-brand.php?id=$brand_id","Thất bại");
        }
    }
    else if(isset($_POST["delete_brand"])){
        // Lấy id thương hiệu
        $brand_id = mysqli_real_escape_string($con, $_POST["brand_id"]);

        // Lấy ảnh thương hiệu
        $brand_query = "SELECT * FROM brand_tbl WHERE brand_id='$brand_id' ";
        $brand_query_run = mysqli_query($con, $brand_query);
        $brand_data = mysqli_fetch_array($brand_query_run);
        $image = $brand_data["brand_image"];

        // Lệnh truy vấn xóa thương hiệu theo id
        $delete_query = "DELETE FROM brand_tbl WHERE brand_id='$brand_id' ";
        $delete_query_run = mysqli_query($con, $delete_query);

        // Kiểm tra câu truy vẫn đã chạy hay chưa 
        if($delete_query_run){
            if(file_exists("../uploads/brand/".$image)){
                unlink("../uploads/brand/".$image);
            }
            redirect("./brand.php","Success");
        }
        else{
            redirect("./brand.php","Failer");
        }
    }
    // Banner
    else if(isset($_POST["banner-save"])){
        $banner_images = $_FILES["banner_images"]["name"];
        $path = "../uploads/banners";
        $active = isset($_POST["show-banner"])?'1':'0';

        $query = "INSERT INTO banner_tbl (banner_images, banner_show) VALUES ('$banner_images','$active')";
        $result = mysqli_query($con, $query);

        if($result){
            move_uploaded_file($_FILES["banner_images"]["tmp_name"], $path."/".$banner_images);
            redirect("./add-banner.php","Thành công");
        }
        else{
            redirect("./add-banner.php","Thất bại");
        }
    }
    else if(isset($_POST["banner-update"])){
        $banner_id = $_POST["banner_id"];
        $show_banner = isset($_POST["show-banner"])?'1':'0';
        $new_banner_images = $_FILES["new_banner_images"]["name"];
        $old_images = $_POST["old_images"];
        $path = "../uploads/banners";
        if($new_banner_images != ""){
            $update_filename = $new_banner_images;
        }
        else{
            $update_filename = $old_images;
        }

        $update_banners_query = "UPDATE banner_tbl SET banner_images='$update_filename', banner_show='$show_banner' WHERE banner_id='$banner_id'";
        $run_query = mysqli_query($con, $update_banners_query);

        if($run_query){
            if($_FILES["new_banner_images"]["name"] != ""){
                move_uploaded_file($_FILES["new_banner_images"]["tmp_name"],$path."/".$new_banner_images);
                if(file_exists("../uploads/banners/".$old_images)){
                    unlink("../uploads/banners/".$old_images);
                }
                header("location: ./banner.php");
                exit(0);
            }
        }
        else{
            header("location: ./edit-banner.php");
        }
    }
    else if(isset($_POST["banner-update"])){
        $banner_id = $_POST["banner_id"];
        $show_banner = isset($_POST["show-banner"])?'1':'0';
        $new_banner_images = $_FILES["new_banner_images"]["name"];
        $old_images = $_POST["old_images"];
        $path = "../uploads/banners";
        if($new_banner_images != ""){
            $update_filename = $new_banner_images;
        }
        else{
            $update_filename = $old_images;
        }

        $update_banners_query = "UPDATE banner_tbl SET banner_images='$update_filename', banner_show='$show_banner' WHERE banner_id='$banner_id'";
        $run_query = mysqli_query($con, $update_banners_query);

        if($run_query){
            if($_FILES["new_banner_images"]["name"] != ""){
                move_uploaded_file($_FILES["new_banner_images"]["tmp_name"],$path."/".$new_banner_images);
                if(file_exists("../uploads/banners/".$old_images)){
                    unlink("../uploads/banners/".$old_images);
                }
                header("location: banner.php");
                exit(0);
            }
        }
        else{
            header("location: edit-banner.php");
        }
    }
    else if(isset($_POST["banner-cancel"])){
        header("location: ./banner.php");
        exit(0);
    }
    else if(isset($_POST["brand-cancel"])){
        header("location: ./brand.php");
        exit(0);
    }
?>