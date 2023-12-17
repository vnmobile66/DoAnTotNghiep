<?php
    include("includes/header.php");
    include("middleware/adminMiddleware.php");
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Thương hiệu</h4>
                        </div>
                        <div class="col-md-6">
                            <a href="add-brand.php" class="btn btn-success float-end">Thêm thương hiệu</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-center" id="category_table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên thương hiệu</th>
                                <th>ID Danh mục</th>
                                <th>Hình ảnh</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $brand = getAll("brand_tbl");
                                if(mysqli_num_rows($brand) > 0){
                                    foreach($brand as $item){
                            ?>
                                        <tr>
                                            <td><?php echo $item["brand_id"]; ?></td>
                                            <td><?php echo $item["brand_name"]; ?></td>
                                            <td><?php echo $item["category_id"]; ?></td>
                                            <td>
                                                <img style="width: 50px; height: 50px;" src="../uploads/brand/<?php echo $item["brand_image"]; ?>" alt="">
                                            </td>
                                            <td>
                                                <a href="edit-brand.php?id=<?php echo $item["brand_id"]; ?>">Sửa</a>
                                                <form action="code.php" method="POST">
                                                    <input type="hidden" name="brand_id" value="<?php echo $item['brand_id'];?>">
                                                    <button class="btn btn-danger" name="delete_brand">Xóa</button>
                                                </form>
                                            </td>
                                        </tr>
                            <?php
                                    }
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