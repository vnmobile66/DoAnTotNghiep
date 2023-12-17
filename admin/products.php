<?php
    include("middleware/adminMiddleware.php");
    include("includes/header.php");
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Sản phẩm</h4>
                        </div>
                        <div class="col-md-6">
                            <a href="add-products.php" class="btn btn-success float-end">Thêm sản phẩm</a>
                        </div>
                    </div>
                </div>
                <div class="card-body" id="products_table">
                    <table class="table table-bordered text-center" id="category_table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá niêm yết</th>
                                <th>Giá khuyến mãi</th>
                                <th>Khuyến mãi</th>
                                <!--
                                    active_homepage
                                -->             
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $products = getAll("products_tbl");
                                if(mysqli_num_rows($products) > 0){
                                    foreach($products as $item){
                            ?>
                                <tr>
                                    <td><?php echo $item["products_id"];?></td>
                                    <td>
                                        <img style="width: 50px; height: 50px" src="../uploads/products/<?php echo $item["products_image"];?>">
                                    </td>
                                    <td><?php echo $item["products_name"];?></td>
                                    <td><?php echo $item["products_price"];?></td>
                                    <td><?php echo $item["products_price_sales"];?></td>
                                    <td>
                                        <?php echo $item["deal"] =='1'?'Hiển thị':'Ẩn';?>
                                    </td>
                                    <td>
                                        <a href="edit-products.php?id=<?php echo $item["products_id"];?>">Sửa</a>
                                        <form action="code.php" method="POST">
                                            <button type="submit" class="btn btn-danger delete-products" name="delete-products" value="<?php echo $item["products_id"];?>" >Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php
                                    }
                                }
                                else{
                                    echo 
                                    "<tr>
                                        <th colspan='8'>Không có sản phẩm</th>
                                    <tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include("includes/footer.php");
?>