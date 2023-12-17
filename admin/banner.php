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
                            <h4>Banner</h4>
                        </div>
                        <div class="col-md-6">
                            <a href="add-banner.php" class="btn btn-success float-end">Thêm banner</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-center" id="category_table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Hình ảnh</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $banners = getAll("banner_tbl");
                                if(mysqli_num_rows($banners) > 0){
                                    foreach($banners as $banner){
                            ?>
                                <tr>
                                    <td><?= $banner["banner_id"];?></td>
                                    <td>
                                        <img style="width: 150px; height: 100px;" src="../uploads/banners/<?= $banner["banner_images"]?>" alt="">
                                    </td>
                                    <td>
                                        <a href="edit-banner.php?id=<?php echo $banner['banner_id'];?>">Sửa</a>
                                        <form action="code.php" method="POST">
                                            <input type="hidden" name="banner_id" value="<?php echo $banner['banner_id'];?>">
                                            <?= 
                                            $banner["banner_id"]==1?'':'
                                                <button type="submit" class="btn btn-danger" name="delete-banner">Xóa</button>
                                            '?>
                                        </form>
                                    </td>
                                </tr>
                            <?php
                                    }
                                }
                                else{
                                    echo 
                                    "<tr>
                                        <td colspan='3'>Không có banner</td>
                                    </tr>";
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