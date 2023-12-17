<?php
    include("../config/dbcon.php");
    include("../functions/myfunction.php");

    // Lưu
    if(isset($_POST["products-save"])){
        // Danh mục
        $category_id = $_POST["category_id"];
        // Thương hiệu
        $brand_id = $_POST["brand_id"];
        // Tên sản phẩm
        $products_name = $_POST["products_name"];
        // Ảnh sản phẩm
        $products_image = $_FILES["products_image"]["name"];
        $path = "../uploads/products";
        // Giá khuyến mãi
        $products_price_sales = $_POST["products_price_sales"];
        // Giá gốc
        $products_price = $_POST["products_price"];
        // Số lượng
        $products_qty = $_POST["products_qty"];
        // Cấu hình
        $products_parameter = $_POST["products_parameter"];
        // Mô tả
        $products_describe = $_POST["products_describe"];

        $deal = isset($_POST["sales"])?'1':'0';
        $active_homepage = isset($_POST["show"])?'1':'0';

        // Câu truy vấn
        $products_query= 
                        "INSERT INTO products_tbl(
                            category_id,
                            brand_id,
                            products_name,
                            products_image,
                            products_price_sales,
                            products_price,
                            products_qty,
                            products_parameter,
                            products_describe,
                            deal,
                            active_homepage)
                        VALUES (
                            '$category_id',
                            '$brand_id',
                            '$products_name',
                            '$products_image',
                            '$products_price_sales',
                            '$products_price',
                            '$products_qty',
                            '$products_parameter',
                            '$products_describe',
                            '$deal',
                            '$active_homepage') ";
        $products_query_run = mysqli_query($con, $products_query);
        if($products_query_run){
            move_uploaded_file($_FILES["products_image"]["tmp_name"], $path."/".$products_image);
            redirect("add-products.php","Thành công");
        }
        else{
            redirect("add-products.php","Thất bại");
        }
    }

    // Thay đổi
    else if(isset($_POST["products-update"])){
        // ID
        $products_id = $_POST["products_id"];
        // Danh mục
        $category_id = $_POST["category_id"];
        // Thương hiệu
        $brand_id = $_POST["brand_id"];
        // Tên sản phẩm
        $products_name = $_POST["products_name"];
        // Ảnh sản phẩm
        $new_image = $_FILES["products_image"]["name"];
        $old_image = $_POST["old_image"];
        $path = "../uploads/products";
        // Giá khuyến mãi
        $products_price_sales = $_POST["products_price_sales"];
        // Giá gốc
        $products_price = $_POST["products_price"];
        // Số lượng
        $products_qty = $_POST["products_qty"];
        // Cấu hình
        $products_parameter = $_POST["products_parameter"];
        // Mô tả
        $products_describe = $_POST["products_describe"];

        $deal = isset($_POST["sales"])?'1':'0';
        $active_homepage = isset($_POST["show"])?'1':'0';
        
        if($new_image != ""){
            $update_filename = $new_image;
        }
        else{
            $update_filename = $old_image;
        }

        $update_products_query = "UPDATE products_tbl SET category_id='$category_id', brand_id='$brand_id', products_name='$products_name',
                                    products_image='$update_filename', products_price_sales='$products_price_sales', products_price='$products_price',
                                    products_qty='$products_qty',products_parameter='$products_parameter' , products_describe='$products_describe', deal='$deal', active_homepage='$active_homepage'
                                    WHERE products_tbl.products_id='$products_id' ";
        $update_run = mysqli_query($con, $update_products_query);
        if($update_run){
            if($_FILES["products_image"]["name"] != ""){
                move_uploaded_file($_FILES["products_image"]["tmp_name"],$path."/".$new_image);
                if(file_exists("../uploads/products/".$old_image)){
                    unlink("../uploads/products/".$old_image);
                }
            }
            redirect("products.php","Thành công");
        }
        else{
            redirect("edit-products.php?id=$products_id","Thất bại");
        }
    }

    // Xóa
    else if(isset($_POST["delete-products"])){
        // Lấy tên danh mục
        $products_id = mysqli_real_escape_string($con, $_POST["products_id"]);

        // Lấy ảnh danh mục
        $products_query = "SELECT * FROM products_tbl WHERE products_id='$products_id' ";
        $products_query_run = mysqli_query($con, $products_query);
        $products_data = mysqli_fetch_array($products_query_run);
        $image = $products_data["products_image"];

        // Lệnh truy vấn xóa danh mục theo id
        $delete_query = "DELETE FROM products_tbl WHERE products_id='$products_id' ";
        $delete_query_run = mysqli_query($con, $delete_query);

        // Kiểm tra câu truy vẫn đã chạy hay chưa 
        if($delete_query_run){
            if(file_exists("../uploads/products/".$image)){
                unlink("../uploads/products/".$image);
            }
            echo 200;
        }
        else{
            echo 500;
        }
    }

    // Thoát
    if(isset($_POST["products-cancel"])){
        header("location: products.php");
        exit(0);
    }
?>