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
                            <h4>Danh mục</h4>
                        </div>
                        <div class="col-md-6">
                            <a href="add-category.php" class="btn btn-success float-end">Thêm danh mục</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-center" id="category_table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Danh mục</th>
                                <th>Hình ảnh</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $category = getAll("categories");

                                if(mysqli_num_rows($category) > 0){
                                    foreach($category as $item){
                                        ?>
                                            <tr>
                                                <td><?php echo $item['category_id'];?></td>
                                                <td><?php echo $item['category_name'];?></td>
                                                <td>
                                                    <img style="width: 50px; height: 50px;" src="../uploads/<?php echo $item['category_image'];?>" alt="">
                                                </td>
                                                <td>
                                                    <a href="edit-category.php?id=<?php echo $item['category_id'];?>">Sửa</a>
                                                    <form action="code.php" method="POST">
                                                        <input type="hidden" name="category_id" value="<?php echo $item['category_id'];?>">
                                                        <button type="submit" class="btn btn-danger" name="delete-category">Xóa</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                }
                                else{
                                    echo 
                                    "<tr>
                                        <th colspan='4'>Không có dữ liệu</th>
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